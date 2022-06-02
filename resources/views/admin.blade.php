<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
   <head>
       <meta charset="utf-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
       <title>中华诗词库-后台管理系统</title>

        @if(env('MIX_EXTERNAL'))
       <script src="https://cdn.bootcdn.net/ajax/libs/vue/3.2.33/vue.global.min.js"></script>
       <script src="https://cdn.bootcdn.net/ajax/libs/vuex/4.0.2/vuex.global.prod.min.js"></script>
       <script src="https://cdn.bootcdn.net/ajax/libs/vue-router/4.0.5/vue-router.global.prod.min.js"></script>
       <script src="https://cdn.bootcdn.net/ajax/libs/axios/0.26.1/axios.min.js"></script>
       <script src="https://cdn.bootcdn.net/ajax/libs/lodash.js/4.17.21/lodash.min.js"></script>
        @endif
       <!--1、 引入 CSS 样式文件 -->
       <link href="{{ asset('css/app.css') }}" rel="stylesheet">
   </head>
   <body>
     <div id="app">
     </div>
     <div>
      <!-- 2、引入支持Vue框架和Vue组件的app.js文件 -->
      <script src="{{ asset('js/app.js') }}"></script>
      <script src="{{ asset('js/vendor.js') }}"></script>
      <script src="{{ asset('js/manifest.js') }}"></script>

   </div>
   </body>
</html>
