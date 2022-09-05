<script setup>
import axios from "axios";
import { reactive, ref } from "vue";
const user_created = ref(false);
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
        if (res.reply === 'done'){
            user_created.value = 'created';
        }else if (res.reply === 'username exists'){
            user_created.value = 'exists';
            
        }else {
            console.error('conditions don\'t match')
        }
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
        <div v-if="user_created === 'created'">
            now login
        </div>
        <div v-if="user_created === 'exists'">
            username exists
        </div>
    </div>
</template>

<style></style>
