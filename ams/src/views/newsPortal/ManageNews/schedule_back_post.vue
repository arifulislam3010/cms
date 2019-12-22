<template>
    <div>
        <!-- Modal -->
        <div class="modal fade" id="schedule_back_post" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
    
                <h5 class="modal-title" id="exampleModalLabel">Select  Time</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- {{ `previously set time : ${this.news_date.s}` }} -->
                <div>
                    <label for="">{{type}} Time</label>
                    <datetime v-model="selected_time"></datetime>
                </div>
                <!-- <div>
                    <label for="">Backdate Time</label>
                    <datetime></datetime>
                </div> -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal" @click="save">Save</button>
            </div>
            </div>
        </div>
        </div>
    </div>
</template>
<script>
import datetime from "vuejs-datetimepicker"
import {mapGetters} from "vuex"
export default {
    components:{datetime},
    props:[`type`],
    data(){
        return{
            selected_time :``,
        }
    },
    computed:{
        ...mapGetters([`news_data`])
    },
    mounted: function(){

        this.setSelectedTime()
    },
    methods: {
        setSelectedTime(){
            
            if(this.type == 'Schedule'){
                if(this.news_data.schedule_time == ``){
                    this.selected_time = new Date().toJSON().slice(0,10).replace(/-/g,'-')
                }
            }else{
                if(this.news_data.backdate_time == ``){
                    this.selected_time = new Date().toJSON().slice(0,10).replace(/-/g,'-')
                }
            }
        },
        save(){
            if(this.type == 'Schedule'){
                this.news_data.schedule_time = this.selected_time 
            }else{
                this.news_data.backdate_time = this.selected_time 
            }
            //set on news_data 
            // this.news_data.schedule_time = this.selected_time 
            // this.news_data.backdate_time = this.selected_time 
            let msg = `${this.type} time set `
            // toast 
            this.$iziToast.success({position:'topRight',title:'Ok',message:msg})
            this.$parent.submit()
        }

    } ,

}
</script>