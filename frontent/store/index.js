// import Vue from "vue"

import axios from "axios"

import { All_POST} from "./action.type"
import { SET_POST } from "./mutation.type"


import post from './post.module'

import Vuex from 'vuex'

const createStore = () => {
  return new Vuex.Store({
    state: () => ({
      post: []
    }),
    getters: {
      posts(state){
        return state.post
      }
    },

    actions: {
      async get({commit}) {
        await this.$axios.get('api/frontend/posts')
          .then((res) => {
            if (res.status === 200) {
              commit('SET_POST', res.data)
            }
          })
      },

    },

    mutations: {
      [SET_POST](state, data)
      {
          state.post = data.data;
        //   state.branch_p2 = data;
      },
    }
  })
}

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