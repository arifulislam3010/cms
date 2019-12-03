<template>
  <div>
    <b-card v-if="auth_permission.news_create">
      <div class="row">
        <div class="col-sm-8 form-group">
          <label>Shoulder
            <i class="icon-user"></i>
          </label>
          <!-- <ckeditor :editor="editor" v-model="news_data.shoulder" :config="editorConfig"></ckeditor>   -->
        <quill-editor :content="news_data.content"
                        :options="config2"
                        @change="()=>{}">
          </quill-editor>             
          <!-- todo        -->
         <!-- <yimo-vue-editor :config="config1" v-model="news_data.shoulder"> </yimo-vue-editor> -->
          
          <!-- <input v-model="news_data.shoulder" class="form-control" /> -->
          <!-- <p v-if="news_data.shoulder.length<1" style="color:red">*required</p> -->
          <div v-show="errors.hasOwnProperty('shoulder')" class="help-block alert alert-danger">
            <p v-for="(i,k) in errors[`shoulder`]" :key="k">
              {{i}}
            </p>
          </div>          
          <label>Headline
            <i class="icon-pin"></i>
          </label>
          <!-- <ckeditor :editor="editor" v-model="news_data.headline" :config="editorConfig"></ckeditor> -->
        <quill-editor :content="news_data.content"
                        :options="config2"
                        @change="()=>{}">
          </quill-editor>          
          <!-- <input v-model="news_data.headline" class="form-control" /> -->
          <!-- <p v-if="news_data.headline.length<1" style="color:red">*required</p> -->
          <div v-show="errors.hasOwnProperty('headline')" class="help-block alert alert-danger">
            <p v-for="(i,k) in errors[`headline`]" :key="k">
              {{i}}
            </p>
          </div>           
          <label>Hanger
            <i class="icon-paper-clip"></i>
          </label>
          <input v-model="news_data.hanger" class="form-control"  placeholder="enter hanger"/>
          <!-- <p v-if="news_data.hanger.length<1" style="color:red">*required</p> -->
          <label>Reporter
            <i class="icon-pencil"></i>
          </label>
          <Multiselect v-model="news_data.reporter" :options="user_list" track-by="id" label="name"></Multiselect>
          <div v-show="errors.hasOwnProperty('reporter')" class="help-block alert alert-danger">
            <p v-for="(i,k) in errors[`reporter`]" :key="k">
              {{i}}
            </p>
          </div>   
          <div class="row">       
            <div class="col-sm-11">
            <label>Tags
              <i class="icon-tag"></i>
            </label>
              <Multiselect
                v-model="news_data.news_tags"
                :options="tag_list"
                track-by="id"
                label="title"
                :multiple="true"
              >hello</Multiselect>
            </div>
            <div  class="col-sm-1" style="margin-top:38px;">
              <i class="icon-plus" style="font-size:20px;" data-toggle="tooltip" title="add tag"></i>
            </div>
        </div>

          <label>Content
            <i class="icon-book-open"></i>
          </label>
          <!-- <ckeditor :editor="editor" v-model="news_data.content" :config="editorConfig"></ckeditor> -->
          <!-- <p v-if="news_data.content.length<10" style="color:red">*required at least 10 charecters</p>          -->
          <quill-editor :content="news_data.content"
                        :options="{}"
                        @change="()=>{}">
          </quill-editor>
          <div v-show="errors.hasOwnProperty('content')" class="help-block alert alert-danger">
            <p v-for="(i,k) in errors[`content`]" :key="k">
              {{i}}
            </p>
          </div>           
          <hr />
          
          <label>Featured Photo
            <i class="icon-picture"></i>
          </label>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <button @click="ContentManagerModal" class="btn btn-outline-primary" type="button">Select
                <i class="icon-picture"></i>
              </button>
            </div>
            <input
              type="text"
              class="form-control"
              placeholder
              aria-label
              aria-describedby="basic-addon1"
              v-model="news_data.featured_img.title"
            />
            <i class="icon-trash"
              @click="()=>{}"
              data-toggle="tooltip" title="remove"
              style="font-size:25px;color:red;margin-top:1px;margin-left:10px;" >  
            </i>
          </div>
            <img v-if="news_data.featured_img.file" :src="news_data.featured_img.file" height="100px" width="100px"/>
            <!-- <img v-if="news_data.featured_img.file" :src="get_file(news_data.featured_img.file)" height="100px" width="100px"/> -->
          <hr />
          <!-- <label>More Photos</label>        -->
          <br>

          <!-- <div class="input-group mb-3"> -->
            <div v-for="(item,key) in news_data.more_photo_arr" :key="key">
              <MorePhoto :item="item" :idx="key" style="margin-bottom:10px"></MorePhoto>
              <hr>
            </div>
          <!-- </div>          -->
          <b-button variant="success" style="margin-bottom:10px" @click="add_more_photo">add more
            <span> <i class="icon-plus "></i></span>
          </b-button>

          <div></div>
          <hr />
          <!-- todo2 -->
          <label>Featured Video 
            <i class="icon-film"></i>
          </label>
          <FeatVideo :item="news_data.featured_vid"></FeatVideo>    
          <hr />
          <label>Video Position
            <i class="icon-size-fullscreen "></i>
          </label>
          <multiselect  v-model="news_data.video_position" :options="video_position_options"></multiselect>
        </div>
        <div class="col-sm-3">
          <label>publish at
            <i class="icon-paper-plane"></i>
          </label>
          <datetime width="300px" v-model="news_data.publish_at"></datetime>
          <!-- <datetime width="300px" ></datetime> -->
          
          <label>Share at
            <i class="icon-share-alt "></i>
          </label>
          <datetime width="300px" v-model="news_data.share_at"></datetime>
          <!-- <input class="form-control" /> -->
          <!-- <input class="form-control" /> -->
          <hr />
          <!-- <label>Status</label>
          <br />
          <toggle-button v-model="news_data.status" /> -->
          <br />
          <label>Instant article
            <span> 
             <i class="icon-social-twitter "> </i> 
              <i class="icon-social-facebook"> </i> 
             <i class="icon-social-instagram "> </i> 
             </span>
          </label>
          <br />
          <toggle-button v-model="news_data.instant_article" />
          <hr />
          <label>Topic
            <i class="icon-list "></i>
          </label>
          <!-- <Multiselect v-model="news_data.selected_topics" :multiple=true :options="topic_list" track-by="id" label="title"></Multiselect> -->
          <!-- {{news_data.selected_topics}} -->
          <Treeselect
           :multiple="true"
           :flat="true"
           v-model="news_data.selected_topics"
           :options="topic_parents"
          
           ></Treeselect>
          <label>Category
            <i class="icon-layers "></i>
          </label>
          <!-- {{news_data.selected_categories}} -->
           <!-- todo  -->
          <Treeselect
           :multiple="true"
           :flat="true"
           v-model="news_data.selected_categories"
           :options="category_parents"
          
           ></Treeselect>

          <label>Area
            <!-- <i class="icon-map"></i> -->
            <i class="icon-location-pin"></i>
          </label>
          <!-- {{news_data.selected_areas}} -->
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
          <label>Scroll
            <i class="icon-link"></i>
          </label>
          <Treeselect
            v-model="news_data.selected_scrolls"
            :options="scroll_parents"
            :multiple="true"
            :flat="true"
          ></Treeselect>
          <!-- <Multiselect
            v-model="news_data.selected_scrolls"
            :options="positions"
            track-by="id"
            label="name_eng"
          ></Multiselect> -->
        </div>
      </div>
      <hr>
      <div class="row">
         <div class="col-sm-7">
           <!-- <b-form-checkbox-group> -->
          <b-form-checkbox :inline=true v-model="view_news">view </b-form-checkbox>  
          <b-form-checkbox :inline=true v-model="continue_creating" >cotinue creating </b-form-checkbox>  
          <b-form-checkbox :inline=true v-model="continue_editing" >continue editing</b-form-checkbox>  
          <!-- </b-form-checkbox-group> -->
          <!-- <input style="margin-right:5px" type="radio" v-model="test1" value="0">view
          <input style="margin-left:10px;margin-right:5px" type="radio" v-model="test2" value="0">cotinue creating 
          <input style="margin-left:10px;margin-right:5px" type="radio" v-model="test3" value="0">continue editing -->

         </div> 
         <div class="col-sm-3"></div>
         <div class="col-sm-2">
            <b-button variant="danger" @click="reset_news" >Reset</b-button>
            <button v-if="addLoader" style="margin-left:10px" class="btn btn-primary pull-right" type="button" disabled>
                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                wait
            </button>
            <b-button v-else variant="success" style="margin-left:10px" @click="submit">{{submit_btn_txt}}</b-button>
         </div>
      </div>
    </b-card>
    <div v-else class="card"> 
      <h2>you don`t have permission to add news </h2>
    </div>
    <ContentManager ref="content_manager_modal" :content="content" :selected_content_type="'image'"></ContentManager>
    <ContentManager ref="video_manager_modal" :content="vid_content" ></ContentManager>
    <Loader v-if="loading"></Loader>
  </div>
</template>
<script>
import Vue from "vue";
import Multiselect from "vue-multiselect";

import { ToggleButton } from "vue-js-toggle-button";
import axios from "axios";
import { mapGetters, mapState } from "vuex";
import datetime from "vuejs-datetimepicker";
import ContentManager from '../../content/index'
import MorePhoto from "./MorePhoto"
import FeatVideo from "./FeatVideo"
import Treeselect from '@riophae/vue-treeselect'
import '@riophae/vue-treeselect/dist/vue-treeselect.css'
import Loader from "@/views/common/Loader";
// import Base64UploadAdapter from '@ckeditor/ckeditor5-upload/src/adapters/base64uploadadapter';
import { quillEditor } from 'vue-quill-editor'
//
// ClassicEditor
//     .create( document.querySelector( '#editor' ), {
//         // plugins: [ Base64UploadAdapter, ],
//         toolbar: [ ]
//     } )
//     .then( )
//     .catch();
    
Vue.component("ToggleButton", ToggleButton);
export default {
  components: { 
    Multiselect,
    ToggleButton, 
    datetime,
    ContentManager ,
    MorePhoto,
    Treeselect,
    FeatVideo,
    Loader,
    // ClassicEditor,
    quillEditor

  },
  data() {
    return {
      // test1:[],
      // test2:'',
      // test3:'',
      errors:{},
      view_news:true ,
      continue_editing: false ,
      continue_creating: false ,
      submit_btn_txt : "Submit",
      loading:false ,
      addLoader:false,
      is_update:'',
      TreeSelectMultipleOption:true,
      valueConsistsOf:'BRANCH_PRIORITY',
      more_photo_arr:[],
      config2: {
      modules: {
                toolbar: [
                  ['bold', 'italic', 'underline', 'strike','blockquote', 'code-block',{ 'align': [] },{ 'color': [] }, { 'font': [] },{ 'background': [] }],
          
                ],
                syntax: {
                  highlight: text => hljs.highlightAuto(text).value
                }
              }
        
        
      }
      ,
      config1: {
      modules: {
                toolbar: [
                  ['bold', 'italic', 'underline', 'strike'],
                  ['blockquote', 'code-block'],
                  [{ 'header': 1 }, { 'header': 2 }],
                  [{ 'list': 'ordered' }, { 'list': 'bullet' }],
                  [{ 'script': 'sub' }, { 'script': 'super' }],
                  [{ 'indent': '-1' }, { 'indent': '+1' }],
                  [{ 'direction': 'rtl' }],
                  [{ 'size': ['small', false, 'large', 'huge'] }],
                  [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
                  [{ 'font': [] }],
                  [{ 'color': [] }, { 'background': [] }],
                  [{ 'align': [] }],
                  ['clean'],
                  ['link', 'image', 'video']
                ],
                syntax: {
                  highlight: text => hljs.highlightAuto(text).value
                }
              }
        
        
      }
      ,
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
      // editor: ClassicEditor,
      editorConfig: {
        fullPage: false,
        resize_enabled: false,
        toolbar: {
          items: [
            "heading",
            "|",
            "bold",
            "italic",
            "link",
            "Blockquote",
            "BulletedList",
            "NumberedList",
            "Underline",
            "undo",
            "redo",
            "mediaEmbed",
            // "imageUpload",
          ]
        },

        // heading: {
        //   options: [
        //     {model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph'},
        //     {model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1'},
        //     {model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2'},
        //     {model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3'},
        //     {model: 'heading4', view: 'h4', title: 'Heading 4', class: 'ck-heading_heading4'}
        //   ]
        // }

      },
    };
  },
  computed: {
    ...mapGetters([
      "auth_permission",
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
      "scroll_list",
      "scroll_parents",
      ]),
    // ...mapState(['news_data'])
  },
  mounted: function() {
    // ()=> ;  
    this.setDates()
    this.handel_update()
    this.getReporters();
    this.getUserList();
    this.getTagList();
    this.getAreas();
    this.getTopic();
    this.getCategories()
    this.getScrolls()
  },
  watch:{
    [`news_data.news_tags`](val){

    },
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

    // view_news: function(){
    //   this.continue_editing = false 
    //   this.continue_creating = false
    //   console.log(this.continue_editing)
    // },

    continue_creating: function(){
      // this.view_news = false
      console.log(this.continue_creating)
      if( this.continue_editing )this.continue_editing = false 
    },
    continue_editing : function(){
      // this.view_news = false 
       
      if(this.continue_creating)this.continue_creating = false   
    },


  },
  methods: {
    setDates(){
      this.news_data.publish_at = new Date().toISOString() 
      this.news_data.share_at = new Date().toISOString() 
    },
    handel_update: function (){
      // console.log(ClassicEditor.defaultConfig.toolbar)
      this.loading = true 
      let ob = this.$route.params 
      if(ob.id){
          this.$store.dispatch('NEWS_DETAIL',ob.id).then(response=>{
            this.loading = false 
          }).catch(error=>{
            this.loading = false 
          })
      } 

      if(this.news_data.is_update){
        this.submit_btn_txt = "Update"
      }else{
        this.submit_btn_txt = "Submit"
        // this.reset_news()
      }
    },
    get_file: function(arg){
      if(this.news_data.is_update){
        return `${axios.defaults.baseURL}/uploads/${arg}`
      }else{
        return arg 
      }
    },
    reset_news: function(){
      this.$store.dispatch('REST_NEWS')
      this.news_data.is_update = false 
      if(this.news_data.is_update){
        this.submit_btn_txt = "Update"
      }else{
        this.submit_btn_txt = "Submit"
      }
    },
    submit: function(){
      // todo1

     if(this.news_data.tag_ids.length) this.news_data.tag_ids = this.news_data.news_tags.map((v)=>v.id)
     if(this.news_data.area_ids.length)this.news_data.area_ids = this.news_data.selected_areas.map((v)=>v.id)
     this.news_data.featured_image_id = this.news_data.featured_img.id
     this.news_data.featured_video_id = this.news_data.featured_vid.id
     this.news_data.content_ids = this.news_data.more_photo_arr.map( v => v.id)
     this.news_data.tag_ids = this.news_data.news_tags.map(v => v.id)
      // console.log(this.news_data)
      // return 
      // axios.post('/api/post/',this.news_data).then(response=>{
      //   console.log(response.data)
      // })
      this.addLoader = true 
      if(this.news_data.id == null){
        this.$store.dispatch('ADD_NEWS',this.news_data).then(response=>{
            this.$iziToast.success({position:'topRight',title:'Ok',message:"News Added Successsfully"})
            this.addLoader =  false
            this.after_submit()
        }).catch(error=>{
            this.$iziToast.error({position:'topRight',title:'error',message:"News not added"})
            this.addLoader = false 
            this.errors =  error.response.data.errors 
        })
      }else{
        let payload = {
          data:this.news_data,
          id:this.news_data.id ,
        }
        this.$store.dispatch('UPDATE_NEWS',payload).then(response=>{
            this.$iziToast.success({position:'topRight',title:'Ok',message:"News Updated Successsfully"})
            this.addLoader = false
            this.after_submit()
        }).catch(error=>{
            this.$iziToast.error({position:'topRight',title:'error',message:"News not added"})
            this.addLoader = false 
            this.errors =  error.response.data.errors 
        })        
      }
    }, 
    after_submit: function(){
      if(this.view_news){
        this.$router.push({name:'ManageNews'})
      }else if(this.continue_creating){
        this.reset_news()
      }else if(this.continue_editing){

      }
    },  
    goToAddNews(){

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
      this.loading = true
      this.$store.dispatch("FETCH_TOPICS").then(response=>{
        this.loading = false
      }).catch(error=>{
        this.loading = false
      });
    },

    getUserList: function() {
      this.loading = true 
      this.$store.dispatch("FETCH_USER_LIST").then(response=>{
        this.loading = false 
      }).catch(error=>{
        this.loading = false
      });
    },
    getTagList: function() {
      this.loading = true
      this.$store.dispatch("FETCH_TAGS").then(response=>{
        this.loading = false
        // this.news_data.news_tags.unshift({
        //   'title' : 'add new ',
        //   'id':0
        // })
      }).catch(error=>{
        this.loading = false
      });
    },
    getAreas: function() {
      this.loading = true
      this.$store.dispatch("FETCH_AREAS").then(response=>{
        this.loading = false
      }).catch(error=>{
        this.loading = false
      })
    },
    getCategories(){
        this.loading = true
        this.$store.dispatch('FETCH_CATEGORIES').then(response=>{
          this.loading = false
        }).catch(error=>{ 
          this.loading = false
        })
    }, 
    getScrolls(){
      this.loading = true
      this.$store.dispatch('FETCH_SCROLLS').then(response=>{
        this.loading = false
      }).catch(error=>{
        this.loading = false   
      })
    }
  }
};
</script>
<style scoped>
div.inline { float: right; }
</style>