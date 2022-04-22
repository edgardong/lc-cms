<template>
  <n-config-provider  :theme-overrides="themeOverrides" class="lc-full_page">
    <n-message-provider>
    <router-view></router-view>
    </n-message-provider>
  </n-config-provider>
</template>

<script>
import { defineComponent } from "vue";
import { darkTheme, useMessage } from "naive-ui"
import store from '../../store'
const themeOverrides = {
  Button:{
    color: "#1f2d41FF",
  },
  common: {
    primaryColor: "#1f2d41FF",
    primaryColorPressed: "#27364aFF",
    primaryColorHover: "#31435aFF",
    primaryColorSuppl: "#2e4058FF",
  },
};

export default defineComponent({

  setup() {
    // window.$message = useMessage()
    return {
      themeOverrides,
      darkTheme
    };
  },
  mounted() {
    console.log("app mounted");
  },
});
</script>
