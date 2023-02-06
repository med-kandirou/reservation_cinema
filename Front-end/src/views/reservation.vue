<template>
    <h1 class="mt-10 mb-9 text-center text-4xl font-extrabold tracking-tight leading-none text-gray-900">Réservation des palces</h1>
    <h1 class="font-extrabold tracking-tight text-gray-900 ml-10">les nombres de place vide sont :{{ place_vide }}</h1>
    <img class="mx-auto" id="image"  src="@/assets/images/television.png" />
    <div class="grid grid-cols-1 place-items-center sm:grid-cols-2 md:grid-cols-10">
        <div v-for="n in 50">
            <div v-if="checkplace(n)" >
                <Chair color="red" :nombre="-1" @reserver="reserver" /><br>
            </div>
            <div v-else >
                <Chair color="black" :nombre="n" @reserver="reserver" /><br>
            </div>
        </div>      
    </div>      

    

</template>

<script >
import Cookies from "vue-cookies";
import axios from "axios";
import Chair from '@/components/chair.vue'
export default {
    name:'reservation',
    data(){
        return{  
            places:'',
            place_vide:null
        }
    },
    components:{
        Chair
    },

    methods:{
        getplaces:function(){
            var data= new FormData();
            data.append('id_f',this.$route.params.id);
            axios.post("http://localhost/cinehall/Reservations/placeReservedByFilm",data)
            .then((res)=>{
                this.places=res.data;
            });
        },
        getplacesVides:function(){
            var data= new FormData();
            data.append('id_f',this.$route.params.id);
            axios.post("http://localhost/cinehall/Reservations/getplacesVides",data)
            .then((res)=>{
                this.place_vide=50-res.data.nbr_place;
            });
        },
        checkplace:function(num){
            let res=false;
            for (let i = 0; i < this.places.length; i++) {
                if(num==this.places[i].num_place){
                    return true;
                }
            }
            return res
        },
        reserver(nbr_place){
            if(nbr_place==-1){
                this.$swal.fire(
                    'Oops!!',
                    'Cette place est reservé',
                    'error'
                )
            }
            else{
                this.$swal.fire({
                title: 'Vous-etes sur de reserver la place '+nbr_place+' ?',
                showCancelButton: true,
                confirmButtonText: 'Save',
                }).then((result) => {
                    if (result.isConfirmed) {
                        var data= new FormData();
                        data.append('token',Cookies.get('token'));
                        data.append('id_f',this.$route.params.id);
                        data.append('num_place',nbr_place);
                        axios.post("http://localhost/cinehall/Reservations/reserver",data)
                        .then((res)=>{
                            if(res.data.etat=='reserver'){
                                this.getplaces();
                                this.getplacesVides();
                            }
                            
                        });  
                        this.$swal.fire('Réserver avec succes!', '', 'success');  
                    }
                })   
            }
        }
    },
    mounted(){
        this.getplaces();
        this.getplacesVides();
    }
}
</script>


<style scoped>

#image{
    height: 200px;
    width: 300px;
}


</style>