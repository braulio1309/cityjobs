<template>
  <div class="fun-facts-container">
    <div class="fun-fact" data-fun-fact-color="#36bd78">
      <div class="fun-fact-text">
        <span>Ofertas activas</span>
        <h4>{{ objetodash.total_activas }}</h4>
      </div>
      <div class="fun-fact-icon">
        <i class="icon-material-outline-gavel"></i>
      </div>
    </div>
    <div class="fun-fact" data-fun-fact-color="#b81b7f">
      <div class="fun-fact-text">
        <span>Ofertas publicadas</span>
        <h4>{{ objetodash.total_ofertas }}</h4>
      </div>
      <div class="fun-fact-icon">
        <i class="icon-material-outline-business-center"></i>
      </div>
    </div>
    <div class="fun-fact" data-fun-fact-color="#efa80f">
      <div class="fun-fact-text">
        <span>Valoraciones</span>
        <h4>{{ objetodash.valoraciones }}</h4>
      </div>
      <div class="fun-fact-icon">
        <i class="icon-material-outline-rate-review"></i>
      </div>
    </div>
  </div>
</template>

<script>
export default {
 props:{
     objetodash:Object,
 },

};
</script>

<style>
</style>
