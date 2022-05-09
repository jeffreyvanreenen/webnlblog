<template>
    <div id="blog" class="bg-gray-100 px-4 xl:px-0 py-4">
        <div class="mx-auto container">
            <h1 class="text-center text-3xl lg:text-5xl tracking-wider text-gray-900">Laatste Berichten</h1>
            <div class="mt-12 lg:mt-24">
                <div>
                    <div class="grid sm:grid-cols-1 md:grid-cols-4 lg:grid-cols-4 xl:grid-cols-4 gap-8">
                        <div v-for="blog in blogs" :key="blog.id">
                            <router-link :to="{name: 'blogpost', params: { id: blog.id }}">
                                <img class="w-full h-50" :src="blog.image"
                                     alt="games"/>
                                <div class="py-2 px-4 w-full flex justify-between bg-orange-500">
                                    <p class="text-sm text-white font-semibold tracking-wide">{{ blog.author.name }}</p>
                                    <p class="text-sm text-white font-semibold tracking-wide">{{ blog.created_at }}</p>
                                </div>
                                <div class="bg-white px-3 lg:px-6 py-4 rounded-bl-3xl rounded-br-3xl">
                                    <h1 class="text-lg text-gray-900 font-semibold tracking-wider">{{ blog.name }}</h1>
                                    <p class="text-gray-700 text-sm lg:text-base lg:leading-8 pr-4 tracking-wide mt-2">
                                        {{ blog.post.substring(0, 240) + "..." }}</p>
                                </div>
                            </router-link>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "BlogLatest",
    data() {
        return {
            blogs: {},
        }
    },
    methods: {
        getBlogs() {
            this.axios.get('http://webnlblog.test/api/index')
                .then((response) => {
                    this.blogs = response.data.blogs;
                })
        }
    },
    created() {
        this.getBlogs()
    }
};
</script>

<style scoped>
@import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap");

.f-f-p {
    font-family: "Poppins", sans-serif;
}
</style>
