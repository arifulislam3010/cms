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
        v-model="item.image_name"
      />
    </div>
    <img v-if="item.img_src" :src="item.img_src" height="100px" width="100px" />
    <br>
    <b-button style="margin-top:5px" variant="danger" @click="del_photo">Delete</b-button>
    <ContentManager ref="content_manager_modal" :content="content"></ContentManager>
  </div>
</template>
<script>
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
      this.item.image_name = val.title
      this.item.img_src = val.file
      this.item.id = val.id
    }
  },
  methods: {
    ContentManagerModal() {
      this.$refs.content_manager_modal.openModal();
    },
    del_photo(){
        this.$parent.more_photo_arr.splice(this.idx,1)
    }
  }
};
</script>
<style scoped>
</style>