<template>
<section class="deshjure">
    <div class="container">
        <div class="row">
            <div class="col-sm-8 main-content">
                <div class="row">
                    <div class="col-sm-12">
                        <!-- <h2 class="catTitle"> <a>asd</a> <span class="liner"></span></h2> -->
                        <h2 class="catTitle"><a href="country.html">দেশজুড়ে</a><span class="liner"></span></h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                         <div v-if="mainLeadLoading">
                            <SmallLoader :counts='1'></SmallLoader>
                        </div>
                        <div v-else>
                            <div v-for="(item,mkey) in mainLeadData.data" v-bind:key="mkey">
                                <!-- <nuxt-link :to="'/post/'+item.id+'/'+item.shoulder"> -->
                                <nuxt-link :to="'/post/'+item.id+'/'">
                                    <SingleBlock :blockType='mainLead' :item='item'></SingleBlock>
                                </nuxt-link>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div v-if="subLeadLoading">
                        <SmallLoader :counts='1'></SmallLoader>
                        <SmallLoader :counts='1'></SmallLoader>
                    </div>
                    <div v-else>
                    <div v-for="(item,skey) in subLeadData2" v-bind:key="skey">
                        <nuxt-link :to="'/post/'+item.id+'/'">
                            <List2 :item='item'></List2>
                        </nuxt-link>
                    </div>
                    </div>
                        
                    </div>
                </div>
                <div class="row">
                    <div v-if="subLeadLoading">
                        <SmallLoader :counts='1'></SmallLoader>
                        <SmallLoader :counts='1'></SmallLoader>
                    </div>
                    <div v-else>
                    <div v-for="(item,skey) in subLeadData2" v-bind:key="skey" class="col-sm-3">
                        <!-- <nuxt-link :to="'/post/'+item.id+'/'+item.shoulder"> -->
                        <nuxt-link :to="'/post/'+item.id+'/'">
                            <SingleBlock :blockType='subLead' :item='item'></SingleBlock>
                        </nuxt-link>
                    </div>
                    </div>
                </div>
            </div>
            <aside class="col-sm-4 aside">
                <Map></Map>
            </aside>
        </div>
    </div>
</section>
</template>
<script>
import axios from '@/plugins/axios'
import SingleBlock from '~/components/post/SingleBlock.vue'
import Section1Aside from './Section1Aside.vue'
import List2 from '~/components/post/List2.vue'
import Map from '~/components/home/content/Map.vue'
export default {
  components: {
    SingleBlock,
    Section1Aside,
    List2,
    Map
  },
  data() {
    return {
      subLead:'subLead',
      mainLead:'mainLead',
      mainLeadLoading:true,
      mainLeadData:[],
      subLeadLoading:true,
      subLeadData2:[],
    }
  },
  mounted(){
      this.GetSubLead();
      this.GetMainLead();
  },
  methods:{
       GetMainLead(){
            axios.post('/api/frontend/posts',{section:1,limit:1}).then((response) => {      
                this.mainLeadData = response.data;
                this.mainLeadLoading = false;
            }).catch(function (error) {    
                this.mainLeadLoading = true;
            });
        },
      GetSubLead(){
        axios.post('/api/frontend/posts',{section:2,limit:6}).then((response) => { 
            this.subLeadData2 = response.data.data.slice(2, 12);
            this.subLeadLoading = false;

        }).catch(function (error) {    

            this.subLeadLoading = true;
        });
    },
  }
}
</script>