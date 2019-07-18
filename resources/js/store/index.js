import Vue from 'vue'
import Vuex from 'vuex'

import user from './user.module'
import links from './application-links.module'

Vue.use(Vuex)

export default new Vuex.Store({
  modules: {
    links,
    user
  }
})
