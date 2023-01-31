
<template>
  <Header />
  <router-view /> 
</template>


<script>
import Header from './components/header.vue'
import axios from 'axios';
  export default {
    name:'App',
    components:{
      Header
    }
  }


</script>


<style scoped>

</style>
