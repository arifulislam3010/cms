<template>
 <div >
 <nav class="navbar navbar-expand-sm   navbar-light bg-light" >
  <div>
    <!-- &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; -->
  </div> 
  <div class="container-fluid" style="margin-left:2.5vw;">
  <button 
   class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <nuxt-link to="/" class="navbar-brand" ><i class="fas fa-home"></i></nuxt-link>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo03" >
    <ul class="navbar-nav  nav-fill w-100 mr-auto mt-2 mt-lg-0"  v-if="!searchBarBig">
      <!-- // loop  -->
      <span v-for="(category,key ) in categories" v-bind:key="key">
      <li v-if="category.children.length>0"  @mouseover="hover=key;megaCard(category);"
      @mouseleave="hover = 'a';showOnHover=false;" class="nav-item dropdown dmenu">
        
        
        <nuxt-link :to="'/category/'+category.id+'/'+category.label"  class="nav-link dropdown-toggle"  id="navbardrop" data-toggle="dropdown"  >{{category.label}}</nuxt-link>
        
       
        <div  class="dropdown-menu  smenum-" :style="hover==key?'display: block':'display: none'">
            <div v-if="category.children.length<5">
                  <nuxt-link  :to="'/category/' + item.label" class="dropdown-item" v-for="(item,keyi) in category.children" v-bind:key="keyi">{{item.label}}</nuxt-link>
            </div>
           <div v-else>
             
                <!-- <li class="row col-12" >
                    <div class="col-sm-6 col-md-3" v-for="(item,keyi) in category.children" v-bind:key="keyi">
                    <a href="#" style="padding:10px;margin-bottom:10px;color:black;" >
                      
                      {{item.label}}
                    </a>
                  </div>
                </li>  -->
                
           </div>
        </div>

      </li>
      <li v-else class="nav-item">
        <nuxt-link :to="'/category/'+category.id+'/'+category.label"  class="nav-link">{{category.label}}</nuxt-link>
      </li>
      </span>
      <li style="margin-top:10px;margin-left:px;color:white; background:black;height:25px;width:25px;">
        <span style="margin-left:2px;">
          <a href="">EN</a> 
        </span>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0" style="margin-right:41px;">
      <i class="fas fa-search"
       style="font-size:24px;"
       @click="searchBig" 
       id="newsSearch" 
       v-if="!searchBarBig"
      ></i>
      <!-- <input
       @click="searchBig" 
       id="newsSearch" 
       v-if="!searchBarBig"   
     
       class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search"> -->
      <!-- <button class="btn btn-outline-default my-2 my-sm-0" type="submit">Search</button> -->
    </form>
  </div>
  <div style="position:relative"> 
    <input type="text" 

    @mouseout="searchBarBig=false"
    id="bigSearch"
    style="margin-right:100px;"
    class="form-control"
    placeholder="অনুসন্ধান"
    v-if="searchBarBig">
  </div>
  </div>
</nav>
<div class="card" v-if="showOnHover" style="background:#e1ede4;z-index:1000;position:absolute;width:100vw;" @mouseover="showOnHover=true;" @mouseout="showOnHover=false;">
        <div class="row" style="margin-bottom:20px;">
          <div class="col-sm-1"> </div>
          <div class="col-sm-7">
            <div class="row col-sm-12" style="margin-top:10px;">
                <!-- <div class="col-sm-8"> -->
                  <div class="row col-sm-4" v-for="(item,key) in selectedMegaCategory.children" :key="key">
                       <a href="#" style="font-size:20px;">
                        {{item.label}}
                       </a>
                  </div>
                <!-- </div> -->
            </div>
          </div>
          <div class="col-sm-2" style="margin-top:10px;font-size:20px;">
            <ul style="font-size:20px;">
              <li > <a href="#">আজকের খবর</a> </li>
              <li> <a href="#">সোশ্যাল মিডিয়া</a> </li>
              <li> <a href="#">আর্কাইভ</a> </li>
              <li> <a href="#">ইউনিকোড কনভার্টের</a> </li>
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
  name: 'MainNavnar',
  props: ['categories', 'id','category'],
  data() {
    return{
      searchBarBig : false ,
      showOnHover : false ,
      selectedMegaCategory : `` ,
      hover:'a',
      // category: {
      //   id: '',
      //   label: '',
      //   parent_id: '',
      //   children: '',
        
      // }

      
    }
  },
 
  computed: {
    categoryChild () {
      
      array.forEach(element => {
        
      });
    }
  },
  methods : {
    searchBig(){
      this.searchBarBig = true 
      // alert(``)
      // hide other menu items & make search take the whow area
    },
    megaCard(arg){
      if(arg.children.length>8){
        this.showOnHover = true ;
        this.selectedMegaCategory = arg 
      }
      console.log(arg)
    },
  }

}
</script>

<style scoped>

.navbar{
    background: #e91d24 !important;
}

.dropdown{
    border-radius:0;
    border:0;
}
.dropdown-menu{
    background: #e91d24;
    border:0;
    top:80%;
    border-radius:0px 0px 5px 5px;
}
.dropdown-item:hover{
    background:#a5050a;
    color:#fff;
}
.dropdown-menu a{
    color:#fff;
} 
.navbar .nav-item .nav-link{
    color:#eee !important; 
    font-size: 18px;
    
}
.navbar .nav-item .nav-link:hover .navbar .nav-item .nav-link{
    color:red !important;
    
}
ul > li > a {
  font-size:20px;
}
#newsSearch:hover{
  /* color: green ;
  background: green;
  width: 100%; */
  /* .navbar-nav : hidden ; */
}
#bigSearch{
  width: 18vw;
   -webkit-transition: width 1s;
}
#bigSearch:hover{
  width:85vw ;
}
.navbar-toggler-icon{
  margin-left: 100px;
}

</style>