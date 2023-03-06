import { createApp } from 'vue';
import './bootstrap';

import  App  from "./core/App.vue";
import  Auth from "./core/Auth.vue";


createApp(App).mount("#app");
createApp(Auth).mount("#auth");


