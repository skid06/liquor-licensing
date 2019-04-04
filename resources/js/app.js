
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


import VueRouter from 'vue-router';
import Vuetify from 'vuetify'
import 'vuetify/dist/vuetify.min.css'
import Vuex from 'vuex';
import VeeValidate from 'vee-validate';

// import {routes} from './routes';
// import MainContainer from './layout/MainContainer'

Vue.component('NavigationDrawer', require('./layouts/NavigationDrawer.vue'))
Vue.component('Toolbar', require('./layouts/Toolbar.vue'))
Vue.component('Footer', require('./layouts/Footer.vue'))
Vue.component('vue-liquor-application', require('./pages/LiquorApplication.vue'))
Vue.component('dashboard', require('./admin/Dashboard.vue'))

Vue.use(VueRouter);
Vue.use(Vuex);
Vue.use(Vuetify);
Vue.use(require('vue-moment'));
Vue.use(VeeValidate, { inject: false });

Vue.mixin({
	data: () => ({
		drawers: ['Default (no property)', 'Permanent', 'Temporary'],
		primaryDrawer: {
			model: null,
			type: 'default',
			clipped: true,
			floating: false,
			mini: false
		},
		footer: {
			inset: false
		},
		applications: [
			['New', 'add'],
			['Saved', 'edit'],
			['Completed', 'beenhere'],
			['Processed', 'done']
		],
		cruds: [
			['Create', 'add'],
			['Read', 'insert_drive_file'],
			['Update', 'update'],
			['Delete', 'delete']
		],
		auth: null,		
		// loading: false,
		// items: [],
		search: null,
		select: null,
		states: [
			'Alabama',
			'Alaska',
			'American Samoa',
			'Arizona',
			'Arkansas',
			'California',
			'Colorado',
			'Connecticut',
			'Delaware',
			'District of Columbia',
			'Federated States of Micronesia',
			'Florida',
			'Georgia',
			'Guam',
			'Hawaii',
			'Idaho',
			'Illinois',
			'Indiana',
			'Iowa',
			'Kansas',
			'Kentucky',
			'Louisiana',
			'Maine',
			'Marshall Islands',
			'Maryland',
			'Massachusetts',
			'Michigan',
			'Minnesota',
			'Mississippi',
			'Missouri',
			'Montana',
			'Nebraska',
			'Nevada',
			'New Hampshire',
			'New Jersey',
			'New Mexico',
			'New York',
			'North Carolina',
			'North Dakota',
			'Northern Mariana Islands',
			'Ohio',
			'Oklahoma',
			'Oregon',
			'Palau',
			'Pennsylvania',
			'Puerto Rico',
			'Rhode Island',
			'South Carolina',
			'South Dakota',
			'Tennessee',
			'Texas',
			'Utah',
			'Vermont',
			'Virgin Island',
			'Virginia',
			'Washington',
			'West Virginia',
			'Wisconsin',
			'Wyoming'
		]		
	}),

	watch: {
		search (val) {
			val && val !== this.select && this.querySelections(val)
		}
	},
	
	methods: {
		querySelections (v) {
			this.loading = true
			// Simulated ajax query
			setTimeout(() => {
				this.items = this.states.filter(e => {
					return (e || '').toLowerCase().indexOf((v || '').toLowerCase()) > -1
				})
				this.loading = false
			}, 500)
		}
	}	
})

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key)))

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */


const app = new Vue({
	el: '#app',
});
