<template>
<main>
    <router-view></router-view>
</main>
  
</template>

<script>
export default {
    name:'Main'
}
</script>

<style>
main{
    height: calc(100% - 60px - 200px);
}
</style>