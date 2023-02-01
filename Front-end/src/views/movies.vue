<template>
    <h1 class="mt-10 mb-9 text-center text-4xl font-extrabold tracking-tight leading-none text-gray-900">Les films</h1>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3">
        <div v-for="movie in movies">
            <Movies @reserver="reserver" :id_f="movie.id_f" :name="movie.nom_film" :image="movie.image" :date="movie.date_f" :salle="movie.nom_salle" />
        </div>      
    </div>

</template>
    
<script>
    import Movies from '@/components/movies.vue'
    import axios from 'axios'
    export default {
        name: 'film',
        components:{
            Movies
        },
        data(){
            return{
                movies:''
            }
        },
        methods:{
            getFilms:function(){
                axios.get("http://localhost/cinehall/movies/getmovies")
                .then((res)=>{
                    this.movies=res.data;
                });
            },reserver:function(id){
                // axios.get("http://localhost/cinehall/movies/getmovies")
                // .then((res)=>{});
                console.log(id);
            }
        },
        mounted(){
            this.getFilms();
        }

    }
</script>