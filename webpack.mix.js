const mix = require('laravel-mix');

const oDevAssetPath = {
    user: {
        js      : 'resources/js/app.js',
        sass    : 'resources/css/app.scss'
    },
    admin: {
        js      : 'resources/admin/js/admin.js',
        sass    : 'resources/admin/css/admin.scss'
    }
}
const oCompiledPath = {
    js: 'public/js',
    sass: 'public/css'
}

mix.js(oDevAssetPath.user.js, oCompiledPath.js)
    .vue()
    .js(oDevAssetPath.admin.js, oCompiledPath.js)
    .vue()
    .sass(oDevAssetPath.user.sass, oCompiledPath.sass)
    .sass(oDevAssetPath.admin.sass, oCompiledPath.sass)
    .js('node_modules/popper.js/dist/popper.js', 'public/js').sourceMaps();
