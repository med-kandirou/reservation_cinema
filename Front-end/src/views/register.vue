<template>
    <Header isUser="false" isGuest="true"/>
    <div class="grid place-items-center z-50 w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
        <div class="w-full h-full max-w-md md:h-auto">
            <!-- Modal content -->
            <div class="bg-white rounded-lg shadow dark:bg-gray-700">
                <div class="px-6 py-6 lg:px-8">
                    <h3 class="text-center mb-4 text-xl font-medium text-gray-900 dark:text-white">S'inscrire</h3>
                    <form class="space-y-6">
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nom :</label>
                            <input type="text" v-model="nom"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                placeholder="ex:mohamed">
                        </div>
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email :</label>
                            <input type="email" v-model="email"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                placeholder="name@company.com">
                        </div>
                        <button @click="register" type="button" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">S'inscrire</button>
                        <div v-if="valid" class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                            <span class="font-medium">Danger alert!</span> Change a few things up and try submitting again.
                        </div>
                        <div class="text-sm font-medium text-gray-500 dark:text-gray-300">
                            vous aves déja un compte ? <router-link to="/login"><a href="#" class="text-blue-700 hover:underline dark:text-blue-500">Connecter</a></router-link> 
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</template>


<script>
import Header from '../components/header.vue'
import axios from 'axios'
export default {
    name: 'register',
    components:{
      Header
    },
    data() {
        return {
            email: '',
            nom: '',
            valid:false
        }
    }, methods: {
        register: function () {
            if(this.nom=='' || this.email=='' ){
                this.valid=true;
            }else{
                this.valid=false;
                var data=new FormData();
                data.append('nom',this.nom);
                data.append('email',this.email);
                axios.post("http://localhost/cinehall/users/register",data)
                .then((res)=>{
                    if(res.status=200){
                        this.$swal.fire(
                            'Succes!',
                            'Votre Token est :'+res.data+'',
                            'success'
                        ).then((result) => {
                            if (result.isConfirmed) {
                                this.$router.push('/login');
                            } 
                        })
                    }
                }
                )
            }
        }
    },

}


</script>