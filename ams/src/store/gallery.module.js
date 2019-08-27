import axios from "axios"
import iziToast from 'izitoast'
import { All_GALLERY,ADD_GALLERY,UPDATE_GALLERY,DELETE_GALLERY,SEARCH_GALLERY} from "./action.type"
import { AFTER_ADD_GALLERY,SET_GALLERY,AFTER_UPDATE_GALLERY,AFTER_DELETE_GALLERY } from "./mutation.type"

const state = {
  gallery: [],
  gallery_p2:[]
};

const getters = {
  gallerys(state){
    return state.gallery
  },
  galleryP2(state){
    return state.gallery_p2
  }
};

const actions = {

  [All_GALLERY]({commit},page) {
    return new Promise((resolve, reject) => {
        axios
        .post('/api/gallerys?page=' + page)
        .then(response => {
            // console.log(response)
            commit(SET_GALLERY,response.data)
            resolve(response);
        })
        .catch(function(error) {
            reject(error);
        });
    });
},

    [ADD_GALLERY]({commit},data) {
      return new Promise((resolve, reject) => {
          axios
          .post("gallery",data)
          .then(response => {
              commit(AFTER_ADD_GALLERY,response.data);

              resolve(response);
          })
          .catch(function(error) {
              reject(error);
          });
      });
    },

    [SEARCH_GALLERY]({commit},data) {
      return new Promise((resolve, reject) => {
          axios
          .post('/api/gallerys?page=' + data.page,data.data)
          .then(response => {
              commit(SET_GALLERY,response.data);

              resolve(response);
          })
          .catch(function(error) {
              reject(error);
          });
      });
  },
  [UPDATE_GALLERY]({commit},data) {
      return new Promise((resolve, reject) => {
          axios
          .put("/gallery",data.data)
          .then(response => {
              var update_data = response.data
              var index = data.index
              commit("AFTER_UPDATE_GALLERY",{update_data,index});

              resolve(response);
          })
          .catch(function(error) {
              reject(error);
          });
      });
  },
  [DELETE_GALLERY]({commit},data) {
      return new Promise((resolve, reject) => {
          axios
          .delete("/gallery/"+data.id)
          .then(response => {
              commit("AFTER_DELETE_GALLERY",data.index);

              resolve(response);
          })
          .catch(function(error) {
              reject(error);
          });
      });
    },
};

const mutations = {
  [SET_GALLERY](state, data)
    {
        state.gallery = data.data;
        state.gallery_p2 = data;
    },

    [AFTER_ADD_GALLERY](state, data)
    {
        state.gallery.push(data);
    },
    [AFTER_UPDATE_GALLERY](state,payload){
      state.gallery.splice(payload.index,0,payload.update_data)
      state.gallery.splice(payload.index+1,1)

      // state.branch_p2.splice(payload.index,0,payload.update_data)
      // state.branch_p2.splice(payload.index+1,1)
    },
    [AFTER_DELETE_GALLERY](state,index){
      state.gallery.splice(index,1)
      // state.branch_p2.splice(index,1)
    },

};


export default {
  state,
  actions,
  mutations,
  getters,
};
