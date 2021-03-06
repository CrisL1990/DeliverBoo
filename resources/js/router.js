import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

import Home from './pages/Home';
import Restaurants from './pages/Restaurants';
import Dishes from './pages/Dishes';
import Orders from './pages/Orders';
import PaidOrder from './pages/PaidOrder';

const router = new VueRouter({
    mode: "history",

    routes: [
        {
            path: '/',
            name: 'Home',
            component: Home
        },
        {
            path: '/restaurants',
            name: 'Restaurants',
            component: Restaurants
        },
        {
            path:'/restaurants/:slug',
            name:'Dishes',
            component: Dishes,
        },
        {
            path:'/orders',
            name:'Orders',
            component: Orders,
        },
        {
            path:'/paidOrder',
            name:'PaidOrder',
            component: PaidOrder,
        }
    ]
});
export default router;