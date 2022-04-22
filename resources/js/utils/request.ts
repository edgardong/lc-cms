import axios from "axios"
import store from "../store"

const request = axios.create()
/**
 * http get method
 * @param url request url
 * @param params request params
 * @returns request result
 */
 const get = (url: string, params: object) => request({
    method: 'get',
    url,
    params
})

/**
 * http post method
 * @param url request url
 * @param params request params
 * @returns request result
 */
 const post = (url: string, data: object) => request({
    method: 'POST',
    url,
    data
})

/**
 * http put method
 * @param url request url
 * @param params request params
 * @returns request result
 */
 const put = (url: string, data: object) => request({
    method: 'put',
    url,
    data
})

/**
 * http delete method
 * @param url request url
 * @param params request params
 * @returns request result
 */
 const del = (url: string, data: object) => request({
    method: 'delete',
    url,
    data
})


request.interceptors.request.use(config => {
    // do something before send
    let token = store.state.user.token
    if(token){
        // config.headers['Content-Type']='application/json'
        config.headers['Authorization']  = `${token.token_type} ${token.access_token}`
    }

    return config
}, error => {
    // do something when error occur
    return Promise.reject(error)
})

request.interceptors.response.use(resp => {
    if(resp.data.err_code!==0){
        // @ts-ignore
        (window.$message as any).error(resp.data.err_msg)
        return false
    }
    return resp.data.data
}, error => {
    // do something when error occur
    return Promise.reject(error)
})

export default request

export {
    get,
    post,
    put,
    del
}
