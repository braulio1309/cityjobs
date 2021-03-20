<template>
  <div id="footer">
    <!-- Footer Top Section -->
    <div class="footer-top-section">
      <div class="container">
        <div class="row">
          <div class="col-xl-12">
            <!-- Footer Rows Container -->
            <div class="footer-rows-container">
              <!-- Left Side -->
              <div class="footer-rows-left">
                <div class="footer-row">
                  <div class="footer-row-inner footer-logo">
                    <img :src="loguitob" alt="" />
                  </div>
                </div>
              </div>

              <!-- Right Side -->
              <div class="footer-rows-right">
                <!-- Social Icons -->
                <div class="footer-row">
                  <div class="footer-row-inner">
                    <ul class="footer-social-links">
                      <li>
                        <a
                          href="#"
                          title="Facebook"
                          data-tippy-placement="bottom"
                          data-tippy-theme="light"
                        >
                          <i class="icon-brand-facebook-f"></i>
                        </a>
                      </li>
                      <li>
                        <a
                          href="#"
                          title="Twitter"
                          data-tippy-placement="bottom"
                          data-tippy-theme="light"
                        >
                          <i class="icon-brand-twitter"></i>
                        </a>
                      </li>
                      <li>
                        <a
                          href="#"
                          title="Instagram"
                          data-tippy-placement="bottom"
                          data-tippy-theme="light"
                        >
                          <i class="icon-brand-instagram"></i>
                        </a>
                      </li>

                      <li>
                        <a
                          href="#"
                          title="LinkedIn"
                          data-tippy-placement="bottom"
                          data-tippy-theme="light"
                        >
                          <i class="icon-brand-linkedin-in"></i>
                        </a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Footer Rows Container / End -->
          </div>
        </div>
      </div>
    </div>
    <!-- Footer Top Section / End -->

    <!-- Footer Middle Section -->
    <div class="footer-middle-section">
      <div class="container">
        <div class="row">
          <!-- Links -->
          <div class="col-lg-3 col-md-3">
            <div class="footer-links">
              <h3>Nosotros</h3>
              <ul>
                <li>
                  <a href="/nosotros"><span>Quiénes somos</span></a>
                </li>
                <li>
                  <a href="#"><span>Centro de ayuda</span></a>
                </li>
                <li>
                  <a href="#"><span>Condiciones generales</span></a>
                </li>
                <li>
                  <a href="#"><span>Política de privacidad</span></a>
                </li>
                <li>
                  <a href="#"><span>Política de cookies</span></a>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-lg-3 col-md-3">
            <div class="footer-links">
              <h3>Menú</h3>
              <ul>
                <li>
                  <a href="/ofertas"><span>Ver ofertas</span></a>
                </li>
                <li>
                  <a href="/profesionales"><span>Buscar profesionales</span></a>
                </li>
              </ul>
            </div>
          </div>

          <!-- Links -->
          <div class="col-lg-3 col-md-3">
            <div class="footer-links">
              <h3>Mi cuenta</h3>
              <ul>
                <li v-if="invitado">
                  <a
                    href="#sign-in-dialog"
                    class="popup-with-zoom-anim log-in-button"
                    ><span>Ingresa /Registrate</span></a
                  >
                </li>
                <li v-if="!invitado">
                  <a href="/dashboard"
                    ><span>Panel</span></a
                  >
                </li>
                <li v-if="!invitado">
                  <a href="/misdatos"
                    ><span>Mi perfil</span></a
                  >
                </li>
                <li v-if="!invitado">
                  <a href="#" @click="logout"><span>Cerrar sesión</span></a>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-lg-3 col-md-3">
            <div class="footer-links">
              <h3>Descárgate la app</h3>
              <img :src="imgiconos" width="150" />
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Footer Middle Section / End -->

    <!-- Footer Copyrights -->
    <div class="footer-bottom-section">
      <div class="container">
        <div class="row">
          <div class="col-xl-12">
            © {{ new Date().getFullYear() }} <strong>CityJob</strong>. All
            Rights Reserved. Powered by
            <a href="https://mycomunicoh.com" target="_blank">Mycomunicoh</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Footer Copyrights / End -->
  </div>
</template>

<script>
import image2 from "../../../images/logo_city-job_blanco_o.png";
import image3 from "../../../images/iconos.png";

export default {
  name: "FooterVue",
  props: {
    invitado: Boolean,
    user: Object,

    errors: Object,
    flash: Object,
  },

  data() {
    return {
      loguitob: image2,
      imgiconos: image3,
    };
  },
  methods: {
    logout() {
      axios.post("/logout").then((response) => {
        window.location.reload();
      });
    },
  },
};
</script>

<style>
</style>
