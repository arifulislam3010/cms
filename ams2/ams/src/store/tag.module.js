import axios from "axios"
const state = {
    tags:[],
}

const getters = {
    tag_list(state){
        return state.tags 
    }
}

const actions = {
    ['FETCH_TAGS']({commit}){
        return new Promise((resolve,reject)=>{
            axios.get('/api/tag/list').then(response=>{
                commit('SET_TAGS',response.data)
                resolve(response)
            }).catch(error=>{
                reject(error)
            })
        })
    }
}

const mutations = {
    ['SET_TAGS'](state,payload){
        state.tags = payload
    }
}

export default {
    state,
    getters,
    actions,
    mutations,
}