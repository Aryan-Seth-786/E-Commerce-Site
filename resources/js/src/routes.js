import Home from "./pages/Home/index.vue";
import Login from './pages/login.vue'
import Cart from './pages/cart.vue'
import Register from './pages/Register.vue'
import SingleListing from './pages/SinglelistingPage.vue'
const routes = [
    {path: '/', name: 'home', component: Home},
    {path: '/login',name: 'login',component: Login},
    {path: '/cart', name: 'cart', component: Cart},
    {path: '/register', name: 'register', component: Register , props:true},
    {path: '/singleListing/:image_id',name: 'singleListing', component:SingleListing,props:true}
    // { path: '/:pathMatch(.*)*', name: 'NotFound', component: ()=>import('./pages/index.vue')},
];

export default routes;
