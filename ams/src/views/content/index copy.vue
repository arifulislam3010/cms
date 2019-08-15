<template>

    <div class="card">                

        <div class="card-header bg-transparent header-elements-inline">
            <h6 class="card-title drive-title">
                <i class="fab fa-google-drive"></i>
                <span>Content Drive</span>
            </h6>
            <div class="col-md-7">
                <div class="content-srch-block">
                    <i class="fa fa-search" @click="srchContent" ref="srchClick"></i>
                    <input type="text" @keyup.enter="srchTrigger" v-model="keyword" class="form-control content-srch" placeholder="Search Drive">
                </div>
            </div>
            <div class="col-md-2">
                <span v-if="createAccess()" class="new-btn" data-toggle="modal" data-target="#content_add_modal" data-backdrop="static" data-keyboard="false" @click="addData"><i class="fa fa-plus"></i>New Content</span>
                <span v-if="updateAccess()" class="edit-btn" data-toggle="modal" data-target="#content_add_modal" data-backdrop="static" data-keyboard="false" @click="editData"><i class="fa fa-edit"></i>Edit Content</span>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <ul class="content-nav-list">
                    <li @click="activate(1)" :class="{ active : isActive == 1 }" ><i class="fa fa-hdd"></i><span>My Drive</span></li>
                    <li @click="activate(2)" :class="{ active : isActive == 2 }" ><i class="fa fa-clock"></i><span>Recent</span></li>
                    <li @click="activate(3)" :class="{ active : isActive == 3 }" ><i class="fa fa-video"></i><span>Videos</span></li>
                    <li @click="activate(4)" :class="{ active : isActive == 4 }" ><i class="fa fa-volume-up"></i><span>Audios</span></li>
                    <li @click="activate(5)" :class="{ active : isActive == 5 }" ><i class="fa fa-images"></i><span>Images</span></li>
                    <li @click="activate(6)" :class="{ active : isActive == 6 }" ><i class="fa fa-file-alt"></i><span>Documents</span></li>
                </ul>
            </div>
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-12">
                        <div class="content-header">
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="content-breadcrumb">
                                        <ul v-html="breadcrumb"></ul>
                                    </div><!--end .content-breadcrumb-->
                                </div><!--end .col-md-9-->
                                <div class="col-md-3" align="right">                                    
                                </div>
                            </div><!--end .row-->
                            <!--<div id="content-loader">
                                <i class="fa fa-cog fa-spin"></i> Loading...
                            </div>-->
                        </div><!--end .content-header-->
                    </div><!--end .col-md-12-->

                    <div class="col-md-12">
                        <ContentLoader :counts='3' :username='username' v-if="isLoading==true"></ContentLoader>
                        
                        <!-- Data table start -->
                        <List v-if="isLoading==false"
                            :username='username'
                            :storage_path='storage_path' :content_image_path='content_image_path'
                            :lists='lists'
                            :sel_content='sel_content'></List>
                        <!-- data table end -->                        
                    </div>                    
                </div><!--end .row-->

                <div class="pagination-block" align="center">
                    <pagination :data="lists" @pagination-change-page="loadData" v-if="isLoading==false"></pagination>
                </div>
            </div>
        </div>
        
        <!-- Add modal start -->
        <ContentAddModal :username='username' :storage_path='storage_path' :content_image_path='content_image_path' :sel_content='sel_content' ref='childComponent'></ContentAddModal>
        <!-- Add modal end -->

        <ContentListModal :username='username' :content_image_path='content_image_path' :show_data='show_data' ref='contentListComponent'></ContentListModal>

        <ContentShow 
            :username='username'
            :storage_path='storage_path'
            :content_image_path='content_image_path'
            :content_video_path='content_video_path'
            :content_audio_path='content_audio_path'
            :content_doc_path='content_doc_path'
            :show_data='show_data'
            ref='ContentShow'></ContentShow>
                
    </div>
    
</template>

<script>
    Vue.component('pagination', require('laravel-vue-pagination'));
    import ContentListModal from '../Content/content_list_modal/index.vue';
    import ContentAddModal from './modal.vue';
    import ContentLoader from './content-loader.vue';
    import List from './list.vue';
    import ContentShow from './content_show.vue';

    export default {
        props: [],
        components: {ContentAddModal,ContentLoader,List,ContentListModal,ContentShow},
        data(){
            return{
                username:'',
                storage_path:'',
                content_image_path:'',
                content_video_path:'',
                content_audio_path:'',
                content_doc_path:'',
                role:{},
                module_access:{},
                role_assign_access:{},
                breadcrumb:'',
                lists:{},
                selItems: [],
                navList: ['all','recent','video','audio','image','document','search'],
                breadcrumbArrList: ['My Drive','Recent','Videos','Audios','Images','Documents','Search'],
                notificationsclass:'',
                styleSection:'',
                isActive:1,
                isLoading:false,
                keyword: '',
                sel_content: [],
                show_data: [],
            }
        },
        watch:{
        },
        mounted(){
            this.loadData();
            $('#page_content_loader').hide();
        },
        computed:{
        },
        methods:{
            createAccess(){
                var create =  false;
                if(JSON.parse(this.module_access).create==1){
                    create = true;
                }else if(JSON.parse(this.role_assign_access).create==1){
                    create = true;
                }
                return create;
            },
            updateAccess(){
                var create =  false;
                if(JSON.parse(this.module_access).update==1){
                    create = true;
                }else if(JSON.parse(this.role_assign_access).update==1){
                    create = true;
                }
                return create;
            },
            addData(){
                var selItemArr = [];
                this.selItems = selItemArr;
                this.$refs.childComponent.$refs.childComponent.upload_process = false;
                $('[name="content_title"]').val('');
                $('[name="content_desc"]').val('');
                $('.selected_content').remove();
                this.$refs.childComponent.loadReqData(this.selItems);
            },
            editData(){                
                this.selItems = selItemArr;
                //console.log(this.selItems);
                this.$refs.childComponent.loadReqData(this.selItems);
            },
            loadData(page = 1, keyword = this.keyword){
                if(keyword=='') this.keyword = '';
                this.isLoading = true;

                /**
                 * Make the request to the POST /single-file URL
                 */
                axios.get( `/` + this.username + `/content-bank/api/load_data/${this.navList[this.isActive-1]}?` + (keyword!=''?`keyword=` + keyword + `&`:``) + `page=` + page)
                .then((response) => {                    
                    console.log(response.data);
                    console.log('SUCCESS!!');
                    this.breadcrumb = '<li>' + this.breadcrumbArrList[ this.isActive - 1 ] + '</li>';
                    this.lists = response.data;
                    this.isLoading = false;
                })
                .catch((response) => {
                    console.log(response);
                    console.log('FAILURE!!');
                    this.isLoading = false;
                });
            },        
            activate(el){
                this.isActive = el;
                this.loadData();
            },
            srchContent(){
                this.isActive = 7;
                this.loadData(1,this.keyword);
            },
            srchTrigger(){
                this.$refs.srchClick.click()
            },
            reqDataType(data_type){
                //console.log('Got : ' + data_type);                
                this.$refs.contentListComponent.load_req_data_contents(data_type);
            }
        }
    }

    var selItemArr = [];
    $(document).on('click', '.list-items', function(){        
        if($(this).hasClass('active')) $(this).removeClass('active');
        else $(this).addClass('active');

        if($('.list-items').hasClass('active')){
            $('.new-btn').hide(); $('.edit-btn').css('display','inline-block');
        }else{
            $('.edit-btn').hide(); $('.new-btn').css('display','inline-block');
        }

        selItemArr = [];
        $('.list-items.active').each(function(){
            var dataVal = $(this).attr('data-id');
            console.log(dataVal);
            selItemArr.push(dataVal);
        });
    });
</script>
<style>
    input:focus,
    select:focus,
    textarea:focus,
    button:focus {
        outline: none;
    }
    .drive-title{
        font-size: 22px;
        font-weight: normal;
        color: #888; 
        white-space: nowrap;      
    }
    .drive-title > i{
        font-size: 34px;
        color: #666;
        margin-right: 15px
    }
    .drive-title > span{
        display: inline-block;
        position: relative;
        top: -5px;
    }
    .content-srch-block{
        position: relative;
    }
    .content-srch-block i{
        position: absolute;
        color: #999;
        font-size: 18px;
        padding: 11px 16px;
    }
    .content-srch{
        background-color: #f5f5f5;
        border: 1px solid #eee;
        padding: 0px 15px 0 50px;
        height: 40px;
    }
    .content .card-header .col-md-7{
        padding-right: 0;
    }
    .content .card-header .col-md-2{
        padding-left: 0;
        padding-right: 0;
        text-align: right;
    }
    .content-header{
        position: relative;
        margin: 15px;        
        margin-left: 0;
        padding-bottom: 15px;
        border-bottom: 1px solid #eee;
    }
    .content-header #content-loader{
        display: inline-block;
        padding: 6px 15px;
        position: absolute;
        background-color: #fff;
        border: 1px solid #eee;
        color: #666;
        bottom: -35px;
        left: 40%;
        z-index: 100;
        -webkit-box-shadow: 0px 10px 20px #888;
        box-shadow: 0px 10px 20px #888;
        border-radius: 0 0 5px 5px;
        font-size: 14px;
    }
    .card-header .new-btn,
    .card-header .edit-btn{
        border: 1px solid #ccc;
        display: inline-block;
        padding: 7px 15px 7px 40px;
        position: relative;
        background-color: #412059;
        background-image: linear-gradient(to left, #7b4c9c, #2b0f3f);
        border-radius: 25px;
        font-size: 14px;
        cursor: pointer;
        color: white;
    }
    .card-header .new-btn i,
    .card-header .edit-btn i{
        position: absolute;
        width: 37px;
        height: 37px;
        background-color: #7b4c9c;
        color: white;
        background-image: linear-gradient(to left, #7b4c9c, #2b0f3f);
        text-align: center;
        padding-top: 10px;
        left: -10px;
        top: -1px;
        border-radius: 50%;
        border: 1px solid #ccc;
    }
    .card-header .edit-btn{
        display: none
    }
    .content-nav-list{
        height: 100%;
        background-color: #eee;
        padding: 15px 15px 15px 0;
        margin: 0;
        list-style: none;
        box-shadow: 10px 0px 25px #ddd;
        border-right: 1px solid #ddd;
    }
    .content-nav-list li{        
        display: block;
        padding: 10px 15px;
        margin-bottom: 5px;
        border-radius: 0 25px 25px 0;        
        color: #666;
        text-shadow: 1px 1px 10px #fff;
        cursor: pointer;
    }
    .content-nav-list li:hover{
        background-color: #ddd
    }
    .content-nav-list li.active{
        background-color: #d0d0d0;
    }
    .content-nav-list li i{
        width: 30px;
        height: 20px;
        text-align: center;
        color: #999;
        margin-right: 10px;
        font-size: 20px;
        position: relative;
        top: 1px;
    }    
    .content-nav-list li.active i{
        color: #666;
    }
    .content-nav-list li span{
        display: inline-block;
        font-size: 14px
    }    
    .content-breadcrumb ul{
        margin: 0;
        padding: 0;
        list-style: none;
    }
    .pagination-block{
        margin: 15px 15px 15px 0;
        border-top: 1px solid #eee;
        padding-top: 15px        
    }
</style>
