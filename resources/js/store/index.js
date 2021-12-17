import {
    createStore
} from 'vuex'
import createPersistedState from 'vuex-persistedstate'
import user from './modules/user'

export default createStore({
    modules: {
        user
    },
    // 配置vuex插件vuex-persistedstate
    plugins: [
        createPersistedState({
            // 默认存储在localStorage 现改为sessionStorage
            storage: window.sessionStorage,
            // 本地存储数据的键名
            key: 'laravel-cms',
            // 指定需要存储的模块，如果是模块下具体的数据需要加上模块名称，如user.token
            //   paths: ['user', 'cart']
        })
    ]
})
