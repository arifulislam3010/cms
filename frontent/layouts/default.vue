<template>
  <div>
    <Header />
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
      title : 'Home',
      loading: false
    }
  },
  
}
</script>

<style scoped>
a:hover{
  color: #ee002d;
}
</style>

