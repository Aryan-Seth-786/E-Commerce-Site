<template>
    <div id="header" class="w-full h-20   font-sans mt-0 text-2xl relative shadow rounded-xl">
        <ul class="h-full w-full m-0 list-none flex items-center  justify-end">

            <li class="absolute left-10 font-medium 
            hover:bg-red-100 p-4 px-6 rounded-xl 
            transition-all hover:shadow-md
            select-none cursor-pointer" @click="to_home_page">Hot Sauces</li>

            <li class="headingItem relative" @click="to_cart_page" >
                cart
            </li>
            <li v-if="user_data.is_auth" class="headingItem" @click="logout">logout</li>
            <li v-else class="flex">
            <li class="headingItem" @click="to_login_page">login</li>
            <li class="headingItem" @click="to_register_page">register</li>
            </li>
        </ul>
        <!-- <button class="px-4 py-2 font-semibold text-sm bg-blue-500 text-white rounded-md shadow-sm hover:-translate-y-1 hover:scale-110 hover:bg-indigo-500 ease-in-out delay-150 duration-300">
            changed
        </button> -->
    </div>
</template>

<script setup>
// export default {
//     name: "Header"
// }
/* defining props */
import { reactive } from 'vue';
import router from '../route';
import { Current_user } from '../stores/my_store'
const user_data = Current_user();
// user_data.is_auth = false;
const userActions = reactive(new Map());
userActions.set('clicked_cart', false)

function to_home_page(e) {
    router.push({
        name: 'home'
    })

}
function to_cart_page(e) {
    router.push({
        name: 'cart'
    })
}
function to_login_page(e) {
    router.push({
        name : 'login'
    })
}
function to_register_page(e) {
    router.push({name:'register'})

}
function logout(e){
    user_data.reset_current_user();
}

</script>
<style scoped>
.headingItem {
    @apply mx-10 font-normal cursor-pointer hover:bg-red-100 py-2 px-4 rounded-xl select-none transition-all hover:shadow-md;
}
</style>
<style >
/* #header ul{
    @apply flex;
} */
* {
    box-sizing: border-box;
}

body {
    margin: 0px;
    padding: 0px;
    height: 100vh;
    width: 100vw;
}

#app {
    height: 100%;
    width: 100%;
}

/* #header ul >li:first-child{
    animation: click_animation 2s infinite;
} */
</style>
