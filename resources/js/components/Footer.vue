<template>
  <footer>
        <div class="container py-3">
            <div class="row row-cols-1 row-cols-md-3 d-flex justify-content-center">
            <div class="col">
                <ul class="w-75 rounded p-3">
                    <li><router-link class="text-white ms_router-link" :to="{name: 'Restaurants'}">Ristoranti</router-link></li>
                    <li class="text-white" >Chi-siamo</li>
                    <li class="text-white" >Contatti</li>
                </ul>
            </div>
            <div class="col">
                <ul class="w-75 rounded p-3">
                    <li><a class="text-white" href="https://www.instagram.com/deliveroo_italy/?hl=it">Instagram</a></li>
                    <li><a class="text-white" href="https://www.facebook.com/DeliverooIT/">Facebook</a></li>
                    <li><a class="text-white" href="https://twitter.com/Deliveroo_Italy?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor">Twitter</a></li>
                </ul>
            </div>
            </div>
            
            
        </div>

    </footer>
</template>

<script>
export default {
    name:'Footer'
}
</script>

<style>
footer{
    height: 200px;
}
</style>