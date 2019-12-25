import axios from "axios"
const state = {
    topics:[],
    topic:{
        id :`` ,
        parent_id: `` ,
        title :``,
        color : ``,
        deadline : ``,
        image : ``,
        status: 1,
    },
}

const getters = {

    topic_list(state){
        return state.topics 
        // return state.topics.map((v) =>{
        //     let ob = {lable:'',...v}
        //     ob.lable = v.title 
        //     return ob 
        // })
    },
    topic_parents(state){
        return state.topics.filter((v)=>v.parent_id == null)
    },
    current_topic(state){ return state.topic}
} 

const actions = {
    ['FETCH_TOPICS']({commit}){
        return new Promise((resolve,reject)=>{
            axios.get('api/topic/list').then(response=>{
                resolve(response)
                commit('SET_TOPICS',response.data)
            }).catch(error=>{
                reject(error)
            })
        })
    },
    ['ADD_TOPIC']({commit},payload){
        return new Promise((resolve,reject)=>{
            axios.post('api/topic',payload).then(response=>{
                resolve(response)
            }).catch(error=>{
                reject(error)
            })
        })
    },
    ['UPDATE_TOPIC']({commit},payload){
        return new Promise((resolve,reject)=>{
            axios.put(`api/topic/${payload.id}`,payload).then(response=>{
                resolve(response)
            }).catch(error=>{
                reject(error)
            })
        })
    },
    ['DELETE_TOPIC']({commit},id){
        return new Promise((resolve,reject)=>{
            axios.delete(`api/topic/${id}`).then(response=>{
                resolve(response)
            }).catch(error=>{
                reject(error)
            })
        })
    },
    [`FETCH_CURRENT_TOPIC`]({commit},id){
        return new Promise((resolve,reject)=>{
            axios.get(`api/topic/${id}`).then(response=>{
                resolve(response)
                commit('SET_CURRENT_TOPIC',response.data)
            }).catch(error=>{
                reject(error)
            })
        })        
    },
    [`EMPTY_CURRENT_TOPIC`]({commit}){
        commit(`SET_EMPTY_CURRENT_TOPIC`)
    }
}

const mutations = {
    ['SET_TOPICS'](state,payload){
        state.topics = payload
    },
    [`SET_EMPTY_CURRENT_TOPIC`](state){
        state.topic = {
            id :`` ,
            parent_id : ``,
            title :``,
            color :``,
            deadline : ``,
            image : ``,
            status: 1,
        }
    },
    [`SET_CURRENT_TOPIC`](state,payload){
        state.topic = payload
    },
}

export default {
    state,
    getters,
    actions,
    mutations,
}