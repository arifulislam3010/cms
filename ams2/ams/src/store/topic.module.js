import axios from "axios"

const state = {
    topics:[],
};

const getters = {
    topic_list(state){
      return state.topics
    }
};

const actions = {
  ['FETCH_TOPICS']({commit}){
    return new Promise((resolve,reject)=>{
      axios.get('topic/list').then(response=>{
        commit('SET_TOPICS',response.data)
        resolve(response)
      }).catch(error=>{
        reject(error)
      })
    })
  }
};

const mutations = {
  ['SET_TOPICS'](state,payload){
    state.topics = payload
  }

};


export default {
  state,
  actions,
  mutations,
  getters,
};
