<template >
    <div id="cart">
        <!-- {{current_user}} -->
        <p>your cart</p>
        <!-- <p>{{current_user.cart.entries}}</p> -->
        <ul>
            <li v-for="(item, index) of names_of_items" :key="index">
                {{item}}
            </li>
        </ul>
    </div>
    <!-- <button @click="get_cart_details">here</button> -->
</template>
<script setup>
import axios from 'axios';
import { onMounted, reactive } from 'vue';
import { Current_user } from '../stores/my_store';
const current_user = Current_user();
let names_of_items= reactive([]);
function get_cart_details() {
    axios.post('/api/cart/some',{
        array : Array.from(current_user.cart)
    }).then(res=>res.data)
    .then(res=>{
        // console.log(res);
        res.forEach(val=>{
            names_of_items.push(val);
        })
    })
    .catch(e=>{
        console.log(e);
    })
}
onMounted(()=>{
    get_cart_details();
})
</script>
<style >
    
</style>