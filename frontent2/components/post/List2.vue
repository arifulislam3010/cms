<template>
    <div class="media">
        <div class="media-left media-top">
           <a  v-if="item.FeaturedImage!='' || item.FeaturedImage!=null" href="#">
            <img class="media-object"   v-if="item.FeaturedImage.type=='image'" :src="item.FeaturedImage.file_name" :alt="item.shoulder">
            <video class="media-object" v-else-if="item.FeaturedImage.type=='video'" :src="item.FeaturedImage.file_name" alt="Card video cap" controls ></video>
            <audio class="media-object" v-if="item.FeaturedImage.type=='audio'" :src="item.FeaturedImage.file_name"  alt="Card audio cap" controls ></audio>
            </a>
            <a v-else href="#">
            <img class="lazyload media-object" src="../../assets/media/common/placeholder-xs.png" data-src="https://s3-ap-southeast-1.amazonaws.com/images.jagonews24/media/imgAllNew/XS/2019April/ctggg-20190831234540.jpg" alt="চট্টগ্রামের শিপইয়ার্ডে দুর্ঘটনায় ২ শ্রমিক নিহত"></a>
            </a>
        </div>
        <div class="media-body" style="text-align: left;"><h4 class="media-heading">
            <a href="#" class="media-heading max_two_lines_allow text_overflow" v-html="item.shoulder"></a></h4>
            <div class="meta"><i class="fa fa-tags"></i> 
                  <span v-if="item.hasOwnProperty(`PostTag`)">
                    <span v-for="(v,k) in item.PostTag.slice(0,3)" :key="k">
                         <nuxt-link :to="'/tag/'+v.id+'/'+v.title">
                            {{v.title}}&nbsp;&nbsp;
                         </nuxt-link>
                    </span>
                  </span>
            </div>
        </div>
    </div>
</template>
<script>
import axios from '@/plugins/axios'
export default {
  props:['item'],
  components: {
    
  },
 
  data() {
    return {
      
    }
  },
  
  mounted() {            
   
  },
 
  methods: {
  
  }
}
</script>