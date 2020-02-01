<template>
<aside class="col-sm-4 aside">

    <div class="single-block">
        <br>
        <div class="row">
            <div class="col-sm-12">
                <h3 > <b>এক ক্লিকে বিভাগের খবর</b>  </h3>
            </div>
        </div>
        <br>
        <div class="row " >
            <div class="col-sm-6">
                <!-- {{allArea}} -->
                <select name="" id="" v-model="select1">
                    <option value="">-- বিভাগ -- </option>
                    <option v-for="(item,key) in allArea" :key="key" :value="item" > {{item.title}} </option>
                    <!-- <option value="">3</option> -->
                </select>
            </div>
            <div class="col-sm-6"  >
                <select name="" id="" v-model="select2" >
                    <option value="">-- জেলা --</option>
                    <option v-for="(item,key) in allArea2" :key="key" :value="item" > {{item.title}} </option>
                </select>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-6">
                <select name="" id="" v-model="select3" >
                    <option value="">-- উপজেলা --</option>
                    <option v-for="(item,key) in allArea3" :key="key" :value="item" > {{item.title}} </option>
                </select>
            </div>
            <div class="col-sm-6">
                <button class="btn btn-primary" style="width:110px;" @click="search">search</button>
            </div>
        </div>
    </div>
</aside>
</template>
<script>
import axios from '@/plugins/axios'
export default {
    data(){
        return {
            allArea  : [] ,
            allArea2 : [] ,
            allArea3 : [] ,
            select1  : `` ,
            select2  : `` , 
            select3  : `` , 
        }
    },
    mounted(){
        this.fetchAreaList()
    },
    watch:{
        select1: function(val){
            console.log(val)
            this.allArea2 = val.children !=0 ? val.children : []
            this.allArea3 = []
            // this.select2 = {

            // }
            // this.select2  = {} 
        },
        select2: function(val){
            console.log(val)
            this.allArea3 = val.children !=0 ? val.children : []
            // this.select3  = {}
        }
    },
    methods : {
        search(){
            // alert(`${this.select3.title}`)
            // find the lowest children and naviate there 
            let area = null
            if(this.select1) area = this.select1 
            if(this.select2) area = this.select2 
            if(this.select3) area = this.select3 
            if (area)                
            this.$router.push({
                path : `/area/${area.id}`
            })
       },
        fetchAreaList(){
            axios.get(`/api/frontend/areas`).then(response=>{
                this.allArea  = response.data.filter(v => v.parent_id == null)
            }).catch(e=>{
                alert(``)
            })
        }
    },
}
</script>