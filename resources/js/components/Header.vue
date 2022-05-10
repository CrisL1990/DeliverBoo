<template>

<header>

    <nav class="navbar navbar-light bg-light">

        <ul class="navbar-nav mr-auto">
            <li class="nav-item">

                <router-link class="nav-link" :to="{name: 'Restaurants'}">Ristoranti</router-link>

            </li>
        </ul>

    </nav>

</header>
  
</template>

<script>
export default {
    name:'Header',
  }
</script>

<style>

</style>