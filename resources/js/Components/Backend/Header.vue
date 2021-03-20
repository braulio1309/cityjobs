<template>
  <header id="header-container" class="fullwidth">
    <!-- Header -->
    <div id="header">
      <div class="container">
        <!-- Left Side Content -->
        <div class="left-side">
          <!-- Logo -->
          <div id="logo">
            <a href="/"><img :src="loguitoimg" alt="" /></a>
          </div>

          <!-- Main Navigation -->
          <nav id="navigation">
            <ul id="responsive">
              <li><a href="/nosotros">Cityjob</a></li>
              <li><a href="/ofertas">Ofertas</a></li>
              <li><a href="/profesionales">Profesionales</a></li>
            </ul>
          </nav>
          <div class="clearfix"></div>
          <!-- Main Navigation / End -->
        </div>
        <!-- Left Side Content / End -->

        <!-- Right Side Content / End -->
        <div class="right-side" v-if="invitado">
          <div class="header-widget">
            <a href="#sign-in-dialog" class="popup-with-zoom-anim log-in-button"
              ><i class="icon-feather-log-in"></i>
              <span>Ingresa / Registrate</span></a
            >
          </div>
          <!-- Mobile Navigation Button -->
          <span class="mmenu-trigger">
            <button class="hamburger hamburger--collapse" type="button">
              <span class="hamburger-box">
                <span class="hamburger-inner"></span>
              </span>
            </button>
          </span>
        </div>
        <div class="right-side" v-else>
          <div class="header-widget hide-on-mobile">
            <notificaciones-header
              :user="user"
              :invitado="invitado"
              :objetonoti="objetonoti"
            />

            <mensajes-header
              :user="user"
              :invitado="invitado"
              :objetosms="objetosms"
            />
          </div>

          <div class="header-widget">
            <div class="header-notifications user-menu">
              <div class="header-notifications-trigger">
                <a href="#">
                  <div
                    class="user-avatar"
                    :class="{ 'status-online': $page.user.enlinea }"
                  >
                    <img :src="$page.user.profile_photo_url" alt="" />
                  </div>
                </a>
              </div>

              <div class="header-notifications-dropdown">
                <div class="user-status">
                  <div class="user-details">
                    <div
                      class="user-avatar"
                      :class="{ 'status-online': $page.user.enlinea }"
                    >
                      <img :src="$page.user.profile_photo_url" alt="" />
                    </div>
                    <div class="user-name">{{ $page.user.name }}</div>
                  </div>

                  <div class="status-switch" id="snackbar-user-status">
                    <label
                      class="user-online"
                      :class="{ 'current-status': $page.user.enlinea }"
                      @click="ponelinea"
                      >En línea</label
                    >
                    <label
                      class="user-invisible"
                      :class="{ 'current-status': !$page.user.enlinea }"
                      @click="quitalinea"
                      >Invisible</label
                    >

                    <span class="status-indicator" aria-hidden="true"></span>
                  </div>
                </div>

                <ul class="user-menu-small-nav">
                  <li>
                    <a href="/dashboard"
                      ><i class="icon-material-outline-settings"></i> Panel</a
                    >
                  </li>
                  <li>
                    <a href="/misdatos"
                      ><i class="icon-material-outline-dashboard"></i> Mi
                      perfil</a
                    >
                  </li>

                  <li>
                    <a href="#" @click="logout"
                      ><i class="icon-material-outline-power-settings-new"></i>
                      Cerrar sesión</a
                    >
                  </li>
                </ul>
              </div>
            </div>
          </div>

          <!-- Mobile Navigation Button -->
          <span class="mmenu-trigger">
            <button class="hamburger hamburger--collapse" type="button">
              <span class="hamburger-box">
                <span class="hamburger-inner"></span>
              </span>
            </button>
          </span>
        </div>
        <!-- Right Side Content / End -->
      </div>
    </div>
    <!-- Header / End -->
  </header>
</template>

<script>
import image1 from "../../../images/logo_city_job_h_o.png";
import MensajesHeader from "./MensajesHeader.vue";
import NotificacionesHeader from "./NotificacionesHeader.vue";

export default {
  components: { NotificacionesHeader, MensajesHeader },
  name: "BackendHeader",
  props: {
    invitado: Boolean,
    user: Object,
  },
  data() {
    return {
      loguitoimg: image1,
      objetonoti: {},
      objetosms: {},
      timer: "",
    };
  },
  mounted() {
    if (!this.invitado && this.user.email_verified_at !== null) {
      this.traelo();
      this.timer = setInterval(this.traelo, 35000);
    }
  },
  methods: {
    traelo() {
      axios
        .get("/tope-notificaciones")
        .then((response) => (this.objetonoti = response.data));

      axios
        .get("/tope-mensajes")
        .then((response) => (this.objetosms = response.data));
    },
    logout() {
      axios.post("/logout").then((response) => {
        window.location.reload();
      });
    },
    ponelinea() {
      if (this.user.email_verified_at === null) {
        Snackbar.show({
          text: "Debes verificar su dirección de correo electrónico ",
          pos: "bottom-center",
          showAction: false,
          actionText: "Dismiss",
          duration: 3000,
          textColor: "#fff",
          backgroundColor: "#de5959",
        });
      } else
        axios.put("/autolinea").then((response) => {
          this.user.enlinea = 1;
          Snackbar.show({
            text: "Su estado ha cambiado!",
            pos: "bottom-center",
            showAction: false,
            actionText: "Dismiss",
            duration: 3000,
            textColor: "#de5959",
            backgroundColor: "#ffe9e9",
          });
        });
    },
    quitalinea() {
      if (this.user.email_verified_at === null) {
        Snackbar.show({
          text: "Debes verificar su dirección de correo electrónico ",
          pos: "bottom-center",
          showAction: false,
          actionText: "Dismiss",
          duration: 3000,
          textColor: "#fff",
          backgroundColor: "#de5959",
        });
      } else
        axios.put("/quitalinea").then((response) => {
          this.user.enlinea = 0;
          Snackbar.show({
            text: "Su estado ha cambiado!",
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
  beforeDestroy() {
    clearInterval(this.timer);
  },
};
</script>
