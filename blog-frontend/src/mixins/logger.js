// mixins/logger.js
import { useAuthStore } from '@/store/authStore';
import { useRoute } from 'vue-router';

export default {
  mounted() {
    const authStore = useAuthStore();
  },
  watch: {
    // Watches route changes using the route path
    '$route.fullPath': function () {
      const authStore = useAuthStore();
      console.log('Token:', authStore.token);
      console.log('User:', authStore.user);
    },
  },
};
