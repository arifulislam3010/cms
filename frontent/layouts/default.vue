<template>
  <div>
    <Header />
    <nuxt />
  </div>
</template>

<script>
import Header from '~/components/Header.vue'

export default {
  components: {
    Header
  },
  data() {
    return {
      title : 'Home'
    }
  },
  
}
</script>

