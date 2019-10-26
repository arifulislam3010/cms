<template>
  <div class="card">
    <div class="card-body">
      <!-- </div> -->
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-5">
            <label for>Title</label>
            <input class="form-control" placeholder="enter title" />
          </div>
        </div>
        <div class="row">
          <div class="col-sm-5">
            <label for>Slug</label>
            <input class="form-control" placeholder="enter title" />
          </div>
        </div>
        <hr />
        <div class="row">
          <div class="col-sm-6">
            <label>Admin field</label>
            <br />
            <div class="row" v-for="(i,k) in admin_list" :key="k" style="margin-bottom:10px">  
              <div class="col-sm-5">
                <input class="form-control" />
              </div>
              <div class="col-sm-6">
                <input class="form-control" />
              </div>
              <div class="col-sm-1">
                  
                <button class="close" style="margin-top:7px;" @click="()=>{admin_list.splice(k,1)}">&times;</button>
              </div>
              
            </div>
            <!-- loop -->
            <a href="#" @click="add_to_admin">add</a>
          </div>
          <div class="col-sm-6">
            <label>Frontend Field</label>
            <br />
            <!-- loop -->
            <div class="row" v-for="(i,k) in front_list" :key="k" style="margin-bottom:10px">
              <div class="col-sm-5">
                <input class="form-control" />
              </div>
              <div class="col-sm-6">
                <input class="form-control" />
              </div>
              <div class="col-sm-1">
                <button class="close" style="margin-top:7px;" @click="()=>{front_list.splice(k,1)}">&times;</button>
              </div>              
            </div>
            <a href="#" @click="add_to_front">add</a>
          </div>
        </div>
      </div>
    </div>
    <div class="card-footer">
        <button class="btn btn-success pull-right" @click="save"> save</button>
    </div>
  </div>
</template>
<script>
import { mapGetters } from "vuex";
export default {
  data() {
    return {
      admin_list: [
          
      ],
      front_list: []
    };
  },
  computed: {
    ...mapGetters(["langList"])
  },
  methods: {
    demofn() {
      // do samll and make it large

      this.$router.push({ name: "addLanguage" });
    },
    save(){

    },
    add_to_admin(){
        this.admin_list.push(1)
    },
    add_to_front(){
        this.front_list.push(1)
    },
  }
};
</script>
<style scoped>
</style>

