<template>
    <h1 class="mt-10 mb-9 text-center text-4xl font-extrabold tracking-tight leading-none text-gray-900">Réservation des palces</h1>


    <div class="grid grid-cols-1 place-items-center sm:grid-cols-2 md:grid-cols-10">
        <div v-for="n in 50">
            <div v-if="checkplace(n)" >
                <Chair color="red" :nombre="-1" @reserver="reserver" /><br>
            </div>
            <div v-else >
                <Chair color="black" :nombre="n" /><br>
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
    emits:['reserver'],
    methods:{
        checkplace:function(num){
            let res=false;
            for (let i = 0; i < this.places.length; i++) {
                if(num==this.places[i].num_place){
                    return true;
                }
            }
            return res
        },
        reserver:function(id_p){
            console.log(id_p);
        }
    },
    mounted(){
        var data= new FormData();
        data.append('id_f',this.$route.params.id);
        axios.post("http://localhost/cinehall/Reservations/placeReservedByFilm",data)
        .then((res)=>{
            this.places=res.data;
        });
    }
}
</script>


<style scoped>




</style>