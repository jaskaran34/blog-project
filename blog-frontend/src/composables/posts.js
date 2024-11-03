import { ref } from 'vue';
import axios from 'axios';
import { useRouter } from 'vue-router';

import { useAuthStore } from '@/store/authStore';

  


export default function usePosts(){

    const router = useRouter();

    const posts=ref([]);
    const post = ref([]);
    const authStore = useAuthStore();

    const clearPosts = async() => {
         posts.value = []; 
        }

    const getPosts= async() =>{
    
        

        let res=await axios.get('http://127.0.0.1:8000/api/posts');
        //console.log(res);
        posts.value=res.data.data;
        
    };
    const getPost = async (id) => {
        
        let res = await axios.get(`http://127.0.0.1:8000/api/posts/${id}`)
        post.value = res.data.data[0]

    }
    

    const updatePost= async(id) =>{
        console.log(post.value);//return
        try {
            await axios.patch(`http://127.0.0.1:8000/api/posts/${id}`,post.value,{
                headers: {
                  Authorization: `Bearer ${authStore.token}`
                }
              });
            await pop_message('Post Updated');
            await router.push({name: 'posts.index'})
        } catch(err){
            console.log(err)
        }
    };

    const storePosts= async(post) =>{
    
        try {
            await axios.post('http://127.0.0.1:8000/api/posts', post,{
                headers: {
                  Authorization: `Bearer ${authStore.token}`
                }
              });
            await pop_message('Post Created');
            await router.push({name: 'posts.index'})
        } catch(err){
            console.log(err)
        }
    };

    const  delete_post= async (post_id)=> {
        if(!window.confirm('Do you want to delete the post?')){
            return
        }

        await destroy_post(post_id);
        await getPosts();
        await pop_message('Post Deleted');
    }

    const pop_message= async(message)=>{
        alert(message);
    }
    const destroy_post = async (post_id) => {
        await axios.delete(`http://127.0.0.1:8000/api/posts/${post_id}`,{
            headers: {
              Authorization: `Bearer ${authStore.token}`
            }
          });
        
    }

    return {
        post,
        posts,
        getPosts,
        getPost,
        delete_post,
        pop_message,
        storePosts,
        updatePost,
        clearPosts
      };
}
