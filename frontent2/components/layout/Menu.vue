<template>
    <div>
    <nav class="navbar navbar-default navbar-static-top no-margin hidden-print" role="navigation" style="z-index:10;" data-spy="affix" data-offset-top="70" id="menu">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand visible-xs" href="index.html"><img alt="Logo" src="../../assets/media/common/logo.png" style="width: 160px;margin-top:-10px;" /></a>
        </div>

        <div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
            <!-- <div class="container" style="position:relative;">
                <div id="sb-search" class="sb-search">
                    <form class="srch_submit" action="https://www.jagonews24.com/search" method="get" id="cse-search-box" target="_blank">
                        <input type="hidden" name="cx" value="009737550856177646857:g5gonwr4hw8">
                        <input type="hidden" name="cof" value="FORID:10" />
                        <input type="hidden" name="ie" value="utf-8">
                        <div>
                            <input class="sb-search-input srch_submit" onkeyup="if (!window.__cfRLUnblockHandlers) return false; buttonUp();" onblur="if (!window.__cfRLUnblockHandlers) return false; monkey();" type="text" placeholder="অনুসন্ধান" name="q" id="q" required data-cf-modified-fb380e6e4319ee63a1e2cb73-="">
                            <button type="submit" id="sa" name="sa" value=""><i class="fa fa-search"></i></button>
                            <span class="sb-icon-search"><i class="fa fa-search" @click="searchNews"></i></span>
                        </div>
                    </form>
                    <input type="text">
                
                </div>
           
            </div> -->
            <div class="container" style="position:relative;top:10px;">
                <input v-model="q" type="text" class="bigSearch" style="position:absolute;right:60px;z-index:500;" placeholder="অনুসন্ধান" @keypress="searchNews">
                <!-- <input type="text" class="" style="position:absolute;right:10px;width:85vw;"> -->
                <span  class="sb-icon-search"><i class="fa fa-search" @click="searchNews"></i></span>
            </div>
            
        <ul class="nav navbar-nav">
            <li class="active"><nuxt-link to="/" class="navbar-brand" ><i class="fa fa-home"></i> </nuxt-link> </li>
            
            <li v-for="(category,key ) in categories" v-bind:key="key" v-if="category.children.length>0"  @mouseover="hover=key;megaCard(category)"
            @mouseleave="hover = 'a';jumboDropDown=false" class="dropdown" :class="hover==key?'open':''">
                <nuxt-link :to="'/category/'+category.id+'/'+category.label"  class="dropdown-toggle" data-toggle="dropdown">{{category.label}} 
                <i  :class="hover==key?'fa fa-angle-down fa-caret-up':'fa fa-angle-down'"></i> 
                </nuxt-link>

                <ul v-if="category.children.length<5" class="dropdown-menu" :style="hover==key?'display: block':'display: none'">
                    <li v-for="(item,keyi) in category.children" v-bind:key="keyi">
                        <nuxt-link :to="'/category/' + item.id +'/' + item.label" class="dropdown-item">{{item.label}}</nuxt-link>
                    </li>
                </ul>

            </li>
            <li v-else class="nav-item">
                <nuxt-link :to="'/category/'+category.id+'/'+category.label"  class="nav-link">{{category.label}}</nuxt-link>
            </li>
        <li><a href="en.html" target="_blank"><span class="en-edition" style="z-index:50;"> EN </span></a></li>
        </ul>
        </div>
    </div>
</nav>
<div class="card" v-if="jumboDropDown" id="jumboDropDown" @mouseover="jumboDropDown=true" @mouseout="jumboDropDown=false" >
        <div class="row" style="margin-bottom:20px;">
          <div class="col-sm-1"> </div>
          <div class="col-sm-7">
            <div class="row col-sm-12" style="margin-top:10px;">
                <!-- <div class="col-sm-8"> -->
                  <div class="row col-sm-4" v-for="(item,key) in selectedCategory.children" :key="key">
                       <!-- <a href="#" style="font-size:18px;color:black;">
                        {{item.label}}
                       </a> -->
                        <nuxt-link :to="'/category/'+item.id+'/'+item.label">
                            {{item.label}}
                        </nuxt-link>
                  </div>
                <!-- </div> -->
            </div>
          </div>
          <div class="col-sm-3" style="margin-top:10px;font-size:18px;">
            <ul style="font-size:18px;">
              <li > <a href="#"><i class="fa fa-clock-o"></i>&nbsp;আজকের খবর</a> </li>
              <li> <a href="#"><i class="fa fa-share-alt"></i>&nbsp;সোশ্যাল মিডিয়া</a> </li>
              <li> <a href="#"> <i class="fa fa-camera"></i>&nbsp;আর্কাইভ</a> </li>
              <li> <a href="#"><i class="fa fa-language"></i>&nbsp;ইউনিকোড কনভার্টের</a> </li>
            </ul>
          </div>
          <div class="sol-sm-1"></div>
        </div>    
</div>
</div>
</template>
<script>
import axios from '@/plugins/axios'
export default {
  components: {
    
  },
 
  data() {
    return {
      q : ``,
      jumboDropDown : false ,  
      selectedCategory : `` ,
      categories:[],
      hover:'a',
    }
  },
  
  mounted() {            
      this.getCategories();
  },
 
  methods: {
     searchNews(e){
         if(e.keyCode == 13){
            //  alert(`search ${this.q}`)
             // open in new window 
             let routeData = this.$router.resolve({name: 'search', query: {q: this.q}});
             window.open(routeData.href, '_blank');
         }
     },
     megaCard(args){
         if(args.children.length>5){
             this.jumboDropDown = true 
             this.selectedCategory = args 
         }
     }, 
     getCategories(){
           axios.get('/api/frontend/categories').then((response) => {      
                  this.categories = response.data;

                }).catch(function (error) {                    
                });
        },
    toggleNavbar() {
      this.show = !this.show;
    }
  },

  
  
}
</script>

<style >
    #jumboDropDown{
        background:white;
        z-index:1000;
        position:absolute;
        width:100vw;
    }
    ul > li {
        list-style: none ;
    }
    ul > li >a {
        color:  black;
    }
    .bigSearch{
        -webkit-transition: width 3s;
    }
    .bigSearch:hover{
        width:79vw;
        -webkit-transition: width 3s;
    }
</style>