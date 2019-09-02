<template>
  <div class="c">
    <!-- <nuxt-link to="/about">Abouts</nuxt-link> -->

    <!-- <font-awesome-icon :icon="['fab', 'linkedin']"/> -->
    <hero/>
    <Featured/>
  </div>
</template>

<script>
import Logo from '@/components/Logo.vue'
import Hero from '@/components/Hero.vue'
import Featured from '@/components/Featured.vue'

export default {
  components: {
    Logo,Hero,Featured
  },
  data() {
    return {
      title : 'Home'
    }
  },
  head () {
    return {
      title: this.title,
      meta: [
        // hid is used as unique identifier. Do not use `vmid` for it as it will not work
        { hid: 'description', name: 'description', content: 'My custom description' }
      ]
    }
  }
}
</script>

<style>

</style>
