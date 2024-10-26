<script setup>
import { reactive } from 'vue';
import usePosts from '@/composables/posts.js';

const { storePosts } = usePosts();


const form = reactive({
    title:'',
    description:''
});
const create_post= async()=>{
    await storePosts({...form});
}
</script>

<template>
    <div class="grid grid-cols-3 gap-4">
        <form class="col-start-2 space-y-6" @submit.prevent="create_post">
            <div class="space-y-4 rounded-md shadow sm">
              <div>
                <div class="mt-1">
                    <label for="title" class="block text-sm font-medium text-blue-700">
                        Title
                    </label>
                    <input type="text" v-model="form.title" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring-indigo-200 focus:ring-opacity-5"> </div>
              </div>

              <div>
                <div class="mt-1">
                    <label for="title" class="block text-sm font-medium text-blue-700">
                        Description
                        <textarea v-model="form.description"  class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring-indigo-200 focus:ring-opacity-5"></textarea>
                    </label>
                   </div>
                   <div>
                    <div class="mt-2">
                   <button class="bg-blue-500 text-white font-bold rounded px-4 py-2 hover:bg-blue-700" type="submit">Submit</button>
              </div></div>
                </div>
            </div>
        </form>
    </div>
</template>
<style scoped>
</style>