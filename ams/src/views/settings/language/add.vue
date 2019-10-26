<template>
    <div>
        add a new language 
        {{langList.length}}
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
}
</script>
<style scoped>

</style>

