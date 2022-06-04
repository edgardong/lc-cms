
<template>
  <div class="d3-user">
    <d3-list
      @add="handleAddUser"
      :api="api"
      @detail="handleDetail"
      :columns="columns"
      @delete="handleDelete"
      @edit="handleEdit"
      addTitle="添加新用户"
    ></d3-list>
  </div>
</template>

<script setup>
import { NTag, useMessage } from 'naive-ui'
import store from '../../store/index'
import { ref, h } from 'vue'
import { getUserList } from '../../api/admin'
import { UserStatusText, UserTypeText } from '../../utils/enum'
import { Add } from '@vicons/ionicons5'

const api = ref(getUserList)
const formRef = ref(null)
const message = useMessage()
const model = ref({
  username: 'edgarhao',
})

const columns = [
  {
    title: '用户名',
    key: 'username',
    sort: 1,
  },
  {
    title: '昵称',
    key: 'nickname',
    sort: 2,
  },
  {
    title: '用户类型',
    key: 'type',
    sort: 3,
    render(row) {
      // 0:可用,1:禁用,2:删除
      return h(
        NTag,
        {
          type: 'success',
          size: 'small',
          round: true,
        },
        {
          default: () => UserTypeText[row.type],
        }
      )
    },
  },
  {
    title: '用户状态',
    key: 'status',
    sort: 4,
    render(row) {
      // 0:可用,1:禁用,2:删除
      return h(
        NTag,
        {
          type: 'info',
          size: 'small',
          round: true,
        },
        {
          default: () => UserStatusText[row.status],
        }
      )
    },
  },
]

const handleDetail = (row) => {
  console.log('handleDetail', row.id)
}

const handleEdit = (row) => {
  console.log('handleEdit', row)
}

const handleAddUser = () => {
  console.log('add user...')
}

const handleDelete = (row) => {
  console.log('handleDelete', row)
}
</script>

<style lang="scss" scoped>
.d3-user {
}
</style>
