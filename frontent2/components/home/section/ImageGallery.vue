<template>
    <section>
        <div>
            {{`image gallery `}}
            {{imgs}}
        </div>
    </section>
</template>
<script>
import axios from "@/plugins/axios"
export default {
    data(){
        return {
            imgs : [],
        }
    },
    mounted(){
        this.fetchImgs()
    },
    methods:{
        fetchImgs(){
            axios.get('/api/frontend/album/imgs').then((response) => {      
                this.imgs = response.data;
                // this.mainLeadLoading = false;
                // this.setFullView() 
            }).catch(function (error) {    
                // this.mainLeadLoading = true;
            });            
        }
    }
}
</script>