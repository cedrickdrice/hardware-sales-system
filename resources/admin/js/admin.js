require('./bootstrap');
import 'bootstrap/dist/css/bootstrap.css'
import 'sweetalert2/dist/sweetalert2.min.css';

import $ from 'jquery';
window.$ = window.jQuery = $;

/**
 * Admin lte
 */
import 'jquery-ui/ui/widgets/datepicker.js';
import'admin-lte/plugins/datatables/jquery.dataTables.min.js';
import'admin-lte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js';
import'admin-lte/plugins/datatables-responsive/js/dataTables.responsive.min.js';
import'admin-lte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js';
import'admin-lte/plugins/select2/js/select2.full.min.js';
/**
 * Files
 */
import App from "./components/App.vue";

/**
 * Plugin
 */
import { createApp } from 'vue'



// Datepicket Code
$('#datepicker').datepicker();

//Datatable
$("#example1").DataTable({
    "responsive": true,
    "autoWidth": false,
});

//Initialize Select2 Elements
$('.select2').select2()

//Initialize Select2 Elements
$('.select2bs4').select2({
    theme: 'bootstrap4'
})

/**
 * Vue
 */
const app = createApp(App);
app.mount("#app");
