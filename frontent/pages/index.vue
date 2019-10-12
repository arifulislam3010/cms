<template>
  <div class="container" style="margin-top:10px">
      <div class="featured-post-area">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-8">
                    <div class="row">

                        <!-- Single Featured Post -->
                        
                        <div class="col-12 col-lg-7">
                          <div v-if="sectionOneLoading">
                            <SmallLoader :counts='1'></SmallLoader>
                          </div>
                          <div v-else>
                          <div v-for="(item,key) in this.sectionOne.data" v-bind:key="key">
                            <nuxt-link :to="'/article/'+item.id+'/'+item.shoulder">
                                <card :item="item"></card>
                            </nuxt-link>
                          </div>
                          </div>
                        </div>
                        
                        <div class="col-12 col-lg-5">
                            <div v-if="sectionSecondLoading">
                              <SmallLoaderVerticle :counts='1'></SmallLoaderVerticle>
                            </div>
                            <div v-else>
                            <div v-for="(item,key) in this.sectionSecond.data" v-bind:key="key">
                              <nuxt-link :to="'/article/'+item.id+'/'+item.shoulder">
                                <card :item="item"></card>
                              </nuxt-link>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-4">
                    <SmallAd></SmallAd>
                    <div v-if="sectionThirdLoading">
                      <SmallLoader :counts='1'></SmallLoader>
                    </div>
                    <div v-else>
                    <div v-for="(item,key) in this.sectionThird.data" v-bind:key="key" style="margin-top: 7px;">
                      <nuxt-link :to="'/article/'+item.id+'/'+item.shoulder">
                          <List :item="item"></List>
                      </nuxt-link>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
</template>

<script>

import axios from '@/plugins/axios'
import { mapState,mapGetters,mapActions } from "vuex"

import Card from "@/components/share/post/Card";
import List from "@/components/share/post/List";
import SmallAd from "@/components/share/ad/SmallAd";
import SmallLoader from "@/components/share/loader/SmallLoader";
import SmallLoaderVerticle from "@/components/share/loader/SmallLoaderVerticle";

export default {
  name:"home",
  components: {
    Card,List,SmallAd,SmallLoader,SmallLoaderVerticle
  },
 
  data() {
    return {
      title : 'Home',
      sectionOneLoading:true,
      sectionSecondLoading:true,
      sectionThirdLoading:true,
      sectionOne:[],
      sectionSecond:[],
      sectionThird:[],
      secondSectionNews:{},
      sectionsfirst: []
    }
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
    this.getSectionOneData();
    this.getSectionSecondData();
    this.getSectionThirdData();
  },
  methods: {

    getSectionOneData(){
        axios.post('/api/frontend/posts',{section:1,limit:1}).then((response) => {      
            this.sectionOne = response.data;
            this.sectionOneLoading = false;

        }).catch(function (error) {    

            this.sectionOneLoading = true;
        });
    },
    getSectionSecondData(){
        axios.post('/api/frontend/posts',{section:2,limit:2}).then((response) => {      
            this.sectionSecond = response.data;
            this.sectionSecondLoading = false;

        }).catch(function (error) {    

            this.sectionSecondLoading = true;
        });
    },
    getSectionThirdData(){
        axios.post('/api/frontend/posts',{section:3,limit:6}).then((response) => {      
            this.sectionThird = response.data;
            this.sectionThirdLoading = false;

        }).catch(function (error) {    

            this.sectionThirdLoading = true;
        });
    }
  },
  
  async asyncData () {
    
    let secParam2 = {section:2,limit:3};
    let secParam3 = {section:3,limit:4};
    let secParam4 = {section:4,limit:4};
    
    const postall = await axios.post('/api/frontend/posts');
    const sec2 = await axios.post('/api/frontend/posts',secParam2);
    const sec3 = await axios.post('/api/frontend/posts',secParam3);
    const sec4 = await axios.post('/api/frontend/posts',secParam4);

    // let searchCategory = {section:'',category:1,limit:1};
    // const ar = await axios.post('/api/frontend/posts',searchCategory);
    
    
    return {
        
        // latestPost:secone.data,
        section2:sec2.data,
        section3:sec3.data,
        section4:sec4.data,
    
    }

    // const config = {
    //     method: 'POST',
    //     headers: {
    //       'Accept' : 'application/json'
    //     }
    //   }

    //   try{
    //     const res = await axios.post('/api/frontend/posts', config)

    //     this.allPos = res.data.results;
    //   } catch(err){
    //     console.log(err)
    //   }
  },



  // async asyncSection () {
   
  //   const {section} = await axios.get('/api/frontend/postSections')
  //   return {sections:section}
  // },

//  async created(){
//       const config = {
//         method: 'POST',
//         headers: {
//           'Accept' : 'application/json'
//         }
//       }

//       try{
//         const res = await axios.post('/api/frontend/posts', config)

//         this.allPos = res.data.results;
//       } catch(err){
//         console.log(err)
//       }

      
//   },

  

    // computed: {
    //   ...mapGetters(["posts"]),
    // },
    
  //  created() {
  //    this.$store.dispatch('setPosts', this.loadedPosts)
  //  },
    
  // mounted() {
  //   this.$nextTick(function () {
      
     
  // })
  // }
}
</script>

<style scoped>
.single-blog-post.featured-post .post-data .post-title h6 {
  font-size: 15px;
}
.pt-20 {
  padding-top: 20px;
}
</style>