<template>
  <div>
    <div class="card">
      {{ node.label}}
      <div>
        <a href="#" @click="editScrollModal(node)" style="margin-right:30px">update</a>
        <a href="#" @click="addChild(node)" style="margin-right:30px">AddChild</a>
        <a href="#" @click="deleteScroll(node.id)" style="margin-right:30px">delete</a>
        <a
          href="#"
          @click="()=>{ show_children = false}"
          v-if="show_children && node.children.length > 0"
          style="margin-right:30px"
        >minimize</a>
        <a
          href="#"
          @click="()=>{ show_children = true }"
          style="margin-right:30px"
          v-if="!show_children && node.children.length > 0"
        >expand</a>
      </div>
    </div>
    <div v-if="show_children">
      <div v-for="(i,k) in node.children" :key="k" style="margin-left:30px">
        <RecCom :node="i"></RecCom>
      </div>
    </div>
    <AddScroll ref="add_scroll_modal"></AddScroll>
    <ViewScrollModal ref="view_scroll_modal"></ViewScrollModal>

    <Loader v-if="loading"></Loader>
  </div>
</template>
<script>
import Loader from "@/views/common/Loader";

import AddScroll from "./AddScroll";
import ViewScrollModal from "./ViewScrollModal";



import RecCom from "./RecCom";
export default {
  name: "RecCom",
  components: {
    Loader,
    AddScroll,
    ViewScrollModal,
    RecCom
  },
  props: ["node"],
  data() {
    return {
      show_children: true,
      loading: false
    };
  },
  methods: {
    addChild(scroll) {
      console.log(scroll)
      this.$refs.add_scroll_modal.openModal();
      this.$refs.add_scroll_modal.newScroll.title = ``;
      this.$refs.add_scroll_modal.newScroll.parent_id = scroll.id;
      this.$refs.add_scroll_modal.selected_parent = scroll.id;
      
    },
    deleteScroll(id) {
      this.$store
        .dispatch("DELETE_SCROLL", id)
        .then(response => {
          this.getScrolls();
        })
        .catch(error => {});
    },       
     editScrollModal(item) {
      // console.log(item)
      this.$refs.add_scroll_modal.openModal();
      this.$refs.add_scroll_modal.newScroll.title = ``;
      this.$refs.add_scroll_modal.update = true;
      this.$refs.add_scroll_modal.selected_parent = item.parent_id;
      this.$refs.add_scroll_modal.newScroll.title = item.label;
      this.$refs.add_scroll_modal.item_id = item.id;
    },
     getScrolls() {
      this.loading = true
      this.$store.dispatch("FETCH_SCROLLS").then(response=>{
        this.loading = false
      }).catch(error=>{  
        this.loading = false
      });
    },
    deleteScroll(id) {
      var self = this;
      this.$iziToast.question({
        timeout: 10000,
        close: false,
        overlay: true,
        displayMode: "once",
        id: "question",
        zindex: 999,
        title: "Hey",
        message: "Are you sure To Delete?",
        position: "center",
        buttons: [
          [
            "<button><b>YES</b></button>",
            function(instance, toast) {
              self.$store
                .dispatch("DELETE_SCROLL", id)
                .then(response => {
                  self.$iziToast.success({
                    position: "topRight",
                    title: "Ok",
                    message: "Scroll Delated Successsfully"
                  });
                  self.getScrolls();
                })
                .catch(error => {
                  self.$iziToast.error({
                    position: "topRight",
                    title: "Error",
                    message: "Something Wrong !!"
                  });
                });
              instance.hide({ transitionOut: "fadeOut" }, toast, "button");
            },
            true
          ],
          [
            "<button>NO</button>",
            function(instance, toast) {
              instance.hide({ transitionOut: "fadeOut" }, toast, "button");
            }
          ]
        ]
      });
    }
  }
};
</script>
<style scoped>
  .card{
    border-radius: 10px;
    background: #fff;
    box-shadow: 0 6px 10px rgba(0,0,0,0.8),0 0 6px rgba(0,0,0,0.05);
    transition: .3s transform cubic-bezier(.155,1.105,.295,1.12), .3s -webkit-transform cubic-bezier(.155,1.105,.295,1.12);
    padding: 7px 80px 18px 36px;
    cursor: pointer;
  }
  .card:hover{
    transform: scale(1.05);
    box-shadow: 0 10px 20px rgba(0,0,0,0.12), 0 4px 8px rgba(0,0,0,0.06);
  }

</style>

