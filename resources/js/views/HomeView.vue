<template>
    <Hero class="w-full"/>
    <Blog class="w-full"/>
    <Footer class="w-full"/>
</template>

<script>
import Hero from '../components/Hero.vue';
import Blog from '../components/Blog.vue';
import Footer from '../components/Footer.vue';

export default {
    components: {
        Hero, Blog, Footer
    }
}
</script>
