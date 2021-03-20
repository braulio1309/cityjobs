<template>
  <body class="gray">
    <div id="wrapper">
      <backend-header :invitado="invitados" :user="user" />
      <div class="clearfix"></div>

      <div class="dashboard-container">
        <menu-lateral :cualactivo="cual" />

        <div class="dashboard-content-container" data-simplebar>
          <div class="dashboard-content-inner">
            <div class="dashboard-headline">
              <h3>Hola, {{ $page.user.name }}!</h3>
              <span>Bienvenido!</span>

              <nav id="breadcrumbs" class="dark">
                <ul>
                  <li><a href="/dashboard">Inicio</a></li>
                  <li>Panel</li>
                </ul>
              </nav>
            </div>

            <indicadores-tope :objetodash="objetodash" />
            <div class="row">
              <calendario-ini  :objetodash="objetodash" />
              <notificaciones-ini  :objetodash="objetodash" />
            </div>

            <div class="row">
              <grafico-visitas  :objetodash="objetodash" />
              <pedidos-ini :objetodash="objetodash"  />
            </div>
            <div class="dashboard-footer-spacer"></div>
            <footer-interno />
            <modalog :errors="errors" :flash="flash" />
          </div>
        </div>
      </div>
    </div>
  </body>
</template>

<script>
import FooterInterno from "../Components/Backend/FooterInterno.vue";
import BackendHeader from "../Components/Backend/Header.vue";
import MenuLateral from "../Components/Backend/MenuLateral.vue";
import Modalog from "../Components/Backend/Modalog.vue";
import CalendarioIni from "../Components/Dashboard/CalendarioIni.vue";
import GraficoVisitas from "../Components/Dashboard/GraficoVisitas.vue";
import IndicadoresTope from "../Components/Dashboard/IndicadoresTope.vue";
import NotificacionesIni from "../Components/Dashboard/NotificacionesIni.vue";
import PedidosIni from "../Components/Dashboard/PedidosIni.vue";

export default {
  components: {
    BackendHeader,
    Modalog,

    FooterInterno,
    MenuLateral,
    IndicadoresTope,
    CalendarioIni,
    GraficoVisitas,
    NotificacionesIni,
    PedidosIni,
  },
  props: {
    invitados: Boolean,
    errors: Object,
    flash: Object,
    user: Object,
    abremodal: Boolean,
    objetodash:Object,
  },
  data() {
    return {
      cual: 1,
    };
  },

};
</script>
