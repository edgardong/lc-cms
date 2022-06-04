<template>
  <div class="d3-list">
    <n-space size="medium" vertical>
      <div class="operate">
        <n-button text @click="handleAdd">
          <n-icon color="#0e7a0d" size="26">
            <add-icon />
          </n-icon>
        </n-button>
      </div>
      <n-data-table
        :columns="columns"
        :data="listInfo.data"
        :pagination="paginationReactive"
        striped
      />
    </n-space>

    <n-drawer v-model:show="active" width="45%" :placement="placement">
      <n-drawer-content :title="addTitle" closable>《斯通纳》是美国作家约翰·威廉姆斯在 1965 年出版的小说。</n-drawer-content>
    </n-drawer>
  </div>
</template>

<script setup>
import { ref, h, reactive } from 'vue'
import { useMessage, NButton, NButtonGroup } from 'naive-ui'
import store from '../../store/index'
import { Add as AddIcon } from '@vicons/ionicons5'

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
  columns: {
    type: Array,
    default: () => [],
  },
  addTitle: {
    type: String,
    default: '添加',
  },
})

const emits = defineEmits(['detail', 'edit', 'delete', 'add'])
let defaultColumns = [
  {
    title: 'ID',
    key: 'id',
    sort: 0,
  },
  {
    title: '操作',
    width: 300,
    align: 'center',
    fixed: 'right',
    key: 'actions',
    sort: 99999,
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
].concat(props.columns)

defaultColumns.sort((pre, next) => (pre.sort || 1) - (next.sort || 1))

console.log(props.columns)
console.log(defaultColumns)
const columns = ref(defaultColumns)

const placement = ref('right')
const active = ref(false)
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

const handleAdd = () => {
  active.value = true
  emits('add')
}
</script>

<style lang="scss" scoped>
.d3-list {
}
</style>
