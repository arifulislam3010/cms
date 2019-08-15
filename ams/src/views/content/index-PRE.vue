<template>

    <div class="card">
        
        <div class="card-header bg-transparent header-elements-inline">
            <h6 class="card-title">Search</h6>
            <div class="col-md-6">
                <input type="text" class="form-control"  placeholder="search">
            </div>
            <div class="header-elements">
                <button type="button" class="btn btn-outline bg-teal-400 text-teal-400 border-teal-400 border-2" data-toggle="modal" data-target="#modal_add" data-backdrop="static" data-keyboard="false">New Content</button>
            </div>
        </div>
        
        <!-- Data table start -->
        <List></List>
        <!-- data table end -->
        
        <!-- Add modal start -->
        <ContentAddModal :username='username'></ContentAddModal>
        <!-- Add modal end -->
        
        <!-- edit modal start -->
        <div id="modal_edit" :class="[isActive ? 'show':'' ]" class="modal fade" :style="styleSection" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-body">
                    <div class="card">
                        <div class="card-header header-elements-inline">
                            <h6 class="card-title">File Details</h6>
                        </div>

                        <div class="card-body">
                            <form action="#">
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2 font-weight-semibold text-success">Title</label>
                                <div class="col-lg-10">
                                    <input type="hidden" class="form-control border-success" placeholder="id" 
                                    >
                                    <input type="text" class="form-control border-success" placeholder="title" >
                                    <span class="form-text text-danger"> </span>
                                </div>
                            </div>

                            </form>
                        </div>
                    </div>
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-link" data-dismiss="modal" @click='close'><i class="icon-cross2 font-size-base mr-1" ></i> Close</button>
                        <button class="btn bg-primary" @click='update'><i class="icon-checkmark3 font-size-base mr-1"></i> Update</button>
                    </div>
                </div>
            </div>

        </div>
        <!-- edit modal end -->
    </div>
    
</template>

<script>
    import ContentAddModal from './modal.vue';
    let List = require('./list.vue');
    export default {
        props: ['username'],
        components: {ContentAddModal,List},
        data(){
            return{
                notificationsclass:'',
                styleSection:'',
                isActive:false
            }
        },
        watch:{
           
        },
        mounted(){
            
        },
        computed:{
         
        },
        methods:{            
            save(){
            },
            del(){
            },
            openUpdate(){
                this.styleSection = 'display: block;padding-right: 17px;';
                this.isActive = true;
            },
            close(){
                this.styleSection = '';
                this.isActive = '';
            },
            update(){
            
            },
            read()
            {

            }
        }
    }
</script>