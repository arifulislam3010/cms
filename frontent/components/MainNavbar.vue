<template>
 <div>
      
    <b-navbar-nav >
        <div v-for="(category,key ) in categories" v-bind:key="key">
          
          
         

          <div class="text-center my-3" >
  

            <div v-if="category.children.length>0">
              <button :id="` popover-target-${category.id} `" style=" margin-left: 6px;" type="button" class="btn btn-outline-light">
              {{category.label}} <span><font-awesome-icon :icon="['fas', 'chevron-down']"/> </span>
            </button>
            <b-popover :target="` popover-target-${category.id} `" triggers="hover" placement="bottom" v-for="(item,keyi) in category.children" v-bind:key="keyi">
              
              <nuxt-link :to="'/' + item.label">{{item.label}}</nuxt-link>
            </b-popover>
            </div>

            <button v-else style= " margin-left: 6px; color: #fff;" type="button" class="btn btn-outline-light">
              
                <nuxt-link :to=" '/' + category.label">{{category.label}} </nuxt-link>
               
          </button>
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
