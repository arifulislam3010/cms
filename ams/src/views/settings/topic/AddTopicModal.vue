<template>
  <b-modal title="Topic" hide-footer size="lg" v-model="largeModal" @ok="largeModal = false">
    <form @submit.prevent="addTopic" class="container">
      <b-row>
        {{this.current_topic}}
        {{this.content}}
        <b-col sm="12">
         
            <b-row>
              <b-col sm="12">
                <b-form-group>

                 <div class="row">
                    <div class="col-md-3">
                      <label for="Title">Topic Title*</label>
                    </div>

                    <div class="col-md-7">
                      <b-form-input type="textarea" name="Title" style="height:90px" v-model="current_topic.title" v-validate="'required'" placeholder="Topic"></b-form-input>
                    </div>
                  </div>
                  <br/>

                  <div class="row">
                    <div class="col-md-3">
                      <label for="Title">Deadline</label>
                    </div>
                    <div class="col-md-7">
                       <datetime width="435px" v-model="current_topic.deadline"></datetime>
                    </div>
                  </div>

                  <br/>
                  <div class="row">
                    <div class="col-md-3">
                      <label for="Title">Topic Image</label>
                    </div>
                    <div class="col-md-3">
                      
                       <b-btn class="btn-success" @click="contentManager" >Select Image</b-btn>
                    </div>
                    <div class="col-md-3">
                      <img :src="content.file" style="height:120px;width:150px"/>
                    </div>

                  </div>

                  <br/>


                  <div class="row">
                    <div class="col-md-3">
                      <label for="Title">Status*</label>
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
          <input v-if="!addLoader" type="submit" value="Submit" class="btn btn-primary pull-right" />
          <button v-if="addLoader" class="btn btn-primary pull-right" type="button" disabled>
            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
            Submitting...
          </button>
          <button
            v-if="!addLoader"
            @click.prevent="close"
            class="btn btn-success pull-right"
            style="margin-right:5px;"
          >Close</button>
        </div>
      </div>
       <ContentManager ref="add_topic_content_manager_modal" :content="content" :selected_content_type="'image'"></ContentManager>
    </form>
  </b-modal>
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

export default {
  components: { Treeselect ,datetime,ContentManager},
  data() {
    return {
      errors:{},
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
    this.setStatus()
    this.setDates()
  },
  methods: {
    setStatus(){
      if(this.current_topic.status == 1){
        this.temp_status = `Active`
      }else{
        this.temp_status = `Inactive`
      }
    },
    addTopic() {
      // if has id then update 
      if(this.current_topic.id){
        this.$store.dispatch(`UPDATE_TOPIC`,this.current_topic).then(response=>{
         this.$iziToast.success({position:'topRight',title:'Ok',message:"Topic Updated Successsfully"})
         this.$store.dispatch(`FETCH_TOPICS`) 
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
      })
   },
    setDates(){
      this.newTopic.deadline = new Date().toISOString() 
      
    },
    contentManager(){
      this.$refs.add_topic_content_manager_modal.openModal();
      // this.newTopic.topic_image=this.content.file
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
