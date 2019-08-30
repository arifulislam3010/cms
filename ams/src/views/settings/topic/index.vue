<template>
  <div class="card">

        <div class="container-fluid">
            <button class="btn btn-primary contct-b pull-left" @click="openModal"><i class="fa fa-life-bouy"></i> Add Topic</button>

            <form class="form-inline contct my-2 my-lg-0 pull-right">
                <input  class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" >Search</button>
            </form>



            <table class="table table-sm">
                <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Title</th>
                      <th scope="col">Cover</th>
                      <th scope="col">Status</th>
                      <th scope="col">Created By</th>
                      <th scope="col">Updated By</th>
                      <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(topic,index) in topics" :key="index">
                      <td>{{index+1}}</td>
                      <td>{{topic.title}}</td>
                      <td>{{topic.cover}}</td>
                      <td>{{topic.status}}</td>
                      <td>{{topic.created_by}}</td>
                      <td>{{topic.updated_by}}</td>
                      <td>
                            <i  @click="editTopicModal(topic,index)" class="icon-note icons actn"> </i>
                            <i @click="viewTopicModal(topic)" class="icon-eye icons   actn"> </i>
                            <i  @click="deleteTopic(index,topic.id)" class="icon-trash icons   actn"> </i>
                      </td>
                    </tr>
                </tbody>

            </table>
            <nav aria-label="Page navigation example">
                <pagination :data="Object.assign({},topicP2)" @pagination-change-page="getResults"></pagination>
            </nav>

        </div>
        <AddTopicModal ref="add_topic_modal"></AddTopicModal>
        <EditTopicModal ref="edit_topic_modal"></EditTopicModal>
        <ViewTopicModal ref="view_topic_modal"></ViewTopicModal>

  </div>
</template>

<script>
import axios from 'axios'
import pagination from 'laravel-vue-pagination'
import Loader from '@/views/common/Loader'

import AddTopicModal from './AddTopicModal'
import EditTopicModal from './EditTopicModal'
import ViewTopicModal from './ViewTopicModal'


import { mapState,mapGetters,mapActions } from "vuex"
import { All_TOPIC,DELETE_TOPIC,SEARCH_TOPIC,ALL_USER_ROLE2 } from '@/store/action.type';
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
             isActive: true
        }
    },
    methods:{
    parentChilds(index){
      alert(index);
      this.parnt_index = index;
    },

     activate:function(el){
        this.active_el = el;
    },
      listGroup(index){
        this.showSection.isOpen = !this.showSection.isOpen
      },

      listGroup2(){
        this.showSection2 = !this.showSection2
      },

      TopicModal(){
            this.$refs.add_topic_modal.openModal()
        },

        editTopicModal(topic,index){
            this.$refs.edit_topic_modal.openModal(topic,index)
        },
        viewTopicModal(topic){
            this.$refs.view_topic_modal.openModal(topic)
        },

      searchTopic(){
            this.loading = true
            var data = this.search
            var page = 1
            this.$store.dispatch('SEARCH_TOPIC',{page,data})
                .then(response=>{
                    this.loading=false;
                })
                .catch(error=>{
                    this.loading=true;
                });
        },
      getResults(page =1){
            this.loading = true;
            var data = this.search
            if(data != ''){
                this.$store.dispatch('SEARCH_TOPIC',{page,data})
                .then(response=>{
                    this.loading=false;
                })
                .catch(error=>{
                    this.loading=true;
                });
            }
            else{
                alert('sss');
                this.$store.dispatch('All_TOPIC',page)
                .then(response=>{
                    this.loading=false;
                })
                .catch(error=>{
                    this.loading=true;
                });
            }
        },

        deleteTopic(index,id){
            var self = this
            this.$iziToast.question({
                timeout: 10000,
                close: false,
                overlay: true,
                displayMode: 'once',
                id: 'question',
                zindex: 999,
                title: 'Hey',
                message: 'Are you sure To Delete?',
                position: 'center',
                buttons: [
                    ['<button><b>YES</b></button>', function (instance, toast) {
                        self.$store.dispatch('DELETE_TOPIC',{index,id})
                        .then(response=>{
                            self.$iziToast.success({position:'topRight',title:'Ok',message:"Topic Delated Successsfully"})

                        })
                        .catch(error=>{
                            self.$iziToast.error({position:'topRight',title:'Error',message:"Something Wrong !!"})
                        });
                        instance.hide({ transitionOut: 'fadeOut' }, toast, 'button');

                    }, true],
                    ['<button>NO</button>', function (instance, toast) {

                        instance.hide({ transitionOut: 'fadeOut' }, toast, 'button');

                    }],
                ]
            });

        },

      openModal(){
            this.$refs.add_topic_modal.openModal()
        },
        // getPermission(){
        //     this.$store.dispatch('ALL_USER_ROLE2')
        //     .then(response=>{
        //         this.permission = response.data.permission
        //     })
        // }
    },

     mounted(){
        this.getResults()

        // this.getPermission()

    },
    computed: {
      ...mapGetters(["topics","topicP2"]),
    },

    components: {
        EditTopicModal,
        ViewTopicModal,
        pagination,
        AddTopicModal
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

