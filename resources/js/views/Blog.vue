<template>
    <Nav class="w-full"/>
    <FetchBlog class="w-full"/>
    <Footer class="w-full"/>
</template>

<script>
import Nav from '../components/Nav.vue';
import FetchBlog from '../components/FetchBlog.vue';
import Footer from '../components/Footer.vue';

export default {
    components: {
        FetchBlog, Footer, Nav
    }
}
</script>
