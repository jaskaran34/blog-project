<script setup>
import { useRouter } from 'vue-router';
import axios from 'axios';
import { useAuthStore } from '@/store/authStore';

import usePosts from '@/composables/posts.js';




const router = useRouter();
const authStore = useAuthStore();

const logout= async ()=>{
    
    try{
       // console.log(`Bearer ${authStore.token}`);
    let res = await axios.post(`${authStore.baseURL}/logout`,{},{
    headers: {
      Authorization: `Bearer ${authStore.token}`
    }
  });

  if (res.data.message) {
    authStore.setAuthData(null, null);
    await router.push({name: 'login'});
    }
    else{
       
    }
}
    catch(e){
        console.log(e);
        
    }

}
</script>
<template>
<nav class="bg-white shadow-lg">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex justify-between h-16">
      <div class="flex">
        <div class="shrink-0 flex items-center">
          <router-link active-class="w-32 bg-blue-500 text-white rounded px-4 py-2"  :to="{name: 'posts.index'}">
            <font-awesome-icon icon="fa-home" class="h-4 w-4 mr-1" />Home
          </router-link>
        </div>
      </div>
      <div class="flex items-center space-x-4">
       
        <router-link active-class="w-32 bg-blue-500 text-white rounded px-4 py-2" :to="{name: 'posts.create'}">
          <font-awesome-icon icon="fa-plus-circle" class="h-4 w-4 mr-1" />Create
        </router-link>
        <router-link active-class="w-32 bg-blue-500 text-white rounded px-4 py-2"  :to="{name: 'profile'}">
          <font-awesome-icon icon="fa-user" class="h-4 w-4 mr-1" />Profile
        
        </router-link>
        
        
            <button @click="logout" class="text-gray-800 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium"><font-awesome-icon icon="fa-sign-out" class="h-4 w-4 mr-1" />Logout</button>
      
        
      </div>
    </div>
  </div>
</nav>

</template>