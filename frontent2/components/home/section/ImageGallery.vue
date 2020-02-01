<template>
    <section class="container">
        <div class="row" style="margin-top:20px;margin-bottom:30px;">
            <div class="col-sm-8" >
                    <div class="row">
                        <div class="col-sm-5">
                           <h2 class="pull-left">ফটো গ্যালারি</h2> 
                        </div>
                    </div>
                    <div class="row">
                        <!-- {{imgs}} -->
                        <div class="col-sm-12">
                                <div class="row">
                                    
                                    <div class="col-sm-11" v-bind:style="{ 'background-image': 'url(' + img_ptr + ')' ,'height':'500px','background-size': 'cover'}" >
                                          <span class="pull-left" style="margin-top:220px;">
                                           <!-- <h1> &lt; </h1> -->
                                          </span>  
                                          <span class="pull-right" style="margin-top:220px;">
                                            <!-- <h1>&gt;</h1> -->
                                          </span>  
                                    </div>
                                </div>
                                <div class="row" style="margin-top:20px;">
                                    <div class="col-sm-12">
                                        {{title_ptr}}
                                    </div>
                                </div>

                        </div>
                    </div>
            
            </div>
            <div class="col-sm-4">
                <div class="row">
                    <div class="col-sm-12">
                           <h2 class="pull-left">সর্বশেষ</h2> 
                    </div>
                    </div>
                </div>
            </div>
            <!-- {{imgs}} -->
        </div>
    </section>
</template>
<script>
import axios from "@/plugins/axios"
import VueCarousel from '@chenfengyuan/vue-carousel';
export default {
    components : {VueCarousel},
    data(){
        return {
            imgs : [],
            img_ptr : `` ,
            title_ptr : ``,
            ptr : 0 ,
            temp :`` ,
            data: [
                '<div class="example-slide">Slide 1</div>',
                '<div class="example-slide">Slide 2</div>',
                '<div class="example-slide">Slide 3</div>',
            ],
        }
    },
    mounted(){
        this.fetchImgs()
        
    },
    methods:{
        init(){
            if(this.imgs.length){
                setInterval(this.changeImage,5000)
            }
        },
        changeImage(){
            let len = this.imgs.length
            if(len){
                this.img_ptr = this.imgs[this.ptr]
                this.ptr +=1 
                this.ptr  = (this.ptr ) % len
                this.img_ptr = this.imgs[this.ptr].file_name
                this.title_ptr = this.imgs[this.ptr].title 
            }
        },
        fetchImgs(){
            axios.get('/api/frontend/album/imgs').then((response) => {      
                this.imgs = response.data;
                // this.mainLeadLoading = false;
                // this.setFullView() 
                // this.temp = this.imgs[0].file_name
                this.init()
            }).catch(function (error) {    
                // this.mainLeadLoading = true;
            });            
        }
    }
}
</script>
