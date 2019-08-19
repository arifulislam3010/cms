import axios from "axios"
import iziToast from 'izitoast'
import { All_AREA,ADD_AREA,UPDATE_AREA,DELETE_AREA,SEARCH_AREA} from "./action.type"
import { AFTER_ADD_AREA,SET_AREA,AFTER_UPDATE_AREA,AFTER_DELETE_AREA } from "./mutation.type"

const state = {
  area: [],
  area_p2:[]
};

const getters = {
  areas(state){
    return state.area
  },
  areaP2(state){
    return state.area_p2
  }
};

const actions = {

  [All_AREA]({commit},page) {
    return new Promise((resolve, reject) => {
        axios
        .post('/api/areas?page=' + page)
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

    [ADD_AREA]({commit},data) {
      return new Promise((resolve, reject) => {
          axios
          .post("area",data)
          .then(response => {
              commit(AFTER_ADD_AREA,response.data);

              resolve(response);
          })
          .catch(function(error) {
              reject(error);
          });
      });
    },

    [SEARCH_AREA]({commit},data) {
      return new Promise((resolve, reject) => {
          axios
          .post('/api/areas?page=' + data.page,data.data)
          .then(response => {
              commit(SET_AREA,response.data);

              resolve(response);
          })
          .catch(function(error) {
              reject(error);
          });
      });
  },
  [UPDATE_AREA]({commit},data) {
      return new Promise((resolve, reject) => {
          axios
          .put("/area",data.data)
          .then(response => {
              var update_data = response.data
              var index = data.index
              commit("AFTER_UPDATE_AREA",{update_data,index});

              resolve(response);
          })
          .catch(function(error) {
              reject(error);
          });
      });
  },
  [DELETE_AREA]({commit},data) {
      return new Promise((resolve, reject) => {
          axios
          .delete("/area/"+data.id)
          .then(response => {
              commit("AFTER_DELETE_AREA",data.index);

              resolve(response);
          })
          .catch(function(error) {
              reject(error);
          });
      });
    },
};

const mutations = {
  [SET_AREA](state, data)
    {
        state.area = data.data;
        state.area_p2 = data;
    },

    [AFTER_ADD_AREA](state, data)
    {
        state.area.push(data);
    },
    [AFTER_UPDATE_AREA](state,payload){
      state.area.splice(payload.index,0,payload.update_data)
      state.area.splice(payload.index+1,1)

      // state.branch_p2.splice(payload.index,0,payload.update_data)
      // state.branch_p2.splice(payload.index+1,1)
    },
    [AFTER_DELETE_AREA](state,index){
      state.area.splice(index,1)
      // state.branch_p2.splice(index,1)
    },

};


export default {
  state,
  actions,
  mutations,
  getters,
};
