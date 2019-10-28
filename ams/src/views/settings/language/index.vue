<template>
    <div >
        <div class="card"> 
            <div class="card-header">
                <label>admin panel language </label>
            </div>
            <multiselect :options=langList track-by="id" label="title"></multiselect>
        </div>
        <!-- {{langList}} -->
        <!-- {{currentLang}} -->
        <!-- {{"alu" | test_filter}} -->
        <!-- {{"dashboard" | lang_filter}} -->
        <div class="card">
            <table class="table table-sm">
                <thead>
                    <tr>
                        <th>idx</th>
                        <th>slug</th>
                        <th>title</th>
                        <th>actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(i,k) in langList" :key="k">
                        <td>{{key+1}}</td>
                        <td>{{i.slug}}</td>
                        <td>{{i.title}}</td>
                        <td>
                            <a href="#">action</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>
<script>
import Multiselect from "vue-multiselect"
import { mapGetters } from 'vuex'
export default {
    components:{
        Multiselect
    },
    data(){
        return {
            
        }
    },
    computed:{
        ...mapGetters(["langList","currentLang"]),
    },
    mounted(){
        this.getLangList()
    },
    methods:{
        getLangList(){
            this.$store.dispatch(`FETCH_LANGUAGES`)
        }
    },
}
</script>
<style scoped>

</style>

