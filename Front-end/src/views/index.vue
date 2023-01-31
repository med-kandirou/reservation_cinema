<template>
  <Header v-bind:isUser="false" />

  <h1>index </h1>

</template>

<script>
  import Header from '@/components/header.vue'
  export default {
    name:'index',
    components:{
      Header
    }
  }


</script>