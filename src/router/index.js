import DashBoardAdminView from "@/views/DashBoardAdmin/DashBoardAdminView.vue";
import ConfigurationPage from "@/views/DashBoardAdmin/pages/ConfigurationPage.vue";
import HomeListPage from "@/views/DashBoardAdmin/pages/Forms/HomeListPage.vue";
import NewJobForm from "@/views/DashBoardAdmin/pages/Forms/NewJobForm.vue";
import HomePageAdmin from "@/views/DashBoardAdmin/pages/HomePageAdmin.vue";
import JobListingPage from "@/views/DashBoardAdmin/pages/JobListingPage.vue";
import UsersPage from "@/views/DashBoardAdmin/pages/UsersPage.vue";
import DashBoardCandidateView from "@/views/DashBoardCandidate/DashBoardCandidateView.vue";
import HomeView from "@/views/HomeView.vue";
import JobListingView from "@/views/JobListingView/JobListingView.vue";
import JobPositionView from "@/views/JobPositionView/JobPositionView.vue";
import CurriculumRegister from "@/views/LoginView/CurriculumRegister.vue";
//import UserRegister from "@/views/LoginView/UserRegister.vue";
import LoginView from "@/views/LoginView/LoginView.vue";

import { createRouter, createWebHistory } from "vue-router";

const routes = [
  {
    path: "/",
    name: "home",
    component: HomeView,
  },
  {
    path: "/joblisting",
    name: "joblisting",
    component: JobListingView,
  },
  {
    path: "/jobposition",
    name: "jobposition",
    component: JobPositionView,
  },
  {
    path: "/login",
    name: "login",
    component: LoginView,
    meta: { requiresNavbar: false, requiresFooter: false },
  },
  {
    path: "/Curriculum",
    name: "curriculum",
    component: CurriculumRegister,
    meta: { requiresNavbar: false, requiresFooter: false },
  },
  {
    path: "/candidate",
    name: "candidate",
    component: DashBoardCandidateView,
    meta: { requiresNavbar: false, requiresFooter: false },
  },
  {
    path: "/admin",
    name: "admin",
    component: DashBoardAdminView,
    meta: { requiresNavbar: false, requiresFooter: false},
    children:[
      {
        path:"",
        name:"default",
        component:HomePageAdmin,
      },
      {
        path:"joblistpage",
        name:'job-listpage',
        component:JobListingPage,
        children:[
          {
            path:"",
            name:"homelist",
            component:HomeListPage
          },
          {
            path:"create",
            name:"create",
            component: NewJobForm,
          },
        ]
      },{
        path:"userpage",
        name: "userpage",
        component: UsersPage,
      },
      {
        path:"configuration",
        name: "configuration",
        component: ConfigurationPage,
      }
    ]
  },

  
];

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes,
});

export default router;
