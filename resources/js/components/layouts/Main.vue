<template>
  <n-layout has-sider content-style="display: flex; flex-flow: row nowrap; width: 100%;">
    <n-layout-sider
      collapse-mode="width"
      :collapsed-width="60"
      :width="200"
      show-trigger="arrow-circle"
      bordered
      @collapse="collapsed = true"
      @expand="collapsed = false"
      :collapsed="collapsed"
    >
      <n-menu
        :collapsed="collapsed"
        :collapsed-width="64"
        :collapsed-icon-size="22"
        :options="menuOptions"
        v-model:value="activeKey"
      />
    </n-layout-sider>
    <Suspense>
      <n-layout class="main-box">
        <!-- 顶部导航栏 -->
        <n-layout-header bordered position="absolute" class="main-header">颐和园路1</n-layout-header>

        <!-- 内容区域 -->
        <n-layout-content :native-scrollbar="false" class="main-content">
            <n-card>
                <router-view></router-view>
            </n-card>
        </n-layout-content>

        <!-- 底部区域 -->
        <n-layout-footer class="main-footer" position="absolute">城府路</n-layout-footer>
      </n-layout>
    </Suspense>
  </n-layout>
</template>

<script>
import { defineComponent, h, ref, Suspense } from "vue";
import { NIcon } from "naive-ui";
import store from "../../store";
import {
  BookOutline as BookIcon,
  PersonOutline as PersonIcon,
  HomeOutline as DashboardIcon,
  SettingsOutline as SettingIcon,
  TrashBinOutline as TrashIcon,
  PeopleOutline as RoleIcon,
  MenuOutline as MenuIcon,
  CopyOutline as PageIcon,
  ListOutline as CategoryIcon,
  NavigateCircleOutline as PaperPlaneIcon,
  WifiOutline as PermissionIcon,
  PersonAddOutline as AboutIcon,
  ColorFilterOutline as SiteIcon,
} from "@vicons/ionicons5";

function renderIcon(icon) {
  return () => h(NIcon, null, { default: () => h(icon) });
}

const menuOptions = [
  {
    label: "仪表盘",
    key: "dashboard",
    icon: renderIcon(DashboardIcon),
  },
  {
    label: "系统设置",
    key: "system",
    icon: renderIcon(SettingIcon),
    disabled: false,
    children: [
      {
        label: "站点设置",
        key: "site",
        icon: renderIcon(SiteIcon),
      },
      {
        label: "用户管理",
        key: "user",
        icon: renderIcon(PersonIcon),
      },
      {
        label: "角色管理",
        key: "role",
        icon: renderIcon(RoleIcon),
      },
      {
        label: "权限管理",
        key: "permission",
        icon: renderIcon(PermissionIcon),
      },
      {
        label: "菜单管理",
        key: "menu",
        icon: renderIcon(MenuIcon),
      },
    ],
  },
  {
    label: "内容管理",
    key: "cms",
    icon: renderIcon(BookIcon),
    children: [
      {
        label: "SEO设置",
        key: "seo",
        icon: renderIcon(PaperPlaneIcon),
      },
      {
        label: "分类管理",
        key: "category",
        icon: renderIcon(CategoryIcon),
      },
      {
        label: "文章管理",
        key: "posts",
        icon: renderIcon(BookIcon),
      },
      {
        label: "页面管理",
        key: "pages",
        icon: renderIcon(PageIcon),
      },
      {
        label: "回收站",
        key: "trash",
        icon: renderIcon(TrashIcon),
      },
    ],
  },
  {
    label: "关于我们",
    key: "about",
    disabled: false,
    icon: renderIcon(AboutIcon),
  },
];
export default defineComponent({
  setup() {
    store.dispatch("user/userInfo");
    return {
      activeKey: ref(null),
      collapsed: ref(false),
      menuOptions,
      Suspense,
    };
  },
});
</script>

<style lang="scss">
.n-layout .n-layout-scroll-container {
  /* display: flex;
     flex-flow: row nowrap;
      width: 100%; */
}

.main-box {
  display: flex;
  flex-direction: column;
  .main-header {
    height: 64px;
    padding: 24px;
    flex: 0;
  }
  .main-content {
    margin-top: 64px;
    min-height: calc(100% - 64px);
    flex: 1;
  }
  .main-footer {
    height: 40px;
    flex: 0;
  }
}
</style>
