
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
Vue.use(require('vue-moment'));


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'))
Vue.component('card-element', require('./components/CardElement.vue'))
Vue.component('payment-form', require('./components/PaymentForm.vue'))
Vue.component('example-component', require('./components/ExampleComponent.vue'))
Vue.component('liquor-license-form', require('./components/LiquorLicenseForm.vue'))
Vue.component('liquor-application', require('./components/LiquorApplication.vue'))
Vue.component('edit-liquor-license-form', require('./components/EditLiquorLicenseForm.vue'))
Vue.component('my-applications', require('./components/MyApplications.vue'))
Vue.component('processed-applications', require('./components/ProcessedApplications.vue'))
Vue.component('completed-applications', require('./components/CompletedApplications.vue'))
Vue.component('incomplete-applications', require('./components/IncompleteApplications.vue'))
Vue.component('paid-applications', require('./components/PaidApplications.vue'))
Vue.component('admin-completed-applications', require('./components/admin/CompletedApplications.vue'))
Vue.component('admin-processed-applications', require('./components/admin/ProcessedApplications.vue'))
Vue.component('admin-paid-applications', require('./components/admin/PaidApplications.vue'))
Vue.component('show-application', require('./components/admin/ShowApplication.vue'))
Vue.component('order-sales', require('./components/admin/OrderSales.vue'))
Vue.component('report-overview', require('./components/admin/ReportOverview.vue'))

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key)))

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app'
});
