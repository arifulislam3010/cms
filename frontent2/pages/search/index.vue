<template>
    <div class="container" style="margin-top:30px;">
        <div class="row single-block" v-if="searchResult.data.length != 0">
            <div v-for="(item,key) in searchResult.data" :key="key">
                <div class="col-sm-12 ">
                    <div class="row">
                        <div class="col-sm-12 ">
                            <span v-html="item.headline" class="pull-left"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-2">
                            <img :src="item.FeaturedImage.file_name" alt=""  >
                        </div>
                        <div class="col-sm-8">
                            <span v-html="item.partial_content.slice(0,200)" class="pull-left"> </span>
                        </div>
                    </div>
                <div style="height:1px;background:grey;width:100%;margin-bottom:20px;"></div>
                </div>
                <!-- <div style="width:100%;heigth:2px;background:grey;"></div> -->
                
            </div>
        </div>
        <div class="row single-block" v-else>
            <div class="col-sm-12" style="text-align:center;">
                <h1>Nothing to Show </h1>
            </div>
        </div>
    </div>
</template>
<script>
import axios from "@/plugins/axios"
export default {
    data(){
        return {
            searchResult : {
                data :[],
            } ,
        }
    },
    mounted(){
        this.queryString()
    },
    methods:{
        queryString(){
            console.log(this.$route)
            axios.get(`/api/frontend/search?q=${this.$route.query.q}`).then(response=>{
                this.searchResult = response.data
            }).catch(e=>{
                // alert(`error`)
            })
        }
    },
}
</script>