<template>
    <Nav class="w-full"/>
    <FetchBlogPost class="w-full"/>
    <Footer class="w-full"/>
</template>

<script>
import Nav from '../components/Nav.vue';
import FetchBlogPost from '../components/FetchBlogPost.vue';
import Footer from '../components/Footer.vue';

export default {
    components: {
        FetchBlogPost, Footer, Nav
    }
}
</script>
