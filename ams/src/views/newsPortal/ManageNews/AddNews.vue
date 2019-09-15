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
          <Multiselect v-model="news_data.reporter" :options="user_list" track-by="id" label="name"></Multiselect>
          <!-- <input v-model="news_data.reporter" class="form-control" /> -->
          <hr />
          <label>Author</label>
          <Multiselect v-model="news_data.author" :options="user_list" track-by="id" label="name"></Multiselect>
          <!-- <label>User</label>
          <Multiselect v-model="news_data.user" :options="user_list" track-by="id" label="name"></Multiselect>
          <hr /> -->
          <!-- <label>Content</label>
          <CKEditor></CKEditor>-->
          <label>Tags</label>
          <Multiselect
            v-model="news_data.news_tags"
            :options="tag_list"
            track-by="id"
            label="title"
            :multiple="true"
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
              v-model="news_data.featured_img.title"
            />
          </div>
            <img v-if="news_data.featured_img.file" :src="news_data.featured_img.file" height="100px" width="100px"/>
            
          <hr />
          <label>More Photos</label>       
          <br>
          <b-button variant="success" style="margin-bottom:10px" @click="add_more_photo">add more</b-button>
          <!-- <div class="input-group mb-3"> -->
            <div v-for="(item,key) in news_data.more_photo_arr" :key="key">
              <MorePhoto :item="item" :idx="key" style="margin-bottom:10px"></MorePhoto>
              <hr>
            </div>
          <!-- </div>          -->
          <div></div>
          <hr />
          <!-- todo2 -->
          <label>Featured Video </label>
          <FeatVideo :item="news_data.featured_vid"></FeatVideo>
          <!-- <div class="input-group mb-3">
            <div class="input-group-prepend">
              <button @click="VideoManagerModal" class="btn btn-outline-primary" type="button">Select</button>
            </div>
            <input
              type="text"
              class="form-control"
              placeholder
              aria-label
              aria-describedby="basic-addon1"
              v-model="news_data.featured_vid.title"
            />
          </div>
            <img v-if="news_data.featured_vid.file" :src="news_data.featured_vid.file" height="100px" width="100px"/> -->
            
          <hr />
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
          <!-- <Multiselect v-model="news_data.selected_topics" :multiple=true :options="topic_list" track-by="id" label="title"></Multiselect> -->
          {{news_data.selected_topics}}
          <Treeselect
           :multiple="true"
           :flat="true"
           v-model="news_data.selected_topics"
           :options="topic_parents"
          
           ></Treeselect>
          <label>Category</label>
          {{news_data.selected_categories}}
           <!-- todo  -->
          <Treeselect
           :multiple="true"
           :flat="true"
           v-model="news_data.selected_categories"
           :options="category_parents"
          
           ></Treeselect>

          <label>Area</label>
          {{news_data.selected_areas}}
          <Treeselect
            :options="area_parents"
            :multiple="true"
            :flat="true"
            v-model="news_data.selected_areas"
          ></Treeselect>
   
          <!-- <label>Position</label>
          <Multiselect
            v-model="news_data.selected_positions"
            :options="positions"
            track-by="id"
            label="name_eng"
          ></Multiselect> -->
          <label>Scroll</label>
          <Multiselect
            v-model="news_data.selected_scrolls"
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
            <b-button variant="danger" @click="reset_news">Reset</b-button>
            <b-button variant="success" style="margin-left:10px" @click="submit">Submit</b-button>
         </div>
      </div>
    </b-card>
    <ContentManager ref="content_manager_modal" :content="content"></ContentManager>
    <ContentManager ref="video_manager_modal" :content="vid_content"></ContentManager>
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
import FeatVideo from "./FeatVideo"
import Treeselect from '@riophae/vue-treeselect'
import '@riophae/vue-treeselect/dist/vue-treeselect.css'
Vue.component("ToggleButton", ToggleButton);
export default {
  components: { 
    Multiselect,
    CKEditor, 
    ToggleButton, 
    datetime,
    ContentManager ,
    MorePhoto,
    Treeselect,
    FeatVideo,
  },
  data() {
    return {
      test1:[],
      test2:'',
      test3:'',
      is_update:'',
      TreeSelectMultipleOption:true,
      valueConsistsOf:'BRANCH_PRIORITY',
      more_photo_arr:[],
      featured_img:{
        id:'',
        title:'',
        src:''
      },
      featured_vid:{
        id:'',
        title:'',
        src:''
      },

      content:{},
      vid_content:{},
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
    ...mapGetters([
      "user_list",
      "tag_list", 
      "topic_list",
      "news_data",
      "category_list",
      "category_parents",
      "area_list",
      "area_parents",
      "topic_parents",
      "area_list",
      "area_parents",
      ]),
    // ...mapState(['news_data'])
  },
  mounted: function() {
    this.getReporters();
    this.getUserList();
    this.getTagList();
    this.getAreas();
    this.getTopic();
    this.getCategories()
  },
  watch:{
    content: function(val){
      console.log(val)
      this.news_data.featured_img.title = val.title
      this.news_data.featured_img.file    = val.file
      this.news_data.featured_img.id    = val.id
    },

    vid_content: function(val){
      console.log(val)
      this.news_data.featured_vid.title = val.title
      this.news_data.featured_vid.file    = val.file
      this.news_data.featured_vid.id    = val.id
    },

  },
  methods: {
    reset_news: function(){
      this.$store.dispatch('REST_NEWS')
    },
    submit: function(){
      // todo1
      console.log(this.news_data.tag_ids);

     if(this.news_data.tag_ids.length) this.news_data.tag_ids = this.news_data.news_tags.map((v)=>v.id)
     if(this.news_data.area_ids.length)this.news_data.area_ids = this.news_data.selected_areas.map((v)=>v.id)
     this.news_data.featured_image_id = this.news_data.featured_img.id
     this.news_data.content_ids = this.news_data.more_photo_arr.map( v => v.id)
     this.news_data.tag_ids = this.news_data.news_tags.map(v => v.id)
      // console.log(this.news_data)
      // return 
      // axios.post('/api/post/',this.news_data).then(response=>{
      //   console.log(response.data)
      // })
      if(this.news_data.id == null){
        this.$store.dispatch('ADD_NEWS',this.news_data).then(response=>{
            this.$iziToast.success({position:'topRight',title:'Ok',message:"News Added Successsfully"})
        }).catch(error=>{
            this.$iziToast.error({position:'topRight',title:'error',message:"News not added"})
        })
      }else{
        let payload = {
          data:this.news_data,
          id:this.news_data.id ,
        }
        this.$store.dispatch('UPDATE_NEWS',payload).then(response=>{
            this.$iziToast.success({position:'topRight',title:'Ok',message:"News Added Successsfully"})
        }).catch(error=>{
            this.$iziToast.error({position:'topRight',title:'error',message:"News not added"})
        })        
      }
    }, 
    add_more_photo: function(){
      let item = {}
      item.title = ''
      item.file = ''
      item.id = ''
      item.mark = true // marking newsly created item 
      this.news_data.more_photo_arr.push(item)
    }, 
    ContentManagerModal(){
      this.$refs.content_manager_modal.openModal();
    },   
    VideoManagerModal(){
      this.$refs.video_manager_modal.openModal();
    },   
    getReporters: function(){

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
    getAreas: function() {
      this.$store.dispatch("FETCH_AREAS")
    },
    getCategories(){
        this.$store.dispatch('FETCH_CATEGORIES').then(response=>{

        }).catch(error=>{
        
        })
    }, 
  }
};
</script>
<style scoped>
</style>