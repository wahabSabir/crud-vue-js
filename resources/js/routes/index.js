import {createWebHistory, createRouter} from 'vue-router';
import Home from '@/views/Home.vue';
import Services from '@/views/Services.vue';
import Blogs from '@/views/Blogs.vue';
import CreateContact from '@/components/contacts/create.vue';
import EditContact from '@/components/contacts/edit.vue';


const routes = [
    {
        name: 'home',
        path: '/',
        component: Home,
    },
    {
        path: '/services',
        component: Services,
    },
    {
        path: '/blogs/:name',
        component: Blogs,
    },
    {
        name: 'contacts.create',
        path: '/contacts/create',
        component: CreateContact,
    },
    {
        name: 'contacts.edit',
        path: '/contacts/edit/:id',
        component: EditContact,
    },
    // {
    //     path: '/feature',
    //     component: Feature,
    //     children: [
    //         {
    //             path: '/feature',
    //             component: Feature,
    //         },
    //     ],
    // },
];

export default createRouter({
    history:createWebHistory(),
    routes,
})

