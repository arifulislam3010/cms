<template>
    <div class="modal fade" id="contentShow" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">{{ show_data.title }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <div class="modal-body">
                <div class="overlay-loader-block">
                    <div class="loader">
                        <i class="fa fa-cog fa-spin"></i> wait, data saving...
                    </div>
                </div>
                <div v-if="show_data.type=='image'" class="content-file">
                    <img :src="['/' + storage_path + content_image_path +'user-' + show_data.owner_id + '/' + show_data.file_name]">
                </div>
                <div v-else-if="show_data.type=='video'" class="content-file">
                    <video :src="['/' + storage_path + content_video_path +'user-' + show_data.owner_id + '/' + show_data.file_name]" controls></video>
                </div>
                <div v-else-if="show_data.type=='audio'" class="content-file">
                    <audio :src="['/' + storage_path + content_audio_path +'user-' + show_data.owner_id + '/' + show_data.file_name]" controls></audio>
                </div>
                <div v-else-if="show_data.type=='document'" class="content-file">
                    <object :data="['https://docs.google.com/gview?url='+ protocol +'//'+ host + '/' + storage_path + content_doc_path + 'user-' + show_data.owner_id + '/' + show_data.file_name + '&embedded=true']">
                        <embed :src="['https://docs.google.com/gview?url='+ protocol +'//' + host + '/' + storage_path + content_doc_path + 'user-' + show_data.owner_id + '/' + show_data.file_name + '&embedded=true']" />
                    </object>
                </div>
            </div>
        </div>
    </div>
</div>
</template>
<script>
    export default{
        props:['username', 'storage_path','content_image_path','content_video_path','content_audio_path','content_doc_path','show_data'],

        data(){
            return{
                protocol : window.location.protocol,
                host : window.location.host,
            }
        }

    }
</script>
<style scoped>
    .content-file img{
        height: auto;
        width: 100%;
    }
    .content-file video{
        height: auto;
        width: 100%;
    }
    .content-file audio{
        height: auto;
        width: 100%;
    }
    .content-file object{
        height: auto;
        width: 100%;
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
    
</style>