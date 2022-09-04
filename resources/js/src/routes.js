import Home from "./pages/Home/index.vue";
import Login from './pages/login.vue'
const routes = [
    {path: '/', name: 'home', component: Home},
    {path: '/login',name: 'login',component: Login},
    // { path: '/:pathMatch(.*)*', name: 'NotFound', component: ()=>import('./pages/index.vue')},
];

export default routes;
