import { userLogin, getUserInfo,getUserList } from "../../api/admin"
import router from '../../router'

const user = {
    namespaced: true,
    state: {
        token: '',
        userInfo: {},
        users: {}, // 用户列表
    },
    getters: {
        token (state) {
            return state.token
        },
        userInfo (state) {
            return state.userInfo
        },
        userList (state) {
            return state.users
        }
    },
    mutations: {
        setToken (state, payload) {
            console.log('setToken', payload)
            state.token = payload.data
            router.replace({ name: 'main' })
        },
        setUserInfo (state, payload) {
            state.userInfo = payload.data
        },
        setUserList (state, payload) {
            state.users = payload.data
        }
    },
    actions: {
        setUserToken ({ commit }) {
            commit('setToken')
        },
        async userLogin ({ dispatch, commit }, payload) {
            let data = await userLogin(payload)
            if (data) {
                commit('setToken', { data })
                dispatch("userInfo")
            }
        },
        async userInfo ({ commit }, payload) {
            let data = await getUserInfo(payload)
            if (data) {
                commit('setUserInfo', { data })
            }
        },
        async userList ({ commit }, payload) {
            let users = await getUserList(payload)
            if (users) {
                commit('setUserList', { data: users })
            }
        }
    }
}

export default user
