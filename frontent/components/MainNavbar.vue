<template>
 <div>
      
    <b-navbar-nav >
        <div v-for="(category,key ) in categories" v-bind:key="key">
          
          
          <b-nav-item-dropdown v-if="category.children.length>0"  :text="category.label" right >
            <nuxt-link :to="'/category/'+category.id+'/'+category.label">{{category.label}}</nuxt-link>
            <b-dropdown-item v-for="(item,keyi) in category.children" v-bind:key="keyi">
              <nuxt-link :to="'/category/'+item.id+'/' + item.label">{{item.label}}</nuxt-link>
              </b-dropdown-item>
              
         </b-nav-item-dropdown>
          
          <div v-else >
              <b-nav-item >
                 <nuxt-link :to="'/category/'+'/'+category.id+category.label">{{category.label}}</nuxt-link>
                </b-nav-item>
          </div>

          <!-- <div v-else-if="category.children != null"> 
              <b-nav-item-dropdown :text="category.label">
                
                  <b-dropdown-item href="#" >{{category.label}}</b-dropdown-item>
                
              </b-nav-item-dropdown>
          </div> -->
          
          
        
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
