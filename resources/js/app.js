
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
// Vue.component('liquor-application', require('./components/LiquorApplication.vue'))
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
import VueStripeCheckout from 'vue-stripe-checkout';

// import {routes} from './routes';
// import MainContainer from './layout/MainContainer'

Vue.component('NavigationDrawer', require('./layouts/NavigationDrawer.vue'))
Vue.component('Toolbar', require('./layouts/Toolbar.vue'))
Vue.component('Footer', require('./layouts/Footer.vue'))
Vue.component('liquor-application-form', require('./user/LiquorApplicationForm.vue'))
Vue.component('admin-liquor-application-form', require('./admin/LiquorApplicationForm.vue'))
Vue.component('official-liquor-application-form', require('./official/LiquorApplicationForm.vue'))
Vue.component('liquor-application-pdf', require('./LiquorApplicationPDF.vue'))
Vue.component('user-login', require('./user/Login.vue'))
Vue.component('user-register', require('./user/Register.vue'))
Vue.component('reset-email', require('./user/Reset.vue'))
Vue.component('reset-password', require('./user/ResetPassword.vue'))
Vue.component('admin-login', require('./admin/Login.vue'))
Vue.component('official-login', require('./official/Login.vue'))
Vue.component('payment', require('./user/Payment.vue'))
Vue.component('payments', require('./admin/Payments.vue'))
Vue.component('applications', require('./user/Applications.vue'))
Vue.component('profile', require('./user/Profile.vue'))
Vue.component('admin-profile', require('./admin/Profile.vue'))
Vue.component('dashboard', require('./admin/Dashboard.vue'))
Vue.component('official-dashboard', require('./official/Dashboard.vue'))
Vue.component('comment-box', require('./helper/CommentBox.vue'))

Vue.use(VueStripeCheckout, 'pk_test_ZpeCcMeI4Ai3VuCWytohUs36');
Vue.use(VueRouter);
Vue.use(Vuex);
// Vue.use(Vuetify);
Vue.use(require('vue-moment'));
Vue.use(VeeValidate, { inject: false });

Vue.use(Vuetify, {
  theme: {
    primary: '#21B8EB',
    secondary: '#29B6F6',
		anyColor: '#0000'
	}	
})

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
		profileImage: '',
		fav: true,
		menu: false,
		message: false,
		hints: false,		
		isApplicationAdded: false,
		footer: {
			inset: false
		},
		applicationLinks: [
			{text: 'New', icon: 'add', link: '/liquor-application'},
			{text: 'Saved', icon: 'edit', link: '/applications/saved'},
			{text: 'Paid', icon: 'attach_money', link: '/applications/paid'},
			{text: 'Processed', icon: 'done', link: '/applications/processed'},
			{text: 'Expired', icon: 'error', link: '/applications/expired'}			
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
		// userType: null,
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
		},
		goTo(link){
			window.location = link
		},
		getUserType(){
			axios
				.get('/user/type')
				.then(response => this.userType = response.data.type)
		},
		logout(type){
			axios
				.post('/logout')
				.then( () => {
					if(type == 'admin'){
						window.location = "/admin"
					}
					else if(type == 'official'){
						window.location = "/official"
					}
					else{
						window.location = "/user/login"
					}
				})
		}
	},
	mounted() {
		// this.getUserType()
		this.profileImage = 'http://209.188.93.46/~lovesparkil/wp-content/uploads/2019/05/eli.jpg'
	}	
})

const store = new Vuex.Store({
  state: {
		userType: null,
		applicationItems: null,
		user: {}
	},
	getters: {
    getType(state) {
      return state.userType
		},
		getUser(state){
			return state.user
		}
	},
	actions: {
		getUserType({commit}) {
			axios
				.get('/user/type')
				.then(response => {
					commit("getUserType", response.data)
				})
		},

		getUser({commit}){
		 axios
				.get('/user/info')
				.then(response => {
					commit("getUser", response.data)
				})
		}


	},
  mutations: {
    getUserType (state, data) {
			state.userType = data.type	
		},
		
    getUser (state, data) {
			state.user = data	
		},		
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
	store,
	computed: {
		getType(){
			return store.getters.getType
		},
		getUser(){
			return store.getters.getUser
		}
	},
	mounted(){
		store.dispatch("getUserType")
		store.dispatch("getUser")
		// console.log(this.getType)
	}
});
