import Vue from "vue"
import Vuex from "vuex"
import axios from "axios"


import post from './post.module'

Vue.use(Vuex);
const createStore = () => {
    return new Vuex.Store({
      namespaced: true,
      modules: {
        post
      }
    });
  };
  
  export default createStore

// import Vue from "vue"
// import Vuex from "vuex"

// import post from './post.module'

// Vue.use(Vuex);

// export default new Vuex.Store({
//     modules: {
//       post
//     }
//   })