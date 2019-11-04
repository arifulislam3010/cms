<template>
  <div>
    {{siteInfo}}
    <div>
      <b-card no-body>
        <b-tabs>
          <b-tab title="Logo" active>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <button
                  @click="ContentManagerModal"
                  class="btn btn-outline-primary"
                  type="button"
                >Select</button>
              </div>
              <input
                type="text"
                class="form-control"
                placeholder
                aria-label
                aria-describedby="basic-addon1"
                v-model="list.logo_url"
              />
            </div>
          </b-tab>
          <b-tab title="Footer Logo">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <button
                  @click="ContentManagerModal"
                  class="btn btn-outline-primary"
                  type="button"
                >Select</button>
              </div>
              <input
                type="text"
                class="form-control"
                placeholder
                aria-label
                aria-describedby="basic-addon1"
                v-model="siteInfo.logo_url"
              />
            </div>
          </b-tab>
          <b-tab title="Site Info">
            <div class="container-fluid">
              <div class="row">
                <div class="col-sm-5">
                  <label for>site_name</label>
                  <input
                    v-model="siteInfo.site_name"
                    class="form-control"
                    placeholder="enter title"
                  />
                </div>
                <div class="col-sm-5">
                  <label for>site_author</label>
                  <input
                    v-model="siteInfo.site_author"
                    class="form-control"
                    placeholder="enter title"
                  />
                </div>
              </div>

              <div class="row">
                <div class="col-sm-5">
                  <label for>license_no</label>
                  <input
                    v-model="siteInfo.license_no"
                    class="form-control"
                    placeholder="enter title"
                  />
                </div>
                <div class="col-sm-5">
                  <label for>registration_no</label>
                  <input
                    v-model="siteInfo.registration_no"
                    class="form-control"
                    placeholder="enter title"
                  />
                </div>
              </div>

              <div class="row">
                <div class="col-sm-5">
                  <label for>copyright_text</label>
                  <input
                    v-model="siteInfo.copyright_text"
                    class="form-control"
                    placeholder="enter title"
                  />
                </div>
                <div class="col-sm-5">
                  <label for>twitter_feed</label>
                  <input
                    v-model="siteInfo.twitter_feed"
                    class="form-control"
                    placeholder="enter title"
                  />
                </div>
              </div>

              <div class="row">
                <div class="col-sm-5">
                  <label for>facebook_likebox</label>
                  <input
                    v-model="siteInfo.facebook_likebox"
                    class="form-control"
                    placeholder="enter title"
                  />
                </div>
                <div class="col-sm-5">
                  <label for>working_hours</label>
                  <input
                    v-model="siteInfo.working_hours"
                    class="form-control"
                    placeholder="enter title"
                  />
                </div>
              </div>
              <div class="row">
                <div class="col-sm-5">
                  <label for>working_days</label>
                  <input
                    v-model="siteInfo.working_days"
                    class="form-control"
                    placeholder="enter title"
                  />
                </div>
              </div>
            </div>
          </b-tab>
          <b-tab title="Contact Info">
            <div class="container-fluid">
              <div class="row">
                <div class="col-sm-5">
                  <label for>primary_email</label>
                  <input
                    v-model="siteInfo.primary_email"
                    class="form-control"
                    placeholder="enter title"
                  />
                </div>
                <div class="col-sm-5">
                  <label for>secondary_email</label>
                  <input
                    v-model="siteInfo.secondary_email"
                    class="form-control"
                    placeholder="enter title"
                  />
                </div>
              </div>

              <div class="row">
                <div class="col-sm-5">
                  <label for>primary_phone</label>
                  <input
                    v-model="siteInfo.primary_phone"
                    class="form-control"
                    placeholder="enter title"
                  />
                </div>
                <div class="col-sm-5">
                  <label for>secondary_phone</label>
                  <input
                    v-model="siteInfo.secondary_phone"
                    class="form-control"
                    placeholder="enter title"
                  />
                </div>
              </div>

              <div class="row">
                <div class="col-sm-5">
                  <label for>primary_tel</label>
                  <input
                    v-model="siteInfo.primary_tel"
                    class="form-control"
                    placeholder="enter title"
                  />
                </div>
                <div class="col-sm-5">
                  <label for>secondary_tel</label>
                  <input
                    v-model="siteInfo.secondary_tel"
                    class="form-control"
                    placeholder="enter title"
                  />
                </div>
              </div>

              <div class="row">
                <div class="col-sm-5">
                  <label for>primary_fax</label>
                  <input
                    v-model="siteInfo.primary_fax"
                    class="form-control"
                    placeholder="enter title"
                  />
                </div>
                <div class="col-sm-5">
                  <label for>secondary_fax</label>
                  <input
                    v-model="siteInfo.secondary_fax"
                    class="form-control"
                    placeholder="enter title"
                  />
                </div>
              </div>
              <div class="row">
                <div class="col-sm-5">
                  <label for>po</label>
                  <input v-model="siteInfo.po" class="form-control" placeholder="enter title" />
                </div>
                <div class="col-sm-5">
                  <label for>address</label>
                  <input v-model="siteInfo.address" class="form-control" placeholder="enter title" />
                </div>
              </div>

              <div class="row">
                <div class="col-sm-5">
                  <label for>facebook</label>
                  <input v-model="siteInfo.facebook" class="form-control" placeholder="enter title" />
                </div>
                <div class="col-sm-5">
                  <label for>twitter</label>
                  <input v-model="siteInfo.twitter" class="form-control" placeholder="enter title" />
                </div>
              </div>

              <div class="row">
                <div class="col-sm-5">
                  <label for>google_plus</label>
                  <input
                    v-model="siteInfo.google_plus"
                    class="form-control"
                    placeholder="enter title"
                  />
                </div>
                <div class="col-sm-5">
                  <label for>linkedin</label>
                  <input v-model="siteInfo.linkedin" class="form-control" placeholder="enter title" />
                </div>
              </div>

              <div class="row">
                <div class="col-sm-5">
                  <label for>skype</label>
                  <input v-model="siteInfo.skype" class="form-control" placeholder="enter title" />
                </div>
                <div class="col-sm-5">
                  <label for>youtube</label>
                  <input v-model="siteInfo.youtube" class="form-control" placeholder="enter title" />
                </div>
              </div>

              <div class="row">
                <div class="col-sm-5">
                  <label for>map_url</label>
                  <input v-model="siteInfo.map_url" class="form-control" placeholder="enter title" />
                </div>
              </div>
            </div>
          </b-tab>
          <b-tab title="Privacy Policy">
            <label>Privacy Policy</label>

            <ckeditor :editor="editor" v-model="siteInfo.privacy_policy" :config="editorConfig"></ckeditor>
          </b-tab>
          <b-tab title="About">
            <label>About</label>

            <ckeditor :editor="editor" v-model="siteInfo.about" :config="editorConfig"></ckeditor>
          </b-tab>
          <b-tab title="Terms of User">
            <label>Terms of User</label>

            <ckeditor :editor="editor" v-model="siteInfo.terms_of_use" :config="editorConfig"></ckeditor>
          </b-tab>
        </b-tabs>
      </b-card>
    </div>
    <b-button @click="submit">submit</b-button>
    <ContentManager ref="content_manager_modal" :content="content"></ContentManager>
  </div>
</template>
<script>
import axios from "axios";
import CKEditor from "@ckeditor/ckeditor5-vue";
import { mapGetters } from "vuex";
import ClassicEditor from "@ckeditor/ckeditor5-build-classic";
import { ADD_SITE_INFO,UPDATE_SITE_INFO } from "@/store/action.type";
import ContentManager from "../../content/index";
export default {
  components: {
    CKEditor,
    ClassicEditor,
    ContentManager
  },

  data() {
    return {
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
      list: {
        id: ``,
        logo_url: ``,
        footer_logo_url: ``,
        site_name: ``,
        site_author: ``,
        license_no: ``,
        registration_no: ``,
        copyright_text: ``,
        twitter_feed: ``,
        facebook_likebox: ``,
        primary_email: ``,
        secondary_email: ``,
        primary_phone: ``,
        secondary_phone: ``,
        primary_tel: ``,
        secondary_tel: ``,
        primary_fax: ``,
        secondary_fax: ``,
        po: ``,
        address: ``,
        map_url: ``,
        working_hours: ``,
        working_days: ``,
        facebook: ``,
        twitter: ``,
        google_plus: ``,
        linkedin: ``,
        skype: ``,
        youtube: ``,
        privacy_policy: ``,
        about: ``,
        terms_of_use: ``,
        selected: ``
      }
    };
  },
  computed: {
    ...mapGetters(["siteInfoList", "siteInfo"])
  },

  methods: {
    submit() {
      //     let payload = {
      //         id: 2 ,
      //         site_name :'test update '
      //     }
      //     axios.put(`api/site_info`,payload).then(response=>{
      //         console.log(response)
      //     }).catch(error=>{
      //         console.log(error)
      //     })

      if (this.siteInfo.id == "") {
        //console.log("ok");
        let payload = {
          // id: 2,
          site_info: this.list
        };

        console.log(payload);

        this.$store
          .dispatch("ADD_SITE_INFO", this.siteInfo)
          .then(response => {
            this.$iziToast.success({
              position: "topRight",
              title: "Ok",
              message: "Site Added Successsfully"
            });
            this.$parent.getTopics();
          })
          .catch(error => {
            this.$iziToast.error({
              position: "topRight",
              title: "error",
              message: error.data
            });
            this.errors = error.response.data.errors;
          });
      }else{
            this.$store.dispatch(`UPDATE_SITE_INFO`,this.siteInfo.id).then(response=>{
            this.$iziToast.success({position:'topRight',title:'Ok',message:"Site updated Successsfully"})
            }).catch(error=>{
                
            })
            this.$router.push({name:`site-add`})
            //this.getSiteInfos()
      }
    },
    ContentManagerModal() {
      this.$refs.content_manager_modal.openModal();
    }
  }
};
</script>
<style  scoped>
</style>


