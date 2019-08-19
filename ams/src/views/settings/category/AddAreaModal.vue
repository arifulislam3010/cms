<template>
    <b-modal title="Area" hide-footer size="lg" v-model="largeModal" @ok="largeModal = false">
        <form @submit.prevent="addArea" >

            <b-row>
              <b-col sm="12">
                <b-card>
                  <div slot="header">
                    <strong>Area </strong> <small>Form</small>
                  </div>
                  <b-row>
                    <b-col sm="12">
                      <b-form-group>
                        <label for="Title">Name</label>
                        <b-form-input type="text" name="Title" id="Title" v-model="newArea.title" v-validate="'required'" placeholder="Enter name..."></b-form-input>
                        <div v-show="errors.has('Title')" class="help-block alert alert-danger">
                        {{ errors.first('Title') }}
                        </div>
                      </b-form-group>
                    </b-col>
                  </b-row>
                  <b-row>
                    <b-col sm="12">
                      <b-form-group>
                        <label for="Parent">Parent</label>
                        <div class="input-group">
                            <select name="Parent" v-model="newArea.parent_id"  id="parent" class="form-control" >
                                <option value="" >Select Parent</option>
                                <option v-for="(area,index) in areas" :key="index" :value="area.id">{{area.title}}</option>
                            </select>

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

import { ADD_AREA,All_AREA} from "@/store/action.type"
// import { ADD_CONTACT_LOADER} from "../../store/mutation.type"
import { mapState,mapGetters } from "vuex"

export default {
    data(){
        return{
            largeModal:false,
            addLoader:false,
            newArea: {
                title: '',
                parent_id: ''
            },

        }
    },
    methods:{

      addArea () {
            this.$validator.validateAll().then( result =>{
                if(result){
                    var data = this.newArea
                    this.addLoader = true
                    this.$store.dispatch('ADD_AREA',data)
                    .then(response=>{
                        this.addLoader = false;
                        this.largeModal = false
                        this.$iziToast.success({position:'topRight',title:'Ok',message:"Area Added Successsfully"})

                    })
                    .catch(error=>{
                        this.addLoader = false;
                        this.$iziToast.error({position:'topRight',title:'Error',message:"Something Wrong !!"})
                    });
                }

            })

        },

        openModal(){
            this.largeModal = true
            this.newArea.title =''
            this.newArea.parent_id =''
        },
        close(){
            this.largeModal = false
        },

        addButton () {
        this.line.buttons.push({
          name: '',
          state: false,
          is_reported: ''
        })
      },
      deleteButton (index) {
        this.line.buttons.splice(index, 1)
      },


    },
    computed: {
      ...mapGetters(["areas","areaP2"]),
    },

}
</script>

<style>

</style>
