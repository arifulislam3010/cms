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

        <!-- <Multiselect v-model="temp" :options="category_parents"></Multiselect> -->
    </div>
</template>
<script>
import Treeselect from '@riophae/vue-treeselect'
import Multiselect from "vue-multiselect";

import {mapGetters} from "vuex"
import axios from "axios";
export default {
    name:`SearchBar`,
    components:{
        Treeselect,Multiselect,
    },
    data(){
        return {
            demo :`` ,
            temp :[],
        }
    },
    mounted(){
        this.getCategories()
    },
    computed:{...mapGetters([`category_parents`])},
    methods:{
        search(){
            // if temp list is empty then get all 
            if(this.temp.length == 0){
                this.$store.dispatch(`FETCH_NEWS`)
                return 
            }
            // alert(this.temp)
            let payload = {
                post_cat_ids : this.temp 
            }
            this.$store.dispatch(`SEARCH_POST_BY_CATEGORY`,payload).then(response=>{
                // alert(`result fetched`)
            })
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