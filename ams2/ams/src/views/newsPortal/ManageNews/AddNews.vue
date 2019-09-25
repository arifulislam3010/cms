<template>
  <div>
    <b-card>
      <div class="row">
        <div class="col-sm-6 form-group">
          <label>Shoulder</label>
          <input v-model="news_data.shoulder" class="form-control" />
          <label>Headline</label>
          <input v-model="news_data.headline" class="form-control" />
          <label>Hanger</label>
          <input v-model="news_data.hanger" class="form-control" />
          <label>Reporter</label>
          <input v-model="news_data.reporter" class="form-control" />
          <hr />
          <label>Author</label>
          <Multiselect v-model="news_data.author" :options="user_list" track-by="id" label="name"></Multiselect>
          <label>User</label>
          <Multiselect v-model="news_data.user" :options="user_list" track-by="id" label="name"></Multiselect>
          <hr />
          <!-- <label>Content</label>
          <CKEditor></CKEditor>-->
          <label>Tags</label>
          <Multiselect
            v-model="news_data.news_tag"
            :options="tag_list"
            track-by="id"
            lable="text"
            :multiple=true
          ></Multiselect>
          <label>Content</label>
          <ckeditor :editor="editor" v-model="news_data.content" :config="editorConfig"></ckeditor>
          <hr />
          <label>Featured Photo</label>
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
              v-model="featured_img.title"
            />
          </div>
            <img v-if="featured_img.src" :src="featured_img.src" height="100px" width="100px"/>
            
          <hr />
          <label>More Photos</label>       
          <br>
          <b-button variant="success" style="margin-bottom:10px" @click="add_more_photo">add more</b-button>
          <!-- <div class="input-group mb-3"> -->
            <div v-for="(item,key) in more_photo_arr" :key="key">
              <MorePhoto :item="item" :idx="key" style="margin-bottom:10px"></MorePhoto>
              <hr>
            </div>
          <!-- </div>          -->
          <div></div>
          <hr />
          <label>Video URL</label>
          <input v-model="news_data.video_url" class="form-control" />
          <label>Video Position</label>
          <multiselect  v-model="news_data.video_position" :options="video_position_options"></multiselect>
        </div>
        <div class="col-sm-5">
          <label>Share at</label>
          <datetime width="300px" v-model="news_data.share_at"></datetime>
          <!-- <input class="form-control" /> -->
          <label>publish at</label>
          <datetime width="300px" v-model="news_data.publish_at"></datetime>
          <!-- <input class="form-control" /> -->
          <hr />
          <label>Status</label>
          <br />
          <toggle-button v-model="news_data.status" />
          <br />
          <label>Instant article</label>
          <br />
          <toggle-button v-model="news_data.instant_article" />
          <hr />
          <label>Topic</label>
          <Multiselect v-model="news_data.selected_topics" :options="topic_list" track-by="id" label="title"></Multiselect>
          <label>Category</label>
          <Multiselect v-model="news_data.selected_category" :options="[]"></Multiselect>
          <label>Division</label>
          <Multiselect
            v-model="news_data.selected_divisions"
            :options="division_list"
            track-by="id"
            label="name_eng"
            :multiple=true
          ></Multiselect>
          <label>Position</label>
          <Multiselect
            v-model="news_data.selected_position"
            :options="positions"
            track-by="id"
            label="name_eng"
          ></Multiselect>
          <label>Scroll</label>
          <Multiselect
            v-model="news_data.selected_scroll"
            :options="positions"
            track-by="id"
            label="name_eng"
          ></Multiselect>
        </div>
      </div>
      <hr>
      <div class="row">
         <div class="col-sm-7">
           <!-- <b-form-checkbox-group> -->
          <b-form-checkbox :inline=true v-model="test1">view</b-form-checkbox>  
          <b-form-checkbox :inline=true v-model="test2">cotinue creating </b-form-checkbox>  
          <b-form-checkbox :inline=true v-model="test3">continue editing</b-form-checkbox>  
          <!-- </b-form-checkbox-group> -->
          <!-- <input style="margin-right:5px" type="radio" v-model="test1" value="0">view
          <input style="margin-left:10px;margin-right:5px" type="radio" v-model="test2" value="0">cotinue creating 
          <input style="margin-left:10px;margin-right:5px" type="radio" v-model="test3" value="0">continue editing -->

         </div> 
         <div class="col-sm-3"></div>
         <div class="col-sm-2">
            <b-button variant="danger" >Reset</b-button>
            <b-button variant="success" style="margin-left:10px" @click="submit">Submit</b-button>
         </div>
      </div>
    </b-card>
    <ContentManager ref="content_manager_modal" :content="content"></ContentManager>
  </div>
</template>
<script>
import Vue from "vue";
import Multiselect from "vue-multiselect";
import CKEditor from "@ckeditor/ckeditor5-vue";
import { ToggleButton } from "vue-js-toggle-button";
import axios from "axios";
import { mapGetters, mapState } from "vuex";
import ClassicEditor from "@ckeditor/ckeditor5-build-classic";
import datetime from "vuejs-datetimepicker";
import ContentManager from '../../content/index'
import MorePhoto from "./MorePhoto"
Vue.component("ToggleButton", ToggleButton);
export default {
  components: { Multiselect, CKEditor, ToggleButton, datetime,ContentManager ,MorePhoto},
  data() {
    return {
      test1:'',
      test2:'',
      test3:'',
      more_photo_arr:[],
      featured_img:{
        id:'',
        title:'',
        src:''
      },

      content:{},
      division_list: "",
      video_position_options:[
        'top',
        'middle',
        'bottom',
      ],
      positions: [
        {
          id: 1,
          name_bng: "প্রাইমারি",
          name_eng: "Primary"
        },
        {
          id: 1,
          name_bng: "প্রধান শিরোনাম",
          name_eng: "Main Headline"
        },
        {
          id: 1,
          name_bng: "সেরা সংবাদ",
          name_eng: "Best News"
        },
        {
          id: 1,
          name_bng: "বিশেষ সংবাদ",
          name_eng: "Special News"
        }
      ],
      scrolls: [],
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
    };
  },
  computed: {
    ...mapGetters(["user_list", "tag_list", "topic_list","news_data"]),
    // ...mapState(['news_data'])
  },
  mounted: function() {
    this.getUserList();
    this.getTagList();
    this.getDivisons();
    this.getTopic();
  },
  watch:{
    content: function(val){
      console.log(val)
      this.featured_img.title = val.title
      this.featured_img.src    = val.file
      this.featured_img.id    = val.id
    },
  },
  methods: {
    submit: function(){

      this.news_data.tag_ids = this.news_data.news_tag.map((v)=>v.id)
      this.news_data.division_ids = this.news_data.selected_divisions.map((v)=>v.id)

      axios.post('/api/news/',this.news_data).then(response=>{
        console.log(response.data)
      })
    }, 
    add_more_photo: function(){
      let item = {}
      item.image_name = ''
      item.img_src = ''
      item.id = ''
      this.more_photo_arr.push(item)
    }, 
    ContentManagerModal(){
      this.$refs.content_manager_modal.openModal();
    },   
    getTopic() {
      this.$store.dispatch("FETCH_TOPICS");
    },

    getUserList: function() {
      this.$store.dispatch("FETCH_USER_LIST");
    },
    getTagList: function() {
      this.$store.dispatch("FETCH_TAGS");
    },
    getDivisons: function() {
      axios
        .get("/api/divisions")
        .then(response => [(this.division_list = response.data)]);
    }
  }
};
</script>
<style scoped>
</style>