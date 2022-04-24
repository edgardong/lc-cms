
<template>
  <div class="d3-user">
    <d3-list :api="api" @detail="handleDetail" @delete="handleDelete" @edit="handleEdit"></d3-list>
  </div>
</template>

<script setup>
import { useMessage } from 'naive-ui'
import store from '../../store/index'
import { ref, Suspense } from 'vue'
import { getUserList } from '../../api/admin'

const api = ref(getUserList)
const formRef = ref(null)
const message = useMessage()
const model = ref({
  username: 'edgarhao',
})

const handleDetail = (row) => {
  console.log('handleDetail', row.id)
}

const handleEdit = (row) => {
  console.log('handleEdit', row)
}

const handleDelete = (row) => {
  console.log('handleDelete', row)
}
</script>

<style lang="scss" scoped>
.d3-user {
}
</style>
