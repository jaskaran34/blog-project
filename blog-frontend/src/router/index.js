 import {createRouter,createWebHistory} from 'vue-router'
import PostIndex from '@/components/posts/PostIndex.vue'
import PostCreate from '@/components/posts/PostCreate.vue'
import PostEdit from '@/components/posts/PostEdit.vue'
 const routes=[
    {
        path:'/',name:'posts.index',component:PostIndex
    },
      {  path:'/posts/create',name:'posts.create',component:PostCreate,
      }
      ,
      {  path:'/posts/:id/edit',name:'post.edit',component:PostEdit,props:true,
      }
 ]
export default createRouter({
    history:createWebHistory(),
    routes
})