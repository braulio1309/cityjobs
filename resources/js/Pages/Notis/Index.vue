<template>
  <body class="gray">
    <div id="wrapper">
      <backend-header :invitado="invitados" :user="user" />
      <div class="clearfix"></div>
      <div class="dashboard-container">
        <menu-lateral :cualactivo="cual" />
        <div class="dashboard-content-container" data-simplebar>
          <div class="dashboard-content-inner">
            <breadcumb> Notificaciones</breadcumb>

            <div class="row">
              <!-- Dashboard Box -->
              <div class="col-xl-12">
                <div class="dashboard-box">
                  <div class="headline">
                    <h3 v-if="notificaciones.length > 0">
                      <i class="icon-material-baseline-notifications-none"></i>
                      Notificaciones
                    </h3>
                    <h6 v-else> <em> No hay notificaciones por leer</em></h6>
                  </div>
                  <div class="content">
                    <ul class="dashboard-box-list">
                      <li
                        v-for="(notificacion, index) in notificaciones"
                        v-bind:key="notificacion.id"
                      >
                        <span class="notification-icon"
                          ><i :class="notificacion.icono"></i
                        ></span>
                        <span
                          class="notification-text"
                          v-html="notificacion.mensaje"
                        >
                        </span>
                        <!-- Buttons -->
                        <div class="buttons-to-right">
                          <a
                            href="#"
                            @click="leido(notificacion, notificacion.id)"
                            class="button ripple-effect ico"
                            title="Marca como leído"
                            data-tippy-placement="left"
                            ><i class="icon-feather-check-square"></i
                          ></a>
                        </div>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <div class="dashboard-footer-spacer"></div>
            <footer-interno />
          </div>
        </div>
      </div>
    </div>
  </body>
</template>

<script>
import Breadcumb from "../../Components/Backend/Breadcumb.vue";
import BreadcumbVue from "../../Components/Backend/Breadcumb.vue";
import FooterInterno from "../../Components/Backend/FooterInterno.vue";
import BackendHeader from "../../Components/Backend/Header.vue";
import MenuLateral from "../../Components/Backend/MenuLateral.vue";

export default {
  components: {
    BackendHeader,
    MenuLateral,
    FooterInterno,
    Breadcumb,
  },
  props: {
    errors: Object,
    flash: Object,
    user: Object,
    notificaciones: Array,
  },
  data() {
    return {
      cual: 3,
      invitados: false,
    };
  },
  methods: {
    leido(notificacion, indice) {
      axios.put("/notileido/" + indice).then((response) => {
        this.notificaciones.splice(
          this.notificaciones.indexOf(notificacion),
          1
        );
        Snackbar.show({
          text: "Notificación leída!",
          pos: "bottom-center",
          showAction: false,
          actionText: "Dismiss",
          duration: 3000,
          textColor: "#fff",
          backgroundColor: "#383838",
        });
      });
    },
  },
};
</script>

<style>
</style>
