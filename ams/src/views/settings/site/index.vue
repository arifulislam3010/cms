<template>
    <div>
       
     <div class="card">
            <table class="table table-sm">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Logo</th>
                        <th>Site info</th>
                        <th>about</th>
                        <th>actions</th>

                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(i,k) in site_list" :key="k">
                        <td>{{i.id}}</td>
                        <td>{{i.logo_url}}</td>
                         <td>{{i.site_name}}</td>
                        <td>{{i.about}}</td>
                        <td>
                            <a href="#" @click="editSite(i)">Edit//</a> 
                            <a href="#" @click="deleteSite(i)" >Delete</a> 
                        </td>
                    </tr>
                </tbody>
            </table>
            {{contentList}}
        </div>
    </div>
</template>


<script>
import {mapGetters} from "vuex"
import AddSite from "./add.vue";
export default {

    components:{
        AddSite
    },
    data(){
        return {
        }
    },
    computed:{
        ...mapGetters(['site_list',`contentList`])
    },
    mounted(){
        this.getSiteInfos()
    },
    methods:{
        getSiteInfos(){
            this.$store.dispatch(`FETCH_SITE_INFOS`).then(response=>{

            }).catch(error=>{

            })
        },

        deleteSite(site){
            let payload={
                id:site.id
            }
            console.log(site.id)
             this.$store.dispatch(`DELETE_SITE_INFO`,site.id).then(response=>{

            }).catch(error=>{

            })
            this.getSiteInfos()
        },
        
        editSite(site){
            console.log(site.id)   
            this.$store.dispatch(`UPDATE_SITE_INFO`,site).then(response=>{
                //this.$iziToast.success({position:'topRight',title:'Ok',message:"Site updated Successsfully"})
            }).catch(error=>{

            })
            this.$router.push({name:`site-add`})
            this.getSiteInfos()
             
        }
    }
}
</script>
<style  scoped>

</style>


