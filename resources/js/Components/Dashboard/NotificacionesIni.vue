<template>
  <div class="col-xl-6">
    <div class="dashboard-box">
      <div class="headline">
        <h3>
          <i class="icon-material-baseline-notifications-none"></i>
          Notificaciones
        </h3>
      </div>
      <div class="content">
        <ul class="dashboard-box-list">
          <li
            v-for="(notificacion, index) in objetodash.objetonoti
              .notificaciones"
            v-bind:key="notificacion.id"
          >
            <span class="notification-icon"
              ><i :class="notificacion.icono"></i
            ></span>
            <span class="notification-text" v-html="notificacion.mensaje">
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
      <div class="add-note-button" v-if="objetodash.objetonoti.totalnostis > 0">
        <inertia-link
          :href="route('notificaciones.index')"
          class="popup-with-zoom-anim button full-width button-sliding-icon"
          >Ver todos <i class="icon-material-outline-arrow-right-alt"></i
        ></inertia-link>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    objetodash: Object,
  },
  data() {
    return {};
  },
  watch: {},
  methods: {
    leido(notificacion, indice) {
      axios.put("/notileido/" + indice).then((response) => {
        this.objetodash.objetonoti.totalnostis--;
        this.objetodash.objetonoti.notificaciones.splice(
          this.objetodash.objetonoti.notificaciones.indexOf(notificacion),
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
