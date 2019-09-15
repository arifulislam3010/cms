import Vue from "vue"
import Vuex from "vuex"

import Post from './post.module'
Vue.use(Vuex);

export default new Vuex.Store({
    modules: {
     
      Post,
    }
  })