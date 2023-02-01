<template>
    <h1 class="mt-10 mb-9 text-center text-4xl font-extrabold tracking-tight leading-none text-gray-900">Réservation des palces</h1>

<Chair color="black"/> 


</template>

<script>
import axios from "axios";
import Chair from '@/components/chair.vue'
export default {
    name:'reservation',
    components:{
        Chair
    },
    mounted(){
        var data= new FormData();
        data.append('id_f',this.$route.params.id);
        axios.post("http://localhost/cinehall/Reservations/placeReservedByFilm",data)
        .then((res)=>{console.log(res)});
    }
    
}
</script>


<style scoped>




</style>