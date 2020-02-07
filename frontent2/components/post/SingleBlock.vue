  <template>
    <div class="single-block" :class="[blockType=='mainLead'?'mainLead':'',blockType=='subLead'?'subLead':'']">
        <div class="img-box">
              <a  v-if="item.FeaturedImage!=null" href="#">
              <img class="img-responsive"   v-if="item.FeaturedImage.type=='image'" :src="item.FeaturedImage.file_name" :alt="item.shoulder">
              <video class="tutorial_thumnail" v-else-if="item.FeaturedImage.type=='video'" :src="item.FeaturedImage.file_name" alt="Card video cap" controls ></video>
              <audio class="tutorial_thumnail" v-if="item.FeaturedImage.type=='audio'" :src="item.FeaturedImage.file_name"  alt="Card audio cap" controls ></audio>
            </a>
            <a v-else href="#">
              <img src="../../assets/media/common/placeholder-bg.png"  alt="রাজধানীতে পুলিশের ওপর বোমা হামলা, আহত ২" class="lazyload img-responsive">
            </a>
        </div>
        <div class="details">
            <h3 class="max_two_lines_allow text_overflow" >
                <a href="#" v-html="item.shoulder"></a>
            </h3>
            <!-- <p>রাজধানীর মিরপুর রোডের সাইন্সল্যাব মোড়ে পুলিশকে লক্ষ্য করে বোমা বিস্ফোরণ ঘটিয়েছে দুর্বৃত্তরা। এ ঘটনায় সেখানে দায়িত্বরত ট্রাফিক পুলিশের কনস্টেবল আমিনুল ইসলাম ও একজন মন্ত্রীর নিরাপত্তা দলের অফিসার...</p> -->
        </div>
        <div class="meta">
            <span class="pull-left tags">
            <i class="fa fa-tags"></i> 
            <a href="topic/%e0%a6%aa%e0%a7%81%e0%a6%b2%e0%a6%bf%e0%a6%b6.html">
               <span v-if="item.hasOwnProperty(`PostTag`)" >
                <span v-for="(v,k) in item.PostTag.slice(0,2)" :key="k">{{v.title}} </span>
               </span>
            </a>
            </span>
            <a href="national.html" class="pull-right">
               <span v-if="item.hasOwnProperty(`PostCategory`)" >
                 <span v-for="(v,k) in item.PostCategory.slice(0,2)" :key="k">{{v.title }} &nbsp; </span>
               </span> 
            </a>
        </div>
    </div>
</template>
<script>
import axios from '@/plugins/axios'
export default {
  props:['blockType','item'],
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
<style scoped>
.details{
  text-align: left;
}
.mainLead img {
    height: 340px;
}
.subLead img {
    height: 145px;
}
</style>