import axios from "axios"
const state = {
    site_info_list : [] ,
    site_info : {
        logo_url : ``,
        footer_logo_url:``,
        site_name:``,
        site_author:``,
        license_no:``,
        registration_no:``,
        copyright_text:``,
        twitter_feed:``,
        facebook_likebox:``,
        primary_email:``,
        secondary_email:``,
        primary_phone:``,
        secondary_phone:``,
        primary_tel:``,
        secondary_tel:``,
        primary_fax:``,
        secondary_fax:``,
        po:``,
        address:``,
        map_url:``,
        working_hours:``,
        working_days:``,
        facebook:``,
        twitter:``,
        google_plus:``,
        linkedin:``,
        skype:``,
        youtube:``,
        privacy_policy:``,
        about:``,
        terms_of_use:``,
        selected:``,
    }
}

const getters = {
    siteInfoList(state){
        return state.site_info_list 
    },
    siteInfo(state){
        return state.siteInfo 
    }
}

const actions = {
    [`FETCH_SITE_INFOS`]({commit}){
        return new Promise((resolve,reject)=>{
            axios.get(`api/site_info`).then(response=>{
                commit(`SET_SITE_INFOS`,response.data)
                resolve(response)
            }).catch(error=>{
                reject(error)
            })
        })
    },
    [`ADD_SITE_INFO`]({commit},payload){
        let form_data = new FormData 
        form_data.append(`logo_url`,payload.logo_url)
        form_data.append(`footer_logo_url`,payload.footer_logo_url)
        form_data.append(`site_name`,payload.site_name)
        form_data.append(`site_author`,payload.site_author)
        form_data.append(`license_no`,payload.license_no)
        form_data.append(`registration_no`,payload.registration_no)
        form_data.append(`copyright_text`,payload.copyright_text)
        form_data.append(`twitter_feed`,payload.twitter_feed)
        form_data.append(`facebook_likebox`,payload.facebook_likebox)
        form_data.append(`primary_email`,payload.primary_email)
        form_data.append(`secondary_email`,payload.secondary_email)
        form_data.append(`primary_phone`,payload.primary_phone)
        form_data.append(`secondary_phone`,payload.secondary_phone)
        form_data.append(`primary_tel`,payload.primary_tel)
        form_data.append(`secondary_tel`,payload.secondary_tel)
        form_data.append(`primary_fax`,payload.primary_fax)
        form_data.append(`secondary_fax`,payload.secondary_fax)
        form_data.append(`po`,payload.po)
        form_data.append(`address`,payload.address)
        form_data.append(`map_url`,payload.map_url)
        form_data.append(`working_hours`,payload.working_hours)
        form_data.append(`working_days`,payload.working_days)
        form_data.append(`facebook`,payload.facebook)
        form_data.append(`twitter`,payload.twitter)
        form_data.append(`twitter`,payload.twitter)
        form_data.append(`google_plus`,payload.google_plus)
        form_data.append(`linkedin`,payload.linkedin)
        form_data.append(`skype`,payload.skype)
        form_data.append(`youtube`,payload.youtube)
        form_data.append(`privacy_policy`,payload.privacy_policy)
        form_data.append(`about`,payload.about)
        form_data.append(`terms_of_use`,payload.terms_of_use)
        form_data.append(`selected`,payload.selected)

        if(payload.id!=``){
            payload.append('_method',`PUT`)
            payload.append('id',payload.id)
        }

        return new Promise((resolve,reject)=>{
            axios.post(`api/site_info`,form_data,{method : '_patch'}).then(response=>{
                resolve(response)
            }).catch(error=>{
                reject(error)
            })
        })
    },
    [`DELETE_SITE_INFO`]({commit},id){
        return new Promise((resolve,reject)=>{
            axios.delete(`api/site_info/${id}`).then(response=>{
                resolve(response)
            }).catch(error=>{
                reject(error)
            })
        })
    }
}


const mutations = {
    [`SET_SITE_INFOS`](state,payload){
        state.site_info_list = payload 
    }
}

export default {
    state , 
    getters ,
    actions ,
    mutations ,
}