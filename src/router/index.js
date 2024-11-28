import HomeView from '@/views/HomeView.vue';
import JobListingView from '@/views/JobListingView/JobListingView.vue';
import JobPositionView from '@/views/JobPositionView/JobPositionView.vue';
import login from '@/views/LoginAcess/login.vue'
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
    component: login,
  },
];

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes,
});

export default router;
