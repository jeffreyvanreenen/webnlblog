<template>
    <Nav/>
    <div class="flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8 bg-gray-100">
        <div class="max-w-md w-full space-y-8">
            <div>
                <img class="mx-auto h-12 w-auto" src="../img/rn.png" alt="Workflow">
                <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">Maak een nieuw account</h2>
                <p class="mt-2 text-center text-sm text-gray-600">

                </p>
            </div>
            <form class="mt-8 space-y-6" @submit.prevent="submitForm">
                <input type="hidden" name="remember" value="true">
                <div class="rounded-md shadow-sm -space-y-px">
                    <div>
                        <label for="name" class="sr-only">Naam</label>
                        <input v-model="form.name" id="name" type="text" required
                               class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                               placeholder="Naam">
                    </div>
                    <div class="pt-5">
                        <label for="email-address" class="sr-only">Email</label>
                        <input v-model="form.email" id="email-address" type="email" required
                               class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                               placeholder="Email adres">
                    </div>
                    <div class="pt-5">
                        <label for="password" class="sr-only">Wachtwoord</label>
                        <input v-model="form.password" id="password" type="password"
                               required
                               class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                               placeholder="Wachtwoord">
                    </div>
                    <div class="pt-5">
                        <label for="password_confirmation" class="sr-only">Nog een keer je wachtwoord</label>
                        <input v-model="form.password_confirmation" id="password_confirmation" type="password"
                               autocomplete="current-password" required
                               class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                               placeholder="Nog een keer je wachtwoord">
                    </div>
                </div>
                <div>
                    <button type="submit"
                            class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-orange-500 hover:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
          <span class="absolute left-0 inset-y-0 flex items-center pl-3">
            <!-- Heroicon name: solid/lock-closed -->
            <svg class="h-5 w-5 text-orange-300 group-hover:text-orange-400" xmlns="http://www.w3.org/2000/svg"
                 viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
              <path fill-rule="evenodd"
                    d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                    clip-rule="evenodd"/>
            </svg>
          </span>
                        Registreren
                    </button>
                </div>
            </form>
        </div>
    </div>
    <Footer/>
</template>

<script>
import Footer from "../components/Footer";
import Nav from "../components/Nav";
import {mapActions} from 'vuex';

export default {
    components: {
        Footer, Nav
    },
    data() {
        return {
            form: {
                name: "",
                email: "",
                password: "",
                password_confirmation: "",
            },
            error: null,
        }
    },
    methods: {
        ...mapActions(['register']),
        submitForm(e) {
            this.register(this.form);
            this.form.password = ''
            this.form.password_confirmation = ''
        }

    },
}
</script>
