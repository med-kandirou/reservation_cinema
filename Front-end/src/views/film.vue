<template>
    <Header />
    <h1 class="mt-10 text-center text-4xl font-extrabold tracking-tight leading-none text-gray-900">Les films</h1>

    <Film />
    <Film />

</template>
    
<script>
    import Header from '@/components/header.vue'
    import Film from '@/components/film.vue'
    export default {
        name: 'film',
        components:{
            Header,
            Film
        }
    }
</script>