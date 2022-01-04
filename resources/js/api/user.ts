import BaseApi from "./BaseApi"

const api = new BaseApi('api/user/')

// 用户登录
export const userLogin = (data: object) => api.post('login', data)
