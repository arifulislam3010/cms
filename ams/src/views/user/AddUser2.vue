<template>
    <div>
    <b-modal title="User" no-close-on-backdrop hide-footer size="md"  v-model="largeModal" @ok="largeModal = false">
        <!-- {{get_user.role_id}} -->
        <div class="row">
            <div class="col-sm-3">
                <label>Name</label>
            </div>
            <div class="col-sm-9">
                <input v-model="get_user.name" class="form-control" type="text">
            </div>
        </div>    
        <br>
        <div class="row">
            <div class="col-sm-3">
                <label>Author Name </label>
            </div>
            <div class="col-sm-9">
                <input  class="form-control" type="text">
            </div>
        </div>    
        
        <br>
        <div class="row">
            <div class="col-sm-3">
                <label>Designation</label>
            </div>
            <div class="col-sm-9">
                <input class="form-control" type="text">
            </div>
        </div>    
        <br>
        <div class="row">
            <div class="col-sm-3">
                <label>Department</label>
            </div>
            <div class="col-sm-9">
                <input class="form-control" type="text">
            </div>
        </div>    
        <br>
        <div class="row">
            <div class="col-sm-3">
                <label>Area</label>
            </div>
            <div class="col-sm-9">
                <input class="form-control" type="text">
            </div>
        </div>    
        <br>
        <div class="row">
            <div class="col-sm-3">
                <label>Mobile</label>
            </div>
            <div class="col-sm-9">
                <input class="form-control" type="text">
            </div>
        </div>    
        <br>
        <div class="row">
            <div class="col-sm-3">
                <label>Email</label>
            </div>
            <div class="col-sm-9">
                <input class="form-control" type="text">
            </div>
        </div>    
        <br>
        <div class="row">
            <div class="col-sm-3">
                <label>Joining Date</label>
            </div>
            <div class="col-sm-9">
                <!-- <input class="form-control" type="text"> -->
                <datetime v-model="user.joining_date"></datetime>
            </div>
        </div>    
        <br>
        <div class="row">
            <div class="col-sm-3">
                <label>Role</label>
            </div>
            <div class="col-sm-9">
                <!-- <input class="form-control" type="text"> -->
                <multiselect :options="role_list" label="name" v-model="get_user.role"></multiselect>
            </div>
        </div>    
        <br>
        <div class="row">
            <div class="col-sm-3">
                <label>Access Type</label>
            </div>
            <div class="col-sm-9">
                <!-- <input class="form-control" type="text"> -->
                <multiselect :options="[`option 1` , `option 2`]" v-model="user.access_type"></multiselect>
            </div>
        </div> 
        <br>   
        <div class="row">
            <div class="col-sm-3">
                <label>Publish Permission</label>
            </div>
            <div class="col-sm-9">
                <input class="form-control" type="text">
            </div>
        </div>    
        <br>   
        <div class="row">
            <div class="col-sm-3">
                <label>Password</label>
            </div>
            <div class="col-sm-9">
                <input class="form-control" type="text">
            </div>
        </div>    
        <br>   
        <div class="row">
            <div class="col-sm-3">
                <label>Status</label>
            
            </div>
            <div class="col-sm-9">
                <multiselect :options="[`active` , `inactive`]" v-model="user.status"></multiselect>
                <!-- <input class="form-control" type="text"> -->
            </div>
        </div>    
        <br>
        <div class="row">
            <div class="col-sm-12">
                <input v-if="!addLoader" @click="submit" type="submit" value="Submit" class="btn btn-success pull-right btn-block"/>
                <button v-if="addLoader" class="btn btn-primary pull-right btn-block" type="button" disabled>
                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                    Submitting...
                </button>                
            </div>
        </div>

            <br>    
            <div class="form-group row">
                <div class="col-sm-12">
                <!-- <input v-if="!addLoader" @click="submit" type="submit" value="Submit" class="btn btn-primary pull-right"/>
                <button v-if="addLoader" class="btn btn-primary pull-right" type="button" disabled>
                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                    Submitting...
                </button> -->
                <button v-if="!addLoader"  @click.prevent="close" class="btn btn-primary pull-right" style="margin-right:5px;">Close</button>
                </div>
            </div>

    </b-modal>
    </div>
</template>
<script>
import Multiselect from "vue-multiselect"
import datetime from  "vuejs-datetimepicker"
import {mapGetters} from "vuex" 
export default {
    components:{Multiselect,datetime},
    data(){
        return {
            errors:{},
            largeModal: false ,
            addLoader: false ,
            is_update: false ,
            user :{
                name : `` ,
                author_name :  ``,
                designation : `` , 
                department : `` ,
                area : `` ,
                mobile : `` ,
                email : `` ,
                joining_date : `` ,
                role : `` ,
                access_type : `` ,
                publish_permission : `` ,
                password : `` ,
                status : `` ,
            } ,
        }
    },
    computed:{
        ...mapGetters(['get_user','role_list'])
    },
    methods:{
        OpenModal(){
            this.largeModal = true 
        },
        submit(){
            if(this.is_update){
                this.addLoader = true 
                // let payload = {
                //     id : this.get_user.id ,
                //     data : this.get_user ,
                // }
                this.$store.dispatch('UPDATE_USER',this.get_user).then(response=>{
                        this.$iziToast.success({position:'topRight',title:'Success',message:"User Updated"})    
                        this.addLoader = false
                        this.$parent.getUserList()
    
                }).catch(error=>{
                       this.addLoader = false
                       this.errors = error.response.data.errors
                       this.$iziToast.error({position:'topRight',title:'Success',message:"User Not Updated"})       
                })
            }else{
                this.addLoader = true 
                this.$store.dispatch('ADD_USER',this.get_user).then(response=>{
                        this.$iziToast.success({position:'topRight',title:'Success',message:"User Added"})    
                        this.addLoader = false
                        this.$parent.getUserList()
    
                }).catch(error=>{
                       this.addLoader = false
                       this.errors = error.response.data.errors
                       this.$iziToast.error({position:'topRight',title:'Success',message:"error occured"})       
                })
            }
        },
        getRoles(){
            this.loading = true 
            this.$store.dispatch('FETCH_ROLES').then(response=>{
                this.loading = false
            }).catch(error=>{
                this.loading = false
            })
        },
        close(){
            this.largeModal = false 
        }
    },
    mounted(){
        this.getRoles()
    },

}
</script>