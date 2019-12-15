<template>
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
            <div class="container" style="position:relative;">
                <div id="sb-search" class="sb-search">
                    <form class="srch_submit" action="https://www.jagonews24.com/search" method="get" id="cse-search-box" target="_blank">
                        <input type="hidden" name="cx" value="009737550856177646857:g5gonwr4hw8">
                        <input type="hidden" name="cof" value="FORID:10" />
                        <input type="hidden" name="ie" value="utf-8">
                        <div>
                            <input class="sb-search-input srch_submit" onkeyup="if (!window.__cfRLUnblockHandlers) return false; buttonUp();" onblur="if (!window.__cfRLUnblockHandlers) return false; monkey();" type="text" placeholder="অনুসন্ধান" name="q" id="q" required data-cf-modified-fb380e6e4319ee63a1e2cb73-="">
                            <button type="submit" id="sa" name="sa" value=""><i class="fa fa-search"></i></button>
                            <span class="sb-icon-search"><i class="fa fa-search"></i></span>
                        </div>
                    </form>
                </div>
            </div>
        <ul class="nav navbar-nav">
            <li class="active"><nuxt-link to="/" class="navbar-brand" ><i class="fa fa-home"></i> </nuxt-link> </li>
            
            <li v-for="(category,key ) in categories" v-bind:key="key" v-if="category.children.length>0"  @mouseover="hover=key"
            @mouseleave="hover = 'a'" class="dropdown" :class="hover==key?'open':''">
                <nuxt-link :to="'/category/'+category.id+'/'+category.label"  class="dropdown-toggle" data-toggle="dropdown">{{category.label}} 
                <i  :class="hover==key?'fa fa-angle-down fa-caret-up':'fa fa-angle-down'"></i> 
                </nuxt-link>

                <ul class="dropdown-menu" :style="hover==key?'display: block':'display: none'">
                    <li v-for="(item,keyi) in category.children" v-bind:key="keyi">
                        <nuxt-link :to="'/category/' + item.label" class="dropdown-item">{{item.label}}</nuxt-link>
                    </li>
                </ul>

            </li>
            <li v-else class="nav-item">
                <nuxt-link :to="'/category/'+category.id+'/'+category.label"  class="nav-link">{{category.label}}</nuxt-link>
            </li>

            <!-- <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">বাংলাদেশ <i class="fa fa-angle-down"></i></a>
                <ul class="dropdown-menu">
                    <li><a href="national.html">জাতীয়</a></li>
                    <li><a href="politics.html">রাজনীতি</a></li>
                    <li><a href="economy.html">অর্থনীতি</a></li>
                </ul>
            </li> -->
        <li class="dropdown mega-dropdown" id="menu-dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">সকল বিভাগ <i class="fa fa-angle-down"></i></a>
        <div class="dropdown-menu mega-dropdown-menu" style="max-height:300px;overflow: auto;">
        <div class="container">
        <div class="row">
        <div class="col-sm-3">
        <ul>
        <li><a href="education.html">শিক্ষা</a></li>
        <li><a href="campus.html">ক্যাম্পাস</a></li>
        <li><a href="health.html">স্বাস্থ্য</a></li>
        <li><a href="law-courts.html">আইন-আদালত</a></li>
        </ul>
        </div>
        <div class="col-sm-3">
        <ul>
        <li><a href="religion.html">ধর্ম</a></li>
        <li><a href="probash.html">প্রবাস</a></li>
        <li><a href="mass-media.html">গণমাধ্যম</a></li>
        <li><a href="women-and-children.html">নারী ও শিশু</a></li>
        </ul>
        </div>
        <div class="col-sm-3">
        <ul>
        <li><a href="trade-fair.html">বাণিজ্য মেলা</a></li>
        <li><a href="literature.html">সাহিত্য</a></li>
        <li><a href="jago-jobs.html">জাগো জবস</a></li>
        <li><a href="eid-magazine.html">ঈদ সংখ্যা ২০১৯</a></li>
        </ul>
        </div>
        <div class="col-sm-3">
        <ul class="media">
        <li><span class="fa fa-clock-o"></span><a href="today-arrangement.html">আজকের আয়োজন</a></li>
        <li><span class="fa fa-camera-retro"></span><a href="archive.html" rel="nofollow"> আর্কাইভ</a></li>
        <li><span class="fa fa-share-alt"></span><a href="social-media.html" rel="nofollow"> সোশ্যাল মিডিয়া</a></li>
        <li><span class="fa fa-language"></span><a target="_blank" href="bangla-converter.html"> ইউনিকোড কনভার্টার</a></li>
        </ul>
        </div>
        </div>
        </div>
        </div>
        </li>
        <li><a href="en.html" target="_blank"><span class="en-edition"> EN </span></a></li>
        </ul>
        </div>
    </div>
</nav>
</template>
<script>
import axios from '@/plugins/axios'
export default {
  components: {
    
  },
 
  data() {
    return {
      categories:[],
      hover:'a',
    }
  },
  
  mounted() {            
      this.getCategories();
  },
 
  methods: {
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