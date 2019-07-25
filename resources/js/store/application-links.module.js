export default {
  state: {
    welcomeMessage: 'Welcome to my vue app.',
    liquor_links: [
			{text: 'New', icon: 'add', link: '/liquor-application'},
			{text: 'Saved', icon: 'edit', link: '/applications/saved'},
			{text: 'Paid', icon: 'attach_money', link: '/applications/paid'},
			{text: 'Processed', icon: 'done', link: '/applications/processed'},
			{text: 'Expired', icon: 'error', link: '/applications/expired'}	      
    ],
    code_violations_links: [
      {text: 'New', icon: 'add', link: '#'},
      {text: 'Lists', icon: 'insert_drive_file', link: '/admin/violations'}
    ],
    restaurant_links: [
      {text: 'Create', icon: 'add'},
      {text: 'Read', icon: 'insert_drive_file'},
      {text: 'Update', icon: 'update'},
      {text: 'Delete', icon: 'delete'}
    ]
  },
  getters: {
    liquorLinks(state) {
      return state.liquor_links
    },
    violationLinks(state){
      return state.code_violations_links
    },
    restaurantLinks(state){
      return state.restaurant_links
    }
  },
  actions: {},
  mutations: {}
}