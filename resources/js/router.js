import * as VueRouter from 'vue-router'

import Login from './components/system/Login'
import Main from './components/layouts/Main'
import Dashboard from './components/dashboard'
import User from './components/system/user'

let routes = [
    {
        name: 'login',
        path: '/login',
        component: Login
    },
    {
        path: '/',
        name: 'main',
        component: Main,
        children: [
            {
                path: '',
                component: Dashboard
            },
            {
                name: 'user',
                path: 'user',
                component: User
            },
            {
                name: 'site',
                path: 'site',
                component: User
            }
        ]
    },
]

const router = VueRouter.createRouter({
    // history mode: createWebHashHistory createWebHistory
    history: VueRouter.createWebHashHistory(),
    routes,
})

export default router
