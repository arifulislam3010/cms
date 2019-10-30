<template>
    <div>
        <!-- show as list/table view with delete and update options + add button on top which navigates to add page   -->
        {{siteInfoList}}
    </div>
</template>
<script>
import {mapGetters} from "vuex"
export default {
    data(){
        return {

        }
    },
    computed:{
        ...mapGetters(['siteInfoList'])
    },
    mounted(){
        this.getSiteInfos()
    },
    methods:{
        getSiteInfos(){
            this.$store.dispatch(`FETCH_SITE_INFOS`).then(response=>{

            }).catch(error=>{

            })
        }
    }
}
</script>
<style  scoped>

</style>


