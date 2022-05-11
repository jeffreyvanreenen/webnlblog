<template>
    <Nav class="w-full"/>
    <div className="flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8 bg-gray-100">

        <div class="flex flex-col">
            <div class="font-semibold text-orange-500 pt-5">Algemeen</div>
            <form @submit.prevent="submitForm" id="contactForm">
                <div className="rounded-md -space-y-px">
                    <div className="pt-5">
                        <label htmlFor="email-address" className="sr-only">Email</label>
                        <input v-model="form.title" id="email-address" type="text" required
                               className="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                               placeholder="Titel">
                    </div>
                    <div className="pb-10">
                        <label htmlFor="email-address" className="sr-only">Email</label>
                        <input v-model="form.url" id="email-address" type="url" required
                               className="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                               placeholder="URL Afbeelding">
                    </div>
                </div>
                <div>
                    <div class="font-semibold text-orange-500 pb-3">Artikel</div>
                    <Tiptap v-model="form.content"/>
                </div>
                <div>
                    <div class="font-semibold text-orange-500 pt-5">Categorieën</div>
                    <div class="pt-3 grid grid-cols-4 gap-4">
                        <div v-for="categorie in categories"
                             :key="categorie.id" >
                            <label>
                                <input type="checkbox" :id="categorie.id" @click="()=>{selectCategories(categorie.id)}" class="peer hidden">
                                <div :for="categorie.id"
                                     class="px-4 py-2 font-semibold text-sm bg-cyan-500 text-white rounded-full shadow-sm peer-checked:bg-orange-500">
                                    {{ categorie.name }}
                                </div>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="pt-5">
                    <button type="submit"
                            className="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-orange-500 hover:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Publiceren
                    </button>
                </div>
            </form>
        </div>
    </div>
    <Footer class="w-full"/>
</template>
<script>
import Footer from "../components/Footer";
import Nav from "../components/Nav";
import Tiptap from '../components/Tiptap';
import _ from "lodash";
import router from '../router'



export default {
    components: {Nav, Footer, Tiptap},
    data() {
        return {
            form: {
                content: '<p>Schrijf iets moois!</p>',
                title: '',
                url: '',
            },
            categories: [],
            catSelect: [],
        }
    },
    methods: {
        async submitForm() {
            await this.axios.post('http://webnlblog.test/api/newBlogPost', this.form)
                .then((res) => {
                    console.log(res);
                    router.push({ name: 'home'})
                })
                .catch((error) => {
                    if (error.response.status === 422) {
                        this.errors = error.response.data.message;
                        console.log(this.errors);
                    }
                });
        },
        loadCategories() {
            this.axios.get('http://webnlblog.test/api/fetchAllCategories')
                .then((response) => {
                    this.categories = response.data.categories;
                })
        },
        selectCategories(id) {
            if(this.catSelect.includes(id))  {
                this.catSelect=_.without(this.catSelect, id)
            }else{
                this.catSelect.push(id)
            }
        },
    },
    created() {
        this.loadCategories();
    }

};
</script>

