<template>
  <div>
    <div class="card">
      {{ node.label}}
      <!-- {{ node}} -->
      <div>
        <a href="#" @click="editTopicModal(node)" style="margin-right:30px">update</a>
        <a href="#" @click="addChild(node)" style="margin-right:30px">AddChild</a>
        <a href="#" @click="deleteTopic(node.id)" style="margin-right:30px">delete</a>
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
        <RecCat :node="i"></RecCat>
      </div>
    </div>
    <AddTopicModal ref="add_topic_modal"></AddTopicModal>
    <EditTopicModal ref="edit_topic_modal"></EditTopicModal>
    <ViewTopicModal ref="view_topic_modal"></ViewTopicModal>
    <Loader v-if="loading"></Loader>
  </div>
</template>
<script>
import Loader from "@/views/common/Loader";

import AddTopicModal from "./AddTopicModal";
import EditTopicModal from "./EditTopicModal";
import ViewTopicModal from "./ViewTopicModal";

import RecCat from "./RecCom";
export default {
  name: "RecCat",
  components: {
    Loader,
    AddTopicModal,
    ViewTopicModal,
    EditTopicModal,
    RecCat
  },
  props: ["node"],
  data() {
    return {
      show_children: true,
      loading: false
    };
  },
  methods: {
    addChild(topic) {
      this.$refs.add_topic_modal.openModal();
      this.$refs.add_topic_modal.newTopic.title = ``
      this.$refs.add_topic_modal.newTopic.parent_id = topic.id;
    },
    editTopicModal(topic) {
      console.log(topic)
      this.$refs.edit_topic_modal.openModal(topic);
      this.$refs.edit_topic_modal.editTopic.title = topic.label;
      this.$refs.edit_topic_modal.editTopic.parent_id = topic.parent_id;
      this.$refs.edit_topic_modal.editTopic.id = topic.id;
    },
    getTopics() {
      this.loading = true;
      this.$store
        .dispatch("FETCH_TOPICS")
        .then(response => {
          this.loading = false;
        })
        .catch(error => {
          this.loading = false;
        });
    },

    deleteTopic(id) {
      this.loading = true;
      this.$store.dispatch("DELETE_TOPIC", id).then(response => {
        this.getTopics();
        this.loading = false;
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