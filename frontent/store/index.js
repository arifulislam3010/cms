import Vue from "vue"
import Vuex from "vuex"
import axios from "axios"

import { All_POST} from "./action.type"
import { SET_POST } from "./mutation.type"


import post from './post.module'

Vue.use(Vuex);

export const state = () => ({
  post: [],
  
})
export const getters = {
  posts(state){
    return state.post
  }
}

export const actions = {
  [All_POST]({commit}) {
    return new Promise((resolve, reject) => {
        axios
        .get('/api/frontend/posts')
        .then(response => {
            // console.log(response)
            commit(SET_AREA,response.data)
            resolve(response);
        })
        .catch(function(error) {
            reject(error);
        });
    });
},
}

export const mutations = {
  [SET_POST](state, data)
    {
        state.post = data.data;
    }

};
// const createStore = () => {
//     return new Vuex.Store({
//       // namespaced: true,
//       // modules: {
//       //   post
//       // }

//       state: {
//         posts: []
//       }

//      getters: {}

//     })
//   };
  
  // export default createStore

// import Vue from "vue"
// import Vuex from "vuex"

// import post from './post.module'

// Vue.use(Vuex);

// export default new Vuex.Store({
//     modules: {
//       post
//     }
//   })