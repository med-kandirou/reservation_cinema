<template>
    <Header />
    <h1 class="mt-10 mb-9 text-center text-4xl font-extrabold tracking-tight leading-none text-gray-900">Les films</h1>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3">
        <Film />
    </div>
    

</template>
    
<script>
    import Header from '@/components/header.vue'
    import Film from '@/components/film.vue'
    import axios from 'axios'
    export default {
        name: 'film',
        components:{
            Header,
            Film
        },
        methods:{
            getFilms(){
                axios.get("http://localhost/cinehall/Films/getFilms")
                .then((res)=>console.log(res));
            }

        },
        mounted:{

        }
    }
</script>