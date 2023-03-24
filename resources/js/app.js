import { createApp } from 'vue';
import './bootstrap';
import router from './router';
import store from './store';

import  App  from "./core/App.vue";
import  Auth from "./core/Auth.vue";
import Dashboard from "./core/Dashboard.vue"


createApp(App).mount("#app");
createApp(Auth).use(router).use(store).mount("#auth");
createApp(Dashboard).mount("#dashboard");



