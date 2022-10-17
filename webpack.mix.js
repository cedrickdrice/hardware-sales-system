const mix = require('laravel-mix');
const oFrontResource = {
    js: 'resources/front/js/',
    css: 'resources/front/css/'
}
const oAdminResource = {
    js: 'resources/admin/js/',
    css: 'resources/admin/css/'
}
const oCompiledPath = {
    js: 'public/js',
    sass: 'public/css'
}

const oDevAssetPath = {
    front: {
        js      : oFrontResource.js + 'front.js',
        sass    : oFrontResource.css + 'front.scss'
    },
    admin: {
        js      : oAdminResource.js + 'admin.js',
        sass    : oAdminResource.css + 'admin.scss'
    }
}

mix.js(oDevAssetPath.front.js, oCompiledPath.js)
    .js(oDevAssetPath.admin.js, oCompiledPath.js)
    .sass(oDevAssetPath.front.sass, oCompiledPath.sass)
    .sass(oDevAssetPath.admin.sass, oCompiledPath.sass)
    .js('node_modules/popper.js/dist/popper.js', 'public/js').sourceMaps()
    .vue();
