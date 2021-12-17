<template>
  <div class="login-container">
    <div class="center-box">
      <div class="left"></div>
      <div class="right">
        <n-button>登录</n-button>
      </div>
    </div>
  </div>
</template>

<style lang="scss">
.login-container {
  flex: 1;
  background: url(/images/login-bg.png) no-repeat;
  background-size: cover;
  display: flex;
  align-items: center;
  justify-content: center;
  .center-box {
    max-width: 1200px;
    margin: 0 auto;
    display: flex;
  align-items: center;
  justify-content: center;
    .left {
      background: url(/images/login-bg-1.png) no-repeat;
      background-size: 100% 100%;
      width: 400px;
      height: 540px;
      position: relative;
      z-index: 2;
      border-radius: 16px 0 0 16px;
    }
    .right {
      position: relative;
      z-index: 1;
      margin-left: -100px;
      width: 450px;
      height: 420px;
      background: #ffffff;
      border-radius: 0 16px 16px 0;
      display: flex;
      align-items: center;
      justify-content: center;
    }
  }
}
</style>