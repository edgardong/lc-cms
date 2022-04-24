import { get, post, put, del } from '../utils/request'

class BaseApi {
    public get: Function;
    public post: Function;
    public put: Function;
    public delete: Function;

    constructor(prefix = '') {
        this.get = (url: string, params: object) => get(prefix + url, params)
        this.post = (url: string, data: object) => post(prefix + url, data)
        this.put = (url: string, data: object) => put(prefix + url, data)
        this.delete = (url: string, data: object) => del(prefix + url, data)
    }
}

export default BaseApi
