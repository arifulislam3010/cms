<template>
  <b-modal title="Topic" hide-footer size="lg" v-model="largeModal" @ok="largeModal = false">
        <form @submit.prevent="updateTopic" >

            <b-row>
              <b-col sm="12">
                <b-card>
                  <div slot="header">
                    <strong>Topic </strong> <small>Form</small>
                  </div>
                  <b-row>
                    <b-col sm="6">
                      <b-form-group>
                        <label for="Title">Topic</label>
                        <b-form-input type="text" name="Title" id="title" v-model="editTopic.title" v-validate="'required'" placeholder="Enter title..."></b-form-input>
                        <div  class="help-block alert alert-danger">
                        {{ errors.first('Title') }}
                        </div>
                      </b-form-group>
                    </b-col>

                  </b-row>
                  <b-row>
                    <b-col sm="6">
                      <b-form-group>
                        <label for="parent">Parent</label>
                         <Treeselect 
                         v-model="editTopic.parent_id" 
                         :options="topic_parents"
                         ></Treeselect>
                        {{ errors.first('Cover') }}
                       
                      </b-form-group>
                    </b-col>

                  </b-row>
                  <!-- <b-row>
                    <b-col sm="6">
                      <b-form-group>
                        <label for="Status">Status</label>
                        <b-form-input type="text" name="Status" id="status" v-model="editTopic.status" v-validate="'required'" placeholder="Enter title..."></b-form-input>
                        <div v-show="errors.has('Status')" class="help-block alert alert-danger">
                        {{ errors.first('Status') }}
                        </div>
                      </b-form-group>
                    </b-col>

                  </b-row> -->
                </b-card>
              </b-col>
            </b-row>
            <div class="form-group row">
                <div class="col-sm-12">
                <input v-if="!addLoader" type="submit" value="Submit" class="btn btn-primary pull-right"/>
                <button v-if="addLoader" class="btn btn-primary pull-right" type="button" disabled>
                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                    Submitting...
                </button>
                <button v-if="!addLoader"  @click.prevent="close" class="btn btn-success pull-right" style="margin-right:5px;">Close</button>
                </div>
            </div>
        </form>
    </b-modal>
</template>

<script>
import Vue from 'vue'
import VeeValidate from 'vee-validate';
Vue.use(VeeValidate)

import { UPDATE_TOPIC,ADD_TOPIC} from "@/store/action.type"
// import { ADD_CONTACT_LOADER} from "../../store/mutation.type"
import { mapState,mapGetters } from "vuex"
import Treeselect from "@riophae/vue-treeselect";
import "@riophae/vue-treeselect/dist/vue-treeselect.css";
export default {
  components:{Treeselect},
    data(){
        return{
            largeModal:false,
            addLoader:false,
            item_id :'',
            editTopic: {
                title: '',
                parent_id:'',
            }

        }
    },
    methods:{

       updateTopic(){
            this.addLoader = true;
            var data = this.editTopic
            var index = this.index
            let payload = {
              data:this.editTopic,
              id:this.item_id,
            }
            this.$store.dispatch('UPDATE_TOPIC',payload)
            .then(response=>{
                this.addLoader = false;
                this.largeModal = false
                this.$iziToast.success({position:'topRight',title:'Ok',message:"Topic Updated Successsfully"})
                this.$parent.getTopics()
            })
            .catch(error=>{
                this.addLoader = false;
                this.$iziToast.error({position:'topRight',title:'Error',message:"Something Wrong !!"})
            });
        },

        openModal(topic,index){
            this.largeModal = true
            this.index = index
            this.editTopic.title =topic.title
            this.editTopic.cover =topic.cover
            this.editTopic.status =topic.status
            this.editTopic.topic_id =topic.id
        },
        close(){
            this.largeModal = false
        },

    },
    computed: {

      ...mapGetters(["topic_list", "topic_parents"]),

    },

}
</script>

<style>

</style>
