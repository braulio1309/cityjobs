<template>
  <div class="dashboard-headline">
    <h3><slot></slot></h3>
    <nav id="breadcrumbs" class="dark">
      <ul>
        <li><a href="/">Inicio</a></li>
        <li><a href="/dashboard">Panel</a></li>
        <li><slot></slot></li>
      </ul>
    </nav>
  </div>
</template>

<script>
export default {

};
</script>

<style>
</style>
