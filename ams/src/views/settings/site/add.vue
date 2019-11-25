<template>
  <div>
    <!-- modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Add Tab</button>
    <br /><br />

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <b-form-input type="text" name="Title" id="Title" v-model="titleS" v-validate="'required'"  placeholder="Enter title..."></b-form-input>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button  type="button" class="btn btn-primary" @click="addNewTab" data-dismiss="modal">Add Tab</button>
          </div>
        </div>
      </div>
    </div>
    <!-- main Body tabs -->
    <div class="container">
      <b-tabs content-class="mt-2">
        <div v-for="(tab,k) in tabLists" :key="k">
          <b-tab :title="tab.title">

            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal2">
                Add Slot
              </button>

              <!-- Modal2 for adding slot -->
              <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel2">Add Slot</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body row">
                      <div class="col-sm-7">
                        <b-form-input type="text" name="Title"  id="Title" v-model="titleS"  v-validate="'required'" placeholder="Enter title..." ></b-form-input>
                      </div>
                      <div class="col-sm-5">
                        
                        <select class="form-control" v-model="selectedType">
                          <option>Text</option>
                          <option>Image</option>
                          <option>Video</option>
                          <option>CK</option>
                        </select>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary" @click="addSlot"  data-dismiss="modal">Save changes</button>
                    </div>
                  </div>
                </div>
              </div>

            <!-- content in each tab  -->
            <!-- {{tab.input}} -->
            <div v-for="(i,kk) in tab.input" :key="kk">
              
              <div v-if="i.type= 'Text'">
                <label >{{i.inputTitle}}</label>
                <b-form-input type="text" name="Title"  id="Titlle" v-model="i.content"  v-validate="'required'" placeholder="Enter title" ></b-form-input>
              </div>

              
              
            </div>


          </b-tab>
        </div>
      </b-tabs>
    </div>
  </div>
</template>



<script>
import axios from "axios";
import CKEditor from "@ckeditor/ckeditor5-vue";
import { mapGetters } from "vuex";
import ClassicEditor from "@ckeditor/ckeditor5-build-classic";
import { ADD_SITE_INFO, UPDATE_SITE_INFO } from "@/store/action.type";
import ContentManager from "../../content/index";
import { type } from "os";
export default {
  components: {
    CKEditor,
    ClassicEditor,
    ContentManager
  },

  data() {
    return {
      modal: true,
      titleS: "",
      selectedType:"",
      editor: ClassicEditor,
      editorConfig: {
        fullPage: false,
        resize_enabled: false,
        toolbar: {
          items: [
            "bold",
            "italic",
            "link",
            "Blockquote",
            "BulletedList",
            "NumberedList",
            "Underline",
            "undo",
            "redo"
          ]
        }
      },

      tabLists: []
    };
  },
  computed: {
    ...mapGetters(["siteInfoList", "siteInfo"])
  },

  methods: {
    addNewTab() {
      this.tabLists.push({
        title: this.titleS,
        input: [
          // {
          //    type: "type1",
          //    inputTitle: "",
          //    content: "asdafa"
          //  },
          //  {
          //    type: "type2",
          //    inputTitle: "",
          //    content: "xvhd"
          //  }
        ]
      })
      this.titleS = ""
      console.log(tabLists)
    },
    addSlot(){
      this.tabLists[0].input.push({
        type:this.selectedType,
        inputTitle:this.titleS,
        content:''
      })
      console.log(this.selectedType)
      this.titleS =""
      this.selectedType=""
    },

    ContentManagerModal() {
      this.$refs.content_manager_modal.openModal()
    }
  }
};
</script>



<style  scoped>
</style>


