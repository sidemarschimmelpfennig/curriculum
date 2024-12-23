import { createApp } from "vue";
import App from "./App.vue";
import "./registerServiceWorker";
import router from "./router";
import store from "./store";
import "./assets/tailwind.css";
import axios from "axios";

import authMiddleware from './middleware/authMiddleware';

authMiddleware({ store, router });

createApp(App).use(store).use(router).mount("#app");


