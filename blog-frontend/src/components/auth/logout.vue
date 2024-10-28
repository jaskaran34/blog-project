<template>
    logout
</template>
<script setup>
import { onBeforeMount } from 'vue';
import { useRouter } from 'vue-router';
import axios from 'axios';
import { useAuthStore } from '@/store/authStore';

const router = useRouter();
const authStore = useAuthStore();



//


onBeforeMount( async()=>{
    try{
      //  console.log(`Bearer ${authStore.token}`);
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
        router.back();
    }
}
    catch(e){
        console.log(e);
        router.back();
    }
});

</script>