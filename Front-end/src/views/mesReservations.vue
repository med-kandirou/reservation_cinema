<template>

    <h1 class="mt-10 mb-9 text-center text-4xl font-extrabold tracking-tight leading-none text-gray-900">Mes reservations</h1>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3">
        <div v-for="reservation in reservations">
            <Reservation @delete_res="delete_res" :id_res="reservation.id_res" :nom_film="reservation.nom_film" :salle="reservation.salle" :date_res="reservation.date_res" :num_place="reservation.num_place" :image="reservation.image"  />
        </div>      
    </div>
</template>

<script>
    import Reservation from '@/components/reservation.vue'
    import Cookies from "vue-cookies";
    import axios from 'axios'

export default {
   
    name:'mesReservations',
    data(){
        return{
            reservations:''
        }
    },
    components:{Reservation},
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
        delete_res:function(id_r){
            console.log(id_r);
        }
    },mounted(){
        this.mesreservations();
    }


}


</script>