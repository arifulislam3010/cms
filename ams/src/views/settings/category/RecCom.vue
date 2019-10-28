<template>
    <div>
        <div class="card">
            {{ node.label}}
            
            <div>
                <a href="#" @click="editCategoryModal(node)" style="margin-right:30px">update</a>
                <a href="#" @click="addChild(node)" style="margin-right:30px">AddChild</a>
                <a href="#" @click="deleteCategory(node.id)" style="margin-right:30px">delete</a>
                <a href="#" @click="()=>{ show_children = false}" v-if="show_children && node.children.length > 0" style="margin-right:30px">minimize</a>
                <a href="#" @click="()=>{ show_children = true }" style="margin-right:30px" v-if="!show_children && node.children.length > 0" >expand</a>
            </div>
        </div>
        <div v-if="show_children">
            <div  v-for="(i,k) in node.children" :key="k" style="margin-left:30px">
                <RecCat :node="i"></RecCat>
            </div>
        </div>
        <AddNcategoryModal ref="add_ncategory_modal"></AddNcategoryModal>
        <EditNcategoryModal ref="edit_ncategory_modal"></EditNcategoryModal>
        <ViewNcategoryModal ref="view_ncategory_modal"></ViewNcategoryModal>
        <Loader v-if="loading"></Loader>    

    </div>

</template>
<script>

import Loader from '@/views/common/Loader'

import AddNcategoryModal from './AddNcategoryModal'
import EditNcategoryModal from './EditNcategoryModal'
import ViewNcategoryModal from './ViewNcategoryModal'


import RecCat from "./RecCom"
export default {
    name:'RecCat',
    components:{
        Loader,
        EditNcategoryModal,
        ViewNcategoryModal,
        AddNcategoryModal,
        RecCat,
    },
    props:['node'],
    data(){
        return {
            show_children : true ,
            loading: false ,
        }
    },
    methods:{
            addChild(node){
                this.$refs.add_ncategory_modal.newCategory.title = ``
                this.$refs.add_ncategory_modal.openModal()
                this.$refs.add_ncategory_modal.selected_parent = node.id 
            },
            editCategoryModal(item){
                this.$refs.add_ncategory_modal.openModal()
                this.$refs.add_ncategory_modal.update = true
                this.$refs.add_ncategory_modal.item_id = item.id
                this.$refs.add_ncategory_modal.newCategory.title = item.label
                this.$refs.add_ncategory_modal.selected_parent = item.parent_id// this.category_list.find( v => v.id == item.parent_id).id 

            },    
            getCategories(){
                this.loading = true
                this.$store.dispatch('FETCH_CATEGORIES').then(response=>{
                    this.loading = false
                }).catch(error=>{
                    this.loading = false
                
                })
            },    
            deleteCategory(id){
                this.loading = true
                this.$store.dispatch('DELETE_CATEGORY',id).then(response=>{
                    this.getCategories()
                    this.loading = false    
                })
            },
    }
}
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