<template>
    <div class="container">
        
        <!-- notifications start -->
        <notifications position="bottom right" group="upload" :classes="notificationsclass"/>
        <!-- Notifications end -->

        <div class="row pre-scrollable">
            <div v-for="(item, index) in editItems.data" v-bind:key="item.id" :class="['col-4','selected_content']">
                <div :class="['upload_preview_block']" v-if="editItems.data.length>0">
                    <div :class="['preview_content',(index==0?'active':'')]">
                        <img v-if="item.type=='image'" v-bind:src="'/cache-images/219x145x1/' + content_image_path + item.file_encode_path" />
                        <i v-else-if="item.type=='video'" class="fa fa-play-circle"></i>
                        <i v-else-if="item.type=='audio'" class="fa fa-headphones"></i>
                        <i v-else class="fa fa-file-alt"></i>
                    </div>
                </div>
            </div>
            <div :class="['col-4','add-content-btn']" v-if="editItems.length==0" @click="$refs.file.click()">
                <div>
                    <i class="fa fa-cloud-upload-alt"></i>
                    <span>Browse and upload the content</span>
                </div>
            </div>
        </div>
        <input type="file" name="file" id="content_file" ref="file" @change="handleFileUpload()" multiple/>
    </div>
</template>
<script>
    var append_layout = '<div class="col-4 selected_content">';
        append_layout = append_layout + '<div class="upload_preview_block">';
        append_layout = append_layout + '<div class="preview_content"></div>';        
        append_layout = append_layout + '<progress max="100" value="0"></progress>';
        append_layout = append_layout + '</div></div>';
    
    var file_index = 0, upload_index = 0, progressValArr = [], uploadContentDataArr = [], succ_upload_index = [], sel_index = 0;
    
    /** 
     * FOR UPLOAD PROGRESS BAR
     */
    const myUploadProgress = (myFileId,sl,file_type,elm) => (progress) => {
        let get_progess = parseInt( Math.floor( (progress.loaded * 100) / progress.total ) );
        //console.log(myFileId);
        console.log('Serial : ' + myFileId + '.' + sl);
        console.log(get_progess);
        if(get_progess==100) elm.chunk_completed_size[myFileId - 1] += 1;

        elm.file_completed[myFileId - 1] += Math.floor(get_progess/elm.chunk_list[myFileId - 1], 2);
        
        let percentage = (elm.chunk_completed_size[myFileId - 1]==elm.chunk_list[myFileId - 1]?100:elm.file_completed[myFileId - 1]);

        if(percentage==100){
            elm.margeChunkFiles(myFileId,file_type);
            $('.selected_content:nth-child('+ (myFileId) +') > .upload_preview_block > progress').val(percentage).hide();
            succ_upload_index.push(myFileId - 1);
        }
        else $('.selected_content:nth-child('+ (myFileId) +') > .upload_preview_block > progress').val(percentage);
    }

    export default {
        props: ['username','content_image_path','sel_content'],
        /**
         * Defines the data used by the component
         */
        data(){
            return {
                file: [],
                editItems: [],
                notificationsclass:'',
                chunk_list: [],
                chunk_completed_size: [],
                file_completed: [],
                sliceSize: 1024*1024
            }
        },
        mounted(){
            //console.log(this.editItems.length);
        },
        watch:{
            sel_content: function(event){
                uploadContentDataArr[sel_index].cover_thumb_img = event.file_encode_path;
                console.log(uploadContentDataArr[sel_index]);
            }
        },
        methods:{
            loadNew(){
                file_index = 0, upload_index = 0, progressValArr = [], uploadContentDataArr = [], succ_upload_index = [], sel_index = 0;
                this.file = [];
                $('.selected_content').remove();
            },
            setupReqData(ids){
                console.log(ids);
                axios.post( '/'+ this.username +'/content-bank/api/edit_data',ids )
                .then((response) => {  
                    console.log(response.data);
                    console.log('SUCCESS!!');
                    
                    this.editItems = response.data;
                    uploadContentDataArr = this.editItems.data;                 
                    content_setup(0);

                    console.log(this.editItems);

                    $('.content-upload-system-block .action-btn .content-submit-btn').css('display','inline-block');
                })
                .catch((response) => {
                    //console.log(response);
                    this.editItems = [];
                    
                    console.log('FAILURE!!');                    
                });
            },
            handleFileUpload(){
                for(let i=0; i < this.$refs.file.files.length; i++){
                    /**
                     * Set the local file variable to what the user has selected.
                     */
                    //this.file[i] = this.$refs.file.files[i];
                    this.file.push(this.$refs.file.files[i]);
                    let fui = this.file.length - 1;
                    console.log(this.file[fui]);

                    /**
                     * Initialize a File Reader object
                     */
                    let reader  = new FileReader();
                    let file_type = '';                    

                    /**
                     * Add an event listener to the reader that when the file
                     * has been loaded, we flag the show preview as true and set the
                     * image to be what was read from the reader.
                     */
                    reader.addEventListener("load", function () {
                        console.log('File Type : ' + file_type);           

                        if(file_index==0){
                            $('[name="content_title"]').val(uploadContentDataArr[0].title);
                            $('.content-upload-system-block .action-btn button').css('display','inline-block');
                        }
                        if(file_type !== ''){

                            // append data to upload section
                            $('.add-content-btn').before(append_layout);
                        
                            //console.log(reader.result);                        
                            if(file_type=='video') $('.selected_content:nth-child('+ (file_index+1) +') > .upload_preview_block > .preview_content').html('<i class="fa fa-video"></i>');
                            else if(file_type=='document') $('.selected_content:nth-child('+ (file_index+1) +') > .upload_preview_block > .preview_content').html('<i class="fa fa-file-alt"></i>');
                            else if(file_type=='audio') $('.selected_content:nth-child('+ (file_index+1) +') > .upload_preview_block > .preview_content').html('<i class="fas fa-headphones"></i>');
                            else $('.selected_content:nth-child('+ (file_index+1) +') > .upload_preview_block > .preview_content').html('<img src="' + reader.result + '" />');
                            //console.log(file_index);

                            if(file_index==0) $('.selected_content:nth-child('+ (file_index+1) +') > .upload_preview_block > .preview_content').addClass('active');
                            
                            file_index = file_index + 1;
                            //console.log(file_index);
                            //console.log(this.username);
                            //console.log(this.file);     
                        }
                    }.bind(this), false);

                    /**
                     * Check to see if the file is not empty.
                     */
                    if( this.file[fui] ){
                        /**
                         * Ensure the file is an image file.
                         */
                        if ( /\.(jpe?g|png|gif)$/i.test( this.file[fui].name ) ) {
                            file_type = 'image';
                            /**
                             * Fire the readAsDataURL method which will read the file in and
                             * upon completion fire a 'load' event which we will listen to and
                             * display the image in the preview.
                             */
                            reader.readAsDataURL( this.file[fui] );
                        } else if ( /\.(mp4|avi|mpeg|mov|mpeg-4|wmv|mpeg-ps|flv|3gpp|webm)$/i.test( this.file[fui].name ) ) {
                            file_type = 'video';
                            //console.log(this.file[fui].name);
                            reader.readAsDataURL( this.file[fui] );
                        } else if ( /\.(pdf|doc|docx|ppt|pptx|xls|xlsx)$/i.test( this.file[fui].name ) ) {
                            file_type = 'document';
                            //console.log(this.file[fui].name);
                            reader.readAsDataURL( this.file[fui] );
                        } else if ( /\.(mp3)$/i.test( this.file[fui].name ) ) {
                            file_type = 'audio';
                            //console.log(this.file[fui].name);
                            reader.readAsDataURL( this.file[fui] );
                        }

                        if(file_type !== ''){
                            /**
                             * Data storing setup
                             */
                            uploadContentDataArr[fui] = {};
                            uploadContentDataArr[fui].title = this.file[fui].name.split('.').slice(0, -1).join('.');
                            uploadContentDataArr[fui].cat_id = 0;
                            uploadContentDataArr[fui].type = file_type;
                            uploadContentDataArr[fui].description = '';
                            uploadContentDataArr[fui].shareable = 0;
                            uploadContentDataArr[fui].license = 0;
                            uploadContentDataArr[fui].paid = 0;
                            uploadContentDataArr[fui].price = 0;
                            uploadContentDataArr[fui].tags = '';
                            uploadContentDataArr[fui].copy_protect = 0;
                            uploadContentDataArr[fui].status = 0;

                            upload_index = upload_index + 1;
                            //console.log('Length : ' + this.file.length + ' Upload Index : ' + upload_index);
                            // Call upload file
                            this.processFile(file_type);
                        }
                    }                    
                }

                console.log(uploadContentDataArr);
            },
            processFile(file_type) {
                //console.log('Len : ' + this.file.length + ' upload_index : ' + upload_index);
                var getFile = this.file[this.file.length-1];
                var size = getFile.size;
                var sl = 1, start = 0;
                var total_chunks = Math.max(Math.ceil(size / this.sliceSize), 1);
                this.chunk_list[upload_index - 1] = total_chunks;
                this.chunk_completed_size[upload_index - 1] = 0;
                this.file_completed[upload_index - 1] = 0;
                console.log(this.chunk_list);
                this.chunk_loop(getFile,file_type,size,start,sl,total_chunks);
            },
            chunk_loop(file,file_type,size,start,sl,total_chunks) {
                var end = start + this.sliceSize;
                
                if (size - end < 0) {
                    end = size;
                }
                
                var s = this.slice(file, start, end);

                this.uploadFile(s, file_type, start, end, sl, total_chunks);

                if (end < size) {
                    start += this.sliceSize;
                    sl++;
                    setTimeout(this.chunk_loop(file,file_type,size,start,sl,total_chunks), 500);
                }
            },
            slice(file, start, end) {
                var slice = file.mozSlice ? file.mozSlice :
                            file.webkitSlice ? file.webkitSlice :
                            file.slice ? file.slice : noop;
                
                return slice.bind(file)(start, end);
            },
            noop(){},
            margeChunkFiles(file_index,file_type){
                /**
                 * Initialize the form data
                 */
                var formData = new FormData();

                /**
                 * Add the form data we need to submit
                 */
                formData.append('file_index', file_index);
                formData.append('file_type', file_type);
                formData.append('num_chunks', this.chunk_list[file_index - 1]);

                /**
                 * Make the request to the POST /single-file URL
                 */
                axios.post( '/'+ this.username +'/content-bank/api/chunk_merge',formData).then((response) => {
                    console.log(succ_upload_index);
                    uploadContentDataArr[succ_upload_index.pop()].id = response.data.id;                  
                    console.log(response.data);
                    console.log('SUCCESS!!');
                    swal({
                        title: "Success!",
                        text: "Content Uploaded!!",
                        icon: "success",
                        button: "Close!",
                    });
                })
                .catch(function(response){
                    console.log(response);
                    console.log('FAILURE!!');
                });
            },
            uploadFile(piece, file_type, start, end, sl, total_chunks){
                /**
                 * Initialize the form data
                 */
                var formData = new FormData();

                /**
                 * Add the form data we need to submit
                 */
                formData.append('start', start);
                formData.append('end', end);
                formData.append('file', piece);
                formData.append('file_index', upload_index);
                formData.append('file_type', file_type);
                formData.append('num', sl);
                formData.append('num_chunks', total_chunks);
                //console.log(getFile);
                console.log(formData);

                /**
                 * Make the request to the POST /single-file URL
                 */
                axios.post( '/'+ this.username +'/content-bank/api/chunk',
                    formData,
                    {
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        },
                        /*onUploadProgress: function( progressEvent ) {
                            var pval = parseInt( Math.round( ( progressEvent.loaded * 100 ) / progressEvent.total ) );
                            $('.selected_content:nth-child('+ (file_index-1) +') > .upload_preview_block > progress').val(pval);
                        }.bind(this)*/
                        onUploadProgress: myUploadProgress(upload_index,sl,file_type,this).bind(this)
                    }
                ).then((response) => {            
                    // console.log(succ_upload_index);
                    // uploadContentDataArr[succ_upload_index.pop()].id = response.data.id;                  
                    // console.log(response.data);
                    // console.log('SUCCESS!!');
                    // swal({
                    //     title: "Success!",
                    //     text: "Content Uploaded!!",
                    //     icon: "success",
                    //     button: "Close!",
                    // });
                })
                .catch(function(response){
                    console.log(response);
                    console.log('FAILURE!!');
                });
            },
            submitForm(){
                /**
                 * Initialize the form data
                 */                
                let formData = uploadContentDataArr;
                console.log(formData.length);
                console.log(formData);
                if(formData.length>0){
                    /**
                     * Make the request to the POST /single-file URL
                     */
                    axios.post( '/'+ this.username +'/content-bank/api/submit',
                        formData,
                        { 
                            headers: { 
                                'X-Requested-With': 'XMLHttpRequest'
                            }
                        }
                    ).then((response) => {
                        console.log('DONE!!')
                        console.log(response);
                        console.log('SUCCESS!!');

                        /**
                         * HTML div hide/show control
                         */
                        $('.selected_content').remove();
                        $('.content_settings_block input, .content_settings_block textarea').val('');
                        $('.overlay-loader-block').fadeOut();
                        $('.content-upload-system-block .action-btn .close-modal-btn').show();
                        $('.edit-btn').hide();
                        $('.new-btn').css('display','inline-block');

                        /**
                         * Reset init value
                         */
                        file_index = 0; upload_index = 0; progressValArr = [];
                        uploadContentDataArr = []; succ_upload_index = []; sel_index = 0;
                        uploadContentDataArr = [];
                        this.file = [];

                        /**
                         * Notification setup
                         */
                        /*this.notificationsclass ='vue-notification success';
                        this.$notify({
                            group: 'upload',
                            title: 'Success',
                            text: 'Succesfully Updated',
                            duration: 10000,
                            speed: 1000,
                        });*/
                    })
                    .catch(function(){
                        console.log('FAILURE!!');

                        $('.overlay-loader-block').fadeOut();
                        $('.content-upload-system-block .action-btn button').css('display','inline-block');

                    });
                }
            }
        }
    }

    function content_setup(index){
        console.log('asdasd');
        console.log(uploadContentDataArr[index]);
        $('[name="cat_id"]').val(uploadContentDataArr[index].cat_id);
        $('[name="content_title"]').val(uploadContentDataArr[index].title);
        $('[name="content_desc"]').val(uploadContentDataArr[index].description);
        
        if(uploadContentDataArr[index].shareable==1){
            
            $('.share-block .switch').addClass('switchOn');
            $('.paid-block').css('display','flex');
            $('.license-block').show();
            $('[name="share_it"]').val(1);
            $('[name="license"]').val(uploadContentDataArr[index].license);
        } else {
            
            $('.share-block .switch').removeClass('switchOn');
            $('.license-block,.paid-block,.price-block').hide();
            $('[name="share_it"]').val(0);
            $('[name="license"]').val(0);
        }

        if(uploadContentDataArr[index].paid==1){
            
            $('.paid-block .switch').addClass('switchOn');
            $('.price-block').show();
            $('[name="paid"]').val(1);

        } else {
            
            $('.paid-block .switch').removeClass('switchOn');
            $('.price-block').hide();
            $('[name="paid"]').val(0);

        }

        $('[name="price"]').val(uploadContentDataArr[index].price);
        $('[name="tags"]').val(uploadContentDataArr[index].tags);
        
        if(uploadContentDataArr[index].copy_protect==1){

            $('.copy-protect-block .switch').addClass('switchOn');
            $('[name="copy_protected"]').val(1);

        }else {

            $('.copy-protect-block .switch').removeClass('switchOn');
            $('[name="copy_protected"]').val(0);

        }

        if(uploadContentDataArr[index].type!='image'){
            if(uploadContentDataArr[index].cover_thumb_img!=null){
                // this.sel_content = null;
                // this.sel_content.id = uploadContentDataArr[index].id;
                // this.sel_content.owner_id = uploadContentDataArr[index].owner_id;
                // this.sel_content.file_encode_path = uploadContentDataArr[index].cover_thumb_img;
            }
            $('.content_cover_main').show();
        }else{
            $('.content_cover_main').hide();
        }
    }    

    /**
     * SWITCH ON/OFF
     */
    $(document).on('click', '.switch', function(){            
        $(this).toggleClass('switchOn');
        var getAction = $(this).attr('data-action');
        var getVal = $('[name="'+ getAction +'"]').val();
        if(getVal=='' || getVal==0) $('[name="'+ getAction +'"]').val(1);
        else $('[name="'+ getAction +'"]').val(0);

        if(getAction=='share_it'){
            if(getVal==0){
                $('.paid-block').css('display','flex');
                $('.license-block').show();
                uploadContentDataArr[sel_index].shareable = 1;
            }else{
                $('.license-block,.paid-block,.price-block').hide();
                uploadContentDataArr[sel_index].shareable = 0;
            }
        }

        else if(getAction=='paid'){
            if(getVal==0){
                $('.price-block').show();
                uploadContentDataArr[sel_index].paid = 1;
            }
            else {
                $('.price-block').hide();
                uploadContentDataArr[sel_index].paid = 0;
            }
        }

        else if(getAction=='copy_protected'){
            if(getVal==0){                
                uploadContentDataArr[sel_index].copy_protect = 1;
            }
            else {                
                uploadContentDataArr[sel_index].copy_protect = 0;
            }
        }

        else if(getAction=='status'){
            if(getVal==0){
                uploadContentDataArr[sel_index].status = 1;
            }else{
                uploadContentDataArr[sel_index].status = 1;
            }
        }
    });

    /**
     * Content settings on click
     */
    $(document).on('click', '.selected_content > .upload_preview_block > .preview_content', function(){
        $('.selected_content > .upload_preview_block > .preview_content').removeClass('active');
        $(this).addClass('active');
        sel_index = $(this).closest('.selected_content').index();
        //alert(sel_index);
        content_setup(sel_index);
    });    
    $(document).on('change keyup', '[name="content_title"]', function(){
        //console.log(sel_index + '/' + $(this).val());
        uploadContentDataArr[sel_index].title = $(this).val();
    });
    $(document).on('change keyup', '[name="content_desc"]', function(){
        //console.log(sel_index + '/' + $(this).val());
        uploadContentDataArr[sel_index].description = $(this).val();
    });
    $(document).on('change keyup', '[name="tags"]', function(){
        //console.log(sel_index + '/' + $(this).val());
        uploadContentDataArr[sel_index].tags = $(this).val();
    });    
    $(document).on('change keyup', '[name="price"]', function(){
        //console.log(sel_index + '/' + $(this).val());
        uploadContentDataArr[sel_index].price = $(this).val();
    });    
</script>
<style>
    .add-content-btn{
        background-color: #eee;
        position: relative;
        width: 100%;
        height: 200px;
        border-radius: 5px;
        cursor: pointer;
    }
    .add-content-btn > div{
        position: absolute;
        top: 10%;
        bottom: 10%;
        left: 6%;
        right: 6%;
        text-align: center;
        border: 2px dashed #ddd;
        border-radius: 5px;
    }
    .add-content-btn > div > i{
        display: block;
        font-size: 45px;
        color: #ccc;
        top: 20%;
        position: relative;
    }
    .add-content-btn > div > span{
        color: #999;
        top: 20%;
        position: relative;
        display: block;
        font-size: 15px;
        padding: 15px;
        line-height: 20px;
    }
    #content_file{
        display: none
    }
    .upload_preview_block{
        display: inline-block;
        width: 100%;
        height: 200px;
        position: relative;
    }
    .upload_preview_block .preview_content{
        max-width: 100%;
        max-height: 100%;
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        margin: auto;        
        border-radius: 10px;

        transition: all 0.4s;
        -moz-transition: all 0.4s;
        -webkit-transition: all 0.4s;
    }
    .upload_preview_block .preview_content:hover,
    .upload_preview_block .preview_content.active{
        border: 1px solid purple;
        background-color: #fff;
        position: absolute;
    }
    .upload_preview_block i{
        position: absolute;
        top: 10%;
        left: 2%;
        color: #ccc;
        font-size: 50px;
        border: 2px dashed #ddd;
        padding: 22% 0;
        border-radius: 5px;
        width: calc(100% - 2px);        
        text-align: center;
    }
    .upload_preview_block .preview_content:hover i,
    .upload_preview_block .preview_content.active i{
        left: 1px;
    }
    .upload_preview_block img{
        max-width: 100%;
        max-height: 100%;
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        margin: auto;
        border: 1px solid #ccc;
        border-radius: 10px;
    }
    .upload_preview_block progress{
        position: absolute;
        left: 20%;
        width: 60%;
        bottom: 25%;
        opacity: 0.8;
        border: 1px solid #000;
        border-radius: 5px;
        overflow: hidden;
        height: 10px;
    }
</style>


