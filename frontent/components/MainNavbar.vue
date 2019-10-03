<template>
 <div>
      
    <b-navbar-nav >
        <div v-for="category in categories">
          <b-nav-item href="#">{{category.label}}</b-nav-item>
        <!-- <b-nav-item-dropdown :text="category.label">
          <b-dropdown-item href="#">EN</b-dropdown-item>
          <b-dropdown-item href="#">ES</b-dropdown-item>
          <b-dropdown-item href="#">RU</b-dropdown-item>
          <b-dropdown-item href="#">FA</b-dropdown-item>
        </b-nav-item-dropdown> -->
        </div>

    </b-navbar-nav>
</div>
</template>

<script>
import axios from '@/plugins/axios'
export default {
  props: ['categories', 'id'],
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

}
</script>
