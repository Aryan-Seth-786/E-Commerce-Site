<template>
    
    <div id="single-listing-page">
        <p>hello there askldfj</p>
        <SingleListing :data="image"></SingleListing>
    </div>
    
</template>
<script setup>
import { onMounted, reactive } from 'vue';
import SingleListing from '../components/SingleListing.vue';

const props = defineProps(['image_id']);
console.log(props.image_id);
const image = reactive(JSON.parse(props.image_id));
console.log(image);
</script>
<style>
    
</style>