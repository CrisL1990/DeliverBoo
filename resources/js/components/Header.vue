<template>

<header>

    <nav class="navbar navbar-light ms-bg-grey">

        <ul class="navbar-nav mr-auto ms_flex-nav ms-bg-grey">
            <li class="nav-item pr-3"><router-link class="nav-link ms-color ms-color-hover" :to="{name: 'Home'}">Deliverboo</router-link></li>
    
            <li class="nav-item"><router-link class="nav-link ms-color ms-fs-md ms-mt ms-fs-hover" :to="{name: 'Restaurants'}">Ristoranti</router-link></li>   
        </ul>
         <ul class="navbar-nav ms-auto">
            <li class="nav-item">
                <a class="nav-link ms-bg-grey ms-color ms-fs-md ms-fs-hover" href="/admin">Accesso Admin</a>
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