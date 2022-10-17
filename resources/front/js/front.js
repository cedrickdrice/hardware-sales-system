require('./bootstrap');
import { renderVueComponents } from '../../common/js/app.js'
import { createApp } from 'vue'

const app = createApp({});
renderVueComponents(app, false);

app.mount('#app');
