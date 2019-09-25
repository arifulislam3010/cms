<template>
    <div class="card">
      <div>    
        <button class="btn btn-primary contct-b pull-left" @click="openModal">
            <i v-if="auth_permission.scroll_create" class="fa fa-life-bouy"></i> Add Scroll
        </button>
      </div>  
        <table class="table table-sm">
            <thead>
                <tr>
                    <th>#</th>
                    <th>title</th>
                    <th>parent id</th>
                    <th>created by</th>
                    <th>updated by</th>
                    <th>actions</th>
                </tr>
            </thead>
            <tbody v-if="auth_permission.scroll_view || auth_permission.scroll_viewall">
                <tr v-for="(item,key) in scroll_list" :key="key">
                       <td>{{key+1}}</td> 
                       <td>{{item.label}}</td> 
                       <td>{{item.parent_id}}</td> 
                       <td>{{item.created_by}}</td> 
                       <td>{{item.updated_by}}</td> 
                       <td>
                           <!-- <a href="#" @click="update_scroll(item)" style="margin-right:10px">update</a>
                           <a href="#" @click="delete_scroll(item.id)">delete</a> -->
                           <i v-if="auth_permission.scroll_update" @click="update_scroll(item)" class="icon-note icons actn"></i>
                           <!-- <i @click="viewTopicModal(topic)" class="icon-eye icons actn"></i> -->
                           <i v-if="auth_permission.scroll_delete || auth_permission.scroll_deleteall" @click="delete_scroll(item.id)" class="icon-trash icons actn"></i>
                       </td> 
                </tr>
            </tbody>
        </table>
        <AddScroll ref="add_scroll_modal"></AddScroll>
        <Loader v-if="loading"></Loader>
    </div>
</template>

<script>
import {mapGetters} from "vuex"
import AddScroll from "./AddScroll"
import Loader from "@/views/common/Loader";

export default {
    components:{AddScroll,Loader},
    data(){
        return{
            loading: false ,
        }
    },
    computed:{
        ...mapGetters(['auth_permission','scroll_list'])
    },
    mounted(){
        this.getScrolls()
    },
    methods:{
        loadPermission(){
        //auth_permission
            this.$store.dispatch('FETCH_CURRENT_USER_PERMISSION')
        } ,        
        update_scroll: function(item){
            this.$refs.add_scroll_modal.openModal();
            this.$refs.add_scroll_modal.update = true;
            this.$refs.add_scroll_modal.newScroll.parent_id = item.parent_id;
            this.$refs.add_scroll_modal.newScroll.title = item.label;
            this.$refs.add_scroll_modal.item_id = item.id;
        },
        delete_scroll: function(id){
            this.$store.dispatch('DELETE_SCROLL',id).then(response=>{
                this.getScrolls()
            }).catch(error=>{

            })
        },
        getScrolls: function(){
            this.loading = true
            this.$store.dispatch('FETCH_SCROLLS').then(response=>{
                this.loading = false
            }).catch(error=>{
                this.loading = false
            })
        },
        openModal: function(){
            this.$refs.add_scroll_modal.openModal()
        }
    },
}
</script>