<template>
<header username="somo" />
<div class="grid place-items-center z-50 w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
    <div class="w-full h-full max-w-md md:h-auto">
        <!-- Modal content -->
        <div class="bg-white rounded-lg shadow dark:bg-gray-700">
            <div class="px-6 py-6 lg:px-8">
                <h3 class="text-center mb-4 text-xl font-medium text-gray-900 dark:text-white">Se connecter</h3>
                <form class="space-y-6">
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Token :</label>
                        <input type="text" name="text" placeholder="your token" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" v-model="token">
                    </div>
                    <button type="button" @click="login" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Connecter</button>
                    <div v-if="valid" class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                            <span class="font-medium">Enter votre token !</span>
                        </div>
                    <div class="text-sm font-medium text-gray-500 dark:text-gray-300">
                        vous n'avez pas un compte ? <RouterLink to="/register"><a href="#" class="text-blue-700 hover:underline dark:text-blue-500">Creer un compte</a></RouterLink>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> 
    
</template>

<script>
    import header from '../components/header.vue'
    import Cookies from "vue-cookies";
    import axios from 'axios'
  export default {
    name:'login',
    data(){
        return{
            token: '',
            valid:false
        }
    },
    components:{
        header
    },
    methods:{
        login(){
            if(this.token==''){
                this.valid==true
            }
            else{
                this.valid==false
                var data=new FormData();
                data.append('token',this.token);
                axios.post("http://localhost/cinehall/users/login",data)
                .then((res)=>{
                    if(res.data.isTrue==true){
                        Cookies.set('token',res.data.token);
                        Cookies.set('nom',res.data.nom);
                        Cookies.set('email',res.data.email);
                        this.$swal.fire(
                            'Succes!',
                            'Bienvennue '+res.data.nom+'',
                            'success'
                        ).then((result) => {
                            if (result.isConfirmed) {
                                this.$router.push('/login');
                            } 
                        })
                    }
                    else{
                        this.$swal.fire(
                            'Oops!!',
                            'Token incorrect',
                            'error'
                        )
                    }
                })
            }
        }
    }
  }
    


</script>