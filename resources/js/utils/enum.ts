export enum UserStatus { ENABLE = 0, DISABLE = 1, DELETE = 2 }
export const UserStatusText = { 0: '启用', 1: '禁用', 2: '删除' }


export enum UserType { SUPERADMIN = 100, ADMIN = 101, USER = 200 }
export const UserTypeText = { 100: '超级管理员', 101: '管理员', 200: '普通用户' }
