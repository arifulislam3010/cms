<template>
    <div class="card">
        <input class="form-control" placeholder="search hear"/>
        <!-- {{category_parents}} -->
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
        </div>

        <!-- <Multiselect v-model="temp" :options="category_parents"></Multiselect> -->
    </div>
</template>
<script>
import Treeselect from '@riophae/vue-treeselect'
import Multiselect from "vue-multiselect";

import {mapGetters} from "vuex"
export default {
    name:`SearchBar`,
    components:{
        Treeselect,Multiselect,
    },
    data(){
        return {
            temp :[],
        }
    },
    mounted(){
        this.getCategories()
    },
    computed:{...mapGetters([`category_parents`])},
    methods:{
        search(){
            alert(this.temp)
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