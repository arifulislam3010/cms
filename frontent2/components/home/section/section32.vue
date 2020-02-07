<template>
    <section>
        <div class="container card">
        <!-- category layot three  / category laout full -->
        <!-- all careds same size  -->

        <div class="row">
            <!-- {{'full view :' + fullView}} -->
            <div class="col-sm-12">
                <div class="pull-left">
                        <h2 class="catTitle "><a href="country.html"> {{fullView.title}} </a><span class="liner"></span></h2>
                </div>
            </div>

        </div>
        <div class="row" >
            <div class="s" >
                <!-- {{categories.filter(v => v.layout == 'three')[0].news.map(v => v.id)}} -->
                <div class="pull-left">
                    <div v-for="(item,skey)  in fullView.news.slice(0,8)" v-bind:key="skey" class="col-sm-3">
                        <div style="" class="">
                            <nuxt-link :to="'/post/'+item.id+'/'">
                                <SingleBlock :blockType='"subLead"' :item='item'></SingleBlock>
                            </nuxt-link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        

        <!-- category layot two / two column -->
        <!-- {{halfView}} -->
        <div class="row">

            <div class="col-sm-12">
                <div class="pull-left">
                        <h2 class="catTitle "><a href="country.html"> {{halfView.title}} </a><span class="liner"></span></h2>
                </div>
            </div>

        </div>       
        <div class="row">
            <div class="col-sm-8 main-content">
                  <div class="row">
                      <div class="col-sm-12">
                          <div class="row">
                              <div class="col-sm-8">
                                <div v-for="(item,skey) in halfView.news.slice(0,1)" v-bind:key="skey" >
                                    <nuxt-link :to="'/post/'+item.id+'/'">
                                        <SingleBlock :blockType='mainLead' :item='item'></SingleBlock>
                                    </nuxt-link>
                                </div>                                 
                              </div>
                                <div class="col-sm-4">
                                    <div v-for="(item,skey) in halfView.news.slice(1,3)" v-bind:key="skey" >
                                        <nuxt-link :to="'/post/'+item.id+'/'">
                                            <SingleBlock :blockType='subLead' :item='item'></SingleBlock>
                                        </nuxt-link>
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
                        <div v-for="(item,skey) in halfView.news.slice(3,7)" v-bind:key="skey" class="col-sm-4">
                            <nuxt-link :to="'/post/'+item.id+'/'">
                                <SingleBlock :blockType='subLead' :item='item'></SingleBlock>
                            </nuxt-link>
                        </div>
                        </div>
                </div>                  
            </div>
        </div>
        <!-- category layot one  / single colum-->
        <div class="row">
            <!-- {{categories[0]}} -->
            <div v-for="(item,key) in categories.filter(v => v.parent_id)" :key="key" class="col-sm-3">
                <div class=" single-block" v-if="item.news.length">
                    <div class="row">
                        <div class="col-sm-12">
                        <h2 class="catTitle"><a href="#" class="pull-left"> {{item.title}} </a><span class="liner"></span></h2>

                        <!-- <h2 class="pull-left catTitle">{{item.title}} <span class="liner"></span> </h2>   -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <!-- {{item.news[0].FeaturedImage.file_name}} -->
                            <img  :src=item.news[0].FeaturedImage.file_name alt="" style="height:200px;">
                        </div>
                    </div>
                    <div class="row ">
                        
                        <div v-for="(v,k) in item.news.slice(0,8)" :key="k" >
                            <!-- {{item.title + item.news.length}} -->
                            <div class="col-sm-12">
                                <!-- <a href="#">
                                 <span class="" v-html="v.headline"></span>
                                </a> -->
                                <nuxt-link :to="'/post/'+v.id+'/'">
                                     <span class="" v-html="v.headline" style="hover:{color:blue;}"></span>
                                </nuxt-link>
                            <div style="height:1px;background:grey;width:100%"></div>
                            </div>
                            <!-- {{}} -->
                        </div>
                    </div>    
                </div>
            </div>
        </div>
        </div>
    </section>
</template>
<script>
import axios from '@/plugins/axios'
import SmallLoaderVerticle from "~/components/loader/SmallLoaderVerticle";
import SingleBlock from '~/components/post/SingleBlock.vue'
import Section1Aside from './Section1Aside.vue'
import SmallLoader from "@/components/loader/SmallLoader";
export default {
    components:{
         SingleBlock,
         Section1Aside,
         SmallLoader
    },
    data(){
        return {
            subLead:'subLead',
            mainLead:'mainLead',
            mainLeadLoading : false ,
            subLeadLoading : false ,
            categories: [] ,
            topics:[],
            topicFirst : {
                title: ``,
                news : [],
            } ,
            showFullView : true ,
            fullView:{
                title : `` ,
                news : [],
            },
            halfView:{
                title : `` ,
                news : [],
            }
        }
    },
    mounted(){
        this.fetchCategories()
        // this.fetchTopics()
    },
    computed:{
 
    },
    methods:{
        fetchCategories(){
            // axios.get('/api/frontend/categories/news/',{section:1,limit:1}).then((response) => {      
            axios.get('/api/frontend/categories/news').then((response) => {      
                this.categories = response.data;
                this.mainLeadLoading = false;
                try{

                    this.setFullView() 
                    this.setHalfView()
                }catch(e){
                    console.log(e)
                }
            }).catch(function (error) {    
                this.mainLeadLoading = true;
            });
        },
        fetchTopics(){
            axios.get('/api/frontend/topics/news').then((response) => {      
                this.topics = response.data;
                this.mainLeadLoading = false;
                this.topicFirst = {...this.topics[3]} //: ``
            }).catch(function (error) {    
                this.mainLeadLoading = true;
            });
        },
        setFullView(){
            // alert(`make noise`)
            this.showfullView = true 
            let _t = this.categories.filter(v => v.layout == 'three')
            if(_t.length == 0) {
                this.showfullView = false 
                return 
            }
            this.fullView = _t[0]
            let self = this
            _t.forEach(function(v){
                self.fullView = v.news.length > self.fullView.news.length ? v : self.fullView 
            })
            if(this.fullView.news.length >4) this.fullView.news = this.fullView.news.slice(0,4)    
            // return this.fullView      

        },
        setHalfView(){
            // alert(`in method`)
            this.showfullView = true 
            let _t = this.categories.filter(v => v.layout == 'two')
            if(_t.length == 0) {
                // this.showfullView = false 
                return 
            }
            this.halfView = _t[0]
            let self = this
            _t.forEach(function(v){
                self.halfView = v.news.length > self.halfView.news.length ? v : self.halfView 
            })
            // if(this.halfView.news.length >4) this.halfView.news = this.halfView.news.slice(0,3)    
            // alert(this.halfView)
            // return this.halfView             
        },
    }
}
</script>
<style  scoped>
    .liner{
        width: 10px;
        color:black;
    }
</style>