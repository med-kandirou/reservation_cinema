<template>

    <h1 class="mt-10 mb-9 text-center text-4xl font-extrabold tracking-tight leading-none text-gray-900">Les films</h1>
    <div class="flex justify-end mb-10 mr-10">
        <input :min="currentDate" type="date" @change="getmovies" v-model="currentDate" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="John" required>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3">
        <div v-for="movie in movies">
            <Movies @getfilm="getfilm" :id_f="movie.id_f" :name="movie.nom_film" :image="movie.image" :date="movie.date_f" :salle="movie.nom_salle" />
        </div>      
    </div>

</template>
    
<script >
    import Cookies from "vue-cookies";
    import Movies from '@/components/movies.vue'
    import axios from 'axios'
    export default {
        name: 'film',
        components:{
            Movies
        },
        data(){
            return{
                currentDate : new Date().toJSON().slice(0, 10),
                movies:''
            }
        },
        methods:{
            getmovies:function(){
                var d = new Date(this.currentDate);
                var dayName = d.getDay();
                if(dayName==0){
                    this.$swal.fire(
                    'erreur!',
                    'les films ne sont pas disponible le dimmanche !',
                    'error'
                    )
                    this.currentDate = new Date().toJSON().slice(0, 10);
                }
                else if(this.currentDate<new Date().toJSON().slice(0, 10)){
                    this.$swal.fire(
                    'erreur!',
                    'La date selectionné est dépassé !',
                    'error'
                    )
                    this.currentDate = new Date().toJSON().slice(0, 10);
                }
                else{
                    var data=new FormData();
                    data.append('date',this.currentDate);
                    axios.post("http://localhost/cinehall/movies/getmovies",data)
                    .then((res)=>{
                        this.movies=res.data;
                    });
                }
            },
            getfilm:function(id){
                if(!Cookies.get('token')){
                    this.$swal.fire(
                        'Infomartion',
                        'Pour réserver ,connectez-vous !',
                        'info'
                    ).then((result) => {
                        if (result.isConfirmed) {
                            this.$router.push('/login');
                        } 
                    })
                }
                else{
                    this.$router.push('/reservation/'+id);
                }
            }
        },
        mounted(){
            this.getmovies();
        }

    }
</script>