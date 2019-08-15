<template>
    <div id="content_list_modal" class="modal fade" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="modal-body">
                    <div class="content_tabs">
                        <span @click="load_contents(1)" :class="{active : activeTab == 1}">My Contents</span>
                        <span @click="load_contents(2)" :class="{active : activeTab == 2}">Upload Content</span>
                        <!--<span @click="load_contents(3)" :class="{active : activeTab == 3}">Share Contents</span>-->
                    </div>
                <div class="content_bank">
                     <h1><i class="fa fa-edit"></i> Content Bank</h1>
                </div>
                    <div class="content_dtl_block">
                        <myContentList v-show="activeTab==1" :username="username" :storage_path="storage_path" :content_image_path="content_image_path" 
                        :role='role'
                        :module_access='module_access'
                        :role_assign_access='role_assign_access'
                        ref="myContentList"></myContentList>
                        <uploadNewContent v-show="activeTab==2" :username="username" :storage_path="storage_path" :content_image_path="content_image_path" :add_new_content="add_new_content"
                        :role='role'
                        :module_access='module_access'
                        :role_assign_access='role_assign_access'
                        ref="uploadNewContent"></uploadNewContent>
                        <!--<shareContentList v-if="activeTab==3" :username="username" :storage_path="storage_path" :content_image_path="content_image_path" ref="shareContentList"></shareContentList>-->
                    </div>
                </div><!--end .modal-body-->

                <div class="action-btn">
                    <button class="btn btn-link close-modal-btn" data-dismiss="modal"><i class="icon-cross2 font-size-base mr-1"></i></button>
                    <button v-if="submit_btn_allow" class="btn bg-primary content-submit-btn" data-dismiss="modal" @click='save'><i class="icon-checkmark3 font-size-base mr-1"></i></button>
                </div>

            </div>
        </div>
    </div>
</template>
<script>
    import myContentList from './my_contents.vue';
    import uploadNewContent from './upload_new_content.vue';
    import shareContentList from './share_contents.vue';    
    export default {
        props: ['username','storage_path','content_image_path','role','module_access','role_assign_access'],
        components: {myContentList,uploadNewContent,shareContentList},
        data(){
            return{
                activeTab: 1,
                add_new_content: 0,
                req_data_type: '',
                navList: ['video','audio','document','image'],
                content_lists: [],
                sel_content_data: [],
                req_form: '',
                submit_btn_allow: false
            }
        },
        methods: {
            load_contents(val) {
                this.activeTab = val;
                console.log(this.activeTab + '/' + this.req_data_type);
                if(val==1) this.load_req_data_contents(this.req_data_type);
                else if(val==2) {
                    //alert(this.$refs.uploadNewContent.$refs.childComponent.file);
                    this.$refs.uploadNewContent.$refs.childComponent.loadNew();
                };
            },
            load_req_data_contents(data_type,from,filesize){
                this.req_form = from;
                console.log('Req data content type : ' + data_type);
                this.req_data_type = data_type;
                
                if(this.activeTab==1) this.$refs.myContentList.loadData(this.navList[data_type-1],filesize);
                else if(this.activeTab==2) this.$refs.uploadNewContent.loadData(this.navList[data_type-1]);
                else if(this.activeTab==3) this.$refs.shareContentList.loadData(this.navList[data_type-1]);
            },
            save(){
                //console.log(this.sel_content_data);
                if(this.$parent.req_type == 'basic')
                    this.$parent.course_sel_content = this.sel_content_data;
                else if(this.$parent.req_type == 'video')
                    this.$parent.course_video_sel_content = this.sel_content_data;
                else if(this.$parent.req_type == 'document'){
                    this.$parent.course_doc_sel_content.push(this.sel_content_data);
                    this.$parent.increment_data += 1; 
                }
                else{
                    this.$parent.sel_content = this.sel_content_data;
                }
            }
        }
    }
</script>
<style>

.content_bank{
    box-shadow: 0 0 15px #000;
    color: #000;
    padding: 10px 15px;
    position: absolute;
    top: -22px;
    left: 40%;
    background-color: #f9f9f9;
    /* border: 5px solid #ccc; */
    border-radius: 25px;
}
.content_bank h1{
     color: #666;
        font-size: 18px;
        margin: 0;
}
    .content_tabs{
        display: block;
        border-bottom: 1px solid #ccc;
    }
    .content_tabs span{
        display: inline-block;
        padding: 5px 15px 10px 15px;
        border-bottom: 1px solid #ccc;
        margin-bottom: -1px;
        font-size: 14px;
        font-weight: 600;
        color: #666;
        cursor: pointer;
    }
    .content_tabs span.active{
        border-color: #CD0000;
        color: #CD0000;
        
    }
    .content_dtl_block{
        margin-top: 15px
    }
    #content_list_modal .action-btn{        
        position: fixed;
        bottom: -35px;
        right: 5%;
        text-align: center;
    }
    #content_list_modal .action-btn button{
        display: inline-block;
        background-color: #ccc;
        width: 70px;
        height: 70px;
        border-radius: 50%;
        border: 5px solid #fff;
        margin: 0 5px
    }    
    #content_list_modal .action-btn button i{
        margin-right: 0px !important;
        font-size: 1.3rem;
        color: #fff;
    }
</style>