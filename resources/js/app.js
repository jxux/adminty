/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
// require('./js/animation.js');
// require('./js/bootstrap-growl.min.js');
// require('./js/classie.js');
// require('./js/common-pages.js');
// require('./js/horizontal-layout.min.js');
// require('./js/modal.js');
// require('./js/modalEffects.js');
// require('./js/owl-custom.js');
// require('./js/pcoded.min.js');
// require('./js/rating.js');
// require('./js/script.js');
// require('./js/script.min.js');
// require('./js/SmoothScroll.js');
// require('./js/swiper-custom.js');
// require('./js/vartical-layout.min.js');
// require('./js/menu/box-layout.js');
// require('./js/menu/menu-compact.js');
// require('./js/menu/menu-header-fixed.js');
// require('./js/menu/menu-hori-fixed.js');
// require('./js/menu/menu-rtl.js');
// require('./js/menu/menu-sidebar-fixed.js');
// require('./js/menu/menu-sidebar-static.js');

require('./bootstrap');

window.Vue = require('vue').default;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#pcoded',
});
