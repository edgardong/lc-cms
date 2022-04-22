
<template>
  <div class="d3-user">
      <d3-list :api="api"></d3-list>
  </div>
</template>

<script setup>
import { useMessage } from "naive-ui";
import store from "../../store/index";
import { ref,Suspense } from "vue"
import d3List from '../common/d3-list.vue'
import { getUserList } from "../../api/admin"

// store.dispatch("user/userList");
const api  = ref(getUserList)
const formRef = ref(null)
const message = useMessage()
const model = ref({
  username: "edgarhao",
});
</script>

<style lang="scss" scoped>
.d3-user {
}
</style>
