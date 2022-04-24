module.exports = {
    root: true,
    //此项是用来指定javaScript语言类型和风格，sourceType用来指定js导入的方式，默认是script，此处设置为module，指某块导入方式
    "parserOptions": {
        "parser": "babel-eslint",
        "ecmaVersion": 2017,
        "sourceType": "module"
    },
    globals: {
        "$": true
    },
    //此项指定环境的全局变量，下面的配置指定为浏览器环境
    env: {
        browser: true,
        node: true,
        es6: true,
    },
    // https://github.com/feross/standard/blob/master/RULES.md#javascript-standard-style
    // 此项是用来配置标准的js风格，就是说写代码的时候要规范的写，如果你使用vs-code我觉得应该可以避免出错
    extends: [
        'standard',
        'plugin:vue/essential'
    ],
    // required to lint *.vue files
    // 此项是用来提供插件的，插件名称省略了eslint-plugin-，下面这个配置是用来规范html的
    plugins: [
        "vue"
    ],
    // add your custom rules here
    // 下面这些rules是用来设置从插件来的规范代码的规则，使用必须去掉前缀eslint-plugin-
    // 主要有如下的设置规则，可以设置字符串也可以设置数字，两者效果一致
    // "off" -> 0 关闭规则
    // "warn" -> 1 开启警告规则
    //"error" -> 2 开启错误规则
    // 了解了上面这些，下面这些代码相信也看的明白了
    'rules': {

        // 缩进
        "indent": 0,
        // 要求或禁止使用分号而不是 ASI（这个才是控制行尾部分号的，）
        "no-mixed-spaces-and-tabs": [1, "smart-tabs"],
        "semi": 0,
        "no-tabs": 0,
        "space-before-function-paren": [0, "always"],
        // 强制在注释中 // 或 /* 使用一致的空格
        "spaced-comment": 0,
        // always-multiline：多行模式必须带逗号，单行模式不能带逗号
        "comma-dangle": [1, "never"],
        // 强制使用一致的反勾号、双引号或单引号
        "quotes": 0,
        // allow paren-less arrow functions
        'arrow-parens': 0,
        // allow async-await
        // 'generator-star-spacing': 0,
        // allow debugger during development
        'no-debugger': process.env.NODE_ENV === 'production' ? 2 : 0,
        "eqeqeq": [0, "allow-null"],
        // 以下是eslint 配置
        // vscode默认启用了根据文件类型自动设置tabsize的选项
        "editor.detectIndentation": false,
        // 重新设定tabsize
        "editor.tabSize": 4,
        // #每次保存的时候自动格式化
        "editor.formatOnSave": true,
        "eslint.validate": [
            "javascript",
            "javascriptreact",
            "html",
            "vue"
        ],
        // #每次保存的时候将代码按eslint格式进行修复
        "editor.codeActionsOnSave": {
            "source.fixAll.eslint": true
        },
        //  #让prettier使用eslint的代码格式进行校验
        "prettier.eslintIntegration": true,
        //  #去掉代码结尾的分号
        "prettier.semi": true,
        //  #使用单引号替代双引号
        "prettier.singleQuote": true,
        //  #让函数(名)和后面的括号之间加个空格
        "javascript.format.insertSpaceBeforeFunctionParenthesis": true,
        // #让vue中的js按编辑器自带的ts格式进行格式化
        "vetur.format.defaultFormatter.js": "vscode-typescript",
        "vetur.format.defaultFormatterOptions": {
            "js-beautify-html": {
                "wrap_attributes": "force-aligned"
                // #vue组件中html代码格式化样式
            }
        },
        "window.zoomLevel": 0,
        "explorer.confirmDelete": false,
        "explorer.confirmDragAndDrop": false,
        "editor.renderControlCharacters": true,
        "editor.renderWhitespace": "all",
        // 格式化stylus, 需安装Manta's Stylus Supremacy插件
        "stylusSupremacy.insertColons": false, // 是否插入冒号
        "stylusSupremacy.insertSemicolons": false, // 是否插入分好
        "stylusSupremacy.insertBraces": false, // 是否插入大括号
        "stylusSupremacy.insertNewLineAroundImports": false, // import之后是否换行
        "stylusSupremacy.insertNewLineAroundBlocks": false // 两个选择器中是否换行
    }
}
