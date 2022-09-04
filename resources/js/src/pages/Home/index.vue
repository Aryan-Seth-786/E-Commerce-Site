<template>
    <div id="home" class="font-sans select-none ">
        <div
            id="slider-wrapper"
            class="grid place-items-center max-h-52  bg-slate-100"
        >
            <div id="slider" class="h-52 w-3/4 flex flex-wrap items-center relative">
                <div class="left-16 absolute text-center">
                    <span class="text-3xl mr-4">📢</span>
                    <h1 class="inline">Get your hot sauce!</h1>
                    <p class="text-xl">hurry! limited time discount</p>
                </div>

                <img
                    src="/storage/images/sliderImg.jpg"
                    width="150"
                    height="150"
                    alt="img"
                    class="absolute right-20 shadow-2xl rounded-xl"
                />
            </div>
        </div>
        <Search ></Search>
        <AllListings :data="data_for_all_listings"></AllListings>
    </div>
</template>

<script setup>
import axios from "axios";
import { onMounted, reactive, ref, watch } from "vue";
import Search from "../../components/Search.vue";
import AllListings from "../../components/AllListings.vue";
import { Current_user } from "../../stores/my_store";
const usr = Current_user();
let data_for_all_listings = reactive([
    {name:'sample anme',path: 'asdkfflfj'}
]);
function get_listings() {
    axios
        .post("/api/getImgs", {
            search_by_name: usr.filters_chosen.search_by_name,
            filter_by_heat: usr.filters_chosen.filter_by_heat,
            order_by: usr.filters_chosen.order_by,
        })
        .then((res) => res.data)
        .then((res) => {
            // data_for_all_listings = reactive(res);
            // data_for_all_listings = res;
            data_for_all_listings.length = 0; 
            data_for_all_listings.push(...res);
            console.log('data for listings = ',data_for_all_listings);
            // data_for_all_listings = [];
            // data_for_all_listings = Array(...res);
        })
        .catch(e=>{
            console.log('server error ',e);
        })
}
watch(usr.filters_chosen,()=>{
    get_listings();
});
// watch(()=>usr.is_auth,()=>{
//     console.log('inside the watch for usr.isauth',usr.is_auth);
// })

/* below code does'nt work
    wanted to get cart of the user if he / she gets authenticated */
    
// watch(()=>usr.is_auth2,()=>{
//     console.log('inside the watch');
//     console.log(usr.is_auth);
//     if (usr.is_auth === true){
//         get_cart_of_user(usr.user_id);
//     }
// })

/* above commented code not working */
function get_cart_of_user(user_id) {
    axios.post('/api/cart/list',{
        user_id: user_id
    })
    .then(res=>{
        res = res.data;
        console.log(res);
    })
}
onMounted(()=>{
    get_listings()
})
</script>
<style>
    *{
        /* outline: 2px solid blue; */
        max-width: 100vw;
    }
    body{
        width: 100%;
        height: 100vh;
    }
</style>
