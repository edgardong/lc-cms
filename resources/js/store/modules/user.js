const user = {
    namespaced: true,
    state: {
        token: ''
    },
    getters: {
        token(state) {
            return state.token
        }
    },
    mutations: {
        setToken(state, payload) {
            state.token = payload.token
        }
    },
    actions: {
      setUserToken({commit}){
        commit('setToken')
      }
    }
}

export default user
