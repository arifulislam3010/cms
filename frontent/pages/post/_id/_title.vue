<template>
<div>
  <main id="main-content">
  <section class="leadBox paddingTop20">
  <div class="container">
    <div class="row">
      <Details></Details>  
      <Section1Aside></Section1Aside>
    </div>
  </div>
  </section>
  </main>
</div>
</template>
<script>
import axios from '@/plugins/axios'
import Details from '~/components/post/Details.vue'
import Section1Aside from '@/components/home/section/Section1Aside.vue'
import SmallLoader from "@/components/loader/SmallLoader";
export default {
  components: {
    Section1Aside,
    Details,
    SmallLoader
  },
  name:"CategoryPage",
  data() {
    return {
      title: "Home",
      postsOne:[],
      postsTwo:[],
      posts:[],
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
        let search = {category:this.$route.params.id,limit:4};
        axios.post('/api/frontend/posts',search).then((response) => {      
            this.postsOne = response.data.data.slice(0, 1);
            this.postsTwo = response.data.data.slice(1, 3);
            this.posts = response.data.data.slice(3, 9);
            this.loading = false;

        }).catch(function (error) {    
            this.loading = true;
        });
    }
  },
};
</script>