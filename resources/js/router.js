import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

import Home from './pages/Home';
import Restaurants from './pages/Restaurants';

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
    ]
});
export default router;