<template>
  <div>
    <Header/>  
    <nuxt />
    
  </div>
</template>

<script>
import Header from '~/components/Header.vue'
// import Loader from '~/components/loader/Loader'
export default {
  components: {
    Header
  },
  data() {
    return {
      show: false,
      title : 'Home',
      loading: false
    }
  },

  methods: {
    toggleNavbar() {
      this.show = !this.show;
    }
  }
  
}
</script>

<style scoped>
a:hover {
  color: #ee002d;
}
</style>
