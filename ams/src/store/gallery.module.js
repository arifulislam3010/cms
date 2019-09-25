import axios from "axios"


const state = {
   albums:[],
   
   album:{
     title:null,
     cover:{},
     cover_id:null,
     more_photo:[],
     more_photo_ids:[],
     is_update:false ,
   },

   initial_album:{
    title:null,
    cover:{},
    cover_id:null,
    more_photo:[],
    more_photo_ids:[],
    is_update:false ,
   },
};

const getters = {
  album_list(state){return state.albums},
  album_detail(state){return state.album},
};

const actions = {
    ['FETCH_ALBUMS']({commit}){
        return new Promise((resolve,reject)=>{
          axios.get('gallery/list').then(response=>{
            resolve(response)
            commit('SET_ALBUMS',response.data)
          }).catch(error=>{
            reject(error)
          })
        })  
    },
    ['ADD_ALBUM']({commit},payload){
      return new Promise((resolve,reject)=>{
        axios.post('gallery/',payload).then(response=>{
          resolve(response)
        }).catch(error=>{
          reject(error)
        })
      })
    },
    ['UPDATE_ALBUM']({commit},payload){
      return new Promise((resolve,reject)=>{
        axios.put(`gallery/${payload.id}`,payload.data).then(response=>{
          // commit('SET_ALBUM_DETAIL',response.data)
          resolve(response)
        }).catch(error=>{
          reject(error)
        })
      })     
    },
    ['DELETE_ALBUM']({commit},id){
      return new Promise((resolve,reject)=>{
        axios.delete(`gallery/${id}`).then(response=>{
          resolve(response)
        }).catch(error=>{
          reject(error)
        })
      })
    },
    ['ALBUM_DETAIL']({commit},id){
      return new Promise((resolve,reject)=>{
        axios.get(`gallery/detail/${id}`).then(response=>{
          commit('SET_ALBUM_DETAIL',response.data)
          resolve(response)
        }).catch(error=>{
          reject(error)
        })
      })
    },
};

const mutations = {
    ['SET_ALBUM_DETAIL'](state,payload){
      state.album = payload
      state.album.is_update = true 
    },  
    ['SET_ALBUMS'](state,payload){
        state.albums  = payload 
    },

};


export default {
  state,
  actions,
  mutations,
  getters,
};