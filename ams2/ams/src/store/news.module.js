import axios from "axios"

const state = {
    news:[],
    news_data:{
        shoulder:'',
    
    ine:'',
        hanger:'',
        reporter:'',
        user:'',
        author: "",
        news_tag: "",
        content:"",
        video_url:'',
        selected_divisions: "",
        selected_topics: "",
        share_at:'',
        publish_at:'',
        status:true,
        instant_article:true,
        video_position:'',
        selected_position: "",
        selected_scroll: "",
        selected_category:'',

        // relational 
        tag_ids:[],
        media_ids:[],
        division_ids:[],


    },
}
const getters = {
    news_list(state){
        return state.news
    },
    news_data(state){
        return state.news_data
    }
}
const actions = {
    ['FETCH_NEWS']({cosmit}){
        return new Promise((resolve,reject)=>{
           axios.get('/api/news/list').then(response=>{
                commit('SET_NEWS',response.data)
                resolve(response)
           }).catch(error=>{
                reject(error)
           })
            
        })
    },
    ['ADD_NEWS']({commit},payload){

        return new Promise((resolve,reject)=>{
            axios.post('/api/news/',payload).then(response=>{
                resolve(response)
            }).catch(error=>{
                reject(error)
            })
        })
    }
}

const mutations = {
    ['SET_NEWS'](state,payload){
        state.news = payload
    },
    ['SET_NEWS_DATA'](state,payload){
        state.news_data = payload
    },
}

export default {
    state,
    getters ,
    actions,
    mutations
}