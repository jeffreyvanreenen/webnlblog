<template>
    <Nav class="w-full"/>
    <Hero class="w-full"/>
    <BlogLatest class="w-full"/>
    <Footer class="w-full"/>
</template>

<script>
import Nav from '../components/Nav.vue';
import Hero from '../components/Hero.vue';
import BlogLatest from '../components/BlogLatest.vue';
import Footer from '../components/Footer.vue';

export default {
    components: {
        Hero, BlogLatest, Footer, Nav
    }
}
</script>
