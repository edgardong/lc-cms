require('./bootstrap')
import * as Vue from 'vue'
import router from "./router"
import store from './store'
import axios from "axios"
import naive from 'naive-ui'

import RootComponent from "./components/layouts/App"
import D3List from './components/common/d3-list'

const app = Vue.createApp(RootComponent)
// const app = Vue.createApp({})

// global components
app.component('d3-list', D3List)

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
