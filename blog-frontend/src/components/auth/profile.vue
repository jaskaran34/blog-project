<script setup>
import { ref,onMounted } from 'vue';
import login_code from '@/composables/auth.js';
const { getprofile } = login_code();


const user = ref({
    id:null,
    name:null,
    email:null
});

onMounted(async ()=>{
   const myPromise= await getprofile();
    user.value.id=myPromise.id;
    user.value.name=myPromise.name;
    user.value.email=myPromise.email;
});

</script>
<template>
    
    
  <div class="grid grid-cols-3 gap-4">
    <form class="col-start-2 space-y-6">
      <div class="space-y-4 rounded-md shadow-sm">
        <div>
          <div class="mt-1">
            <label for="Id" class="block text-sm font-medium text-gray-700">Id</label>
            <input
                v-model="user.id"
                type="text"
                class="
                  block w-full mt-1 border-gray-300
                  rounded-md shadow-sm focus:border-indigo-300
                  focus-ring
                  focus:ring-indigo-200
                  focus:ring-opacity-5
"
            >
          </div>
        </div>

        <div>
          <div class="mt-1">
            <label for="Name" class="block text-sm font-medium text-gray-700">Name</label>
            <input
                v-model="user.name"
                type="text"
                class="
                  block w-full mt-1 border-gray-300
                  rounded-md shadow-sm focus:border-indigo-300
                  focus-ring
                  focus:ring-indigo-200
                  focus:ring-opacity-5
"
            >
          </div>
        </div>

        <div>
          <div class="mt-1">
            <label for="Email" class="block text-sm font-medium text-gray-700">Email</label>
            <input
                v-model="user.email"
                type="text"
                class="
                  block w-full mt-1 border-gray-300
                  rounded-md shadow-sm focus:border-indigo-300
                  focus-ring
                  focus:ring-indigo-200
                  focus:ring-opacity-5
"
            >
          </div>
        </div>

        
      </div>


    </form>

  </div>
</template>