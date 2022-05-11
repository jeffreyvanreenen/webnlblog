<template>
    <nav class="w-full bg-gray-100">
        <div class="container mx-auto px-6 flex items-center justify-between">
            <img src="../img/rn.png" class="h-12"/>
            <div>
                <div @click="toggleMenu(true)"
                     class="sm:block md:hidden text-gray-500 hover:text-gray-700 focus:text-gray-700 focus:outline-none">
                    <svg aria-haspopup="true" aria-label="Main Menu" xmlns="http://www.w3.org/2000/svg"
                         class="md:hidden icon icon-tabler icon-tabler-menu" width="24" height="24" viewBox="0 0 24 24"
                         stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round">
                        <path stroke="none" d="M0 0h24v24H0z"></path>
                        <line x1="4" y1="8" x2="20" y2="8"></line>
                        <line x1="4" y1="16" x2="20" y2="16"></line>
                    </svg>
                </div>
                <div id="menu" class="md:block lg:block hidden">
                    <div @click="toggleMenu(false)"
                         class="block md:hidden lg:hidden text-gray-500 hover:text-gray-700 focus:text-gray-700 fixed focus:outline-none z-30 top-0 pt-6">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                             stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round"
                             stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z"/>
                            <line x1="18" y1="6" x2="6" y2="18"/>
                            <line x1="6" y1="6" x2="18" y2="18"/>
                        </svg>
                    </div>
                    <ul class="flex text-3xl md:text-base items-center py-10 md:flex flex-col md:flex-row justify-center fixed md:relative top-0 bottom-0 left-0 right-0 bg-white md:bg-transparent z-20">
                        <li class="text-gray-800 hover:text-gray-900 cursor-pointer lg:text-lg pt-10 md:pt-0">
                            <router-link :to="{name: 'home'}">Homepage</router-link>
                        </li>
                        <li class="text-gray-800 hover:text-gray-900 cursor-pointer lg:text-lg pt-10 md:pt-0 md:ml-5 lg:ml-10">
                            <router-link :to="{name: 'alle-blogposts'}"> Alle blogposts</router-link>
                        </li>
                        <li class="text-gray-800 hover:text-gray-900 cursor-pointer lg:text-lg pt-10 md:pt-0 md:ml-5 lg:ml-10">
                            <router-link :to="{name: 'contact'}">Contact</router-link>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="" v-if="isAuthenticated">
                <button v-on:click="loguserout"
                        class="focus:outline-none hidden md:block bg-transparent transition duration-150 ease-in-out hover:bg-gray-200 rounded border border-orange-500 text-orange-500 px-4 sm:px-8 py-1 sm:py-3 text-semibold">
                    Uitloggen
                </button>
            </div>
            <div class="" v-else>
                <div class="flex flex-row space-x-5">
                    <router-link :to="{name: 'login'}">
                        <button
                            class="focus:outline-none hidden md:block bg-transparent transition duration-150 ease-in-out hover:bg-gray-200 rounded border border-orange-500 text-orange-500 px-4 sm:px-8 py-1 sm:py-3 text-semibold">
                            Aanmelden
                        </button>
                    </router-link>
                    <router-link :to="{name: 'register'}">
                        <button
                            class="focus:outline-none hidden md:block bg-transparent transition duration-150 ease-in-out hover:bg-gray-200 rounded border border-orange-500 text-orange-500 px-4 sm:px-8 py-1 sm:py-3 text-semibold">
                            Registreren
                        </button>
                    </router-link>
                </div>
            </div>
        </div>
    </nav>
</template>
<script>
import {mapActions} from "vuex";
import axios from 'axios'

export default {
    name: "Nav",
    created() {

    },
    methods: {


        // Function to toggle header menu in mobile view.
        toggleMenu(flag) {
            let value = document.getElementById("menu");
            if (flag) {
                value.classList.remove("hidden");
            } else {
                value.classList.add("hidden");
            }
        },
        ...mapActions(['logout']),
        loguserout: async function (event) {
            console.log('test')
            this.logout();
        }

    },


    computed: {
        isAuthenticated() {
            return this.$store.getters.isAuthenticated;
        },
        user() {
            return this.$store.getters.user;
        }
    }

};
</script>
