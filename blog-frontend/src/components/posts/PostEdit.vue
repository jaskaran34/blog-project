<script setup>
import usePosts from "@/composables/posts.js";

const {post, getPost, updatePost} = usePosts();

import {onMounted} from "vue";

const props = defineProps({
    id: {
      type: String,
      required: true,
    }
})

onMounted(() => getPost(props.id))

const editPost = async () => {
  await updatePost(props.id);
}


</script>

<template>
  <div class="grid grid-cols-3 gap-4">
    <form class="col-start-2 space-y-6" @submit.prevent="editPost">
      <div class="space-y-4 rounded-md shadow-sm">
        <div>
          <div class="mt-1">
            <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
            <input
                v-model="post.title"
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
            <label for="title" class="block text-sm font-medium text-gray-700">Description</label>
            <textarea
                v-model="post.description"
                class="
                  block w-full mt-1 border-gray-300
                  rounded-md shadow-sm focus:border-indigo-300
                  focus-ring
                  focus:ring-indigo-200
                  focus:ring-opacity-5
">
             </textarea>
          </div>
        </div>


        <button class="bg-blue-500 text-white font-bold rounded px-4 py-2 hover:bg-blue-700" type="submit">Submit</button>
        <router-link :to="{ name:'posts.index'}"><button class="bg-red-500 text-white font-bold rounded px-4 py-2 hover:bg-red-700" type="submit">Cancel</button>
        </router-link>
      </div>


    </form>

  </div>

</template>

<style scoped>

</style>