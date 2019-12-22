<template>
    <div >
        <!-- <input class="form-control" placeholder="search hear"/> -->
        <!-- {{category_parents}} -->
        <!-- <label for="">
            &nbsp;Search Hear
        </label> -->
        <div class="row">
            <div class="col-sm-5">
                <Treeselect
                :multiple="true"
                :flat="true"
                v-model="temp"
                :options="category_parents"
                
                ></Treeselect>
            </div>
            <div class="col-sm-1">
                <button class="btn btn-success" @click="search">
                <!-- <span style="margin-bottom:50px;"> -->
                  <nobr>
                    search &#x2618; 
                  </nobr>
                <!-- </span> -->
               </button>
            </div>
            {{demo}}
        </div>
        <Loader v-if="loading"></Loader>

        <!-- <Multiselect v-model="temp" :options="category_parents"></Multiselect> -->
    </div>
</template>
<script>
import Treeselect from '@riophae/vue-treeselect'
import Multiselect from "vue-multiselect";
import Loader from "@/views/common/Loader";

import {mapGetters} from "vuex"
import axios from "axios";
export default {
    name:`SearchBar`,
    components:{
        Treeselect,Multiselect,Loader
    },
    data(){
        return {
            demo :`` ,
            temp :[],
            loading : false ,
            btn_txt : `Search` ,
        }
    },
    mounted(){
        this.getCategories()
    },
    watch:{

    }
    computed:{...mapGetters([`category_parents`])},
    methods:{
        search(){
            this.loading = true 
            // if temp list is empty then get all 
            if(this.temp.length == 0){
                this.$store.dispatch(`FETCH_NEWS`).then(response=>{
                    this.loading = false 
                }).catch(erroor=>{this.loading = false})
                
                return 
            }
            // alert(this.temp)
            let payload = {
                post_cat_ids : this.temp 
            }
            this.$store.dispatch(`SEARCH_POST_BY_CATEGORY`,payload).then(response=>{
                // alert(`result fetched`)
                this.loading = false
            }).catch(error=>{this.loading = false})
            // axios.post(`api/post/search`,payload).then(response=>{
            //     this.demo = response.data 
            //     // alert(this.demo)
            // })    
        },
        getCategories(){
            this.loading = true
            this.$store.dispatch('FETCH_CATEGORIES').then(response=>{
            this.loading = false
            }).catch(error=>{ 
            this.loading = false
            })
        },
        
    },
}
</script>
<style lang="stylus" scoped>


</style>