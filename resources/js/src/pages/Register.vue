<script setup>
import axios from "axios";
import { reactive } from "vue";

const data_by_user = reactive({
    username: "",
    password: "",
    email:''
});
function submit_form() {
    axios.post('/api/usr',{
        task:'create_user',
        username:data_by_user.username,
        password: data_by_user.password,
        email:data_by_user.email
    }).then(res=>res.data)
    .then(res=>{
        console.log(res);
    })
    .catch(e=>{
        console.log(e);
    })
}
</script>

<template>
    <div id="register">
        <form action="#" @submit.prevent="submit_form">
            <input
                type="text"
                placeholder="username"
                v-model="data_by_user.username"
            />
            <input
                type="text"
                placeholder="password"
                v-model="data_by_user.password"
            />
            <input
                type="text"
                placeholder="email"
                v-model="data_by_user.email"
            />
            <input type="submit" value="submit" />
        </form>
    </div>
</template>

<style></style>
