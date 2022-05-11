import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import Blog from '../views/Blog.vue'
import BlogPost from '../views/BlogPost.vue'
import Contact from '../views/Contact.vue'
import Register from '../views/Register.vue'
import Login from '../views/Login.vue'
import CreateNewPost from '../views/CreateNewPost.vue'

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
        component: Contact
    },
    {
        path: '/register',
        name: 'register',
        component: Register
    },
    {
        path: '/login',
        name: 'login',
        component: Login
    },
    {
        path: '/newpost',
        name: 'createNewPost',
        component: CreateNewPost
    },

]

const router = createRouter({
    history: createWebHistory(process.env.BASE_URL),
    routes
})

export default router
