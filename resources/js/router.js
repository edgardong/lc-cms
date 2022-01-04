import * as VueRouter from 'vue-router'

import Login from './components/system/Login'
import Main from  './components/layouts/Main'

let routes =  [
{
    name:'login',
    path: '/login',
    component: Login
},
{
    path: '/',
    name:'main',
    component: Main
},
]

const router = VueRouter.createRouter({
    // history mode: createWebHashHistory createWebHistory
    history: VueRouter.createWebHashHistory(),
    routes,
})

export default router
