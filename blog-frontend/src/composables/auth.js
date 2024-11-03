import { ref } from 'vue';
import axios from 'axios';
import { useRouter } from 'vue-router';
import { useAuthStore } from '@/store/authStore';


export default function login_code(){

    const router = useRouter();
    
    
    const authStore = useAuthStore();

    const getprofile= async()=>{

      try{
        // console.log(`Bearer ${authStore.token}`);
     let res = await axios.get(`${authStore.baseURL}/profile`,{
     headers: {
       Authorization: `Bearer ${authStore.token}`
     }
   });
  return {
    id:res.data.data.id,
    name:res.data.data.name,
    email:res.data.data.email,
  }
   
 }
     catch(e){
         console.log(e);
       

    }
  }
    const login = async (email,password) => {

        const param={
            email,
            password
        }
        //console.log();
        try {
        let res = await axios.post(`${authStore.baseURL}/login`,param)
        
        if (res.data.access_token) {
        const { access_token, user } = res.data;
        
        authStore.setAuthData(user, access_token);
        //console.log(authStore.token);
        await router.push({name: 'posts.index'});
        //console.clear();
        }
        else if (res.data.error) {
            // Handle invalid credentials case
            alert(res.data.error);
          }
        }
        catch (error) {
            console.error("Login error:", error);
            alert("An error occurred. Please try again.");
          }

    }
    

    

    return {
        login,getprofile
      };
}
