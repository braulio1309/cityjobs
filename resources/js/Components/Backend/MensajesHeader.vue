<template>
  <div class="header-notifications">
    <div class="header-notifications-trigger">
      <a href="#"
        ><i class="icon-feather-mail"></i
        ><span>{{ objetosms.totalsms }}</span></a
      >
    </div>

    <div class="header-notifications-dropdown">
      <div class="header-notifications-headline">
        <h4 v-if="objetosms.totalsms > 0">Mensajes</h4>
        <h6 v-else><em>No hay mensajes</em></h6>
      </div>
      <div class="header-notifications-content" v-show="objetosms.totalsms > 0">
        <div class="header-notifications-scroll" data-simplebar>
          <ul>
            <li
              class="notifications-not-read"
              v-for="mensaje in objetosms.mensajes"
              v-bind:key="mensaje.id"
            >
              <a href="#">
                <span class="notification-avatar" :class="{ 'status-online': mensaje.enlinea }"
                  ><img :src="mensaje.profile_photo_url"
                /></span>
                <div class="notification-text">
                  <strong>{{ mensaje.name }}</strong>
                  <p class="notificacion-msg-text">{{ mensaje.mensaje }}</p>
                  <humano-vue
                    :date=mensaje.created_at :clase="color"
                  />
                </div>
              </a>
            </li>
          </ul>
        </div>
      </div>
      <inertia-link
        :href="route('chat.index')"
        class="header-notifications-button ripple-effect button-sliding-icon"
        v-if="objetosms.totalsms > 0"
        >Ver más<i class="icon-material-outline-arrow-right-alt"></i
      ></inertia-link>
    </div>
  </div>
</template>

<script>
import HumanoVue from "../../Mixins/Humano.vue";

export default {
  name: "MensajesHeader",
  components: {
    HumanoVue,
  },
  props: {
    invitado: Boolean,
    user: Object,
    objetosms: Object,
  },
  data() {
    return {
        color:"color"
    };
  },
};
</script>

<style>
</style>
