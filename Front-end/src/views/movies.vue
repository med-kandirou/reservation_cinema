<template>
    <Header />
    <h1 class="mt-10 mb-9 text-center text-4xl font-extrabold tracking-tight leading-none text-gray-900">Les films</h1>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3">
        <Movies />
    </div>
    

</template>
    
<script>
    import Header from '@/components/header.vue'
    import Movies from '@/components/movies.vue'
    import axios from 'axios'
    export default {
        name: 'film',
        components:{
            Header,
            Movies
        },
        data(){
            return{
                movies:null
            }
        },
        methods:{
            getFilms:function(){
                axios.get("http://localhost/cinehall/movies/getmovies")
                .then((res)=>{
                    this.movies=res.data;
                });
            }
        },
        mounted(){
            this.getFilms();
        }

    }
</script>