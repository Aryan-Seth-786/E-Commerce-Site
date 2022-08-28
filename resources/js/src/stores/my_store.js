import { defineStore } from "pinia";
export const notes_store = defineStore({
    id:'notes_store',
    state: ()=>({
        property: 1
    }),
    getters: {
        property_getter(state){
            return state.property;
        }
    }
    // id: 'notes',
    // state: () => ({
    //     all_notes: []
    // }),
    // getters: {
    //     active_notes: (state) => state.all_notes.filter(note => note.active)
    // },
    // actions: {
    //     create_note(obj) {
    //         this.all_notes.push(obj);
    //     }
    // }
})