<template>
  <n-config-provider :theme="darkTheme" :theme-overrides="themeOverrides" class="lc-full_page">
    <router-view></router-view>
  </n-config-provider>
</template>

<script>
import { defineComponent } from "vue";
import { darkTheme } from "naive-ui";
const themeOverrides = {
  common: {
    primaryColor: "#1f2d41",
  },
  Button: {
    color: "#1f2d41FF",
    textColor: "rgba(255, 255, 255, 1)",
  },
};

export default defineComponent({
  setup() {
    return {
      themeOverrides,
      darkTheme,
    };
  },
  mounted() {
    console.log("app mounted");
  },
});
</script>