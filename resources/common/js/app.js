import 'bootstrap/dist/css/bootstrap.css'
import 'sweetalert2/dist/sweetalert2.min.css';
import $ from 'jquery';
window.$ = window.jQuery = $;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

export function renderVueComponents(oVue, bAdmin) {
    /**
     * require.context needs to be statically analyzable 
     * see: https://github.com/webpack/webpack/issues/4772
     */
    let files = require.context('../../front', true, /\.vue$/i);
    if (bAdmin === true) {
        files = require.context('../../admin', true, /\.vue$/i);
    }

    files.keys().map(key => oVue.component(key.split('/').pop().split('.')[0], files(key).default));
}

 