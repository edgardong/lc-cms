const mix = require('laravel-mix')
require('dotenv').config();
const BundleAnalyzerPlugin = require('webpack-bundle-analyzer').BundleAnalyzerPlugin;
// webpack启用Gzip压缩
const CompressionPlugin = require('compression-webpack-plugin')
/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */
let externals = undefined
const isPRD = process.env.NODE_ENV === 'production';
let plugins = []
if (process.env.MIX_EXTERNAL === 'true') {
    externals = {
        'axios': 'axios',
        'lodash': '_',
        'vue': 'Vue',
        'vuex': 'Vuex',
        'vue-router': 'VueRouter'
    }
    // plugins.push(new BundleAnalyzerPlugin({ analyzerPort: 8081 }),)
}

const productionGzipExtensions = /\.(js|css|json|txt|html|ico|svg)(\?.*)?$/i;

if (isPRD) {
    plugins.push(
        // 使用Gzip压缩文件 - https://segmentfault.com/a/1190000012571492
        // 报错："TypeError: Cannot read property 'tapPromise' of undefined"是compression-webpack-plugin版本问题5.0.1
        new CompressionPlugin({
            filename: '[path].gz[query]',
            algorithm: 'gzip',
            test: productionGzipExtensions,
            threshold: 10240,
            minRatio: 0.8,
            deleteOriginalAssets: true
        })
    )
}


mix.webpackConfig({
    plugins,
    externals
}).ts('resources/js/app.js', 'public/js')
    .vue({
        version: 3
    })
    .extract(['vue', 'lodash', 'vuex', 'vue-router', 'vendor'])
    .sass('resources/sass/app.scss', 'public/css');

