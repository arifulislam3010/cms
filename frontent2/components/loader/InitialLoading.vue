<template>
    <div class="loading">
      <div class="loading_content">
        <div class="logo"><img style="width:200px" src="../../assets/media/common/logo.png"></div>
        <div class="message">{{message}}</div>
        <div class="progress_bar">
          <div class="rail">
              <span class="loading_bar" :style="{width: loading_val + '%'}"></span>
              <span class="count" :style="{left: loading_val + '%'}">{{loading_val}}%</span>
          </div>
        </div>
      </div>
    </div>
</template>

<script>
export default {
  name: 'Loading',
  props:['message'],
  data(){
    return {
      // firsttimeloding:true,
      loading_val: 0,
      loading_interval: '',
      reload_loading_interval: ''
    }
  },
  
  created() {
    this.loading_val_increaser();
  },

  computed: {

  },
 
  methods:{
    loading_val_increaser: function(){
      clearInterval(this.reload_loading_interval);
      this.loading_interval = setInterval(() => {
        if(++this.loading_val==100){
          this.loading_val=0;
          this.reload_loading();
        }
      }, 100);
    },
    reload_loading(){
      clearInterval(this.loading_interval);
      this.reload_loading_interval = setInterval(() => {
        this.loading_val_increaser();
      },1000);
    },
    
  },
  beforeDestroy(){
    clearInterval(this.loading_interval);
    clearInterval(this.reload_loading_interval);
  }
}
</script>

<style>
.loading {
    text-align: center;
    width: 100%;
    left: 0;
    top: 0;
    height: 100%;
    z-index: 999;
    background: #fff;
    height: 100%;
    position: fixed;
}
.loading_content {
    font-size: 25px;
    position: relative;
    top: 0%;
    color: #666;
    /* background-color: #eee; */
}
.loading_content .logo{
    padding-top: 15%;
    background-image: linear-gradient(to top, #fff, #ccc);
}
.loading_content .progress_bar img{
    max-height: 85px
}
.loading_content .message{
    position: relative;
    font-size: 14px;
    margin: 15px 0 -10px 0;
    color: #999;
    z-index: 10;
}
.loading_content .progress_bar .rail{
    width: 180px;
    display: inline-block;
    background-color: #ddd;
    position: relative;
    height: 1px;
}
.loading_content .progress_bar .loading_bar{
    position: absolute;
    background-color: #bda5d0;
    top: -1px;
    left: 0;
    height: 3px;
    width: 0%;
    transition: all 0.4s
}
.loading_content .progress_bar .rail .count{
    position: absolute;
    font-size: 13px;
    font-weight: bold;
    background-color: #fff;
    color: #bca8cc;
    top: -10px;
    left: 0%;
    /* border: 1px solid; */
    padding: 0 5px;
    transition: all 0.4s
}
</style>
