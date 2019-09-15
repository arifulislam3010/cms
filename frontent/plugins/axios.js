// import axios from 'axios'

// axios.defaults.baseURL = 'http://localhost:8000'

import axios from 'axios'
import VuexStore from '~/store'

var api = axios.create({
  baseURL: 'http://localhost:8000'
})
console.log(VuexStore.state.token) 

export default api