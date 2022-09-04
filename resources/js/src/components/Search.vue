<template >
    <div id="search" class="bg-slate-50 flex items-center justify-evenly font-sans">
        <div id="search-name" class="">
            <p>search by name</p>
            <input type="text" placeholder="" v-model="current_user.filters_chosen.search_by_name">
        </div>
        <div id="search-filter-by-heat">
            <p>filter by heat</p>
            <select  v-model="current_user.filters_chosen.filter_by_heat">
                <option>all</option>
                <option>mild</option>
                <option>medium</option>
                <option>hot</option>
            </select>
        </div>
        <div id="search-order-by">
            <p>order by</p>
            <select v-model="current_user.filters_chosen.order_by">
                <option>none</option>
                <option>Heat (Mild First)</option>
                <option>Heat (Hot First)</option>
                <option>Price (Low First)</option>
                <option>Price (High First)</option>
            </select>
        </div>
    </div>
</template>
<script setup>
import { watch } from 'vue';
import { Current_user } from '../stores/my_store';

let current_user = Current_user();
const props = defineProps(['fun'])

</script>
<style >
    p{
        margin: 0px;
    }
    #search p{
        @apply text-xl py-2;
    }
    #search > div{
        @apply text-center;
    }
    #search > div > select{
        @apply text-lg;
    }
    #search > div > input{
        @apply text-base font-sans ;
    }
</style>