export default {
  state: {
    userType: null,
		user: {},
  },
  getters: {
    getType(state) {
      return state.userType
		},
		getUser(state){
			return state.user
		},
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
}