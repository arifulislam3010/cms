<template>
  <div>
    <Header/>  
    <nuxt />
    
  </div>
</template>

<script>
<<<<<<< HEAD
import Header from '~/components/Header.vue'
// import Loader from '~/components/loader/Loader'
=======
import Header from "~/components/Header.vue";

>>>>>>> 071ffa70d91c02c8dfdf05330b6c0114f95a9b43
export default {
  components: {
    Header
  },
  data() {
    return {
<<<<<<< HEAD
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
=======
      title: "Home"
    };
  }
};
>>>>>>> 071ffa70d91c02c8dfdf05330b6c0114f95a9b43
</script>

<style scoped>
a:hover {
  color: #ee002d;
}
</style>
