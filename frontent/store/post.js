import axios from "axios"
import {GET_POST} from "./action.type"
import {SET_POST } from "./mutation.type"
const state = {
    posts:[],
}

const getters = {
    posts(state){
        return state.purpose
    },
}

const actions = {
    [GET_POST]({commit}) {
        return new Promise((resolve, reject) => {
            axios
            .get("http://localhost:8000/permission")
            .then(response => {
                commit(SET_POST,response.data);
                resolve(response);
            })
            .catch(function(error) {
                reject(error);
            });
        });
    },
}

const mutations = {
    [SET_POST](state, data) 
    {
        state.posts = data;
    },
}
export default {
    state,
    actions,
    mutations,
    getters
};