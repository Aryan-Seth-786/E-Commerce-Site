<template>
    <div id="all-listings" class="mt-4 grid grid-cols-4 p-4 pl-5 gap-4 pr-10 w-full">
        <SingleListing
            v-for="item of props.data"
            :key="props.data.name"
            :data="item"
        ></SingleListing>
    </div>
</template>
<script setup>
import { toRefs } from "vue";
import SingleListing from "./SingleListing.vue";
const props = defineProps(["data"]);

// console.log('data got in all listings = ', props.data);
</script>
<style>
body{
        overflow-x: hidden;
        padding-right: 3px;
    }
</style>
