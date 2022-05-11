<template>
        <section class="text-gray-600 body-font">
            <div class="container px-5 py-24 mx-auto flex flex-wrap">
                <div class="flex flex-wrap -mx-4 lg:w-2/3 sm:w-2/3 content-start sm:pr-10">
                    <div class="w-full sm:p-4 px-4 mb-6">
                        <h1 class="title-font font-medium text-2xl mb-2 text-orange-500">{{ this.blog[0].name }}</h1>
                        <div class="leading-relaxed pt-8">{{ this.blog[0].post }}</div>
                        <div class="text-orange-500 font-bold pt-10">{{ this.blog[0].author.name }}</div>
                        <div class="pt-3">{{ this.blog[0].created_at }}</div>
                    </div>
                </div>
                <div class="lg:w-1/3 sm:w-1/3 w-full rounded-lg overflow-hidden mt-6 sm:mt-0">
                    <img class="object-cover object-center w-full h-full" :src="this.blog[0].image" alt="stats">
                </div>
            </div>
        </section>
</template>
<script>

export default {

    name: 'BlogPost',

    data() {
        return {
            blog: [
                {
                    name: '',
                    image: '',
                    post: '',
                    author: [],
                }
            ],
        };
    },
    methods: {

        fetchBlogPost() {
            this.axios.get('http://webnlblog.digicate.nl/api/show?id=' + this.$route.params.id)
                .then((response) => {
                    this.blog = response.data.blog;
                })
        },
    },

    created() {
        this.fetchBlogPost();
    }
}

</script>
