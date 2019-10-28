import axios from "axios"

const state = {
    lang_list : [] ,
}

const getters = {
    langList(state){
        return state.lang_list
    }
}

const actions = {
    [`FETCH_LANGUAGES`]({commit}){

    },

    [`ADD_LANGUAGE`]({commit},paylaod){
        let form_data = new FormData 
        form_data.append('title',paylaod.title)
        form_data.append('slug',paylaod.slug)
        form_data.append('admin_field',paylaod.admin_field)
        form_data.append('frontend_field',paylaod.froentend_field)

        if(paylaod.id!=``){
            form_data.append(`_method`,`PUT`)
            form_data.append(`id`,paylaod.id)
        }
        return new Promise((resolve,reject)=>{
            axios.post(`api/lang`,form_data,{method: `PATCH`}).then(response=>{
                resolve(response)
            }).catch(error=>{
                reject(error)
            })
        })
    },
    [`DELETE_LANGUAGE`]({commit},id){

    }
}

const mutations = {

}

export default {
    state,
    getters,
    actions,
    mutations
}