//Import dependencies
import Vue from "vue";
import VueRouter from "vue-router";

//Components
// import Home from './pages/Home';
import Products from './pages/Products';
import Contact from './pages/Contact';
import NotFound from "./pages/NotFound";
import ProductDetail from "./pages/ProductDetail";

//Active VueRouter in Vue
Vue.use(VueRouter);

//Routes definitions
const router = new VueRouter({
    mode: "history",
    linkExactActiveClass: "active",
    routes: [
        // {
        //     path: "/",
        //     name: "home",
        //     component: Home,
        // },
        {
            path: "/products",
            name: "products",
            component: Products,
        },
        {
            path: "/product/:slug",
            name: "ProductDetail",
            component: ProductDetail,
        },
        {
            path: "/contact",
            name: "contact",
            component: Contact,
        },

        {
            path: "*",
            name: "not-found",
            component: NotFound,
        },
    ],
});

//Export routes
export default router;
