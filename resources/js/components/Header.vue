<template>

<header>
    <h1>Ricerca ristoratori</h1>
    <nav class="navbar navbar-light bg-light">
  <form class="form-inline">
    <input class="form-control mr-sm-2" type="search" v-model="category" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
  </form>
</nav>

</header>
  
</template>

<script>
export default {
    name:'Header',
    data (){

        return {
            category: '',

        }

    },
}
</script>

<style>

</style>