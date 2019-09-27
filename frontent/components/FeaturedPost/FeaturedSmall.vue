<template>
<<<<<<< HEAD
    <div >
       

        <!-- Single Featured Post -->
        
            <div class="post-thumb">
                <a href="#"><img src="@/assets/images/16.jpg" alt=""></a>
            </div>
            <div class="post-data">
                <div class="post-meta">
                    <a href="#" class="post-title">
                        <h6> jdjdhdhd </h6>
                    </a>
                    
                </div>
            </div>

    </div>
</template>

<script>
import axios from '@/plugins/axios'
import {mapState,mapGetters,mapActions} from 'vuex'
export default {
    async asyncData () {
    const {data} = await axios.get('/api/frontend/posts')
    return {articles:data}
  },
    // data() {
    // return {
      
    //   post: {
    //     id : '',
    //     shoulder: '',
    //     headline: '',
    //     hanger: '',
    //     athor_id: '',
    //     reporter_id: '',
    //     featured_image_id: '',
    //     featured_video_id: '',
    //     video_position: '',
    //     share_at: '',
    //     published_at: '',
    //     status: '',
    //     Instant_article: '',
    //     created_by: ''
    //   }
    // }
//   },
//      async asyncData () {
//     const {data} = await axios.get('/api/frontend/posts')
//     return {posts:data}
//   },
    computed: mapGetters(['posts'])
}
</script>
=======
  <div>
    <div class="single-blog-post small-featured-post d-flex">
      <div class="post-thumb">
        <a href="#"><img src="@/assets/images/16.jpg" alt=""/></a>
      </div>
      <div class="post-data">
        <div class="post-meta">
          <a href="#" class="post-title">
            <h6>
              Pellentesque mattis arcu massa, nec fringilla turpis eleifend id.
            </h6>
          </a>
        </div>
      </div>
    </div>

    <!-- Single Featured Post -->
    <div class="single-blog-post small-featured-post d-flex">
      <div class="post-thumb">
        <a href="#"><img src="@/assets/images/16.jpg" alt=""/></a>
      </div>
      <div class="post-data">
        <div class="post-meta">
          <a href="#" class="post-title">
            <h6>Sed a elit euismod augue semper congue sit amet ac sapien.</h6>
          </a>
        </div>
      </div>
    </div>

    <!-- Single Featured Post -->
    <div class="single-blog-post small-featured-post d-flex">
      <div class="post-thumb">
        <a href="#"><img src="@/assets/images/16.jpg" alt=""/></a>
      </div>
      <div class="post-data">
        <div class="post-meta">
          <a href="#" class="post-title">
            <h6>
              Pellentesque mattis arcu massa, nec fringilla turpis eleifend id.
            </h6>
          </a>
        </div>
      </div>
    </div>
  </div>
</template>
>>>>>>> 071ffa70d91c02c8dfdf05330b6c0114f95a9b43
