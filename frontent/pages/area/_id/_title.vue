<template>
<main id="main-content">
  <section class="leadBox paddingTop20">
      <div class="container">
      <div class="row">
          <div class="col-sm-8 main-content">
              <div class="row">
                 <ol class="breadcrumb hidden-print" start="float: left;">
                        <li>
                             <nuxt-link to="/">
                                <i class="fa fa-home text-danger"></i>
                            </nuxt-link>
                        </li>
                        <li v-for="(area,key) in  PostArea" v-bind:key="key">
                            <nuxt-link :to="'/area/'+area.title">
                                {{area.title}}
                            </nuxt-link>
                        </li>
                    </ol>
                  <div class="col-sm-12">
                      <div class="row">
                          <div class="col-sm-8">
                              <div v-if="loading">
                                  <SmallLoader :counts='1'></SmallLoader>
                              </div>
                              <div v-else>
                                  <div v-for="(item,mkey) in postsOne" v-bind:key="mkey">
                                      <nuxt-link :to="'/post/'+item.id+'/'+item.shoulder">
                                          <SingleBlock :blockType='mainLead' :item='item'></SingleBlock>
                                      </nuxt-link>
                                  </div>
                              </div>
                          </div>
                          <div class="col-sm-4">
                              <div v-if="loading">
                                  <SmallLoader :counts='1'></SmallLoader>
                                  <SmallLoader :counts='1'></SmallLoader>
                              </div>
                              <div v-else>
                              <div v-for="(item,skey) in postsTwo" v-bind:key="skey">
                                  <nuxt-link :to="'/post/'+item.id+'/'+item.shoulder">
                                      <SingleBlock :blockType='subLead' :item='item'></SingleBlock>
                                  </nuxt-link>
                              </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="row">
                      <div v-if="loading">
                          <SmallLoader :counts='1'></SmallLoader>
                          <SmallLoader :counts='1'></SmallLoader>
                      </div>
                      <div v-else>
                      <div v-for="(item,skey) in posts" v-bind:key="skey" class="col-sm-4">
                          <nuxt-link :to="'/post/'+item.id+'/'+item.shoulder">
                              <SingleBlock :blockType='subLead' :item='item'></SingleBlock>
                          </nuxt-link>
                      </div>
                      </div>
              </div>
          </div>
          <Section1Aside></Section1Aside>
      </div>
    </div>
  </section>
</main>
</template>
<script>
import axios from '@/plugins/axios'
import SmallLoaderVerticle from "~/components/loader/SmallLoaderVerticle";
import SingleBlock from '~/components/post/SingleBlock.vue'
import Section1Aside from '@/components/home/section/Section1Aside.vue'
import SmallLoader from "@/components/loader/SmallLoader";
export default {
  components: {
    SingleBlock,
    Section1Aside,
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
      PostArea:[],
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
    this.getArea();
  },
  methods: {
    getArea(){
        axios.get('/api/frontend/area/'+this.$route.params.id).then((response) => { 
            this.PostArea = response.data;
            this.loading = false;
        }).catch(function (error) {    
            this.loading = true;
        });
    },
     getData(){
        let search = {area:this.$route.params.id,limit:4};
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