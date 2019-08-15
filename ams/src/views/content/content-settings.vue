<template>
    <div class="content_settings_block">
        <!-- <label>Category</label>
        <div>
            <select size="3" v-model="content_category" name="cat_id"  class="custom-select">
                <optgroup v-for="(list,key) in CatData" v-bind:key="key">
                    <option :value="list.id">{{list.title}}</option>
                    <option v-for="(child,ck) in list.childs" :value="child.id" v-bind:key="ck"> - {{child.title}}</option>
                </optgroup>
            </select>
        </div> -->

        <label>Content Name</label>
        <div><input name="content_title" class="form-control" /></div>

        <label>Description</label>
        <div><textarea name="content_desc" class="form-control"></textarea></div>        

        <div class="row action_buttons share-block">
            <div class="col-3">
                <span class="switch small" data-action="share_it"></span>
            </div>
            <div class="col">Share to all</div>
            <input type="hidden" name="share_it" v-on:change="changeHandler" />
        </div>

        <div class="license-block">
            <label>License</label>
            <div><select name="license" class="form-control">                
                <option value="1">1. License not specified</option>
                <option value="2">2. Creative Commons Attribution</option>
                <option value="3">3. Creative Commons Attribution Share-Alike</option>
                <option value="4">3. Creative Commons CCZero</option>
                <option value="5">4. Creative Commons Non-Commercial (Any)</option>
            </select></div>
        </div>

        <div class="row action_buttons paid-block">
            <div class="col-3">
                <span class="switch small" data-action="paid"></span>
            </div>
            <div class="col">Paid</div>
            <input type="hidden" name="paid" />
        </div>

        <div class="price-block">
            <label>Price</label>            
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">TK.</span>
                </div>
                <input type="number" name="price" class="form-control" placeholder="100">
            </div>
        </div>

        <div class="tags-block">
            <label>Tags</label>
            <div>
                <tags-input class="form-control" name="tags" element-id="tags"
                    v-model="AddTags"
                    :existing-tags="tags"
                    :typeahead="true"></tags-input>
            </div>
        </div>
        
        <div class="clearfix" style="margin: 10px 0 10px 10px">
            <div class="button_cp">
                <div class="row action_buttons copy-protect-block">
                    <div class="col-3">
                        <span class="switch small" data-action="copy_protected"></span>
                    </div>
                    <div class="col button_title">Copy protected</div>
                    <input type="hidden" name="copy_protected" />
                </div>

                <div class="row action_buttons">
                    <div class="col-3" >
                        <span class="switch small" data-action="status"></span>
                    </div>
                    <div class="col button_title">Publish</div>
                    <input type="hidden"  name="status" />
                </div>
            </div>
            <div class="content_cover_main">
                <div class="content_cover" data-toggle="modal" data-target="#content_list_modal" @click="loadData(4)">  
                    <div v-if="sel_content.id" :style="{ 'background-image': 'url(' + getImg(sel_content.file_encode_path,sel_content.owner_id) + ')' }" class="cover_img" title="Click to change">                        </div>
                    <div v-else>
                        <i class="fa fa-cloud-upload-alt"></i>
                        <div>Choose cover photo</div>
                    </div>
                </div>
            </div>
        </div>
        <!--<div class="row action_buttons tnc-block">
            <div class="col-1"><i class="far fa-square"></i></div>
            <div class="col">Terms &amp; conditions</div>            
        </div>-->       
    </div>
</template>
<script>
import VoerroTagsInput from '@voerro/vue-tagsinput';
//import VueSingleSelect from "vue-single-select";
Vue.component('tags-input', VoerroTagsInput);
    export default {
        components: {},

        props: ['username','storage_path','content_image_path','sel_content'],
        data(){
            return {
                content_category:4,
                CatData:{},
                tags:{},
                AddTags:[]                
            }
        },
        mounted(){
          //this.getResults();
        //   axios.get('/'+owner_username+'/api/app/setting/tags')            
        //     .then((response)=>{
        //         this.tags= response.data;
        //     })
        },
        methods: {
            loadData(val){
                this.$parent.load_data(val);
            },
            changeHandler: function(event) {
                console.log(event)
            },
            // getResults() {
            //     axios.get('/'+owner_username+'/category/api')
            //         .then(response => {
            //             this.CatData = response.data;
            //     });
            // },
            getImg(file_path,owner_id){
                //console.log(this.storage_path);
                //return '/' + this.storage_path + '/' + this.content_image_path + 'user-' + owner_id + '/' + file_name;
                return '/cache-images/82x58x1/' + this.content_image_path + file_path;
            }
        }
    }        

    /*$(document).on('click', '.tnc-block i', function(){
        if($(this).hasClass('fa-square')){
            $(this).removeClass('fa-square')
            $(this).addClass('fa-check-square');
        }else{
            $(this).removeClass('fa-check-square');
            $(this).addClass('fa-square');
        }
    });*/

    /*$('[name="share_it"]').change(function(){
        var getVal = $(this).val();
        console.log(getVal);
        if(getVal==1) $('.paid-block').show();
        else $('.paid-block').hide();
    });

    $('[name="paid"]').bind("change paste keyup", function(){
        var getVal = $(this).val();
        console.log(getVal);
        if(getVal==1) $('.price-block').show();
        else $('.price-block').hide();
    });*/
</script>
<style>
    .button_title{
        margin-left: 10px;
        padding-right: 5px;
    }
    .content_cover_main{
        float: right;
        display: none;
        margin-top: 10px;
    }
    .button_cp{
        position: relative; width: calc(100% - 100px);
        float: left;
        margin-left: -9px;
    }
    .content_cover{
        cursor: pointer;
        text-align: center;
        width: 82px;
        height: 58px;
        background-color: #ddd;
        border: 1px dashed #ccc;
    }
    .content_cover i{
        color: #999;
        font-size: 20px;
        padding-top: 8px;
        display: block;
    }
    .content_cover > div.cover_img{
        width: 100%;
        height: 100%;
        background-size: contain;
        background-position: center center;
        background-repeat: no-repeat;
    }
    .content_cover > div > div{
        display: block;
        font-size: 10px;
        line-height: 10px;
        color: #666;
    }
    .content_settings_block{
        display: block;
        padding: 15px
    }
    .content_settings_block label{
        display: block;
        font-size: 12px;
        font-weight: bold;
        color: #666;
        margin-top: 10px
    }
    .content_settings_block label:first-child{
        margin-top: 0
    }
    .content_settings_block div.action_buttons{
        margin-top: 10px;
        font-size: 12px;
        font-weight: bold;
        line-height: 25px;        
        color: #666;
    }
    .content_settings_block div.license-block,
    .content_settings_block div.paid-block,
    .content_settings_block div.price-block,
    .content_settings_block div.tags-block{
        margin-top: 10px; display: none
    }
    .content_settings_block div.tags-block{
        display: block
    }
    /*.content_settings_block div.tnc-block{
        margin-top: 20px;
        background-color: #ddd;
        padding: 15px 0;        
        font-size: 15px;
        color: #999;
    }
    .content_settings_block div.tnc-block i{
        font-size: 24px;
        line-height: 26px;
        color: #999;
        padding-left: 2px;
    }*/

    /**
     * SWITCH BUTTON STYLES
     */
    .content_settings_block .switch{
        width: 62px;
        height: 32px;
        background: #E5E5E5;
        z-index: 0;
        margin: 0;
        padding: 0;
        left: 15px;
        top: 1px;
        appearance: none;
        border: none;
        cursor: pointer;
        position: relative;
        border-radius:16px;
        -moz-border-radius:16px;
        -webkit-border-radius:16px;
    }
    .content_settings_block .switch:before{
        content: ' ';
        position: absolute;
        left: 1px;
        top: 1px;
        width: 60px;
        height: 30px;
        background: #FFFFFF;
        z-index: 1;
        border-radius:16px;
        -moz-border-radius:16px;
        -webkit-border-radius:16px;
    }
    .content_settings_block .switch:after{
        content: ' ';
        height: 29px;
        width: 29px;
        border-radius: 28px;
        z-index: 2;
        background: #FFFFFF;
        position: absolute;
        -webkit-transition-duration: 300ms;
        transition-duration: 300ms;
        top: 1px;
        left: 1px;
        -webkit-box-shadow: 0 2px 5px #999999;
        box-shadow: 0 2px 5px #999999;
    }
    .content_settings_block .switchOn , .switchOn:before{
        background: #4cd964 !important;
    }
    .content_settings_block .switch.big.switchOn:after{
        left: 33px !important;
    }
    .content_settings_block .switch.small{
        width: 42px;
        height: 22px;
    }
    .content_settings_block .switch.small:before{
        width: 40px;
        height: 20px;
    }
    .content_settings_block .switch.small:after{
        width:19px;
        height:19px;
    }
    .content_settings_block .switch.small.switchOn:after{
        left:23px
    }
</style>


