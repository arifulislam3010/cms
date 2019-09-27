<template>
  <div>
    <div class="input-group mb-3">
      
      <div class="input-group-prepend">
        <button @click="ContentManagerModal" class="btn btn-outline-primary" type="button">Select</button>
      </div>
      <input
        type="text"
        class="form-control"
        placeholder
        aria-label
        aria-describedby="basic-addon1"
        v-model="item.title"
      />
    </div>
    <img v-if="item.file" :src="get_file(item.file)" height="100px" width="100px" />
    <br>
    <b-button style="margin-top:5px" variant="danger" @click="del_photo">Delete</b-button>
    <ContentManager ref="content_manager_modal" :content="content"></ContentManager>
  </div>
</template>
<script>
import axios from "axios"
import {mapGetters} from "vuex"
import ContentManager from "../../content/index";

export default {
  props:['item'],
  components: { ContentManager },
  data() {
    return {
      content: {}
    };
  },
  watch: {
    content: function(val) {
        this.$parent.news_data.featured_vid.id = val.id
        this.$parent.news_data.featured_vid.file = val.file
        this.$parent.news_data.featured_vid.title = val.title
    }
  },
  computed:{
    
     ...mapGetters(['news_data'])  
  },
  methods: {

    get_file: function(arg){
      if(this.news_data.is_update){
        return `${axios.defaults.baseURL}/uploads/${arg}`
      }else{
        return arg 
      }
    },
    ContentManagerModal() {
      this.$refs.content_manager_modal.openModal();     
    },
    del_photo(){
        
    },
  }
};
</script>
<style scoped>
</style>