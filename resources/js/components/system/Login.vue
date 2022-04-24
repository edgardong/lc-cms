<template>
  <div class="login-container">
    <div class="center-box">
      <div class="left">
        <div class="top-wrapper">
          <img src="/images/lccms-logo.png" alt class="logo" />
          <div class="title-box">
            <div class="title">Welcome !</div>
            <div class="subtitle">LC-CMS系统 管理端</div>
          </div>
        </div>
        <img src="/images/lccms.png" alt class="lccms-image" />
      </div>
      <div class="right">
        <img src="/images/logo1.png" alt class="cms-logo" />

        <n-form class="form" label-placement="left" ref="formRef" :model="modelRef" :rules="rules">
          <n-form-item path="model.username" label>
            <n-input
              placeholder="请输入账号"
              v-model:value="modelRef.model.username"
              @keydown.enter.prevent
            />
          </n-form-item>
          <n-form-item path="password" label>
            <n-input
              v-model:value="modelRef.model.password"
              @input="handlePasswordInput"
              type="password"
              @keydown.enter.prevent
              placeholder="请输入密码"
            />
          </n-form-item>
          <n-form-item first path="reenteredPassword" label ref="rPasswordFormItemRef">
            <n-input
              v-model:value="modelRef.model.reenteredPassword"
              type="password"
              @keydown.enter.prevent
              placeholder="请输入验证码"
            />
          </n-form-item>
        </n-form>

        <n-button class="login-button" @click="handleValidateButtonClick" type="primary">登录</n-button>
      </div>
    </div>
  </div>
</template>

<script>
import { defineComponent, ref } from 'vue'
import { useMessage } from 'naive-ui'
import store from '../../store/index'

export default defineComponent({
  setup() {
    const formRef = ref(null)
    const rPasswordFormItemRef = ref(null)
    const message = useMessage()
    window.$message = message
    const modelRef = ref({
      model: {
        username: null,
        password: null,
        reenteredPassword: null,
      },
    })

    function validatePasswordStartWith(rule, value) {
      return (
        modelRef.value.password &&
        modelRef.value.password.startsWith(value) &&
        modelRef.value.password.length >= value.length
      )
    }

    function validatePasswordSame(rule, value) {
      return value === modelRef.value.password
    }
    return {
      formRef,
      rPasswordFormItemRef,
      modelRef,
      rules: {
        model: {
          username: [
            {
              required: true,
              validator(rule, value) {
                if (!value) {
                  return new Error('请输入账号')
                }
                return true
              },
              trigger: ['input', 'blur'],
            },
          ],
          password: [
            {
              required: true,
              message: '请输入密码',
            },
          ],
          reenteredPassword: [
            {
              required: true,
              message: '请再次输入密码',
              trigger: ['input', 'blur'],
            },
            {
              validator: validatePasswordStartWith,
              message: '两次密码输入不一致',
              trigger: 'input',
            },
            {
              validator: validatePasswordSame,
              message: '两次密码输入不一致',
              trigger: ['blur', 'password-input'],
            },
          ],
        },
      },
      handlePasswordInput() {
        if (modelRef.value.reenteredPassword) {
          rPasswordFormItemRef.value.validate({ trigger: 'password-input' })
        }
      },
      async handleValidateButtonClick(e) {
        e.preventDefault()
        formRef.value.validate((errors) => {
          if (!errors) {
            // message.success("验证成功");
          } else {
            console.log(errors)
            // message.error("验证失败");
          }
        })

        let data = modelRef.value.model
        let result = await store.dispatch('user/userLogin', data)
        console.log('result.... ', result)
      },
    }
  },
})
</script>

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
      box-sizing: border-box;
      padding-left: 32px;
      padding-top: 40px;
      color: #ffffff;
      .top-wrapper {
        display: flex;
        align-items: center;
        .logo {
          width: 78px;
          height: 78px;
        }
        .title-box {
          .title {
            font-size: 42px;
          }
          .subtitle {
            font-size: 18px;
          }
        }
      }
      .lccms-image {
        margin-top: 80px;
        width: 300px;
        height: 300px;
      }
    }
    .right {
      position: relative;
      z-index: 1;
      margin-left: -100px;
      width: 450px;
      height: 420px;
      background: #ffffff;
      border-radius: 0 16px 16px 0;
      padding: 30px 30px 30px 130px;
      box-sizing: border-box;
      .cms-logo {
        width: 167px;
        height: 90px;
        margin: 0 auto 20px auto;
        display: block;
      }
      .login-button {
        width: 100%;
      }
    }
  }
}
</style>
