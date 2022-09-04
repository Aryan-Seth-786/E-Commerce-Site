<template>
    <div id="login">
        <form action="#" @submit.prevent="submit_form">
            <input type="text" v-model="usr_name" />
            <input type="text" v-model="pass" />
            <button type="submit">submit</button>
        </form>
    </div>
</template>
<script setup>
import axios from "axios";
import { ref } from "vue";
import router from "../route";
import { Current_user } from "../stores/my_store";

let usr_name = ref("");
let pass = ref("");
const current_user = Current_user();

function submit_form() {
    axios
        .post("/api/usr", {
            username: usr_name.value,
            password: pass.value,
            task: "check_user",
        })
        .then((res) => res.data)
        .then((res) => {
            console.log(res); //here
            /* here we have to tell is the user is valid or not */
            if (res.reply === "valid user") {
                // console.log(current_user.is_auth);
                current_user.user_id = res.user_id; 
                console.log('user id is = ',current_user.user_id);
                current_user.set_auth_to_true(current_user.user_id);
                router.push({
                    name: 'home'
                })
            }else if(res.reply === 'invalid user'){
                /* do nothing */
            }else {
                console.error('conditions do not match');
            }
        })
        .catch((e) => {
            console.log(e);
        });
}
</script>
<style></style>
