<template>
    <div id="my_content_list_block">
        <ContentLoader :counts='5' :username='username' v-if="isLoading==true"></ContentLoader>
        <div v-if="isLoading==false">
            <div class="content-srch-block">
                <i class="fa fa-search" @click="srchContent" ref="srchClick"></i>
                <input type="text" @keyup.enter="srchTrigger" v-model="keyword" class="form-control content-srch" placeholder="Search content">
            </div>

            <!-- Data table start -->
            <List :username='username' :storage_path='storage_path' :content_image_path='content_image_path' :lists='lists' v-if="isLoading==false"></List>
            <!-- data table end -->

            <!-- <div class="pagination-block" align="center">
                <pagination :data="lists" @pagination-change-page="loadData" v-if="isLoading==false"></pagination>
            </div> -->
        </div>
    </div>
</template>

<script>
    Vue.component('pagination', require('laravel-vue-pagination'));
    
    import ContentLoader from '../content-loader.vue';
    import List from './list.vue';

    export default {
        props: ['username','storage_path','content_image_path','role','module_access','role_assign_access'],
        components: {ContentLoader,List},
        data(){
            return{
                lists:{},
                isLoading: true,                
                keyword: ''
            }
        },
        methods:{            
            loadData(req_data_type, filesize, page = 1, keyword = this.keyword){
                console.log('Load Req data type : ' + req_data_type);
                if(keyword=='') this.keyword = '';
                this.isLoading = true;

                console.log(`/` + this.username + `/content-bank/api/load_data/` + req_data_type + `?` + (keyword!=''?`keyword=` + keyword + `&`:``) + `page=` + page);

                /**
                 * Make the request to the POST /single-file URL
                 */
                axios.get( `/` + this.username + `/content-bank/api/load_data/` + req_data_type + `?` + (filesize!=undefined?`filesize=` + filesize + `&`:``) + (keyword!=''?`keyword=` + keyword + `&`:``) + `page=` + page )
                .then((response) => {                    
                    console.log(response.data);
                    console.log('SUCCESS!!');                    
                    this.lists = response.data;
                    this.isLoading = false;
                })
                .catch((response) => {
                    console.log(response);
                    console.log('FAILURE!!');
                    this.isLoading = false;
                });
            },
            loadDataContent(req_data_type, keyword = this.keyword, page = 1){
                if(keyword=='') this.keyword = '';
                this.isLoading = true;

                axios.get( `/` + this.username + `/content-bank/api/load_data/` + req_data_type + `?` + (keyword!=''?`keyword=` + keyword + `&`:``)+ `get_content_type=`+ this.$parent.navList[this.$parent.activeTab - 1]+ `&` + `page=` + page )
                .then((response) => {                    
                    console.log(response.data);
                    console.log('SUCCESS!!');                    
                    this.lists = response.data;
                    this.isLoading = false;
                })
                .catch((response) => {
                    console.log(response);
                    console.log('FAILURE!!');
                    this.isLoading = false;
                });
            },
            srchContent(){                
                //this.loadData(this.req_type_id,this.keyword);
                this.loadDataContent('search_content',this.keyword);
            },
            srchTrigger(){
                this.$refs.srchClick.click()
            }
        }
    }
</script>

<style>
    .content-srch-block {
        position: relative;
    }
    .content-srch-block i {
        position: absolute;
        color: #999;
        font-size: 18px;
        padding: 11px 16px;
    }
    .content-srch {
        background-color: #f5f5f5;
        border: 1px solid #eee;
        padding: 0px 15px 0 50px;
        height: 40px;
    }
</style>
