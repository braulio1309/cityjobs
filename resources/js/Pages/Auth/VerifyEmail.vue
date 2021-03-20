<template>
  <div id="wrapper">
    <!-- Header Container
================================================== -->

    <div class="clearfix"></div>
    <!-- Header Container / End -->

    <backend-header :invitado="invitados" :abremodal="abremodal" :user="user" />
    <div class="photo-section">
      <!-- Infobox -->
      <div class="text-content white-font">
        <div class="container">
          <div class="row">
            <div class="col-xl-8 col-lg-8 offset-xl-2 offset-lg-2">
              <p class="pt-2">
                ¡Gracias por registrarte! Antes de comenzar, ¿podría verificar
                su dirección de correo electrónico haciendo clic en el enlace
                que le acabamos de enviar? Si no recibió el correo electrónico,
                con gusto le enviaremos otro.
              </p>
              <form
                @submit.prevent="sendNewVerificationEmail"
                class="flex flex-col"
              >
                <button
                  class="button button-sliding-icon ripple-effect big margin-top-20"
                  type="submit"
                >
                  Reenviar correo electrónico de verificación <i class="icon-material-outline-arrow-right-alt"></i>
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <footer-vue  :invitado="invitados" :abremodal="abremodal" :user="user" />
  </div>
</template>
<script>
import FooterVue from "../../Components/Backend/Footer.vue";
import BackendHeader from "../../Components/Backend/Header";
import Modalog from "../../Components/Backend/Modalog.vue";

export default {
  components: {
    BackendHeader,
    Modalog,
    FooterVue,
  },
  props: {
    invitados: Boolean,
    errors: Object,
    flash: Object,
    user: Object,
    abremodal: Boolean,
  },
  methods: {
    sendNewVerificationEmail() {
      this.$inertia.post(this.route("verification.send")).then(() => {});
    },
  },
};
</script>
