<template>
  <n-layout has-slider content-style="display: flex; flex-flow: row nowrap; width: 100%;">
    <n-layout-sider
        collapse-mode="width"
        :collapsed-width="120"
        :width="200"
        content-style="padding:20px"
        show-trigger="arrow-circle"
        bordered
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
    <n-layout >
        <!-- 顶部导航栏 -->
        <n-layout-header bordered class="main-header" >颐和园路</n-layout-header>  

        <!-- 内容区域 -->
        <n-layout-content :native-scrollbar="false">
          <router-view></router-view>
        </n-layout-content>

        <!-- 底部区域 -->
        <n-layout-footer position="absolute">城府路</n-layout-footer>
    </n-layout>
  </n-layout>
</template>

<script>
  import { defineComponent } from 'vue'

  export default defineComponent({
    components: {
    }
  })
</script>
<style>

.n-layout .n-layout-scroll-container {
    /* display: flex;
     flex-flow: row nowrap;
      width: 100%; */
  }
  .main-header {
    height: 64px; 
    padding: 24px;
  }
</style>