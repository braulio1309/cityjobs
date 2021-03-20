<template>
  <div class="dashboard-sidebar">
    <div class="dashboard-sidebar-inner" data-simplebar>
      <div class="dashboard-nav-container">
        <!-- Responsive Navigation Trigger -->
        <a href="#" class="dashboard-responsive-nav-trigger">
          <span class="hamburger hamburger--collapse">
            <span class="hamburger-box">
              <span class="hamburger-inner"></span>
            </span>
          </span>
          <span class="trigger-title">Menú</span>
        </a>

        <!-- Navigation -->
        <div class="dashboard-nav">
          <div class="dashboard-nav-inner">
            <ul data-submenu-title="Inicio">
              <li :class="{ active: cualactivo == 1 }">
                <a :href="route('dashboard')"
                  ><i class="icon-material-outline-dashboard"></i> Panel</a
                >
              </li>
              <li :class="{ active: cualactivo == 2 }">
                <a :href="route('chat.index')"
                  ><i class="icon-material-outline-question-answer"></i>
                  Mensajes <span class="nav-tag">{{ totalsms }}</span></a
                >
              </li>
              <li :class="{ active: cualactivo == 3 }">
                <a :href="route('notificaciones.index')"
                  ><i class="icon-feather-bell"></i> Notificaciones
                  <span class="nav-tag">{{ totalnotis }}</span></a
                >
              </li>
              <li :class="{ active: cualactivo == 4 }">
                <a :href="route('calendaruser.index')"
                  ><i class="icon-feather-calendar"></i> Calendario</a
                >
              </li>
            </ul>

            <ul data-submenu-title="Gestión">
              <li
                :class="{ 'active-submenu': cualactivo > 4 && cualactivo < 10 }"
              >
                <a href="#"
                  ><i class="icon-material-outline-business-center"></i>
                  Ofertas</a
                >
                <ul>
                  <li :class="{ active: cualactivo == 5 }">
                    <a href="dashboard-manage-jobs.html">Publicadas</a>
                  </li>
                  <li :class="{ active: cualactivo == 6 }">
                    <a href="dashboard-manage-candidates.html"
                      >Candidatos<span class="nav-tag">3</span></a
                    >
                  </li>
                  <li :class="{ active: cualactivo == 7 }">
                    <a href="dashboard-post-a-job.html">Nueva oferta</a>
                  </li>
                  <li :class="{ active: cualactivo == 8 }">
                    <a href="dashboard-manage-jobsA.html">Postulado</a>
                  </li>
                  <li :class="{ active: cualactivo == 9 }">
                    <a href="dashboard-manage-jobsAB.html">Favoritas</a>
                  </li>
                </ul>
              </li>
              <li :class="{ active: cualactivo == 10 }">
                <a href="valoracionesC.html"
                  ><i class="icon-material-outline-rate-review"></i>
                  Valoraciones</a
                >
              </li>
              <li :class="{ active: cualactivo == 11 }">
                <a href="dashboard-bookmarksA.html"
                  ><i class="icon-feather-users"></i> Seguidores</a
                >
              </li>
              <li :class="{ active: cualactivo == 12 }">
                <a href="dashboard-bookmarksC.html"
                  ><i class="icon-feather-user-check"></i> Seguidos</a
                >
              </li>
            </ul>

            <ul data-submenu-title="Mi cuenta">
              <li
                :class="{
                  'active-submenu': cualactivo > 12 && cualactivo < 15,
                }"
              >
                <a href="#"
                  ><i class="icon-material-outline-monetization-on"></i>
                  Suscripciones</a
                >
                <ul>
                  <li :class="{ active: cualactivo == 13 }">
                    <a href="planes.html">Planes y precios</a>
                  </li>
                  <li :class="{ active: cualactivo == 14 }">
                    <a href="#">Pedidos</a>
                  </li>
                </ul>
              </li>
              <li :class="{ active: cualactivo == 15 }">
                <a href="settingsC.html"
                  ><i class="icon-material-outline-settings"></i>
                  Configuración</a
                >
              </li>
              <li :class="{ active: cualactivo == 16 }">
                <a href="#"
                  ><i class="icon-material-outline-power-settings-new"></i>
                  Cerrar sesión</a
                >
              </li>
            </ul>
          </div>
        </div>
        <!-- Navigation / End -->
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    cualactivo: Number,
  },
  data() {
    return {
      licual: null,
      lisubmenu: null,
      totalsms: null,
      totalnotis: null,
      timer: "",
    };
  },
  mounted() {
    switch (this.cualactivo) {
      case 1:
        this.licual = 1;
        this.lisubmenu = "";
        break;
    }
    this.traelo();
    this.timer = setInterval(this.traelo, 35000);
  },
  methods: {
    traelo() {
      axios.get("/contadores-left").then((response) => {
        this.totalsms = response.data.totalsmsl;
        this.totalnotis = response.data.totalnostisl;
      });
    },
  },
  beforeDestroy() {
    clearInterval(this.timer);
  },
};
</script>

<style>
</style>
