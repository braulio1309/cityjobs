<template>
  <div class="header-notifications">
    <div class="header-notifications-trigger">
      <a href="#"
        ><i class="icon-feather-bell"></i
        ><span>{{ objetonoti.totalnostis }}</span></a
      >
    </div>

    <div class="header-notifications-dropdown">
      <div class="header-notifications-headline">
        <h4 v-if="objetonoti.totalnostis > 0">Notificaciones</h4>
        <h6 v-else><em>No hay notificaciones</em></h6>
      </div>
      <div
        class="header-notifications-content"
        v-show="objetonoti.totalnostis > 0"
      >
        <div class="header-notifications-scroll" data-simplebar>
          <ul>
            <li
              class="notifications-not-read"
              v-for="notificacion in objetonoti.notificaciones"
              v-bind:key="notificacion.id"
            >
              <a href="#">
                <span class="notification-icon"
                  ><i :class="notificacion.icono"></i
                ></span>
                <span class="notification-text" v-html="notificacion.mensaje">
                </span>
              </a>
            </li>
          </ul>
        </div>
      </div>
      <inertia-link
        :href="route('notificaciones.index')"
        class="header-notifications-button ripple-effect button-sliding-icon"
        v-if="objetonoti.totalnostis > 0"
        >Ver más<i class="icon-material-outline-arrow-right-alt"></i
      ></inertia-link>
    </div>
  </div>
</template>

<script>
export default {
  name: "NotificacionesHeader",
  props: {
    invitado: Boolean,
    user: Object,
    objetonoti: Object,
  },
  data() {
    return {};
  },
};
</script>

<style>
</style>
