<template>
  <div>
    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <button @click="ContentManagerModal" class="btn btn-outline-primary" type="button">Select
          <span>
            <i class="icon-picture"></i>
          </span>
        </button>
      </div>
      <input
        type="text"
        class="form-control"
        placeholder="enter caption"
        aria-label
        aria-describedby="basic-addon1"
        v-model="item.title"
      />
      <i class="icon-trash"
        @click="del_photo"
        data-toggle="tooltip" title="remove"
        style="font-size:25px;color:red;margin-top:1px;margin-left:10px;" >  
      </i>
    </div>
    <img v-if="item.file" :src="item.file" height="100px" width="100px" />
    <br>
    <!-- <b-button style="margin-top:5px" variant="danger" @click="del_photo">Delete</b-button> -->
    <ContentManager ref="content_manager_modal" :content="content" :selected_content_type="`image`"></ContentManager>
  </div>
</template>
<script>
import axios from "axios"
import ContentManager from "../../content/index";
export default {
  props:['item','idx'],
  components: { ContentManager },
  data() {
    return {
      image_name: "",
      img_src: "",
      content: {}
    };
  },
  watch: {
    content: function(val) {
      this.item.title = val.title
      this.item.file = val.file
      this.item.id = val.id
      // this.item = {...val}
    }
  },
  computed:{
    
    
    },
  methods: {

    get_src: function(item){
      if(item.mark == true){ // if the item is new 
          return item.file   
        }else{
          return `${axios.defaults.baseURL}/uploads/${item.file}`
      }
    },

    ContentManagerModal() {
      this.$refs.content_manager_modal.openModal();
    },
    del_photo(){
        this.$parent.news_data.more_photo_arr.splice(this.idx,1)
    },
  }
};
</script>
<style scoped>
</style>