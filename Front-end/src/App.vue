
<template>
  <Header :isUser="isUser"/>
  <router-view /> 
</template>


<script>
  import Cookies from "vue-cookies";
  import Header from '@/components/header.vue'
  export default {
    name:'App',
    components:{
      Header
    },
    data(){
      return {
        isUser:false
      }
    },
    watch: {
      $route(to, from) {
        if(!Cookies.get('token')){
          this.isUser=false;
        }
        else{
          this.isUser=true;
        }
      }
  }
  }


</script>


<style scoped>

</style>
