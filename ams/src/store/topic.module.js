import axios from "axios"
import iziToast from 'izitoast'
import { All_TOPIC,ADD_TOPIC,UPDATE_TOPIC,DELETE_TOPIC,SEARCH_TOPIC} from "./action.type"
import { AFTER_ADD_TOPIC,SET_TOPIC,AFTER_UPDATE_TOPIC,AFTER_DELETE_TOPIC } from "./mutation.type"

const state = {
  topic: [],
  topic_p2:[]
};

const getters = {
  topics(state){
    return state.topic
  },
  topicP2(state){
    return state.topic_p2
  }
};

const actions = {

  [All_TOPIC]({commit},page) {
    return new Promise((resolve, reject) => {
        axios
        .post('/api/topics?page=' + page)
        .then(response => {
            // console.log(response)
            commit(SET_TOPIC,response.data)
            resolve(response);
        })
        .catch(function(error) {
            reject(error);
        });
    });
},

    [ADD_TOPIC]({commit},data) {
      return new Promise((resolve, reject) => {
          axios
          .post("topic",data)
          .then(response => {
              commit(AFTER_ADD_TOPIC,response.data);

              resolve(response);
          })
          .catch(function(error) {
              reject(error);
          });
      });
    },

    [SEARCH_TOPIC]({commit},data) {
      return new Promise((resolve, reject) => {
          axios
          .post('/api/topics?page=' + data.page,data.data)
          .then(response => {
              commit(SET_TOPIC,response.data);

              resolve(response);
          })
          .catch(function(error) {
              reject(error);
          });
      });
  },
  [UPDATE_TOPIC]({commit},data) {
      return new Promise((resolve, reject) => {
          axios
          .put("/topic",data.data)
          .then(response => {
              var update_data = response.data
              var index = data.index
              commit("AFTER_UPDATE_TOPIC",{update_data,index});

              resolve(response);
          })
          .catch(function(error) {
              reject(error);
          });
      });
  },
  [DELETE_TOPIC]({commit},data) {
      return new Promise((resolve, reject) => {
          axios
          .delete("/topic/"+data.id)
          .then(response => {
              commit("AFTER_DELETE_TOPIC",data.index);

              resolve(response);
          })
          .catch(function(error) {
              reject(error);
          });
      });
    },
};

const mutations = {
  [SET_TOPIC](state, data)
    {
        state.topic = data.data;
        state.topic_p2 = data;
    },

    [AFTER_ADD_TOPIC](state, data)
    {
        state.topic.push(data);
    },
    [AFTER_UPDATE_TOPIC](state,payload){
      state.topic.splice(payload.index,0,payload.update_data)
      state.topic.splice(payload.index+1,1)

      // state.branch_p2.splice(payload.index,0,payload.update_data)
      // state.branch_p2.splice(payload.index+1,1)
    },
    [AFTER_DELETE_TOPIC](state,index){
      state.topic.splice(index,1)
      // state.branch_p2.splice(index,1)
    },

};


export default {
  state,
  actions,
  mutations,
  getters,
};
