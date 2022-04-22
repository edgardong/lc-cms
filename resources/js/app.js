require('./bootstrap')
import * as Vue from 'vue'
import router from "./router"
import store from './store'
import axios from "axios"
import naive from 'naive-ui'

import RootComponent from "./components/layouts/App"

const app = Vue.createApp(RootComponent)
// const app = Vue.createApp({})

router.beforeEach((to, from, next) => {
    // console.log(store.state.user)
    if (!store.state.user.token && to.name!='login') {
        next({
            name: 'login'
        })
    } else {
        next()
    }
})

app.config.globalProperties.$http = axios

app.use(router)
    .use(store)
    .use(naive);

app.mount('#app')
