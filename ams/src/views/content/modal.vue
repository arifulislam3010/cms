<template>
    <div id="content_add_modal" class="modal fade" tabindex="-1">
        <div class="modal-dialog modal-full">
            <div class="modal-content">
                <div class="modal_navigation">
                    <h1><i class="fa fa-edit"></i> Content configuration block</h1>
                </div>
                <div class="modal-body">
                    <div class="overlay-loader-block">
                        <div class="loader">
                            <i class="fa fa-cog fa-spin"></i> wait, data saving...
                        </div>
                    </div>                    
                    <div class="content-upload-system-block">
                        <div class="left-content-block">
                            <UploadForm :username='username' :content_image_path='content_image_path' :sel_content='sel_content' ref="childComponent"></UploadForm>
                        </div><!--end .left-content-block-->
                        <div class="right-content-block">
                            <ContentSettings :username='username' :storage_path='storage_path' :content_image_path='content_image_path' :sel_content='sel_content'></ContentSettings>  
                        </div><!--end .right-content-block-->

                        <div class="action-btn">
                            <button class="btn btn-link close-modal-btn" data-dismiss="modal"><i class="icon-cross2 font-size-base mr-1"></i></button>
                            <button class="btn bg-primary content-submit-btn" @click='save'><i class="icon-checkmark3 font-size-base mr-1"></i></button>
                        </div>
                    </div><!--end .content-upload-system-block-->
                </div><!--end .modal-body-->

            </div>
        </div>
    </div>
</template>
<script>
    import UploadForm from './upload-form.vue';
    import ContentSettings from './content-settings.vue';
    export default {
        props: ['username','storage_path','content_image_path','sel_content'],
        components: {
            UploadForm,
            ContentSettings
        },
        methods: {
            loadReqData(ids){
                this.$refs.childComponent.setupReqData(ids);
            },
            save(){
                $('.overlay-loader-block').fadeIn();
                $('.content-upload-system-block .action-btn button').hide();
                this.$refs.childComponent.submitForm();
                this.$parent.loadData(1,this.$parent.keyword);
            },
            load_data(req_type){
                console.log(req_type);
                this.$parent.reqDataType(req_type);
            }
        }
    }
</script>
<style scoped>
    .modal_navigation{
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
    .modal_navigation h1{
        color: #666;
        font-size: 18px;
        margin: 0;
    }

    .overlay-loader-block{
        position: absolute;
        display: none;
        background-color: #00000080;
        z-index: 9999;
        width: 98%;
        height: 96%;
        left: 1%;
        top: 2%;
    }
    .overlay-loader-block .loader{
        display: inline-block;
        position: absolute;
        background-color: #fff;
        padding: 5px 30px;
        left: 36%;
        top: 40%;
        border-radius: 15px;
        padding-left: 0px;
        font-size: 16px;
        font-weight: bold;
        color: #666;
    }
    .overlay-loader-block .loader > i{
        border-radius: 50%;
        border: 2px solid #00000080;
        padding: 15px;
        position: relative;
        left: -20px;
        background-color: #fff;
        font-size: 14px;
    }
    .modal-dialog{
        height: 85%;
        max-width: 94%;
        margin-left: 3%;
        margin-right: 3%;
    }
    .modal-dialog .modal-content{
        height: 100%
    }
    .content-upload-system-block{position: relative}
    .left-content-block{
        position: fixed;
        height: calc(100% - 50px);
        overflow-y: auto;
        width: calc(100% - 370px);
        left: 0;
        top: 0;        
        margin: 25px;
        padding: 20px 10px;
        background-color: #eee;
    }
    .right-content-block{
        position: fixed;
        background-color: #eee;
        width: 300px;
        height: calc(100% - 50px);
        right: 25px;
        top: 25px;
        overflow-y: auto;
    }
    .content-upload-system-block .action-btn{        
        position: fixed;
        bottom: -35px;
        right: 5%;
        text-align: center;
    }
    .content-upload-system-block .action-btn button{
        display: inline-block;
        background-color: #ccc;
        width: 70px;
        height: 70px;
        border-radius: 50%;
        border: 5px solid #fff;
        margin: 0 5px
    }
    .content-upload-system-block .action-btn .content-submit-btn{
        display: none
    }
    .content-upload-system-block .action-btn button i{
        margin-right: 0px !important;
        font-size: 1.3rem;
        color: #fff;
    }
</style>