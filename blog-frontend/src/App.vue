<script setup>
import { useLogger } from './composables/useLogger';
import Header from '@/components/header_footer/Header.vue'
import { useAuthStore } from '@/store/authStore';



// Call the useLogger composable to start logging
useLogger();
const authStore = useAuthStore();
/*
import loggerMixin from './mixins/logger';

export default {
  mixins: [loggerMixin],
};
*/
</script>

<template>
<Header v-if="authStore.isAuthenticated"/>
  <div class="p-4">

    <div class="flex flex-col">
      <div class="overflow-x-auto sm-mx-0 5 lg:mx-0 5">
        <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
          <div class="overflow-hidden">
            <router-view />
          </div>
        </div>
      </div>
    </div>

  </div>




</template>

<style scoped>

</style>
