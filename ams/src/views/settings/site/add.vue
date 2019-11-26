<template ref="add_lang">
  <div class="card">
    <div class="card-body">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-5">
            <label for>Title</label>
            <input v-model="title" class="form-control" placeholder="enter title" />
          </div>
        </div>
        <div class="row">
          <div class="col-sm-5">
            <label for>Slug</label>
            <input v-model="slug" class="form-control" placeholder="enter title" />
          </div>
        </div>
        <hr />
        <div class="row">
            
          <div class="col-sm-6">
            <label>Contents</label>
            <br />
            <div class="row" v-for="(i,k) in contents" :key="k" style="margin-bottom:10px">  
              
              
            </div>
            <!-- loop -->
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add_word">
                Add Slot
              </button>
          </div>
          {{content_list}}
          
        </div>
      </div>
    </div>
    <div class="card-footer">
        <button class="btn btn-success pull-right" @click="()=>{}"> save</button>
    </div>
    <AddWord  ref="add_word"></AddWord>
    <ContentManager ref="content_manager_modal"></ContentManager>
  </div>
</template>



<script>
import axios from "axios";
import AddWord from "./word";
import CKEditor from "@ckeditor/ckeditor5-vue";
import { mapGetters } from "vuex";
import ClassicEditor from "@ckeditor/ckeditor5-build-classic";
import { ADD_SITE_INFO, UPDATE_SITE_INFO } from "@/store/action.type";
import ContentManager from "../../content/index"
import { type } from "os";



export default {
  components: {
    CKEditor,
    ClassicEditor,
    ContentManager,
    AddWord
  },

  data() {
    return {
      content_list : [] ,
      modal: true,
      titleS: "",
      selectedType:"",
      editor: ClassicEditor,
      editorConfig: {
        fullPage: false,
        resize_enabled: false,
        toolbar: {
          items: [
            "bold",
            "italic",
            "link",
            "Blockquote",
            "BulletedList",
            "NumberedList",
            "Underline",
            "undo",
            "redo"
          ]
        }
      },

  
    id:'',
    title:'',
    slug:'',
    contents:[]
  
    };
  },
  computed: {
    ...mapGetters(["site_list","contentList"]),
    getContents(){
      return this.content_list.length
    }
  },
  mounted(){
     this.handelUpdate()
  },

  methods: {
    addData(arg){
      console.log('addiing data')
      this.content_list.push(arg)
      console.log(this.content_list)
    },
    handelUpdate(){
      
    },
      demofn() {
          // do samll and make it large
      this.$router.push({ name: "addSite" });
    },



     edit_content(i,k){
        this.word_type = `front`
        this.$refs.add_word.is_update = true 
        this.$refs.add_word.update_idx = k 
        this.$refs.add_word.title = Object.keys(i).pop()
        this.$refs.add_word.content = Object.values(i).pop()      
    },

    save(){
      // flat nested object to simple object 

      this.$store.dispatch(`ADD_LANGUAGE`,payload).then(response=>{
        this.$iziToast.success({position:'topRight',title:'Success',message:``})       
      }).catch(error=>{
        this.$iziToast.success({position:'topRight',title:'Success',message:``})       
      })
    },


    ContentManagerModal() {
      this.$refs.content_manager_modal.openModal()
    },
    ContentVideoModal(){
      this.$refs.content_video_modal.openModal()
    }
  }
};
</script>

<style  scoped>
</style>


