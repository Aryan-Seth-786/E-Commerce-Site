import axios from "axios";
import { defineStore } from "pinia";
import { computed, reactive, ref } from "vue";
// export const notes_store = defineStore({
//     id:'notes_store',
//     state: ()=>({
//         property: 1
//     }),
//     getters: {
//         property_getter(state){
//             return state.property;
//         }
//     }
//     // id: 'notes',
//     // state: () => ({
//     //     all_notes: []
//     // }),
//     // getters: {
//     //     active_notes: (state) => state.all_notes.filter(note => note.active)
//     // },
//     // actions: {
//     //     create_note(obj) {
//     //         this.all_notes.push(obj);
//     //     }
//     // }
// })
export const Current_user = defineStore('current_user',()=>{
    let is_auth = ref(false);
    let user_id = ref(null);
    const filters_chosen = ref({
        search_by_name:'',
        filter_by_heat : 'all',
        order_by:'none'
    })
    const cart = ref(new Set());
    function add_to_cart(idd){
        cart.value.add(idd);
        // console.log(new_str);
    }
    function remove_from_cart(idd) {
        cart.value.delete(idd)
    }
    function set_auth_to_true(user_idd) {
        is_auth.value = true;
        axios.post('/api/cart/list',{
            user_id: user_idd
        })
        .then(res=>{
            res = res.data;
            res.forEach(elem => {
                add_to_cart(elem)
            });
            console.log(cart.value);
        })
        .catch(e=>{
            console.log(e);
        })
    }
    function reset_current_user(){
        is_auth.value = false;
        user_id.value = null;
        filters_chosen.value.search_by_name = ''
        filters_chosen.value.filter_by_heat = 'all';
        filters_chosen.value.order_by = 'none'
        cart.value.clear();
    }
    // const is_auth2 = computed(()=>{
    //     return toString(is_auth.value);
    // })
    return {reset_current_user,is_auth,set_auth_to_true ,/*  is_auth2 , */ filters_chosen , cart , add_to_cart , remove_from_cart, user_id}
})