<template>
<aside class="col-sm-4 aside">
    <!-- <Comment></Comment> -->
    <Tab></Tab>
</aside>
</template>
<script>
import Comment from '../content/Comment.vue'
import Tab from '../content/Tab.vue'
export default {
  components: {
    Comment,
    Tab
  },
  data() {
    return {
      subLead:'subLead',
      mainLead:'mainLead',
    }
  },
}
</script>