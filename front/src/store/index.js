// import { createStore } from "vuex";

// import auth from './modules/auth';

// export default createStore({
//   state: {},
//   getters: {},
//   mutations: {},
//   actions: {},
//   modules: {
//     auth
//   },
// });
// store.js (Vuex store)
import { createStore } from 'vuex';

const store = createStore({
  state: {
    authToken: localStorage.getItem('authToken') || null,
    currentUser: JSON.parse(localStorage.getItem('currentUser')) || null
  },
  mutations: {
    setAuth(state, { token, user }) {
      state.authToken = token;
      state.currentUser = user;
      localStorage.setItem('authToken', token);
      localStorage.setItem('currentUser', JSON.stringify(user));
    },
    logout(state) {
      state.authToken = null;
      state.currentUser = null;
      localStorage.removeItem('authToken');
      localStorage.removeItem('currentUser');
    }
  },
  getters: {
    isLoggedIn(state) {
      return state.authToken !== null;
    },
    isAdmin(state) {
      return state.currentUser && state.currentUser.is_admin === 1;
    }
  }
});

export default store;
