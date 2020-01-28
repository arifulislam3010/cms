<template>
    <div style="z-index:1">
        <div id="addNcategoryModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-xl">

            <!-- Modal content-->
            <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Create Category Item</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                  <div class="col-sm-6" style="margin-left:15px;">
                      <div class="row">
                          <div class="col-md-3">
                            <label for="Title">Display Name*</label>
                          </div>

                          <div class="col-md-5">
                             <b-form-input type="text" name="Title"  v-model="newCategory.displayName" v-validate="'required'" placeholder=""></b-form-input>
                          </div>
                          <div class="col-md-1">
                              <label for="">Color</label>
                          </div>
                          <div class="col-md-1">
                            <input type="color" class="form-control" v-model="newCategory.displayNameColor">
                          </div>
                        </div>

                        <br/>
                        <div class="row">
                          <div class="col-md-3">
                            <label for="">Header Design</label>
                          </div>
                          <div class="col-md-3">
                             <input type="text" class="form-control" v-model="newCategory.headerDesign">
                          </div>
                          <div class="col-md-1">
                            <label for=""  >status</label>
                          </div>
                          <div class="col-md-3">
                            <select name="" class="form-control" v-model="newCategory.headerDesignStatus">
                               <option value="1">active</option>
                               <option value="0">inactive</option>
                            </select>
                          </div>
                        </div>
                        <br>
                        <div class="row">
                          <div class="col-md-3">
                              <label for="">Header Background</label>
                          </div>
                          <div class="col-sm-1">
                            <input type="color" class="form-control" v-model="newCategory.headerBackground">
                          </div>
                          <div class="col-md-2"></div>
                          <div class="col-sm-1">
                            <label for="">status</label>
                          </div>
                          <div class="col-sm-3">
                            <select name="" class="form-control" v-model="newCategory.headerBackgroundStatus">
                              <option value="1">active</option>
                              <option value="0">inactive</option>
                            </select>
                          </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-3">
                              <label for="">Header Image</label>
                            </div>

                            <div class="col-md-3">
                                <button class="btn btn-success" @click="selectHeaderImage" >select</button>
                            </div>
                            <div class="col-md-1">status</div>
                            <div class="col-md-3">
                                <select name="" class="form-control" v-model="newCategory.headerImageStatus">
                                  <option value="1">active</option>
                                  <option value="0">inactive</option>
                                </select>                             
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-3">
                              <label for="">Category Page Header</label>
                            </div>

                            <div class="col-md-3">
                                <button class="btn btn-success" @click="selectCategoryPageImage" >select</button>
                            </div>
                            <div class="col-md-1">status</div>
                            <div class="col-md-3">
                                <select name="" class="form-control" v-model="newCategory.categoryPageImageStatus">
                                  <option value="">active</option>
                                  <option value="">inactive</option>
                                </select>                             
                            </div>
                        </div>
                        <br>
                        <div class="row">
                          <div class="col-md-3">
                            <label for="Title">Title*</label>
                          </div>

                          <div class="col-md-7">
                            <b-form-input type="text" name="Title"  v-model="newCategory.title" v-validate="'required'" placeholder=""></b-form-input>
                          </div>
                        </div>

                        <br/>

                        <div class="row">
                          <div class="col-md-3">
                            <label for="Parent">Parent*</label>
                          </div>

                          <div class="col-md-7">
                            <Treeselect v-model="selected_parent" :options="category_parents.filter( v=> v.id!=item_id)" ></Treeselect>
                          </div>
                        </div>


                        <br/>
                        <!-- todo45  -->
                         <div class="row">
                          <div class="col-md-3">
                            <label for="Parent">Category Layout*</label>
                          </div>

                          <div class="col-md-7">
                            <select
                              class="form-control"
                              id="exampleFormControlSelect2"
                              v-model="newCategory.layout"
                            >
                            
                              <option value="one">single column</option>
                              <option value="two">Double column</option>
                              <option value="three">Full View</option>
                              <option value="slider">Slider </option>
                              
                            </select>
                          </div>
                        </div>
                        <br/>                       
                        <div class="row">
                          <div class="col-md-3">
                            <label for="Parent">Header Display*</label>
                          </div>

                          <div class="col-md-7">
                            <select
                              class="form-control"
                              id="exampleFormControlSelect2"
                              v-model="newCategory.headerDisplay"
                            >
                            
                              <option value="1">Active</option>
                              <option value="0">InActive</option>
                              
                            </select>
                          </div>
                        </div>




                        <br/>

                        <div class="row">
                          <div class="col-md-3">
                            <label for="Parent">Home Page Dispaly*</label>
                          </div>

                          <div class="col-md-7">
                            <select
                              class="form-control"
                              id="exampleFormControlSelect2"
                              v-model="newCategory.homeDisplay"
                            >
                            
                              <option value="1">Active</option>
                              <option value="0">InActive</option>
                              
                            </select>
                          </div>
                        </div>



                        <br/>

                        <div class="row">
                          <div class="col-md-3">
                            <label for="Parent">Menubar Dispaly*</label>
                          </div>

                          <div class="col-md-7">
                            <select
                              class="form-control"
                              id="exampleFormControlSelect2"
                              v-model="newCategory.menubarDisplay"
                            >
                            
                              <option value="1">Active</option>
                              <option value="0">Inactive</option>
                              
                            </select>
                          </div>
                        </div>



                        <br/>

                        <div class="row">
                          <div class="col-md-3">
                            <label for="Parent">Photo Dispaly*</label>
                          </div>

                          <div class="col-md-7">
                            <select
                              class="form-control"
                              id="exampleFormControlSelect2"
                              v-model="newCategory.photoDisplay"
                            >
                            
                              <option value="1">Active</option>
                              <option value="0">InActive</option>
                              
                            </select>
                          </div>
                        </div>


                        <br/>

                        <div class="row">
                          <div class="col-md-3">
                            <label for="Parent">Video Dispaly*</label>
                          </div>

                          <div class="col-md-7">
                            <select
                              class="form-control"
                              id="exampleFormControlSelect2"
                              v-model="newCategory.vedioDisplay"
                            >
                            
                              <option value="1">Active</option>
                              <option value="0">InActive</option>
                              
                            </select>
                          </div>
                        </div>



                        <br/>

                        <div class="row">
                          <div class="col-md-3 ">
                            <label for="Parent">Status*</label>
                          </div>

                          <div class="col-md-7">
                            <select
                              class="form-control"
                              id="exampleFormControlSelect2"
                              v-model="newCategory.categoryStatus"
                            >
                          
                              <option value="1">Active</option>
                              <option value="0">Inactive</option>
                              
                            </select>
                          </div>
                        </div>

                        <!-- {{newCategory}} -->
                
                        <div v-show="errors.hasOwnProperty('title')" class="help-block alert alert-danger">
                        <!-- {{  errors[`title`] }} -->
                          <p v-for="(i,k) in errors[`title`]" :key="k">
                            {{i.replace(`title`,`name`)}}
                          </p>
                        </div>

                  </div>
                </div> 
                  <!-- todo45 -->
  
            </div>
            <div class="modal-footer">
                <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
                <div class="form-group row">
                    <div class="col-sm-12">
                    <input @click="addCategory" v-if="!addLoader" type="submit" value="Submit" class="btn btn-primary pull-right"/>
                    <button v-if="addLoader" class="btn btn-primary pull-right" type="button" disabled>
                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        Submitting...
                    </button>
                    <button v-if="!addLoader"  @click="closeModal" class="btn btn-success pull-right" style="margin-right:5px;">Close</button>
                    </div>
                </div>           
            </div>
            </div>

        <ContentManager :content="headerImage" ref="headerImage"></ContentManager>
        <ContentManager :content="categoryPageImage" ref="categoryPageImage"></ContentManager>      
        </div>
        </div> 
    </div>
</template>

<script>
import Vue from 'vue'
import VeeValidate from 'vee-validate';
Vue.use(VeeValidate)
import JQuery from 'jquery'
let $ = JQuery
import { ADD_NCATEGORY,All_NCATEGORY} from "@/store/action.type"
// import { ADD_CONTACT_LOADER} from "../../store/mutation.type"
import { mapState,mapGetters } from "vuex"
import Treeselect from '@riophae/vue-treeselect'
import '@riophae/vue-treeselect/dist/vue-treeselect.css'
import ColorPicker from 'vue-color-picker-wheel'
import ContentManager from "../../content/index"
export default {
    components:{
      Treeselect,
      ColorPicker,
      ContentManager ,
    },
    
    data(){
        return{
            errors:{},
            update:false ,
            item_id : '',
            selected_parent:null,
            largeModal:false,
            addLoader:false,
            headerImage : {} ,
            categoryPageImage : {} ,
            newCategory: {
                  displayName : ``,
                  displayNameColor : `` ,
                  headerDesign : `` ,
                  headerDesignStatus : `` ,
                  headerBackground  : `` ,
                  headerBackgroundStatus : `` ,
                  headerImage : `` ,
                  headerImageStatus : `` ,
                  categoryPageImage : `` ,
                  categoryPageImageStatus : `` ,
                  title : `` ,
                  parent_id : `` ,
                  parentTitle : `` ,
                  headerDisplay : `` ,
                  homeDisplay : `` ,
                  menubarDisplay : `` ,
                  photoDisplay : ``, 
                  vedioDisplay : `` ,
                  categoryStatus  : `` ,    
                  layout : `` ,         
            },
    
        }
    },
    methods:{
        clearData(){   
          Object.keys(this.newCategory).forEach(k => this.newCategory[k] = ``)
        },
        closeModal() {
            $('#addNcategoryModal').modal('toggle');
        },
        selectCategoryPageImage(){
            // alert('open box')
        },
        openModal(){

            $('#addNcategoryModal').modal('toggle');
            this.clearData()
        } ,      
        selectHeaderImage(){
          this.$refs.headerImage.openModal()
        },
        addCategory(){
          // alert(`adding`)  
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
              this.clearData()
            }).catch(error=>{
              this.errors = error.response.data.errors
              this.addLoader = false
              this.error_list = error.data
            })
          }else{
            this.newCategory.parent_id = this.selected_parent
            
            //console.log(this.newCategory)
            this.$store.dispatch('ADD_CATEGORY',this.newCategory).then(response=>{
              this.$parent.getCategories()
              this.addLoader = false
            }).catch(error=>{
              console.log(error.response.data.errors)
              this.errors = error.response.data.errors
              this.addLoader = false 
              this.error_list = error
      
            })

          }


          // this.newCategory.display_name=''
          // this.newCategory.title=''
          // this.newCategory.color=''
          // this.newCategory.parent_id=''
          // this.newCategory.photo_display='Active'
          // this.newCategory.video_display='Active'
          // this.newCategory.header_display='Active'
          // this.newCategory.home_display='Active'
          // this.newCategory.status=''
          // this.newCategory.menubar_display='Active'
          
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