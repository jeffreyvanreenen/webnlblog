<template>
    <Nav class="w-full"/>
    <BlogPost class="w-full"/>
    <Footer class="w-full"/>
</template>

<script>
import Nav from '../components/Nav.vue';
import BlogPost from '../components/BlogPost.vue';
import Footer from '../components/Footer.vue';

export default {
    components: {
        BlogPost, Footer, Nav
    }
}
</script>
