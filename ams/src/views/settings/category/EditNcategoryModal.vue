<template>
  <b-modal title="Category" hide-footer size="lg" v-model="largeModal" @ok="largeModal = false">
        <form @submit.prevent="updateNcategory" >

            <b-row>
              <b-col sm="12">
                <b-card>
                  <div slot="header">
                    <strong>Category </strong> <small>Form</small>
                  </div>
                  <b-row>
                    <b-col sm="6">
                      <b-form-group>
                        <label for="ncategory">Category</label>
                        <b-form-input type="text" name="ncategory" id="ncategory" v-model="editNcategory.title" v-validate="'required'" placeholder="Enter title..."></b-form-input>
                        <!-- <div v-show="errors.has('ncategory')" class="help-block alert alert-danger">
                        {{ errors.first('ncategory') }} -->
                        <!-- </div> -->
                      </b-form-group>
                    </b-col>

                  </b-row>
                  <b-row>
                    <b-col sm="6">
                      <label for="Parent">Parent</label>
                        <div class="input-group">
                            <select name="Parent" v-model="editNcategory.parent_id"  id="parent" class="form-control" >
                                <option value="" >Select Parent</option>
                                <option v-for="(ncategory,index) in ncategorys" :key="index" :value="ncategory.id">{{ncategory.title}}</option>
                            </select>

                        </div>
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

import { UPDATE_NCATEGORY,ADD_NCATEGORY} from "@/store/action.type"
// import { ADD_CONTACT_LOADER} from "../../store/mutation.type"
import { mapState,mapGetters } from "vuex"

export default {
    data(){
        return{
            largeModal:false,
            addLoader:false,
            editNcategory: {
                title: '',
                parent_id: '',
                ncategory_id:''
            }

        }
    },
    methods:{

       updateNcategory(){
         
            this.addLoader = true;
            var data = this.editNcategory
            var index = this.index
            this.$store.dispatch('UPDATE_NCATEGORY',{data,index})
            .then(response=>{
                this.addLoader = false;
                this.largeModal = false
                this.$iziToast.success({position:'topRight',title:'Ok',message:"Category Updated Successsfully"})

            })
            .catch(error=>{
                this.addLoader = false;
                this.$iziToast.error({position:'topRight',title:'Error',message:"Something Wrong !!"})
            });
        },

        openModal(ncategory,index){
            this.largeModal = true
            this.index = index
            this.editNcategory.title =ncategory.title
            this.editNcategory.parent_id =ncategory.parent_id
            this.editNcategory.ncategory_id =ncategory.id
        },
        close(){
            this.largeModal = false
        },

    },
    computed: {
      ...mapGetters(["ncategorys","ncategoryP2"]),
    },

}
</script>

<style>

</style>
