<template>
    <h1 class="mt-10 mb-9 text-center text-4xl font-extrabold tracking-tight leading-none text-gray-900">Réservation des palces</h1>


    <div class="grid grid-cols-1 place-items-center sm:grid-cols-2 md:grid-cols-10">
        <div v-for="n in 50">
            <div v-if="n%2==0">
                <Chair color="green" /><br>
            </div>  
            <div v-else >
                <Chair color="black" /><br>
            </div> 
        </div>      
    </div>



</template>

<script >
import axios from "axios";
import Chair from '@/components/chair.vue'
export default {
    name:'reservation',
    data(){
        return{  
            places:''
        }
    },
    components:{
        Chair
    },
    mounted(){
        var data= new FormData();
        data.append('id_f',this.$route.params.id);
        axios.post("http://localhost/cinehall/Reservations/placeReservedByFilm",data)
        .then((res)=>{
            console.log(res)
        });
    }
}
</script>


<style scoped>




</style>