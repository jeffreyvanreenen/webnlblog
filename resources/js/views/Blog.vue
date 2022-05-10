<template>
    <Nav class="w-full"/>
    <Blog class="w-full"/>
    <Footer class="w-full"/>
</template>

<script>
import Nav from '../components/Nav.vue';
import Blog from '../components/Blog.vue';
import Footer from '../components/Footer.vue';

export default {
    components: {
        Blog, Footer, Nav
    }
}
</script>
