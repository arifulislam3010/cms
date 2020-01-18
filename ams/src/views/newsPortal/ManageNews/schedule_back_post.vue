<template>
    <div>
        <!-- Modal -->
        <div class="modal fade" id="schedule_back_post" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                
                
                <h5 class="modal-title" id="exampleModalLabel">Manage  Time</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-3">
                        <multiselect  v-model="date.year"  :options="year_options" placeholder="Year" selectLabel=""></multiselect>
                    </div>
                    <div class="col-sm-3">
                        <multiselect  v-model="date.month"  :options="month_options" placeholder="Month"></multiselect>
                    </div>
                    <div class="col-sm-3">
                        <multiselect  v-model="date.day"  :options="day_options" placeholder="Day"></multiselect>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <label for="">Hour</label>
                        <multiselect  v-model="date.hour"  :options="hour_options" placeholder="Hour"></multiselect>
                    </div>
                    <div class="col-sm-3">
                        <label for="">Minutes</label>
                        <multiselect  v-model="date.minute"  :options="minute_option" placeholder="Minute"></multiselect>
                    </div>
                </div>
                <!-- {{ `previously set time : ${this.news_date.s}` }} -->
                <!-- <div>
                    <label for="">{{type}} Time</label>
                    <datetime v-model="selected_time"></datetime>
                </div> -->
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
import multiselect from "vue-multiselect"
import datetime from "vuejs-datetimepicker"
import {mapGetters} from "vuex"
export default {
    components:{
        datetime , multiselect
    },
    props:[`type`],
    data(){
        return{
            selected_time :``,
            date : {
                year : `` ,
                month : `` ,
                day : ``,
                hour : `` ,
                minute : ``,
            },
            year_options : [] ,
            month_options : [] ,
            day_options : [] ,
            hour_options : [] ,
            hour_options : [] ,
            minute_option : [] ,
        }
    },
    watch:{
        [`date.year`](val){
            this.date.month =  this.month_options[new Date().getMonth() ]
        },
        [`date.month`](val){
            // mon with 30 days
           this.date.day  = new Date().getDate()
           let idx =  [`sep`,`apr`,`jun`,`nov`].indexOf(val)
           if(idx!=-1) this.day_options = this.range(1,30,1)
           else this.day_options = this.range(1,31,1)     
            // feb -> leap of not 
            if(val == `feb`){
                // is leap year
                if( this.leapYear(this.date.year)) {
                    this.day_options = this.range(1,29,1)
                }else{
                    this.day_options = this.range(1,28,1)
                }

            }

        }
    },
    computed:{
        ...mapGetters([`news_data`])
    },
    mounted: function(){

        this.setSelectedTime()
        this.populate_options()
        this.setInitialDate()
    },
    methods: {
        setInitialDate(){
            let temp = new Date()
            this.date.year = temp.getFullYear()
            // this.date.month = 'arif'//this.month_options[ temp.getMonth() - 1 ]
            // alert(temp.getMonth())
            // this.date.day = temp.getDate()
            this.date.hour = temp.getHours()
            this.date.minute = temp.getMinutes()
        },
        populate_options(){
            // get current year 
            let year = new Date().getFullYear() ;
            this.year_options = this.range(year-10,year+10,1)
            // select month 
            this.month_options = [ 'jan' , 'feb' , 'mar' , 'apr' , 'may' , 'jun' , 'jul' , 'aug' , 'sep' , 'oct' , 'nov' , 'dec']
            this.day_options = this.range(1,31,1)
            this.hour_options = this.range(0,23,1)
            this.minute_option = this.range(1,59,1)
        },
        range(start, stop, step) {
            var a = [start], b = start;
            while (b < stop) {
               a.push(b += step || 1);
            }
            return a;
        },


        leapYear(year)
        {
        return ((year % 4 == 0) && (year % 100 != 0)) || (year % 400 == 0);
        },


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
            // ad every thing up 
            let _t = this.month_options.indexOf(this.date.month)
            _t = (_t  != -1 )? _t : 0
            // alert(_t)
            // return ;

            this.selected_time = `${this.date.year}-${_t}-${this.date.day} ${this.date.hour}:${this.date.minute}:${'00'}`
            // alert(this.selected_time)    
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