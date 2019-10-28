<template>
  <b-modal title="Topic" hide-footer size="lg" v-model="largeModal" @ok="largeModal = false">
    <form @submit.prevent="addTopic">
      <b-row>
        <b-col sm="12">
          <b-card>
            <div slot="header">
              <strong>Topic</strong>
              <small>Form</small>
            </div>
            <b-row>
              <b-col sm="12">
                <b-form-group>
                  <label for="Title">Title</label>
                  <b-form-input
                    type="text"
                    name="Title"
                    id="Title"
                    v-model="newTopic.title"
                    v-validate="'required'"
                    placeholder="Enter title..."
                  ></b-form-input>
                  <div v-show="errors.hasOwnProperty('title')" class="help-block alert alert-danger">
                  <!-- {{  errors[`title`] }} -->
                    <p v-for="(i,k) in errors[`title`]" :key="k">
                      {{i}}
                    </p>
                  </div>

                  <!-- <div
                    class="help-block alert alert-danger"
                  >{{ errors.first('Title') }}</div> -->
                </b-form-group>
              </b-col>
            </b-row>

            <b-row>
              <b-col sm="12">
                <b-form-group>
                  <label for="parent">Parent</label>
                  <Treeselect v-model="newTopic.parent_id" :options="topic_parents"></Treeselect>

                  <!-- {{ errors.first('Cover') }} -->
                </b-form-group>
              </b-col>
            </b-row>
            <!-- 
                  <b-row>
                    <b-col sm="12">
                      <b-form-group>
                        <label for="Status">Status</label>
                        <b-form-input type="number" name="Status" id="status" v-model="newTopic.status" v-validate="'required'" placeholder="Ex ..."></b-form-input>
                        <div v-show="errors.has('Status')" class="help-block alert alert-danger">
                        {{ errors.first('Status') }}
                        </div>
                      </b-form-group>
                    </b-col>
            </b-row>-->
          </b-card>
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
    </form>
  </b-modal>
</template>

<script>
import Vue from "vue";
import VeeValidate from "vee-validate";
Vue.use(VeeValidate);

import { ADD_TOPIC, All_TOPIC } from "@/store/action.type";
// import { ADD_CONTACT_LOADER} from "../../store/mutation.type"
import { mapState, mapGetters } from "vuex";
import Treeselect from "@riophae/vue-treeselect";
import "@riophae/vue-treeselect/dist/vue-treeselect.css";

export default {
  components: { Treeselect },
  data() {
    return {
      errors:{},
      selected_parent: "",
      largeModal: false,
      addLoader: false,
      newTopic: {
        title: "",
        parent_id: ""
      }
    };
  },
  mounted() {
    //this.getTopics()
  },
  methods: {
    addTopic() {
      // this.$iziToast.success({position:'topRight',title:'Ok',message:"Topic Added Successsfully"})
      this.$store.dispatch('ADD_TOPIC',this.newTopic).then(response=>{
        this.$iziToast.success({position:'topRight',title:'Ok',message:"Topic Added Successsfully"})
        this.$parent.getTopics()
      }).catch(error=>{
        // this.$iziToast.error({position:'topRight',title:'error',message:error.data})
        this.errors = error.response.data.errors
      })
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
      this.line.buttons.splice(index, 1);
    }
  },
  computed: {
    ...mapGetters(["topic_list", "topic_parents"])
  }
};
</script>

<style>
</style>
