<template>
  <div class="c">
    <!-- <nuxt-link to="/about">Abouts</nuxt-link> -->

    <!-- <font-awesome-icon :icon="['fab', 'linkedin']"/> -->
    <hero />
    <Featured />

    <NewsBlock1 />
    <NewsBlock2 />
    <Footer />
  </div>
</template>

<script>
import Logo from "@/components/Logo.vue";
import Hero from "@/components/Hero.vue";
import Featured from "@/components/FeaturedPost/Featured.vue";
import Carousel1 from "@/components/carousels/Carousel1";
import NewsBlock1 from "@/components/home/NewsBlock1";
import NewsBlock2 from "@/components/home/NewsBlock2";
import Footer from "@/components/Footer";

export default {
  components: {
    Logo,
    Hero,
    Featured,
    Carousel1,
    NewsBlock1,
    NewsBlock2,
    Footer
  },
  data() {
    return {
      title: "Home"
    };
  },
  head() {
    return {
      title: this.title,
      meta: [
        // hid is used as unique identifier. Do not use `vmid` for it as it will not work
        {
          hid: "description",
          name: "description",
          content: "My custom description"
        }
      ]
    };
  },

  mounted() {
    this.$nextTick(function() {});
  }
};
</script>

<style scoped>
.single-blog-post.featured-post .post-data .post-title h6 {
  font-size: 15px;
}

.pt-20 {
  padding-top: 20px;
}
</style>
