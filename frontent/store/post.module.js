import axios from "axios"
import { All_POST} from "./action.type"
import { SET_POST } from "./mutation.type"

export const state = {
    post: [],
    // branch_p2:[]
  };
  
  export const getters = {
    posts(state){
      return state.post
    },
    // branchP2(state){
    //   return state.branch_p2
    // }
  };
  
  export const actions = {
  
    [All_POST]({commit},page) {
      return new Promise((resolve, reject) => {
          axios
          .post('/api/posts?page=' + page)
          .then(response => {
              // console.log(response)
              commit(SET_POST,response.data)
              resolve(response);
          })
          .catch(function(error) {
              reject(error);
          });
      });
  },
  
  };
  
  export const mutations = {
    [SET_POST](state, data)
      {
          state.post = data.data;
        //   state.branch_p2 = data;
      },
  
  };
  
  
  export default {
    state,
    actions,
    mutations,
    getters,
  };
  