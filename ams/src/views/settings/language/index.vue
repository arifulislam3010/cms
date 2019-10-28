<template>
    <div>
        language list  
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

