<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
   <head>
       <meta charset="utf-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
       <title>中华诗词库-后台管理系统</title>
       <!--1、 引入 CSS 样式文件 -->
       <link href="{{ asset('css/app.css') }}" rel="stylesheet">
   </head>
   <body>
     <div id="app">
     </div>
     <div>
      <!-- 2、引入支持Vue框架和Vue组件的app.js文件 -->
      <script src="{{ asset('js/app.js') }}"></script>
   </div>
   </body>
</html>