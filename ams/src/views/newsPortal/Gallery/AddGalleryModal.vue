<template>
    <b-modal title="Gallery" hide-footer size="lg" v-model="largeModal" @ok="largeModal = false">
        <form @submit.prevent="addGallery" >

            <b-row>
              <b-col sm="12">
                <b-card>
                  <div slot="header">
                    <strong>Gallery </strong> <small>Form</small>
                  </div>
                  <b-row>
                    <b-col sm="12">
                      <b-form-group>
                        <label for="Title">Title</label>
                        <b-form-input type="text" name="Title" id="Title" v-model="newGallery.title" v-validate="'required'" placeholder="Enter Title..."></b-form-input>
                        <div v-show="errors.has('Title')" class="help-block alert alert-danger">
                        {{ errors.first('Title') }}
                        </div>
                      </b-form-group>
                    </b-col>
                  </b-row>
                  <b-row>
                    <b-col sm="12">
                      <b-form-group>
                        <label for="Cover">Cover</label>
                        <b-form-file name="Cover" id="cover" v-model="newGallery.cover" ></b-form-file>
                        <div v-show="errors.has('Cover')" class="help-block alert alert-danger">
                        {{ errors.first('Cover') }}
                        </div>
                      </b-form-group>
                    </b-col>
                  </b-row>
                  <br>
                  <h3>Photo/Video Album</h3>
                  <b-row>
                    <b-col sm="4">
                      <button class="btn btn-info pull-left" type="button" @click="addMore">
                    More
                </button>
                    </b-col>
                  </b-row>
                  <form @submit.prevent="addContents">
                  <div v-for="(input, i) in inputs">
                    <b-row>
                    <b-col sm="12">
                      <b-form-group>
                        <label for="Title">Caption</label>

                        <b-form-input type="text" name="Caption" id="Title" v-model="input.caption"  placeholder="Enter Caption..."></b-form-input>
                        <div v-show="errors.has('Caption')" class="help-block alert alert-danger">
                        {{ errors.first('Caption') }}
                        </div>
                      </b-form-group>
                    </b-col>
                  </b-row>
                  <b-row>
                    <b-col sm="12">
                      <b-form-group>
                        <label for="Content">Image/Video</label>
                        <b-form-file name="Content" id="content" v-model="input.content" ></b-form-file>
                        <div v-show="errors.has('Content')" class="help-block alert alert-danger">
                        {{ errors.first('Content') }}
                        </div>
                      </b-form-group>
                    </b-col>
                  </b-row>
                  <button @click="deleteMore(i)">Remove</button>
                  </div>
                  </form>
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

import { ADD_GALLERY,All_GALLERY,ADD_GALLERYC,All_GALLERYC} from "@/store/action.type"
// import { ADD_CONTACT_LOADER} from "../../store/mutation.type"
import { mapState,mapGetters } from "vuex"

export default {
    data(){
        return{
            largeModal:false,
            addLoader:false,
            newGallery: {
                title: '',
                cover: '',

            },
            inputs: [

            ]

        }
    },
    methods:{

      addMore() {
      this.inputs.push({
        caption: '',
        content: ''
      })
    },
    deleteMore(i) {
      this.inputs.splice(i,1)
    },

    addContents(){
      this.$validator.validateAll().then( result =>{
                if(result){
                    var data = this.inputs
                    this.addLoader = true
                    this.$store.dispatch('ADD_GALLERYC',data)
                    .then(response=>{
                        this.addLoader = false;
                        this.largeModal = false
                        this.$iziToast.success({position:'topRight',title:'Ok',message:"Gallery Image/Video Added Successsfully"})

                    })
                    .catch(error=>{
                        this.addLoader = false;
                        this.$iziToast.error({position:'topRight',title:'Error',message:"Can't upload image/video !!"})
                    });
                }

            })
    },

      addGallery () {
            this.$validator.validateAll().then( result =>{
                if(result){
                    var data = this.newGallery
                    this.addLoader = true
                    this.$store.dispatch('ADD_GALLERY',data)
                    .then(response=>{
                        this.addLoader = false;
                        this.largeModal = false
                        this.$iziToast.success({position:'topRight',title:'Ok',message:"Gallery Added Successsfully"})

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
            this.newGallery.title =''
            this.newGallery.cover =''
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
      ...mapGetters(["gallerys","galleryP2"]),
    },

}
</script>

<style>

</style>
