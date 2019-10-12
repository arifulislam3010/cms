<template>
 <div>
      
    <b-navbar-nav >
        <div v-for="(category,key ) in categories" v-bind:key="key">
          
          
         

          <div class="text-center my-3"  >
  

            <div v-if="category.children.length>0">
              <button :id="` popover-target-${category.id} `" style=" margin-left: 6px;" type="button" class="btn btn-danger">
                <nuxt-link :to="'/category/'+category.id+'/'+category.label"  style="color: #fff; font-size: 17px;">{{category.label}} <span><font-awesome-icon :icon="['fas', 'chevron-down']"/> </span></nuxt-link>
              
            </button>
            <b-popover :target="` popover-target-${category.id} `" triggers="hover" placement="bottom" v-for="(item,keyi) in category.children" v-bind:key="keyi" >
              
              <div class="popbtn">
                <nuxt-link :to="'/category/' + item.label" class="nbtn">{{item.label}}</nuxt-link>
              </div>
            </b-popover>
            </div>

            <div v-else>
              <button  style= " margin-left: 6px; "   type="button" class="btn btn-danger">
              
                <nuxt-link :to=" '/category/' + category.label" class="text-light">{{category.label}} </nuxt-link>
               
              </button>
            </div>

          </div>
          
          
        
        </div>
     

    </b-navbar-nav>

    
</div>
</template>

<script>
import axios from '@/plugins/axios'
export default {
  name: 'MainNavnar',
  props: ['categories', 'id','category'],
  data() {
    return{
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
  }

}
</script>

<style scoped>
.nbtn{
  font-size: 17px;
  /* border-bottom: 1px solid red; */
}

.nbtn:hover{
  background-color:brown;
  color: aliceblue;
  
  /* border-bottom: 1px solid red; */
}
</style>