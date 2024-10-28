import { defineStore } from 'pinia';

export const useAuthStore = defineStore('auth', {
  state: () => ({
    baseURL: 'http://127.0.0.1:8000/api',
    user: null,
    token: null,
  }),
  actions: {
    setAuthData(user, token) {
      this.user = user;
      this.token = token;

    },
    clearAuthData() {
      this.user = null;
      this.token = null;
    },
  },
  getters: {
    isAuthenticated: (state) => !!state.token,
    userName: (state) => state.user.name,
  },
});