<template>
  <div class="d3-list">
    <n-data-table
      :columns="columns"
      :data="listInfo.data"
      :pagination="paginationReactive"
      striped
    />
  </div>
</template>

<script setup>
import { ref, h, reactive } from 'vue'
import { useMessage, NButton, NButtonGroup } from 'naive-ui'
import store from '../../store/index'

const message = useMessage()
const listInfo = ref({})

const props = defineProps({
  api: {
    type: Function,
    required: true,
  },
  rowButtons: {
    type: Array,
    default: () => [],
  },
})

const emits = defineEmits(['detail', 'edit', 'delete'])

const columns = ref([
  {
    title: 'ID',
    key: 'id',
  },
  {
    title: '用户名',
    key: 'username',
  },
  {
    title: '昵称',
    key: 'nickname',
  },
  {
    title: '操作',
    width: 300,
    align: 'center',
    fixed: 'right',
    key: 'actions',
    render(row) {
      const buttons = [
        ...props.rowButtons,
        {
          key: 'detail',
          title: '详情',
          attrs: {
            type: 'primary',
            quaternary: false,
            ghost: true,
            size: 'small',
            round: false,
            onClick: () => emits('detail', row),
          },
        },
        {
          key: 'edit',
          title: '编辑',
          attrs: {
            type: 'info',
            quaternary: false,
            ghost: true,
            size: 'small',
            onClick: () => emits('edit', row),
          },
        },
        {
          key: 'delete',
          title: '删除',
          attrs: {
            type: 'error',
            quaternary: false,
            ghost: true,
            size: 'small',
            round: false,
            onClick: () => emits('delete', row),
          },
        },
      ].map((btn) => {
        if (btn.key) {
          return h(
            NButton,
            {
              ...btn.attrs,
            },
            { default: () => btn.title }
          )
        }
      })

      return h(NButtonGroup, {}, [buttons])
    },
  },
])

const paginationReactive = reactive({
  page: listInfo.value.current_page,
  pageSize: listInfo.value.per_page,
  showSizePicker: true,
  pageSizes: [10, 15, 20, 30, 50],
  onChange: (page) => {
    paginationReactive.page = page
  },
  onUpdatePageSize: (pageSize) => {
    paginationReactive.pageSize = pageSize
    paginationReactive.page = 1
  },
})

const info = await props.api()
console.log('...info', info)
if (info) {
  listInfo.value = info
}
</script>

<style lang="scss" scoped>
.d3-list {
}
</style>
