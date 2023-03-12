import { createApp } from 'vue';
import './bootstrap';
import router from './router';
import store from './store';

import  App  from "./core/App.vue";
import  Auth from "./core/Auth.vue";


createApp(App).mount("#app");
createApp(Auth).use(router).use(store).mount("#auth");



