<template>
    <Header />
    <router-view />
    <Footer/>
    <p>from store</p>
    <p>{{my_store.property}}</p>
</template>

<script setup>
import { notes_store } from './stores/my_store';


let my_store = notes_store();
</script>