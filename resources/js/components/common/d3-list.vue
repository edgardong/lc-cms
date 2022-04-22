<template>
  <div class="d3-list">
    <n-data-table
      :columns="columns"
      :data="listInfo.data"
      :pagination="paginationReactive"
      :bordered="true"
    />
  </div>
</template>

<script setup>
import { ref,h, reactive } from "vue"
import { useMessage ,NButton} from "naive-ui";
import store from "../../store/index";

const message = useMessage();
const listInfo = ref({});

const columns = ref([
  {
    title: "ID",
    key: "id",
  },
  {
    title: "用户名",
    key: "username",
  },
  {
    title: "昵称",
    key: "nickname",
  },
  {
      title:'操作',
      key: 'actions',
      render (row) {
        return h(
          NButton,
          {
            strong: true,
            tertiary: true,
            size: 'small',
            onClick: () => play(row)
          },
          { default: () => 'Play' }
        )
      }
  }
]);

const props = defineProps({
  api: Function,
});

const paginationReactive = reactive({
  page: listInfo.value.current_page,
  pageSize: listInfo.value.per_page,
  showSizePicker: true,
  pageSizes: [10, 15, 20, 30, 50],
  onChange: (page) => {
    paginationReactive.page = page;
  },
  onUpdatePageSize: (pageSize) => {
    paginationReactive.pageSize = pageSize;
    paginationReactive.page = 1;
  },
})

const info = await props.api();
console.log("...info", info);
if (info) {
  listInfo.value = info
}
</script>

<style lang="scss" scoped>
.d3-list {
}
</style>
