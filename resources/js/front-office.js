//Import dependencies
import Vue from 'vue';
import App from './views/App.vue';

//Import router
import router from './routes';

//Init Vue instance
const root = new Vue({
    el: '#root',
    router,
    render: h => h(App),
});