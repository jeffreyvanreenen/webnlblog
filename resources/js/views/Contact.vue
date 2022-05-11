<template>
    <Nav class="w-full"/>

    <section class="text-gray-600 body-font relative bg-gray-100">

        <div class="container px-5 py-24 mx-auto flex sm:flex-nowrap flex-wrap">

            <div
                class="lg:w-2/3 md:w-1/2 bg-gray-300 rounded-lg overflow-hidden sm:mr-10 p-10 flex items-end justify-start relative">
                <iframe width="100%" height="100%" class="absolute inset-0" frameborder="0" title="map" marginheight="0"
                        marginwidth="0" scrolling="no"
                        src="https://maps.google.com/maps?width=100%&height=600&hl=nl&q=Hellevoetsluis&ie=UTF8&t=&z=14&iwloc=B&output=embed"
                        style="filter: grayscale(1) contrast(1.2) opacity(0.4);"></iframe>
                <div class="bg-white relative flex flex-wrap py-6 rounded shadow-md">
                    <div class="lg:w-1/2 px-6">
                        <h2 class="title-font font-semibold text-gray-900 tracking-widest text-xs">Adres</h2>
                        <p class="mt-1">Ergens in Hellevoetsluis</p>
                    </div>
                    <div class="lg:w-1/2 px-6 mt-4 lg:mt-0">
                        <h2 class="title-font font-semibold text-gray-900 tracking-widest text-xs">EMAIL</h2>
                        <a class="text-orange-500 leading-relaxed">* geheim *</a>
                        <h2 class="title-font font-semibold text-gray-900 tracking-widest text-xs mt-4">Telefoon</h2>
                        <p class="leading-relaxed">* geheim *</p>
                    </div>
                </div>
            </div>
            <div class="lg:w-1/3 md:w-1/2 bg-white flex flex-col md:ml-auto w-full md:py-8 mt-8 md:mt-0 bg-gray-100">
                <h2 class="text-orange-500 text-2xl mb-1 font-medium title-font">Contact</h2>
                <p class="leading-relaxed mb-5 text-gray-600">Laat iets van je horen...</p>
                <form @submit.prevent="submitForm" id="contactForm">
                    <div class="relative mb-4">
                        <label for="name" class="leading-7 text-sm text-gray-600">Naam</label>
                        <input type="text" id="name" name="name" v-model="form.name"
                               class="w-full bg-white rounded border border-gray-300 focus:border-orange-500 focus:ring-2 focus:ring-orange-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                               data-np-invisible="1" data-np-checked="1">
                        <div class="text-orange-500 font-bold" v-if="errors && errors.name">{{ errors.name[0] }}</div>
                    </div>
                    <div class="relative mb-4">
                        <label for="email" class="leading-7 text-sm text-gray-600">Email</label>
                        <input type="email" id="email" name="email" v-model="form.email"
                               class="w-full bg-white rounded border border-gray-300 focus:border-orange-500 focus:ring-2 focus:ring-orange-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                               data-np-invisible="1" data-np-checked="1">
                        <div class="text-orange-500 font-bold" v-if="errors && errors.email">{{ errors.email[0] }}</div>
                    </div>
                    <div class="relative mb-4">
                        <label for="message" class="leading-7 text-sm text-gray-600">Bericht</label>
                        <textarea id="message" name="message" v-model="form.message"
                                  class="w-full bg-white rounded border border-gray-300 focus:border-orange-500 focus:ring-2 focus:ring-orange-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"></textarea>
                        <div class="text-orange-500 font-bold" v-if="errors && errors.message">{{
                                errors.message[0]
                            }}
                        </div>
                    </div>
                    <input type="submit"
                           class="text-white bg-orange-500 border-0 py-2 px-6 focus:outline-none hover:bg-orange-600 rounded text-lg"
                           value="Verstuur">
                    <p class="text-xs text-gray-500 mt-3">Dit is een demoproject, berichten worden niet gelezen.</p>
                </form>

                <div id="thankYouMessage" class="hidden text-green-500 font-bold">Bedankt, we nemen spoedig contact met
                    je op!
                </div>
            </div>
        </div>
    </section>
    <Footer class="w-full"/>
</template>

<script>
import Nav from '../components/Nav.vue';
import Footer from '../components/Footer.vue';

export default {
    name: "contact",
    components: {
        Footer, Nav
    },
    data() {
        return {
            form: {
                name: '',
                email: '',
                message: '',
            },
            errors: {},
        }
    },
    methods: {
        async submitForm() {
           await this.axios.post('http://webnlblog.digicate.nl/api/contact', this.form)
                .then((res) => {
                    console.log(res);

                    contactForm.style.display = 'none';
                    thankYouMessage.style.display = 'block';
                })
                .catch((error) => {
                    if (error.response.status === 422) {
                        this.errors = error.response.data.message;
                        console.log(this.errors);
                    }
                    console.log(this.errors);
                });
        }
    },
}
</script>
