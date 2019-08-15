<template>
    <div class="card">
        
    </div>
</template>
<script>
export default {
    data(){
        return {
            list:{},
            index2:0,
            largeModal2: false,
            contacts:[],
            permission:'',
            loading:false,
            search:{
                search_item:'',
                type:10,
            }
        }
    },
    methods:{
        indexf(index){
            return this.index2+index;
        },
        deleteContact(index,id){
            var self = this
            this.$iziToast.question({
                timeout: 10000,
                close: false,
                overlay: true,
                displayMode: 'once',
                id: 'question',
                zindex: 999,
                title: 'Hey',
                message: 'Are you sure To Delete?',
                position: 'center',
                buttons: [
                    ['<button><b>YES</b></button>', function (instance, toast) {
                        self.$store.dispatch('DELETE_CONTACT',{index,id})
                        .then(response=>{
                            self.$iziToast.success({position:'topRight',title:'Ok',message:"Contact Delated Successsfully"})
                        })
                        .catch(error=>{
                            self.$iziToast.error({position:'topRight',title:'Error',message:"Something Wrong !!"})    
                        });
                        instance.hide({ transitionOut: 'fadeOut' }, toast, 'button');
            
                    }, true],
                    ['<button>NO</button>', function (instance, toast) {
            
                        instance.hide({ transitionOut: 'fadeOut' }, toast, 'button');
            
                    }],
                ]
            });
            
        },
        viewContact(contact){
             this.$refs.view_contact_modal.openModal(contact)
        },
        openModal(){
            this.$refs.add_contact_modal.openModal()
        },
        openEditModal(contact,index){
            alert('ssssss');
            this.loading = true;
            axios.get("/api/contacts/show/"+this.allPContacts2.data[index].id)
            .then(response => {
                this.loading = false;
                this.list = response.data;
            })
            .catch(function(error) {
                this.loading = true;
            });
            
            this.$refs.edit_contact_modal.openEditModal(this.list,index)
        },
        getResults(page = 1) {
            this.loading = true;
            var data = this.search
            if(data != ''){
                this.$store.dispatch('SEARCH_CONTACT',{page,data})
                .then(response=>{
                    this.loading=false;
                    this.index2 = response.data.meta.from;
                })
                .catch(error=>{
                    this.loading=true;        
                });
            }
            else{
                this.$store.dispatch('ALL_P_CONTACT',page)
                .then(response=>{
                    this.loading=false;
                })
                .catch(error=>{
                    this.loading=true;        
                });
            }
            
        },
        searchContact(){
            this.loading = true;
            var data = this.search
            var page = 1
            this.$store.dispatch('SEARCH_CONTACT',{page,data})
            .then(response=>{
                this.loading=false;
            })
            .catch(error=>{
                this.loading=true;        
            });
           
        },
        getPermission(){
            this.$store.dispatch('ALL_USER_ROLE2')
            .then(response=>{
                this.permission = response.data.permission
            })
        }
    },
    mounted(){
        this.getResults()
        this.getPermission()
    },
    computed: {
        ...mapGetters(["allPContacts","allPContacts2"]),
    },
    components: {
       
    }

}
</script>

<style>
.table_fields td {
    text-align: center;
    border-bottom: 1px solid #dce1e9;
    border-right: 1px solid #dce1e9;
    font-size: 13px;
    line-height: 16px;
    color: #666;
    white-space:nowrap;
}
.table_fields th {
    text-align: center;
    border-bottom: 1px solid #dce1e9;
    border-right: 1px solid #dce1e9;
    font-size: 13px;
    line-height: 16px;
    color: #666;
    white-space:nowrap;
}
 .actn{
     margin-left: 10px;
     cursor: pointer;
 }
 .contct{
     padding-bottom: 10px;
     padding-top: 10px
 }
 .contct-b{
     margin-bottom: 10px;
     margin-top: 10px
 }
 .load{
     margin-left: 50%;
 }
 .table-area {
  position: relative;
  z-index: 0;
  margin-top: 50px;
}

table.body {
  /* display: table; */
  /* required for table-layout to be used (not normally necessary; included for completeness) */
  /* table-layout: fixed; */
  /* this keeps your columns with fixed with exactly the right width */
  /* width: 100%; */
  /* table must have width set for fixed layout to work as expected */
  /* height: 100%; */
}

/* table.table_fields thead {
  position: fixed;
    top: 99px;
    left: 255px;
    right: 1px;
    width: 77%;
    height: 10px;
    line-height: 3em;
    background: #eee;
    table-layout: fixed;
    display: table;
}

table.table_fields th {
  background: #eee;
} */

/* table.table_fields td {
  line-height: 2em;
} */

</style>
