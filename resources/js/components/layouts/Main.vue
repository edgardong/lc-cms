<template>
  <n-layout >
    <!-- 顶部导航栏 -->
    <n-layout-header style="height: 64px; padding: 24px;" bordered
      >颐和园路
      </n-layout-header>

      <!-- 左侧导航栏 -->
    <n-layout position="absolute" style="top: 64px; bottom: 64px;" has-sider>
      <n-layout-sider
        content-style="padding: 24px;"
        :native-scrollbar="false"
        bordered
        collapse-mode="width"
        :collapsed-width="120"
        :width="240"
         show-trigger="arrow-circle"
      >
        <n-h2>海淀桥</n-h2>
        <n-h2>海淀桥</n-h2>
        <n-h2>海淀桥</n-h2>
        <n-h2>海淀桥</n-h2>
        <n-h2>海淀桥</n-h2>
        <n-h2>海淀桥</n-h2>
        <n-h2>海淀桥</n-h2>
        <n-h2>海淀桥</n-h2>
        <n-h2>海淀桥</n-h2>
        <n-h2>海淀桥</n-h2>
        <n-h2>海淀桥</n-h2>
        <n-h2>海淀桥</n-h2>
      </n-layout-sider>

      <!-- 内容区域 -->
      <n-layout content-style="padding: 24px;" :native-scrollbar="false">
        <router-view></router-view>
      </n-layout>
    </n-layout>

    <!-- 底部区域 -->
    <n-layout-footer
      position="absolute"
      style="height: 64px; padding: 24px;"
      bordered
    >
      城府路
    </n-layout-footer>
  </n-layout>
</template>

<script>
  import { defineComponent } from 'vue'

  export default defineComponent({
    components: {
    }
  })
</script>