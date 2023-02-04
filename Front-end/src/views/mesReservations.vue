<template>

    <h1 class="mt-10 mb-9 text-center text-4xl font-extrabold tracking-tight leading-none text-gray-900">Les films</h1>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3">
        <div v-for="reservation in reservations">
            
        </div>      
    </div>
</template>

<script>
    import Cookies from "vue-cookies";
    import axios from 'axios'

export default {
   
    name:'mesReservations',
    data(){
        return{
            reservations:''
        }
    },
    methods:{
        mesreservations:function(){
            if(!Cookies.get('token')){
                this.$router.push('/login');
            }
            else{
                var data= new FormData();
                data.append('token',Cookies.get('token'));
                axios.post("http://localhost/cinehall/Reservations/mesreservations",data)
                .then((res)=>{
                    this.reservations=res.data;
                });
            }
        },
        
    },mounted(){
        this.mesreservations();
    }


}


</script>