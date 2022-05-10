import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import Blog from '../views/Blog.vue'
import BlogPost from '../views/BlogPost.vue'

const routes = [
    {
        path: '/',
        name: 'home',
        component: HomeView
    },
    {
        path: '/blogpost/:id',
        name: 'blogpost',
        component: BlogPost
    },
    {
        path: '/alle-blogposts',
        name: 'alle-blogposts',
        component: Blog
    },
    {
        path: '/contact',
        name: 'contact',
        component: HomeView
    },

]

const router = createRouter({
    history: createWebHistory(process.env.BASE_URL),
    routes
})

export default router
