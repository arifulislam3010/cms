<template>
  <div>
    <div v-if="loading">
      <InitialLoading :message="LoadingMessage"></InitialLoading>
    </div>
    <div v-else>
    <header>
      <TopHeader></TopHeader>
      <Menu></Menu>
    </header>
    <nuxt />
    <Footer></Footer>
    </div>
  </div>
</template>
<script>
import axios from '@/plugins/axios'
import TopHeader from '~/components/layout/TopHeader.vue'
import Menu from '~/components/layout/Menu.vue'
import Footer from '~/components/layout/Footer.vue'
import { mapMutations, mapGetters } from 'vuex'
import InitialLoading from "@/components/loader/InitialLoading";
export default {
  components: {
    TopHeader,
    Menu,
    Footer,
    InitialLoading,
  },
  data() {
    return {
      loading:true,
      LoadingMessage:'Loading'
    };
  },
   computed: mapGetters({
    todos: 'todos/todos'
  }),
  methods: {
    addTodo (e) {
      const text = e.target.value
      if (text.trim()) {
        this.$store.commit('todos/add', { text })
      }
      e.target.value = ''
    },
    getData(){
        axios.get('/api/frontend/languages').then((response) => {      
            const data = response.data;
            this.$store.commit('todos/add', { data })
            this.loading = false;
        }).catch(function (error) {    
            this.loading = true;
        });
    },
    ...mapMutations({
      toggle: 'todos/toggle'
    })
  },
  mounted() {
    this.getData();
  },
  
}
</script>
<style>
html {
  font-family: 'Source Sans Pro', -apple-system, BlinkMacSystemFont, 'Segoe UI',
    Roboto, 'Helvetica Neue', Arial, sans-serif;
  font-size: 16px;
  word-spacing: 1px;
  -ms-text-size-adjust: 100%;
  -webkit-text-size-adjust: 100%;
  -moz-osx-font-smoothing: grayscale;
  -webkit-font-smoothing: antialiased;
  box-sizing: border-box;
}

*,
*:before,
*:after {
  box-sizing: border-box;
  margin: 0;
}

.button--green {
  display: inline-block;
  border-radius: 4px;
  border: 1px solid #3b8070;
  color: #3b8070;
  text-decoration: none;
  padding: 10px 30px;
}

.button--green:hover {
  color: #fff;
  background-color: #3b8070;
}

.button--grey {
  display: inline-block;
  border-radius: 4px;
  border: 1px solid #35495e;
  color: #35495e;
  text-decoration: none;
  padding: 10px 30px;
  margin-left: 15px;
}

.button--grey:hover {
  color: #fff;
  background-color: #35495e;
}
</style>
