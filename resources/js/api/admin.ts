import BaseApi from "./BaseApi"

const api = new BaseApi('api/admin/user/')

// 用户登录
export const userLogin = (data: object) => api.post('login', data)
// 用户信息
export const getUserInfo = () => api.get('info')
// 获取用户列表
export const getUserList = () => api.get('list')
