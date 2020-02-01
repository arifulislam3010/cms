<template>
    <div class="row">
        <div class="col-sm-12">
            <div class="box-white">
                <div class="jagoTab2">
                    <ul class="nav nav-tabs nav-justified" role="tablist">
                        <li role="presentation" :class="tab_active==1?'active':''" @click="TabActive(1)">
                            <a href="" aria-controls="tab21" role="tab" data-toggle="tab">সর্বশেষ</a>
                        </li>
                        <li role="presentation" :class="tab_active==2?'active':''" @click="TabActive(2)">
                            <a href="" aria-controls="tab22" role="tab" data-toggle="tab">জনপ্রিয়</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane " :class="tab_active==1?'fade in active':''">
                            <div v-if="latestPostsLoading">
                                <SmallLoader :counts='1'></SmallLoader>
                                <SmallLoader :counts='1'></SmallLoader>
                            </div>
                            <div v-else>
                                <ul class="media-list" style="max-height:357px!important;">
                                    <li v-for="(item,lkey) in latestPosts.data" v-bind:key="lkey" class="media">
                                        <!-- <nuxt-link :to="'/post/'+item.id+'/'+item.shoulder"> -->
                                        <nuxt-link :to="'/post/'+item.id+'/'">
                                        <List :item="item" :index="lkey"></List>
                                        </nuxt-link>
                                    </li>
                                </ul>
                            </div>
                            <div class="allnews">
                                <nuxt-link :to="'/posts?type=latest,page=1'">
                                আজকের সর্বশেষ সবখবর
                                </nuxt-link>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane" :class="tab_active==2?'fade in active':''">
                            <div v-if="popularPostsLoading">
                                <SmallLoader :counts='1'></SmallLoader>
                                <SmallLoader :counts='1'></SmallLoader>
                            </div>
                            <div v-else>
                                <ul class="media-list" style="max-height:357px!important;">
                                    <li v-for="(item,pkey) in popularPosts.data" v-bind:key="pkey" class="media">
                                        <!-- <nuxt-link :to="'/post/'+item.id+'/'+item.shoulder"> -->
                                        <nuxt-link :to="'/post/'+item.id+'/'">
                                        <List :item="item" :index="pkey"></List>
                                        </nuxt-link>
                                    </li>
                                </ul>
                            </div>
                            <div class="allnews">
                                <a href="archive.html" rel="nofollow">আজকের সর্বশেষ সবখবর m</a>
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
import List from '~/components/post/List.vue'
import SmallLoader from "@/components/loader/SmallLoader";
export default {
  components: {
    List,
    SmallLoader
  },
  data() {
    return {
        tab_active:1,
        popularPostsLoading:true,
        latestPostsLoading:true,
        popularPosts:[],
        latestPosts:[],
    }
  },

  mounted() {
    this.getPopularPosts();
    this.getLatestPosts();
  },
  methods: {
    TabActive(type){
         this.tab_active = type;
    },
    getPopularPosts(){
        axios.post('/api/frontend/posts',{popular:1,limit:10}).then((response) => {      
            this.popularPosts = response.data;
            this.popularPostsLoading = false;

        }).catch(function (error) {    

            this.popularPostsLoading = true;
        });
    },
    getLatestPosts(){
        axios.post('/api/frontend/posts',{latest:1,limit:10}).then((response) => {      
            this.latestPosts = response.data;
            this.latestPostsLoading = false;

        }).catch(function (error) {    

            this.latestPostsLoading = true;
        });
    }
  }
}
</script>