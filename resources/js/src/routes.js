import Home from "./pages/Home/index.vue";

const routes = [
    {path: '/', name: 'home', component: Home},
    { path: '/:pathMatch(.*)*', name: 'NotFound', component: ()=>import('./pages/index.vue')},
];

export default routes;
