<template>
<div>


  <div class="card">
        
        <!-- {{category_list}} -->
        <!-- <ShowList :list="category_list"></ShowList> -->
        <!-- {{category_list}} -->
        <!-- {{auth_permission}} -->
        <div class="container-fluid"  v-if="false">

            <button v-if="auth_permission.category_create" class="btn btn-primary contct-b pull-left" @click="openModal"><i class="fa fa-life-bouy"></i> Add Category</button>

            <form class="form-inline contct my-2 my-lg-0 pull-right">
                <!-- <input  class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" >Search</button> -->
            </form>



            <table class="table table-sm">
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
                <tbody v-if="auth_permission.category_view || auth_permission.category_viewall">
                    <tr v-for="(item,index) in category_list" :key="index">
                      <td>{{item.id}}</td>
                      <td>{{item.label}}</td>
                      <td>{{item.parent_id}}</td>
                      <td>{{item.created_by}}</td>
                      <td>{{item.updated_by}}</td>
                      <td>
                            <i v-if="auth_permission.category_update"  @click="editCategoryModal(item)" class="icon-note icons actn"> </i>
                            <!-- <i @click="viewNcategoryModal(item)" class="icon-eye icons   actn"> </i> -->
                            <i v-if="auth_permission.category_delete"  @click="deleteCategory(item.id)" class="icon-trash icons   actn"> </i>
                      </td>
                    </tr>
                </tbody>

            </table>
            <!-- <nav aria-label="Page navigation example">
                <pagination :data="Object.assign({},ncategoryP2)" @pagination-change-page="getResults"></pagination>
            </nav> -->

        </div>



        <AddNcategoryModal ref="add_ncategory_modal"></AddNcategoryModal>
        <EditNcategoryModal ref="edit_ncategory_modal"></EditNcategoryModal>
        <ViewNcategoryModal ref="view_ncategory_modal"></ViewNcategoryModal>
        <Loader v-if="loading"></Loader>    
  </div>
  
    <div class="row">
        <div class="col-sm-3">
            <button v-if="auth_permission.category_create" class="btn btn-primary contct-b pull-left" @click="openModal"><i class="fa fa-life-bouy"></i> Add Category</button>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-8">
            <div v-for="(i,k) in category_parents" :key="k">        
                <RecCat :node="i"></RecCat>
            </div>
        </div>
    </div>
</div> 
</template>

<script>
import RecCat from "./RecCom"

import ShowList from '../list/ShowList'
import axios from 'axios'
import pagination from 'laravel-vue-pagination'
import Loader from '@/views/common/Loader'

import AddNcategoryModal from './AddNcategoryModal'
import EditNcategoryModal from './EditNcategoryModal'
import ViewNcategoryModal from './ViewNcategoryModal'


import { mapState,mapGetters,mapActions } from "vuex"
import { All_NCATEGORY,DELETE_NCATEGORY,SEARCH_NCATEGORY,ALL_USER_ROLE2 } from '@/store/action.type';
export default {
  data(){
        return {
            loading:false,
            // showSection: false,
            showSection(index){
                isOpen: false
            },
            parnt_index:'',
            // permission:'',
            search:{
                search_item:''
            },
             isActive: true,

        }
    },
    methods:{
  
    editCategoryModal(item){
        this.$refs.add_ncategory_modal.openModal()
        this.$refs.add_ncategory_modal.update = true
        this.$refs.add_ncategory_modal.item_id = item.id
        this.$refs.add_ncategory_modal.newCategory.title = item.label
        this.$refs.add_ncategory_modal.selected_parent = item.parent_id// this.category_list.find( v => v.id == item.parent_id).id 

    },    
    getCategories(){
        this.loading = true
        this.$store.dispatch('FETCH_CATEGORIES').then(response=>{
            this.loading = false
        }).catch(error=>{
            this.loading = false
        
        })
    },    
    deleteCategory(id){
        this.loading = true
        this.$store.dispatch('DELETE_CATEGORY',id).then(response=>{
            this.getCategories()
            this.loading = false    
        })
    },

      openModal(){
           this.$refs.add_ncategory_modal.update = false
           this.$refs.add_ncategory_modal.selected_parent = null
           this.$refs.add_ncategory_modal.openModal()
        },
        // getPermission(){
        //     this.$store.dispatch('ALL_USER_ROLE2')
        //     .then(response=>{
        //         this.permission = response.data.permission
        //     })
        // }
    },

     mounted(){
        // this.getResults()
        this.getCategories()
        // this.getPermission()

    },
    computed: {
      ...mapGetters(["auth_permission","category_list","category_parents"]),
    },

    components: {
        EditNcategoryModal,
        ViewNcategoryModal,
        pagination,
        AddNcategoryModal,
        ShowList,
        Loader,
        RecCat ,
    }
}
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

