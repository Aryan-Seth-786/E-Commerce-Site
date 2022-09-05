<template>
    <div
        class="inline-block bg-red-100 h-96 rounded-xl shadow-xl my-2 relative"
    >
        <img
            src="https://picsum.photos/150"
            alt="img"
            class="block mx-auto mt-4"
        />
        <p
            class="my-2 text-2xl text-center mt-4 hover:underline cursor-pointer"
            @click="to_single_listing_page"
        >
            {{ props.data.name }}
        </p>
        <p class="my-2 text-xl text-center">id = {{ props.data.image_id }}</p>
        <p class="my-2 text-xl text-center">price = {{ props.data.price }}</p>
        <p class="my-2 text-xl text-center">heat = {{ props.data.heat }}</p>
        <button
            class="mx-auto block mt-6 text-xl rounded-md border-0 outline outline-rose-300 bg-rose-200 cursor-pointer hover:bg-inherit transition-colors"
            @click="add_to_cart(props.data.image_id)"
            v-if="!current_user.cart.has(props.data.image_id)"
        >
            add to cart
        </button>
        <button
            class="mx-auto block mt-6 text-xl rounded-md border-0 outline outline-rose-300 bg-rose-200 cursor-pointer hover:bg-inherit transition-colors"
            @click="remove_from_cart(props.data.image_id)"
            v-else
        >
            already in the cart
        </button>
    </div>
</template>
<script setup>
import axios from "axios";
import router from "../route";
import { Current_user } from "../stores/my_store";

const current_user = Current_user();
const props = defineProps(["data"]);

function add_to_cart(id_of_image) {
    /* sync with backend */
    if (!current_user.is_auth) {
        /* make user login first */
        router.push({
            name: "login",
        });
        return;
    }
    axios
        .post("/api/cart/add", {
            user_id: current_user.user_id,
            image_id: id_of_image,
        })
        .then((res) => {
            current_user.add_to_cart(id_of_image);
            console.log(current_user.cart);
        });
}
function remove_from_cart(id_of_image) {
    if (!current_user.is_auth) {
        return;
    }

    axios
        .post("/api/cart/remove", {
            user_id: current_user.user_id,
            image_id: id_of_image,
        })
        .then((res) => {
            console.log(res);
            current_user.remove_from_cart(id_of_image);
        })
        .catch((e) => {
            console.log(e);
        });
}
function to_single_listing_page() {
    router.push({
        name: "singleListing",
        params: { image_id: JSON.stringify(props.data) },
        // path: '/singleListing/'+props.data.image_id
    });
}
</script>
<style></style>
