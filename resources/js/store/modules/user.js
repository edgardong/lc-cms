import { userLogin } from "../../api/user"
import router from '../../router'

const user = {
    namespaced: true,
    state: {
        token: ''
    },
    getters: {
        token (state) {
            return state.token
        }
    },
    mutations: {
        setToken (state, payload) {
            console.log('setToken', payload)
            state.token = payload.data
            router.replace({name:'main'})
        }
    },
    actions: {
        setUserToken ({ commit }) {
            commit('setToken')
        },
        async userLogin ({ commit }, payload) {
            let data = await userLogin(payload)
            if(data){
               commit('setToken',{data})
            }
        }
    }
}

export default user
