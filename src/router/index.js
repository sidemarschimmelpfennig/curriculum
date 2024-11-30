import HomeView from '@/views/HomeView.vue';
import JobListingView from '@/views/JobListingView/JobListingView.vue';
import JobPositionView from '@/views/JobPositionView/JobPositionView.vue';
import CreateAccountView from '@/views/LoginView/CreateAccountView.vue';
import LoginView from '@/views/LoginView/LoginView.vue';

import { createRouter, createWebHistory } from 'vue-router';

const routes = [
  {
    path: '/',
    name: 'home',
    component: HomeView,
  },
  {
    path: '/joblisting',
    name: 'joblisting',
    component: JobListingView,
  },
  {
    path: '/jobposition',
    name: 'jobposition',
    component: JobPositionView,
  },
  {
    path: '/login',
    name: 'login',
    component: LoginView,
    meta: { requiresNavbar: false, requiresFooter: false }
  },
   // component: login,
  //},
  {
    path:'/register',
    name: 'register',
    component: CreateAccountView,
    meta: { requiresNavbar: false, requiresFooter: false }
  }
];

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes,
});

export default router;
