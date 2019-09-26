<template>
        
         <b-navbar toggleable="lg" type="dark" variant="info">
            <div class="container">
                        <b-navbar-brand href="#">NavBar</b-navbar-brand>

              <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>

              <b-collapse id="nav-collapse" is-nav>
                <b-navbar-nav>
                  <b-nav-item-dropdown text="আন্তর্জাতিক ">
                    <b-dropdown-item href="#">EN</b-dropdown-item>
                    <b-dropdown-item href="#">ES</b-dropdown-item>
                    <b-dropdown-item href="#">RU</b-dropdown-item>
                    <b-dropdown-item href="#">FA</b-dropdown-item>
                  </b-nav-item-dropdown>
                </b-navbar-nav>

                
              </b-collapse>
            </div>
        </b-navbar>
</template>

<script>
import axios from '@/plugins/axios'

export default {
    data() {
    return {
      show: false,
      dropdownMenu: false,
      loading: false
    }
  },

  methods: {
    toggleNavbar() {
      this.show = !this.show;
    },
    navDropdown(){
      this.dropdownMenu = !this.dropdownMenu;
    }
  },
    async asyncData () {
    const {data} = await axios.get('/api/categories')
    return {categories:data}
  },
}
</script>