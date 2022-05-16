<template>

<header>

    <nav class="navbar navbar-light bg-light">

        <ul class="navbar-nav mr-auto ms_flex-nav">
            <li class="nav-item pr-3"><router-link class="nav-link" :to="{name: 'Home'}">Deliverboo</router-link></li>
    
            <li class="nav-item"><router-link class="nav-link" :to="{name: 'Restaurants'}">Ristoranti</router-link></li>
            
        </ul>
         <ul class="navbar-nav ms-auto">
            <li class="nav-item">
                <a class="nav-link" href="/admin">Accesso Admin</a>
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
    .nav-link{
        font-size: 20px;
    }
    .router-link-exact-active {
        font-weight: bold;
        text-transform: uppercase;
        
    }
</style>