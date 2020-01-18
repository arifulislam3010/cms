<template>
<div>
  <b-modal title="Topic" hide-footer size="lg" v-model="largeModal" @ok="largeModal = false">
    <form  class="container">
      <b-row>
        <!-- {{this.current_topic}} -->
        <!-- {{this.content}} -->
        <b-col sm="12">
         
            <b-row>
              <b-col sm="12">
                <b-form-group>

                 <div class="row">
                    <div class="col-md-3">
                      <label for="Title">Topic Title*</label>
                    </div>

                    <div class="col-md-6">
                      <b-form-input type="textarea" name="Title" :style="`color:${current_topic.color}`" v-model="current_topic.title" v-validate="'required'" placeholder="Topic"></b-form-input>
                    </div>
                    <div class="col-sm-1">
                      <swatches v-model="current_topic.color" data-toggle="tooltip" title="select color"/>
                    </div>
                  </div>
                  <br/>
                  <div class="row">
                    <div class="col-sm-3">
                      <label for="">select parent </label>
                    </div>
                    <div class="col-sm-7">
                      <Treeselect v-model="current_topic.parent_id" :options="topic_parents"></Treeselect>
                    </div>
                  </div>
                  <br>
                  <div class="row">
                    <div class="col-md-3">
                      <label for="Title">Deadline</label>
                    </div>
                    <div class="col-md-7">
                       <datetime  v-model="current_topic.deadline"></datetime>
                    </div>
                  </div>
                    <br>  
                  <div class="row">
                    <div class="col-md-3">
                      <label for="Title">Header Design</label>
                    </div>
                    <div class="col-sm-7">
                       <multiselect :options="[`option1`,`option2`]" v-model="test"></multiselect>
                    </div>
                  </div>
                    <br>  
                  <div class="row">
                    <div class="col-md-3">
                      <label for="Title">Header Background</label>
                    </div>
                    <div class="col-sm-2">
                       <multiselect :options="[`option1`,`option2`]" v-model="test" placeholder=""></multiselect>
                    </div>
                    <div class="col-sm-2">
                      status * 
                    </div>
                    <div class="col-sm-3">
                       <multiselect :options="[`active`,`inactive`]" placeholder="" v-model="test"></multiselect>
              
                    </div>
                  </div>

                  <br/>
                  <div class="row">
                    <div class="col-md-3">
                      <label for="Title">Topic Image</label>
                    </div>
                    <div class="col-md-2">
                      
                       <!-- <b-btn class="btn-success" @click="contentManager" >Select Image</b-btn> -->
                        <button @click="contentManager" class="btn btn-outline-primary" type="button" >
                          <span v-if="!content.file">

                              Select
                              <i class="icon-picture"></i>
                          </span>
                          <img v-if="content.file" :src="content.file" height="50px" width="50px"/>

                        </button>                       
                    </div>
                    <div class="col-md-2">
                      status*
                    </div>
                    <div class="col-md-3">
                       <multiselect :options="[`active`,`inactive`]" placeholder="" v-model="test"></multiselect>
                    </div>

                  </div>

                  <br/>


                  <div class="row">
                    <div class="col-md-3">
                      <label for="Title">Topic Status*</label>
                    </div>
                    <div class="col-md-7">
                       <select
                              class="form-control"
                              id="exampleFormControlSelect2"
                              v-model="temp_status"
                            >
                          
                              <option>Active</option>
                              <option>Inactive</option>
                              
                            </select>
                    </div>
                  </div>
                  <br>
                  <div class="row">
                    <div class="col-md-3">
                      <!-- <label for="Title">Topic Status*</label> -->
                    </div>
                    <div class="col-md-7">
                      
                        <button v-if="!addLoader" @click="addTopic"  class="btn btn-success btn-block" >create</button>
                        <button v-if="addLoader" class="btn btn-primaryt btn-block" type="button" disabled>
                          <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                          Submitting...
                        </button>
                    </div>
                  </div>
                </b-form-group>
              </b-col>
            </b-row>

            <!-- <b-row>
              <b-col sm="12">
                <b-form-group>
                  <label for="parent">Parent</label>
                  <Treeselect v-model="newTopic.parent_id" :options="topic_parents"></Treeselect>

                  
                </b-form-group>
              </b-col>
            </b-row> -->
            
        </b-col>
      </b-row>
      <div class="form-group row">
        <div class="col-sm-12">
          <!-- <input v-if="!addLoader" type="submit" value="Submit" class="btn btn-primary pull-right" />
          <button v-if="addLoader" class="btn btn-primary pull-right" type="button" disabled>
            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
            Submitting...
          </button> -->
          <button
            v-if="!addLoader"
            @click.prevent="close"
            class="btn btn-primary pull-right"
            style="margin-right:5px;"
          >Close</button>
        </div>
      </div>
    </form>
  </b-modal>
  <ContentManager ref="add_topic_content_manager_modal" :content="content" :selected_content_type="'image'"></ContentManager>
  </div>
</template>

<script>
import Vue from "vue";
import ContentManager from "../../content/index";
import VeeValidate from "vee-validate";
Vue.use(VeeValidate);
import { type } from "os";
import { ADD_TOPIC, All_TOPIC } from "@/store/action.type";
// import { ADD_CONTACT_LOADER} from "../../store/mutation.type"
import { mapState, mapGetters } from "vuex";
import Treeselect from "@riophae/vue-treeselect";
import "@riophae/vue-treeselect/dist/vue-treeselect.css";
import datetime from "vuejs-datetimepicker";
import Swatches from 'vue-swatches'
import multiselect from "vue-multiselect"
// Import the styles too, globally
import "vue-swatches/dist/vue-swatches.min.css"
export default {
  components: { Treeselect ,datetime,ContentManager,Swatches,multiselect },
  data() {
    return {
      test : ``,
      errors:{},
      topic_color: 'black' ,
      selected_parent: "",
      content:{},
      largeModal: false,
      addLoader: false,
      temp_status : ``,
      newTopic: {
        title: "",
        parent_id: "",
        deadline: null,
        status:'Active',
        topic_image:''
      }
    };
  },
  watch:{
    temp_status : function (val){
      // this.current_topic.status = 1
      if(val == `Inactive`){
        this.current_topic.status = 0
      }
      if(val == `Active`){
        this.current_topic.status = 1
      }
      
    },
    // content :function(val){
    //   // alert(this.temp_key)
    //   this.newTopic.topic_image = this.content.file 
    // },
  },
  mounted() {
    //this.getTopics()
    this.addLoader = false 
    this.setStatus()
    this.setDates()
  },
  methods: {
    contentManager(){
      // console.log(this)
      this.$refs.add_topic_content_manager_modal.openModal();
      // this.newTopic.topic_image=this.content.file
    },    
    setStatus(){
      if(this.current_topic.status == 1){
        this.temp_status = `Active`
      }else{
        this.temp_status = `Inactive`
      }
    },
    addTopic() {
      this.addLoader = true 
      // if has id then update 
    
          if(this.current_topic.id){
            this.$store.dispatch(`UPDATE_TOPIC`,this.current_topic).then(response=>{
            this.$iziToast.success({position:'topRight',title:'Ok',message:"Topic Updated Successsfully"})
            this.$store.dispatch(`FETCH_TOPICS`).then(response=> this.addLoader = false) 
              this.addLoader = false 

            }).catch(error=>{
              this.addLoader = false 
            this.$iziToast.error({position:'topRight',title:'',message:"Topic Not Added "})

            })
            return ;
          }


      // this.$iziToast.success({position:'topRight',title:'Ok',message:"Topic Added Successsfully"})
      
      this.$store.dispatch('ADD_TOPIC',this.current_topic).then(response=>{
        this.$iziToast.success({position:'topRight',title:'Ok',message:"Topic Added Successsfully"})
        this.$parent.getTopics()
      }).catch(error=>{
        // this.$iziToast.error({position:'topRight',title:'error',message:error.data})
        this.errors = error.response.data.errors
        this.addLoader = false 
        this.$iziToast.error({position:'topRight',title:'',message:"Topic Not Added "})
        

      })
   },
    setDates(){
      this.newTopic.deadline = new Date().toISOString() 
      
    },

  
    openModal() {
      this.errors = {}
      this.largeModal = true;
      this.newTopic.title = null;
      this.newTopic.parent_id = null;
    },
    close() {
      this.largeModal = false;
    },

    addButton() {
      this.line.buttons.push({
        name: "",
        state: false,
        is_reported: ""
      });
    },
    deleteButton(index) {
      this.line.buttons.splice(index,1);
    }
  },
  computed: {
    ...mapGetters(["topic_list", "topic_parents","current_topic"])
  }
};
</script>

<style>
</style>
