import {
    createApp
} from 'vue';
import './bootstrap';
import router from './router';
import store from './store';

import App from "./core/App.vue";
import Auth from "./core/Auth.vue";
////import Dashboard from "./core/Dashboard.vue"
import {
    abilitiesPlugin
} from "@casl/vue";
import ability from "./store/services/abilities";
import iziToast from 'izitoast';
import '../../node_modules/izitoast/dist/css/izitoast.css'


createApp(App).use(router).use(store).use(iziToast).use(abilitiesPlugin, ability, {
    useGlobalProperties: true
}).mount("#app");
createApp(Auth).use(router).use(store).mount("#auth");
///createApp(Dashboard).mount("#dashboard");
