<template>
    <div id="blog" class="bg-gray-100 px-4 xl:px-0 py-4">
        <div class="mx-auto container">

            <div class="w-full bg-white rounded-3xl p-6">
                <div class="font-bold">Categorieen</div>
                <div class="flex flex-row pt-5">
                    <div v-for="categorie in categories"
                         :key="categorie.id">
                        <label>
                            <input type="checkbox" :id="categorie.id" @click="()=>{selectCategories(categorie.id)}" class="peer hidden">
                            <div :for="categorie.id"
                                 class="bg-gray-100 rounded-lg mr-5 pt-2 pb-2 pl-4 pr-4 peer-checked:bg-orange-500 ">
                                {{ categorie.name }}
                            </div>
                        </label>
                    </div>
                </div>
                <div class="font-bold pt-5">Auteurs</div>
                <div class="grid grid-cols-4 gap-4 pt-5">
                    <div v-for="author in authors"
                         :key="author.id">
                        <label>
                            <input type="checkbox" :id="author.id" @click="()=>{selectAuthors(author.id)}" class="peer hidden">
                            <div :for="author.id"
                                 class="bg-gray-100 rounded-lg mr-5 pt-2 pb-2 pl-4 pr-4 peer-checked:bg-orange-500 ">
                                {{ author.name }}
                            </div>
                        </label>
                    </div>
                </div>
            </div>


            <infinite-scroll @infinite-scroll="loadDataFromServer" infinite-scroll-distance="1" :message="message"
                             :noResult="noResult">
                <div class="flex flex-col mt-12 lg:mt-24 space-y-10">
                    <div v-for="blog in blogs" :key="blog.id" class="bg-white rounded-lg border-orange-500 ">

                        <div class="flex flex-row">
                            <div class="flex-none"><img
                                class="object-cover w-full h-96 rounded-t-lg md:h-auto md:w-48 md:rounded-none md:rounded-l-lg "
                                :src="blog.image" alt=""></div>
                            <div class="flex w-full flex-col p-5">
                                <h2 class="text-3xl text-bold text-orange-500 p-5">
                                    <router-link :to="{name: 'blogpost', params: { id: blog.id }}">{{
                                            blog.name
                                        }}
                                    </router-link>
                                </h2>
                                <p class="p-5"> {{ blog.post.substring(0, 400) + "..." }}</p>
                                <p class="p-5 text-orange-500">
                                    <router-link :to="{name: 'blogpost', params: { id: blog.id }}">Lees meer...
                                    </router-link>
                                </p>
                                <p class="p-5 text-sm"> {{ blog.created_at }} - {{ blog.author.name }}</p>
                                <p class="p-5 text-sm flex flex-row">
                                <div class="bg-gray-100 rounded-lg mr-5 pt-2 pb-2 pl-4 pr-4"
                                     v-for="categorie in blog.categorie" :key="categorie.id">{{ categorie.name }}
                                </div>
                                </p>
                            </div>
                        </div>


                    </div>
                </div>
            </infinite-scroll>
        </div>
    </div>
</template>

<script>
import InfiniteScroll from "infinite-loading-vue3";
import _ from "lodash";

export default {
    name: "blogLatest",

    components: {
        InfiniteScroll,
    },
    data() {
        return {
            blogs: [],
            page: 1,
            noResult: false,
            message: '',
            busyLoadingData: false,
            categories: [],
            catSelect: [],
            catFilters: '',
            authors: [],
            authSelect: [],
            authFilters: [],
        };
    },
    methods: {
        async loadDataFromServer() {
            if (this.busyLoadingData === true) return;
            this.busyLoadingData = true;
            try {
                if(this.catSelect.length === 0) {
                    this.catFilters = 'all';
                }else {
                    this.catFilters = encodeURI(JSON.stringify(this.catSelect));
                }

                if(this.authSelect.length === 0) {
                    this.authFilters = 'all';
                }else {
                    this.authFilters = encodeURI(JSON.stringify(this.authSelect));
                }

                const result = await this.axios.get('http://webnlblog.test/api/fetchBlogPosts?page=' + this.page + '&catfilter=' + this.catFilters + '&authfilter=' + this.authFilters)
                console.log(result.data.blogs.data)
                if (result.data.blogs.data.length) {
                    this.blogs.push(...result.data.blogs.data);
                    this.page++;
                    this.busyLoadingData = false;
                } else {
                    this.noResult = true;
                    this.message = "Geen resultaten gevonden.";
                    this.busyLoadingData = false;
                }
            } catch (err) {
                this.noResult = true;
                this.message = "Er is iets mis gegaan met het laden van de data.";
            }
            this.busyLoadingData = false;
        },

        loadCategories() {
            this.axios.get('http://webnlblog.test/api/fetchCategories')
                .then((response) => {
                    this.categories = response.data.categories;
                })
        },

        loadAuthors() {
            this.axios.get('http://webnlblog.test/api/fetchAuthors')
                .then((response) => {
                    this.authors = response.data.authors;
                })
        },

        selectCategories(id) {
            if(this.catSelect.includes(id))  {
                this.catSelect=_.without(this.catSelect, id)
            }else{
                this.catSelect.push(id)
            }
            this.blogs = []
            this.page = 1
            this.loadDataFromServer();
            console.log(this.catSelect);
        },

        selectAuthors(id) {
            if(this.authSelect.includes(id))  {
                this.authSelect=_.without(this.authSelect, id)
            }else{
                this.authSelect.push(id)
            }
            this.blogs = []
            this.page = 1
            this.loadDataFromServer();
            console.log(this.authSelect);
        },

    },
    created() {
        this.loadDataFromServer();
        this.loadCategories();
        this.loadAuthors();
    }
};
</script>

<style scoped>
@import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap");

.f-f-p {
    font-family: "Poppins", sans-serif;
}

/*input.checkCat:checked + label {*/
/*    background: orange;*/
/*}*/

</style>
<!-- SBI Code 6209-->
<!-- SBI Code 6311-->
<!-- SBI Code 7021-->
<!-- SBI Code 6201-->
<!-- E-Boekhouden € 16.80 -->
<!-- Zakelijke rekening ING € 15.00 -->
