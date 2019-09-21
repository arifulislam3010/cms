import axios from "@/plugins/axios"
import { All_POST} from "./action.type"
import { SET_POST } from "./mutation.type"

const state = {
    post: [],
    // branch_p2:[]
  };
  
const getters = {
    posts(state){
      return state.post
    },
    // branchP2(state){
    //   return state.branch_p2
    // }
  };
  
const actions = {
    
    [All_POST]({commit}) {
      return new Promise((resolve, reject) => {
        console.log("ok")
          axios
          .get('/api/posts')
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
  
const mutations = {
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
  

// state= {
//   loadesPosts: []
// };



// actions= {
//   setPosts(context, posts) {
//     context.commit('setPosts', posts)
//   }
// }

// mutations= {
//   setPosts(state, posts){
//     state.loadesPosts = posts
//   }
// }

// getters= {
//   loadesPosts(state) {
//     return state.loadesPosts
//   }
// }