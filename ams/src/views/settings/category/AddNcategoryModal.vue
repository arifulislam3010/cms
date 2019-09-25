<template>
    <b-modal title="Category" hide-footer size="lg" v-model="largeModal" @ok="largeModal = false">
        <form @submit.prevent="addCategory" >

            <b-row>
              <b-col sm="12">
                <b-card>
                  <div slot="header">
                    <strong>Category </strong> <small>Form</small>
                  </div>
                  <b-row>
                    <b-col sm="12">
                      <b-form-group>
                        <label for="Title">Name</label>
                        <b-form-input type="text" name="Title"  v-model="newCategory.title" v-validate="'required'" placeholder="Enter name..."></b-form-input>
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
                        <!-- <div class="input-group">
                            <select name="Parent" v-model="newNcategory.parent_id"  id="parent" class="form-control" >
                                <option value="" >Select Parent</option>
                                <option v-for="(ncategory,index) in category_list" :key="index" :value="ncategory.id">{{ncategory.title}}</option>
                            </select>

                        </div> -->
                        <Treeselect v-model="selected_parent" :options="category_parents.filter( v=> v.id!=item_id)" ></Treeselect>
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

import { ADD_NCATEGORY,All_NCATEGORY} from "@/store/action.type"
// import { ADD_CONTACT_LOADER} from "../../store/mutation.type"
import { mapState,mapGetters } from "vuex"
import Treeselect from '@riophae/vue-treeselect'
import '@riophae/vue-treeselect/dist/vue-treeselect.css'
export default {
    components:{Treeselect},
    data(){
        return{
            update:false ,
            item_id : '',
            selected_parent:null,
            largeModal:false,
            addLoader:false,
            newCategory: {
                title: '',
                parent_id: ''
            },

        }
    },
    methods:{

      addNcategory () {
            this.$validator.validateAll().then( result =>{
                if(result){
                    var data = this.newNcategory
                    this.addLoader = true
                    this.$store.dispatch('ADD_NCATEGORY',data)
                    .then(response=>{
                        this.addLoader = false;
                        this.largeModal = false
                        this.$iziToast.success({position:'topRight',title:'Ok',message:"CAtegory Added Successsfully"})

                    })
                    .catch(error=>{
                        this.addLoader = false;
                        this.$iziToast.error({position:'topRight',title:'Error',message:"Something Wrong !!"})
                    });
                }

            })

        },
        addCategory(){
          this.addLoader = true  
          if(this.update){
            this.newCategory.parent_id = this.selected_parent 
            let payload = {
              data : this.newCategory,
              id   : this.item_id ,
            }
            this.$store.dispatch('UPDATE_CATEGORY',payload).then(response=>{
              this.$parent.getCategories()
              this.addLoader = false
            }).catch(error=>{
              this.addLoader = false
            })
          }else{
            this.newCategory.parent_id = this.selected_parent 
            this.$store.dispatch('ADD_CATEGORY',this.newCategory).then(response=>{
              this.$parent.getCategories()
              this.addLoader = false
            }).catch(error=>{
              this.addLoader = false 
            })

          }
        },
        openModal(){
            this.largeModal = true
            if(!this.update){
              this.newCategory.title =''
              this.newCategory.parent_id =''
            }
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
      ...mapGetters(["category_list","category_parents","ncategoryP2"]),
    },

}
</script>

<style>

</style>
