<template>
    <div id="my_content_list_block">
        <UploadForm :username='username' :content_image_path='content_image_path' :add_new_content='add_new_content' ref="childComponent"></UploadForm>        
    </div>
</template>

<script>        
    import UploadForm from '../upload-form.vue';

    export default {
        props: ['username','storage_path','content_image_path','add_new_content'],
        components:{UploadForm},
        data(){
            return{
            }
        },
        methods:{
        }
    }
</script>

<style scoped>    
    .upload_new_content_block{
        display: block;
        border: 2px dashed #ddd;
        text-align: center;
        padding: 10% 0;
        cursor: pointer;        
        background-color: #f5f5f5;
        border-radius: 5px;
    }
    .upload_new_content_block i{
        font-size: 72px;
        color: #ccc;
        margin-bottom: 15px;
    }
    .upload_new_content_block div{
        font-size: 24px;
        color: #bdbbbb;
        font-weight: 600;
    }
</style>