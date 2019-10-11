// // import Vue from "vue"

import axios from '@/plugins/axios'

import { All_POST} from "./action.type"
import { SET_POST } from "./mutation.type"


import post from './post.module'

// import Vuex from 'vuex'

// const createStore = () => {
//   return new Vuex.Store({
//     state: () => ({
//       post: []
//     }),
//     getters: {
//       posts(state){
//         return state.post
//       }
//     },

//     actions: {
//         [All_POST]({commit},page) {
//             return new Promise((resolve, reject) => {
//                 axios
//                 .post('/api/frontend/posts?page=' + page)
//                 .then(response => {
//                     // console.log(response)
//                     commit(SET_POST,response.data)
//                     resolve(response);
//                 })
//                 .catch(function(error) {
//                     reject(error);
//                 });
//             });
//         },

//     },

//     mutations: {
//       [SET_POST](state, data)
//       {
//           state.post = data.data;
//         //   state.branch_p2 = data;
//       },
//     }
//   })
// }

// export default createStore

import Vue from "vue"
import Vuex from "vuex"

// // import post from './post.module'

Vue.use(Vuex);

// export default new Vuex.Store({
//     modules: {
//       post
//     }
//   })

const createStore = () => {
  return new Vuex.Store({
    modules: {
      post
    }
  })
}

export default createStore