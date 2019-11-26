<template>
    <div >
        <div>
        <b-card no-body>
            <b-tabs >
            <b-tab title="Logo" active>
                <b-card-text></b-card-text>
            </b-tab>
            <b-tab title="Footer Logo">
                <b-card-text>footer logo </b-card-text>
            </b-tab>
            <b-tab title="Site Info">
                <b-card-text>footer logo </b-card-text>
            </b-tab>
            <b-tab title="Contact Info">
                <b-card-text>footer logo </b-card-text>
            </b-tab>
            <b-tab title="Privacy Policy">
                <b-card-text>footer logo </b-card-text>
            </b-tab>
            <b-tab title="About">
                <b-card-text>About </b-card-text>
            </b-tab>
            <b-tab title="Terms of User">
                <b-card-text>Terms of User</b-card-text>
            </b-tab>
            </b-tabs>
        </b-card>
        </div>
        <b-button @click="submit">submit </b-button>
    </div>
</template>
<script>
import axios from "axios"
export default {
    data(){
        return {
            // list : {
            //     logo_url : ``,
            //     footer_logo_url:``,
            //     site_name:``,
            //     site_author:``,
            //     license_no:``,
            //     registration_no:``,
            //     copyright_text:``,
            //     twitter_feed:``,
            //     facebook_likebox:``,
            //     primary_email:``,
            //     secondary_email:``,
            //     primary_phone:``,
            //     secondary_phone:``,
            //     primary_tel:``,
            //     secondary_tel:``,
            //     primary_fax:``,
            //     secondary_fax:``,
            //     po:``,
            //     address:``,
            //     map_url:``,
            //     working_hours:``,
            //     working_days:``,
            //     facebook:``,
            //     twitter:``,
            //     google_plus:``,
            //     linkedin:``,
            //     skype:``,
            //     youtube:``,
            //     privacy_policy:``,
            //     about:``,
            //     terms_of_use:``,
            //     selected:``,
            // }
        }
    },
    methods:{

        submit(){
            let payload = {
                id: 2 ,
                site_name :'test update '
            }
            axios.put(`api/site_info`,payload).then(response=>{
                console.log(response)
            }).catch(error=>{
                console.log(error)
            })
        }
    },
}
</script>
<style  scoped>

</style>


