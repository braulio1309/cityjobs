<template>
  <div class="col-xl-6">
    <!-- Dashboard Box -->
    <div class="dashboard-box">
      <div class="headline">
        <h3><i class="icon-feather-bar-chart-2"></i> Visitas</h3>
      </div>
      <div class="content">
        <!-- Chart -->
        <div class="chart">
          <line-chart :chartdata="chartData" :options="chartOptions" />
        </div>
      </div>
    </div>
    <!-- Dashboard Box / End -->
  </div>
</template>

<script>
import Line from "vue-chartjs";

export default {
  extends: Line,
  props: {
    objetodash: Object,
  },
  data: () => ({
    loaded: false,
    chartdata: null,
    options: {
      responsive: true,
      maintainAspectRatio: false,
    },
  }),
  mounted() {
    this.chartdata = objetodash.visitas;
  },
};
</script>

<style>
</style>
