import axios from "axios"

const state = {
    users: [],
}
const getters = {
    user_list(state){
        return state.users 
    }
}
const actions = {
    ['FETCH_USER_LIST']({commit}){
        return new Promise((resolve,reject)=>{
           axios.get('/api/user/list').then(response=>{
                commit('SET_USER_LIST',response.data)
                resolve(response)
           }).catch(error=>{
                reject(error)
           })
            
        })
    }
}

const mutations = {
    ['SET_USER_LIST'](state,payload){
        state.users = payload
    }
}

export default {
    state,
    getters ,
    actions,
    mutations
}