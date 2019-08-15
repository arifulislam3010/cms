<template>
    <div class="content-list-items-block">
        <div v-if="!lists.data.length" class="error-page-msg-block">
            <i class="fa fa-box-open"></i>
            <div class="msg-title">Empty drive</div>
        </div>
        <div v-for="list in lists.data" v-bind:key="list.id" :data-id="list.id" :class="['content-list-items',{'selected' : sel_item_id==list.id}]" @click="selected_item(list)">
            <div class="cover-img">
                <div v-if="list.type=='image'">
                    <img :src="getImg(list.file_encode_path,list.owner_id)" v-bind:alt="list.title" />
                </div>
                <div v-else-if="list.cover_thumb_img!=null">
                    <img :src="getImg(list.cover_thumb_img,list.owner_id)" v-bind:alt="list.title" />
                </div>
                <div v-if="list.type=='video'" class="play-btn"><i class="fa fa-play-circle"></i></div>
                <div v-else-if="list.type=='audio'" class="play-btn audio-btn"><i class="fa fa-headphones-alt"></i></div>
                <div v-else-if="list.type=='document'" class="play-btn doc-btn"><i class="fa fa-file-alt"></i></div>

                <div class="selected-icons">
                    <span title="Delete" @click.stop="contentDelete(list.id)"><i class="far fa-trash-alt fa-lg"></i></span>
                </div>

            </div>
            <div class="list-title">
                <i v-if="list.type=='video'" class="fa fa-video"></i>
                <i v-if="list.type=='audio'" class="fa fa-volume-up"></i>
                <i v-if="list.type=='image'" class="fa fa-image"></i>
                <i v-if="list.type=='document'" class="fa fa-file-alt"></i>
                <span>{{ list.title }}</span>
            </div>
            <div class="list-date">Uploaded : {{ list.created_at | moment("from", "now") }}</div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['username','storage_path','content_image_path','lists'],
        data(){
            return{
                sel_item_id: ''
            }
        },
        methods: {
            getImg(file_path,owner_id){
                //console.log(this.storage_path);
                //return '/' + this.storage_path + '/' + this.content_image_path + 'user-' + owner_id + '/' + file_name;
                return '/cache-images/219x145x1/' + this.content_image_path + file_path;
            },
            selected_item(data){
                this.sel_item_id = data.id;
                this.$parent.$parent.submit_btn_allow = true;
                this.$parent.$parent.sel_content_data = data;
            },
            contentDelete(key){
                swal({
                    title: "Are you sure to delete that course?",
                    text: "Delete the file, please press OK",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                    })
                    .then((willDelete) => {
                    if (willDelete) {

                        axios.get(`/`+this.username+`/content-bank/api/delete/`+key)
                        .then((response)=>{
                            if(response.data.code == 200){
                                this.$parent.$parent.load_contents(1);
                                swal(response.data.message, {
                                    icon: "success",
                                });
                            }else{
                                swal({
                                    title: "Failed!",
                                    text: response.data.message,
                                    icon: "warning",
                                    button: "Close!",
                                });
                            }
                            
                        }).catch((error) =>{
                            swal({
                                title: "Failed!",
                                text: "Data deleted failed!",
                                icon: "warning",
                                button: "Close!",
                            });
                        })

                    }
                });
            }
        }
    }
</script>
<style>
    .content-list-items-block{
        display: block;
        position: relative;
        /* overflow: hidden; */
        margin-top: 15px;
        overflow-y: auto;
        max-height: 280px;
    }
    .error-page-msg-block{
        display: block;
        text-align: center;
        margin: 25px 0;
    }
    .error-page-msg-block i{
        display: inline-block;
        color: #ccc;
        font-size: 70px;
        background-color: #eee;
        padding: 50px;
        border-radius: 50%;  
    }
    .error-page-msg-block .msg-title{
        font-size: 30px; color: #999; margin-top: 15px
    }
    .content-list-items{
        position: relative;
        width: calc(20% - 15px);
        height: 205px;
        float: left;
        margin-bottom: 15px;
        background-color: #eee;
        margin-right: 15px;
    }    
    .content-list-items:last-child {
        margin-right: 0;
    }    
    .content-list-items.selected{
        display: block;
        border: 1px solid #dea1a1;
        background-color: #dea1a1;
    }    
    .content-list-items .cover-img{
        position: relative;
        width: 100%;
        height: 145px;
        background-color: #ddd;
    }
    .content-list-items .cover-img > div{
        width: 100%;
        height: 100%;
        text-align: center;
    }
    .content-list-items .cover-img > div > img{
        width: 100%;
        height: 100%;
        object-fit: contain;
    }
    .content-list-items .cover-img > div.play-btn,
    .content-list-items .cover-img > div.audio-btn,
    .content-list-items .cover-img > div.doc-btn{
        position: absolute;
        top: 0;
    }
    .content-list-items .cover-img > div.play-btn > i{
        position: relative;
        top: 28%;
        font-size: 50px;
        color: #cccccc80;
        border-radius: 50%;
        padding: 8px;
        background-color: #00000080;
    }
    .content-list-items .cover-img > div.audio-btn > i,
    .content-list-items .cover-img > div.doc-btn > i{
        border-radius: 5px
    }
    .content-list-items:hover .cover-img > div.play-btn > i{
        color: #ccccccaa;
        background-color: #000000aa
    }
    .content-list-items .list-title{
        display: block;
        padding: 5px 15px 1px 15px;
    }
    .content-list-items .list-title i{
        color: #999;
        display: inline-block;
        margin-right: 5px;
    }
    .content-list-items.selected .list-title i{
        color: #fff;
    }
    .content-list-items .list-title span{
        position: relative;
        display: inline-block;
        font-size: 14px;
        width: calc(100% - 28px);
        color: #666;
        overflow: hidden;        
        text-overflow: ellipsis;
        white-space: nowrap;
        top: 4px;
    }
    .content-list-items.selected .list-title span{
        color: #fff;
    }
    .content-list-items .list-date{
        font-size: 11px;
        color: #999;
        padding: 0 15px 5px 15px;
    }
    .content-list-items.selected .list-date{
        color: #fff
    }
    div.cover-img > div.selected-icons{
        display: inline-block;
        position: absolute;
        width: 100%; height: auto;
        right: 0;
        bottom: 0;
        text-align: right;
        color: #ffffff;
        padding: 10px 15px;
        font-size: 13px;
        font-weight: normal;
        background: linear-gradient(to bottom, rgba(0,0,0,0) 0%, rgba(0,0,0,0.8) 100%);
    }
    div.cover-img > div.selected-icons > span{
        display: inline-block;
        width: 32px;
        height: 32px;
        line-height: 30px;
        text-align: center;
        background-color: #33333380;
        border-radius: 50%;
        margin-left: 5px;
        font-size: 10px;
        border: 1px solid #999;
        bottom: 6px;
        right: 12px;
        cursor: pointer;
    }
</style>