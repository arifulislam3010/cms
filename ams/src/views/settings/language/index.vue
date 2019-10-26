<template>
    <div class="card">
        <div class="container-fluid">
        <div class="row">
            <div class="col-sm-5">
                <label for="">Title</label>
                <input class="form-control" placeholder="enter title"/>
            </div>
            <div class="col-sm-5">
                <label for="">Title</label>
                <input class="form-control" placeholder="enter Slug"/>                
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-6">
                <label>Adminfield</label>
                <br>
                <a href="#">add</a>
            </div>
            <div class="col-sm-6">
                <label>FrontendField</label>
                <br>
                <a href="#">add</a>
            </div>
        </div>
        <!-- <b-button @click="demofn">add</b-button> -->
        </div>
    </div>
</template>
<script>
import { mapGetters } from 'vuex'
export default {
    data(){
        return {

        }
    },
    computed:{
        ...mapGetters(["langList"]),
    },
    methods:{
        demofn(){
            // do samll and make it large 

            this.$router.push({name:'addLanguage'})
        }
    }
}
</script>
<style scoped>

</style>

