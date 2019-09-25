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
                        <div v-show="errors.has('Title')" class="help-block alert alert-danger">
                        {{ errors.first('Title') }}
                        </div>
                      </b-form-group>
                    </b-col>

                  </b-row>
                  <b-row>
                    <b-col sm="6">
                      <b-form-group>
                        <label for="Cover">Cover</label>
                        <b-form-input type="text" name="Cover" id="cover" v-model="editTopic.cover" v-validate="'required'" placeholder="Enter title..."></b-form-input>
                        <div v-show="errors.has('Cover')" class="help-block alert alert-danger">
                        {{ errors.first('Cover') }}
                        </div>
                      </b-form-group>
                    </b-col>

                  </b-row>
                  <b-row>
                    <b-col sm="6">
                      <b-form-group>
                        <label for="Status">Status</label>
                        <b-form-input type="text" name="Status" id="status" v-model="editTopic.status" v-validate="'required'" placeholder="Enter title..."></b-form-input>
                        <div v-show="errors.has('Status')" class="help-block alert alert-danger">
                        {{ errors.first('Status') }}
                        </div>
                      </b-form-group>
                    </b-col>

                  </b-row>
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

export default {
    data(){
        return{
            largeModal:false,
            addLoader:false,
            editTopic: {
                title: '',
                cover: '',
                status: '',
                topic_id:''
            }

        }
    },
    methods:{

       updateTopic(){
            this.addLoader = true;
            var data = this.editTopic
            var index = this.index
            this.$store.dispatch('UPDATE_TOPIC',{data,index})
            .then(response=>{
                this.addLoader = false;
                this.largeModal = false
                this.$iziToast.success({position:'topRight',title:'Ok',message:"Topic Updated Successsfully"})

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
      ...mapGetters(["topics","topicP2"]),
    },

}
</script>

<style>

</style>
