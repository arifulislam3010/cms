<template>
  <div class="card">
    <div>

    </div>
    <br />
    <div>

    </div>
    <br />
    <div class="container-fluid">
      <button class="btn btn-primary contct-b pull-left" @click="openModal">
        <i v-if="auth_permission.area_create" class="fa fa-life-bouy"></i> Add Area
      </button>
      <br />
       <br />
      
      <form class="form-inline contct my-2 my-lg-0 pull-right" >
        <!-- <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" />
        <button class="btn btn-outline-success my-2 my-sm-0">Search</button> -->
      </form>
      

      <table class="table table-sm"  v-if="false">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Parent_id</th>
            <th scope="col">Created By</th>
            <th scope="col">Updated By</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody v-if="auth_permission.area_view || auth_permission.area_viewall">
          <tr v-for="(area,index) in area_list" :key="index">
            <td>{{index+1}}</td>
            <td>{{area.label}}</td>
            <td>{{area.parent_id}}</td>
            <td>{{area.created_by}}</td>
            <td>{{area.updated_by}}</td>
            <td>
              <i v-if="auth_permission.area_update" @click="editAreaModal(area)" class="icon-note icons actn"></i>
              <!-- <i @click="viewAreaModal(area)" class="icon-eye icons actn"></i> -->
              <i v-if="auth_permission.area_delete || auth_permission.area_deleteall" @click="deleteArea(area.id)" class="icon-trash icons actn"></i>
            </td>
          </tr>
        </tbody>
      </table>

       <div class="row">
         <div class="col-sm-8">
          <div v-for="(i,k) in area_parents" :key="k"> 
            <RecCom :node="i"></RecCom>
          </div>
         </div>      
    </div>



      <nav aria-label="Page navigation example">
        <pagination :data="Object.assign({},areaP2)" @pagination-change-page="getResults"></pagination>
      </nav>
    </div>
    <AddAreaModal ref="add_area_modal"></AddAreaModal>
    <EditAreaModal ref="edit_area_modal"></EditAreaModal>
    <ViewAreaModal ref="view_area_modal"></ViewAreaModal>
    <Loader v-if="loading"></Loader>
  </div>
</template>

<script>
import RecCom from "./RecCom"
import axios from "axios";
import pagination from "laravel-vue-pagination";

import AddAreaModal from "./AddAreaModal";
import EditAreaModal from "./EditAreaModal";
import ViewAreaModal from "./ViewAreaModal";
import Loader from '@/views/common/Loader'

import { mapState, mapGetters, mapActions } from "vuex";
import {
  All_AREA,
  DELETE_AREA,
  SEARCH_AREA,
  ALL_USER_ROLE2
} from "@/store/action.type";
export default {
  data() {
    return {
      loading: false,
      // showSection: false,
      showSection(index) {
        isOpen: false;
      },
      parnt_index: "",
      // permission:'',
      search: {
        search_item: ""
      },
      isActive: true
    };
  },
  methods: {
 
    getAreas() {
      this.loading = true
      this.$store.dispatch("FETCH_AREAS").then(response=>{
        this.loading = false
      }).catch(error=>{  
        this.loading = false
      });
    },


 
    listGroup(index) {
      this.showSection.isOpen = !this.showSection.isOpen;
    },

    listGroup2() {
      this.showSection2 = !this.showSection2;
    },

    addAreaModal() {
      this.$refs.add_area_modal.openModal();
    },

    editAreaModal(area) {
      this.$refs.add_area_modal.openModal();
      this.$refs.add_area_modal.update = true;
      this.$refs.add_area_modal.newArea.parent_id = area.parent_id;
      this.$refs.add_area_modal.newArea.title = area.label;
      this.$refs.add_area_modal.item_id = area.id;
    },
    viewAreaModal(area) {
      this.$refs.view_area_modal.openModal(area);
    },

    searchArea() {
      this.loading = true;
      var data = this.search;
      var page = 1;
      this.$store
        .dispatch("SEARCH_AREA", { page, data })
        .then(response => {
          this.loading = false;
        })
        .catch(error => {
          this.loading = true;
        });
    },
    getResults(page = 1) {
      this.loading = true;
      var data = this.search;
      if (data != "") {
        this.$store
          .dispatch("SEARCH_AREA", { page, data })
          .then(response => {
            this.loading = false;
          })
          .catch(error => {
            this.loading = true;
          });
      } else {
        alert("sss");
        this.$store
          .dispatch("All_AREA", page)
          .then(response => {
            this.loading = false;
          })
          .catch(error => {
            this.loading = true;
          });
      }
    },

    deleteArea(id) {

      var self = this;
      this.$iziToast.question({
        timeout: 10000,
        close: false,
        overlay: true,
        displayMode: "once",
        id: "question",
        zindex: 999,
        title: "Hey",
        message: "Are you sure To Delete?",
        position: "center",
        buttons: [
          [
            "<button><b>YES</b></button>",
            function(instance, toast) {
              self.$store
                .dispatch("DELETE_AREA",id)
                .then(response => {
                  self.$iziToast.success({
                    position: "topRight",
                    title: "Ok",
                    message: "Area Delated Successsfully"
                  });
                  self.getAreas()
                })
                .catch(error => {
                  self.$iziToast.error({
                    position: "topRight",
                    title: "Error",
                    message: "Something Wrong !!"
                  });
                });
              instance.hide({ transitionOut: "fadeOut" }, toast, "button");
            },
            true
          ],
          [
            "<button>NO</button>",
            function(instance, toast) {
              instance.hide({ transitionOut: "fadeOut" }, toast, "button");
            }
          ]
        ]
      });
    },

    openModal() {
      this.$refs.add_area_modal.openModal();
    }
    // getPermission(){
    //     this.$store.dispatch('ALL_USER_ROLE2')
    //     .then(response=>{
    //         this.permission = response.data.permission
    //     })
    // }
  },

  mounted() {
    // this.getResults()
    this.getAreas();
    // this.getPermission()
  },
  computed: {
    ...mapGetters(["auth_permission","area_list", "area_parents"])
  },

  components: {
    EditAreaModal,
    ViewAreaModal,
    pagination,
    AddAreaModal,
    Loader ,
    RecCom
  }
};
</script>

<style scoped>
.just-padding {
  padding: 15px;
}

.list-group.list-group-root {
  padding: 0;
  overflow: hidden;
}

.list-group.list-group-root .list-group {
  margin-bottom: 0;
}

.list-group.list-group-root .list-group-item {
  border-radius: 0;
  border-width: 1px 0 0 0;
}

.list-group.list-group-root > .list-group-item:first-child {
  border-top-width: 0;
}

.list-group.list-group-root > .list-group > .list-group-item {
  padding-left: 30px;
}

.list-group.list-group-root > .list-group > .list-group > .list-group-item {
  padding-left: 45px;
}

.list-group-item .glyphicon {
  margin-right: 5px;
}
</style>

