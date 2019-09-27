<template>
  <div>
    <b-card v-if="auth_permission.album_create">
      <div class="row">
        <div class="col-sm-6">
          <label for="title">Title</label>
          <b-input v-model="album_detail.title" name="title" placeholder="Enter Title" />
          <p v-if="!album_detail.title" style="color:red">*required</p>                   
          <br />
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <button
                @click="ContentManagerModal"
                class="btn btn-outline-primary"
                type="button"
              >Select Album Cover</button>
            </div>
            <input
              type="text"
              class="form-control"
              placeholder="cover name"
              aria-label
              aria-describedby="basic-addon1"
            />
          </div>
          <p>*required</p>                   
          <!-- {{Object.keys(content).length}} -->
          <img
            v-if="Object.keys(content).length"
            :src="content.file"
            style="width:100px;height:100px;"
          />
          <img
            v-else
            :src="get_file(album_detail.cover.file)"
            style="width:100px;height:100px;"
          />
        </div>
      </div>
      <hr />
      <div class="row">
        <div class="col-sm-6">
          album content
          <br />
          <b-button @click="add_media">Add Media</b-button>
          <br />
          <br />
          <div v-for="(item,key) in album_detail.more_photo" :key="key">
            <MorePhoto :item="item"></MorePhoto>
            <hr />
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-7">
          <b-form-checkbox :inline="true">view</b-form-checkbox>
          <b-form-checkbox :inline="true">cotinue creating</b-form-checkbox>
          <b-form-checkbox :inline="true">continue editing</b-form-checkbox>
        </div>
        <div class="col-sm-3"></div>
        <div class="col-sm-2">
          <b-button variant="danger" @click="reset_album">Reset</b-button>
          <b-button variant="success" style="margin-left:10px" @click="submit">Submit</b-button>
        </div>
      </div>
    </b-card>
    <div v-else class="card">
      <h2>you don`t have permission to add album </h2>
    </div>
    <ContentManager ref="content_manager_modal" :content="content"></ContentManager>
    <Loader v-if="loading"></Loader>
  </div>
</template>
<script>
import axios from "axios";
import ContentManager from "../../content/index";
import MorePhoto from "./MorePhoto";
import { mapGetters } from "vuex";
import iziToast from "izitoast";
import Loader from '@/views/common/Loader'

export default {
  name: "AddAlbum",
  components: { MorePhoto, ContentManager ,Loader},
  data() {
    return {
      loading:false ,
      content:{},
      more_photo_arr: []
    };
  },

  mounted() {
    this.getAlbums()
  },
  watch: {
    content: function(val) {
      this.album_detail.cover_id = val.id;
      this.album_detail.cover = val;
    }
  },
  computed: {
    ...mapGetters(["auth_permission","album_detail","album_list"])
  },
  methods: {
   
    getAlbums: function(){
      this.loading = true
      this.$store.dispatch('FETCH_ALBUMS').then(response=>{
        this.loading = false
      }).catch(error=>{
        this.loading = false
      })
    },
    get_file: function(arg) {
      if (this.album_detail.is_update) {
        return `${axios.defaults.baseURL}/uploads/${arg}`;
      } else {
        return arg;
      }
    },
    add_media: function() {
      let item = {};
      item.title = null;
      item.file = null;
      item.id = null;
      item.mark = true; // marking newsly created item
      this.album_detail.more_photo.push(item); // todo 
    },
    reset_album: function() {
      this.content_list = [];
    },
    submit: function() {
      this.album_detail.more_photo_ids = this.album_detail.more_photo.map(v => v.id);
      if (this.album_detail.is_update) {
        // update
        let payload = {
          data: this.album_detail,
          id: this.album_detail.id
        };
        this.$store
          .dispatch("UPDATE_ALBUM",payload)
          .then(response => {
            iziToast.success({
              position: "topRight",
              title: "Ok",
              message: "Album Added Updated"
            });
          })
          .catch(error => {
            console.log(error)
            iziToast.error({
              position: "topRight",
              title: "error",
              message: "Could Not Update Album"
            });
          });
      } else {
        // add
        this.$store
          .dispatch("ADD_ALBUM", this.album_detail)
          .then(response => {
            iziToast.success({
              position: "topRight",
              title: "Ok",
              message: "Album Added Successsfully"
            });
          })
          .catch(error => {
            iziToast.error({
              position: "topRight",
              title: "error",
              message: "Error adding album"
            });
          });
      }
    },
    ContentManagerModal() {
      this.$refs.content_manager_modal.openModal();
    }
  }
};
</script>