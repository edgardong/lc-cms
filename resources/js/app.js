require('./bootstrap')
import * as Vue from 'vue'
import * as VueRouter from 'vue-router'
import routes from "./router"
import store from './store'
import axios from "axios"
// import ElementPlus from 'element-plus'
import naive from 'naive-ui'
const router = VueRouter.createRouter({
    // history mode: createWebHashHistory createWebHistory
    history: VueRouter.createWebHashHistory(),
    routes,
})


router.beforeEach((to, from, next) => {
    console.log(store.state.user)
    if (!store.state.user.token && to.name!='login') {
        next({
            name: 'login'
        })
    } else {
        next()
    }
})


import RootComponent from "./components/layouts/App"

const app = Vue.createApp(RootComponent)
// const app = Vue.createApp({})

app.config.globalProperties.$http = axios

app.use(router)
    .use(store)
    .use(naive);

app.mount('#app')
