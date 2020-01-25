<template>
    <div class="col-sm-8 main-content">
      <div class="row">
        <div v-if="loading" class="col-lg-12">
            <SmallLoader :counts='1'></SmallLoader>
        </div>
        <div v-else class="col-lg-12">
            <article class="box-white">
                <div class="padding15 box-white">
                    <ol class="breadcrumb hidden-print">
                        <li>
                             <nuxt-link to="/">
                                <i class="fa fa-home text-danger"></i>
                            </nuxt-link>
                        </li>
                        <li v-for="(category,key) in  item.PostCategory" v-bind:key="key">
                                <nuxt-link :to="'/category/'+category.id+'/'+category.title">
                                {{category.title}}
                                </nuxt-link>
                        </li>
                    </ol>
                    <h1 class="no-margin">
                    {{item.shoulder}}
                    </h1>
                    <div class="dividerDetails"></div>
                    <blockquote class="no-margin no-padding">
                        <div class="row">
                            <div class="col-sm-8">
                                <div class="media">
                                    <div class="media-left hidden-print">
                                        <img alt="নিজস্ব প্রতিবেদক" src="../../assets/icon.png" class="media-object" style="margin-top:5px;width:40px;height:40px;border-radius:100%;display:inline-block;">
                                        
                                    </div>
                                    <div class="media-body">
                                        <span class="small text-muted time-with-author">
                                            <i class="fa fa-pencil"></i>
                                            <a class="hidden-print" href="../../author/staff-reporter.html" style="display:inline-block;" rel="nofollow">লেখক : {{item.athor}}</a>
                                            <a class="visible-print-view" rel="nofollow">প্রতিবেদক : {{item.reporter}}</a>
                                            <br>
                                            <i class="fa fa fa-clock-o text-danger"></i>প্রকাশিত: {{item.created_at}}
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 text-right">
                                <div class="hidden-print">
                                    <div class="custom-social-share">
                                        <div class="custom_share_count pull-left"></div>
                                        <ul class="social-media custom-social-share">
                                            <li>
                                                <button type="button" onclick="if (!window.__cfRLUnblockHandlers) return false; window.open (&quot;https://www.facebook.com/sharer.php?u=https://www.jagonews24.com/national/news/523887&quot;,&quot;mywindow&quot;,&quot;menubar=1,resizable=1,width=350,height=250&quot;);">
                                                    <i class="fa fa-facebook"></i>
                                                </button>
                                            </li>
                                            <li>
                                            <button type="button" onclick="if (!window.__cfRLUnblockHandlers) return false; window.open (&quot;https://twitter.com/intent/tweet?text=রাজধানীতে পুলিশের ওপর বোমা হামলা, আহত ২&amp;url=https://www.jagonews24.com/national/news/523887&quot;,&quot;mywindow&quot;,&quot;menubar=1,resizable=1,width=360,height=250&quot;);">
                                            <i class="fa fa-twitter"></i></button>
                                            </li>
                                            <li>
                                            <button type="button" data-action="share/whatsapp/share" onclick="if (!window.__cfRLUnblockHandlers) return false; window.open (&quot;https://web.whatsapp.com/send?text=https://www.jagonews24.com/national/news/523887&quot;, &quot;mywindow&quot;,&quot;menubar=1,resizable=1,width=360,height=450&quot;);">
                                            <i class="fa fa-whatsapp" style="background: #25D366;"></i></button>
                                            </li>
                                            <li>
                                            <button type="button" onclick="if (!window.__cfRLUnblockHandlers) return false; window.print();"><i class="fa fa-print"></i></button>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </blockquote>
                </div>
                <div v-if="item.FeaturedImage!='' || item.FeaturedImage!=null" class="paddingTop10">
                    <div class="featured-image">
                       <img class="media-object"    style="width:100%;" v-if="item.FeaturedImage.type=='image'" :src="item.FeaturedImage.file_name" :alt="item.shoulder">
                        <video class="media-object"  style="width:100%;" v-else-if="item.FeaturedImage.type=='video'" :src="item.FeaturedImage.file_name" alt="Card video cap" controls ></video>
                        <audio class="media-object"  style="width:100%;" v-if="item.FeaturedImage.type=='audio'" :src="item.FeaturedImage.file_name"  alt="Card audio cap" controls ></audio>
                    </div>
                </div>
                <div class="content-details">
                    <p v-html="item.content"></p>
                
                </div>
                <div class="paddingLeft10 paddingRight10 hidden-print photo-title">
                    <ul class="photo-tags">
                        <li><i class="fa fa-tags"></i></li>
                        <li v-for="(tag,key) in  item.PostTag" v-bind:key="key">
                             <nuxt-link :to="'/tag/'+tag.id+'/'+tag.title">
                             {{tag.title}}
                             </nuxt-link>
                        </li>
                        
                    </ul>
                </div>
                <!-- <div class="col-sm-12 marginTop10 marginBottom20 hidden-print">
                    <div style="border:1px solid #dadada">
                    <h4 style="background: #4d4e8a;padding: 15px;color: #fff;margin:-1px -1px 0;">
                    আপনার মতামত লিখুন :</h4>
                    <div class="fb-comments" data-href="https://www.jagonews24.com/national/news/523887" data-width="100%" data-numposts="10"></div>
                    </div>
                </div> -->
                <!-- <div class="padding15 hidden-print">
                    <div class="row">
                        <div class="col-sm-12">
                            <h2 class="catTitle">আরও পড়ুন &nbsp;
                                <span class="liner"></span>
                            </h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="single-block">
                                <div class="img-box">
                                <a href="496973.html">
                                <img alt="বাংলাদেশে পুলিশের ওপর হামলা চালিয়েছে আইএস : সাইট ইন্টেলিজেন্স" src="https://s3-ap-southeast-1.amazonaws.com/images.jagonews24/media/imgAllNew/SM/2019April/isis-20190430032403.jpg" title="বাংলাদেশে পুলিশের ওপর হামলা চালিয়েছে আইএস : সাইট ইন্টেলিজেন্স" class="img-responsive lazyload">
                                </a>
                                </div>
                                <div class="related">
                                <h3>
                                <a href="496973.html">বাংলাদেশে পুলিশের ওপর হামলা চালিয়েছে আইএস : সাইট ইন্টেলিজেন্স </a>
                                </h3>
                                </div>
                                <div class="meta box-ashes">
                                <span class="pull-left tags">
                                <i class="fa fa-tags"></i>
                                <a href="../../topic/%e0%a6%86%e0%a6%87%e0%a6%8f%e0%a6%b8.html">আইএস</a>
                                </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
            </article>
        </div>
    </div>
</div>
</template>
<script>
import axios from '@/plugins/axios'
import SmallLoader from "@/components/loader/SmallLoader";
export default {
  name:"PostDetails",
  components: {
    SmallLoader,
  },
  data() {
    return {
      title: "PostDetails",
      item:{},
      loading:true,
    };
  },
  head() {
    return {
      title: this.title,
      meta: [
        // hid is used as unique identifier. Do not use `vmid` for it as it will not work
        {
          hid: "description",
          name: "description",
          content: "My custom description"
        }
      ]
    };
  },

  mounted() {
    this.$nextTick(function() {});
    this.getData();
  },
  methods: {
     getData(){
        axios.get('/api/frontend/post/'+this.$route.params.id).then((response) => {      
            this.item = response.data;
            this.loading = false;
        }).catch(function (error) {    
            this.loading = true;
        });
    }
  },
};
</script>
<style  scoped>
.main-content{
    text-align: justify;
}
</style>
