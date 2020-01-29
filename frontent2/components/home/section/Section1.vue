<template>
<div class="row">
     <div class="col-sm-8 main-content">
        <div class="row">
            <div class="col-sm-12">
                <div class="row">
                    <div class="col-sm-8">
                        <div v-if="mainLeadLoading">
                            <SmallLoader :counts='1'></SmallLoader>
                        </div>
                        <div v-else>
                            <div v-for="(item,mkey) in mainLeadData.data" v-bind:key="mkey">
                                <nuxt-link :to="'/post/'+item.id+'/'">
                                    <SingleBlock :blockType='mainLead' :item='item'></SingleBlock>
                                </nuxt-link>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div v-if="subLeadLoading">
                            <SmallLoader :counts='1'></SmallLoader>
                            <SmallLoader :counts='1'></SmallLoader>
                        </div>
                        <div v-else>
                        <div v-for="(item,skey) in subLeadData" v-bind:key="skey">
                            <!-- <nuxt-link :to="'/post/'+item.id+'/'+item.shoulder"> -->
                            <nuxt-link :to="'/post/'+item.id+'/'">
                                <SingleBlock :blockType='subLead' :item='item'></SingleBlock>
                            </nuxt-link>
                        </div>
                        </div>
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
                <div v-for="(item,skey) in subLeadData2" v-bind:key="skey" class="col-sm-4">
                    <nuxt-link :to="'/post/'+item.id+'/'">
                        <SingleBlock :blockType='subLead' :item='item'></SingleBlock>
                    </nuxt-link>
                </div>
                </div>
        </div>
        <!-- <div class="row">
            <div class="col-sm-4">
                <SingleBlock :blockType='subLead'></SingleBlock>
            </div>
        </div> -->
    </div>
    <Section1Aside></Section1Aside>
</div>
</template>
<script>
import axios from '@/plugins/axios'
import SmallLoaderVerticle from "~/components/loader/SmallLoaderVerticle";
import SingleBlock from '~/components/post/SingleBlock.vue'
import Section1Aside from './Section1Aside.vue'
import SmallLoader from "@/components/loader/SmallLoader";
export default {
  components: {
    SingleBlock,
    Section1Aside,
    SmallLoader
  },
  data() {
    return {
      subLead:'subLead',
      mainLead:'mainLead',
      mainLeadLoading:true,
      mainLeadData:[],
      subLeadLoading:true,
      subLeadData:[],
      subLeadData2:[],

    }
  },
  mounted(){
      this.GetMainLead();
      this.GetSubLead();
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
            this.subLeadData = response.data.data.slice(0, 2);
            this.subLeadData2 = response.data.data.slice(2, 12);
            this.subLeadLoading = false;

        }).catch(function (error) {    

            this.subLeadLoading = true;
        });
    },
  }
}
</script>