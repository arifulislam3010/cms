<template>
  <div class="container">
      <div class="col-md-12">
          <div class="row" style="margin-top:40px">
              <div class="col-md-8">
                  <div v-if="loading">
                      <p>Loading</p>
                  </div>
                  <div v-else class="row mb-30">
                    <h1>{{post.shoulder}}</h1>
                  </div>
              </div>
              <div class="col-md-4">
                  
              </div>
          </div>
      </div>
  </div>
</template>

<script>
import axios from '@/plugins/axios'
import Logo from "@/components/Logo.vue";
import Hero from "@/components/Hero.vue";
import Featured from "@/components/FeaturedPost/Featured.vue";
import Carousel1 from "@/components/carousels/Carousel1";
import card from "@/components/share/post/Card";

export default {
  name:"PostDetails",
  components: {
    Logo,
    Hero,
    Featured,
    Carousel1,
    card,
  },
  data() {
    return {
      title: "PostDetails",
      post:{},
      loading:true,
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
    this.getData();
  },
  methods: {
     getData(){
        axios.get('/api/frontend/post/'+this.$route.params.id).then((response) => {      
            this.post = response.data;
            this.loading = false;
        }).catch(function (error) {    
            this.loading = true;
        });
    }
  },
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
