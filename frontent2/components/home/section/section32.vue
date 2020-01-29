<template>
    <section>
        <div class="container card">
        <!-- category layot three  / category laout full -->
        <!-- all careds same size  -->
        <div v-for="(topic,key) in topics" :key="key">

        <div class="row"  v-if="topic.news.length>1">

            <div class="col-sm-12">
                <div class="pull-left">
                        <h2 class="catTitle "><a href="country.html"> {{topic.title}} </a><span class="liner"></span></h2>
                </div>
            </div>

        </div>
        <div class="row" >
            <div class="col-sm-12" v-if="topic.news.length>1">
                <!-- {{topicFirst}} -->
                <div class="pull-left">
                    <div v-for="(item,skey) in topic.news.slice(0,8)" v-bind:key="skey" class="col-sm-3">
                        <nuxt-link :to="'/post/'+item.id+'/'+item.shoulder">
                            <SingleBlock :blockType='"subLead"' :item='item'></SingleBlock>
                        </nuxt-link>
                    </div>
                </div>
            </div>
        </div>
        </div>

        <!-- category layot one  -->
        
        <!-- category layot two  -->
        </div>
    </section>
</template>
<script>
import axios from '@/plugins/axios'
import SingleBlock from '~/components/post/SingleBlock.vue'
export default {
    components:{
        SingleBlock
    },
    data(){
        return {
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
            }
        }
    },
    mounted(){
        // this.fetchCategories()
        this.fetchTopics()
    },
    computed:{
 
    },
    methods:{
        fetchCategories(){
            // axios.get('/api/frontend/categories/news/',{section:1,limit:1}).then((response) => {      
            axios.get('/api/frontend/categories/news').then((response) => {      
                this.categories = response.data;
                this.mainLeadLoading = false;
                this.setFullView() 
            }).catch(function (error) {    
                this.mainLeadLoading = true;
            });
        },
        fetchTopics(){
            axios.get('/api/frontend/topics/news').then((response) => {      
                this.topics = response.data;
                this.mainLeadLoading = false;
                // topics.length>0? 
                this.topicFirst = {...this.topics[3]} //: ``
                // this.setFullView() 
            }).catch(function (error) {    
                this.mainLeadLoading = true;
            });
        },
        setFullView(){
            this.showfullView = true 
            let _t = this.categories.filter(v => v.layout == 'three')
            if(_t.length == 0) {
                this.showfullView = false 
                return 
            }
            this.fullView = _t[0]
            _t.forEach((v)=>{
                this.fullView = v.news.length > fullView.news.length ? v : fullView 
            })
            if(this.fullView.news.length >4) this.fullView.news = this.fullView.news.slice(0,3)    
            return this.fullView            
        }
    }
}
</script>
<style  scoped>
    .liner{
        width: 10px;
        color:black;
    }
</style>