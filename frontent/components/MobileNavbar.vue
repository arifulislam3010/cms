<template>
    <div>
            <div  >
                <div class="w3-sidebar w3-animate-left" id="mySidebar" v-show='toggle'>
                    

                    <div>
                        <!-- <div>
                            <button class="w3-bar-item w3-button w3-large"
                    @click='toggle = !toggle'>Close &times;</button>
                        </div> -->
                        
                        <div class="card moblieMenuCard">
                            <div class="card-body">
                                <a href="#" class="card-link">Card link</a>
                                <a  class="card-link" @click='toggle = !toggle'>Close &times;</a>
                               
                            </div>
                            <div class="card-header list-group-flush text-white bg-danger">
                                Featured
                            </div>
                            <div class="card-header">
                                Featured
                            </div>
                            <div class="card-header">
                                Featured
                            </div>
                            
                            
                            </div>
                    </div>
                </div>
            </div>

            <div>
            <button class="w3-button w3-white w3-xxlarge" @click='toggle = !toggle'>&#9776;</button>
            
            </div>
  
    </div>
</template>
<script>
export default {
    data() {
        return{
            mobileBurgerShow: true,
            toggle: false
            
        }
    },
    methods: {
        
    }
}
</script>

<style scoped>
.moblieMenuCard{
    border: 1px solid red;
}
</style>