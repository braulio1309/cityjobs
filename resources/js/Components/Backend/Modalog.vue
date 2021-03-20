<template>
  <div id="sign-in-dialog" class="zoom-anim-dialog mfp-hide dialog-with-tabs">
    <!--Tabs -->
    <div class="sign-in-form">
      <ul class="popup-tabs-nav">
        <li><a href="#login">Entra</a></li>
        <li><a href="#register">Registrate</a></li>
      </ul>

      <div class="popup-tabs-container">
        <!-- Login -->
        <div class="popup-tab-content" id="login">
          <flash-messages />
          <div class="welcome-text">
            <h3>Nos alegra verte de nuevo!</h3>
            <span
              >No tienes una cuenta?
              <a href="#" class="register-tab">Registrate!</a></span
            >
          </div>
          <!-- Form -->

          <form @submit.prevent="login">
            <div v-if="errors.email" class="text-red-500">
              {{ errors.email }}
            </div>
            <div class="input-with-icon-left">
              <i class="icon-material-baseline-mail-outline"></i>

              <input
                class="input-text with-border"
                placeholder="Correo eléctronico"
                type="email"
                name="email"
                v-model="form.email"
                id="email"
                autofocus
              />
            </div>
            <div v-if="errors.password" class="text-red-500">
              {{ errors.password }}
            </div>
            <div class="input-with-icon-left">
              <i class="icon-material-outline-lock"></i>
              <input
                class="input-text with-border"
                id="password"
                type="password"
                placeholder="Clave"
                v-model="form.password"
                name="password"
              />
            </div>

            <br />

            <inertia-link
              :href="route('password.request')"
              class="text-sm text-purple-600 hover:text-purple-700 hover:underline mb-6"
            >
              ¿Has olvidado tu contraseña?
            </inertia-link>
            <button
              class="button full-width button-sliding-icon ripple-effect"
              type="submit"
            >
              Entrar <i class="icon-material-outline-arrow-right-alt"></i>
            </button>
          </form>

          <!-- Button -->

          <!-- Social Login -->
          <div class="social-login-separator"><span>o</span></div>
          <div class="social-login-buttons">
            <button class="facebook-login ripple-effect">
              <i class="icon-brand-facebook-f"></i> Entrar con Facebook
            </button>
            <button class="google-login ripple-effect">
              <i class="icon-brand-google-plus-g"></i> Entrar con Google
            </button>
          </div>
        </div>

        <!-- Register -->
        <div class="popup-tab-content" id="register">
          <!-- Welcome Text -->
          <div class="welcome-text">
            <h3>Vamos a crear tu cuenta!</h3>
          </div>

          <!-- Account Type -->

          <!-- Form -->
          <form @submit.prevent="register">
            <div v-if="errors.name" class="text-red-500">
              {{ errors.name }}
            </div>
            <div class="account-type">
              <div>
                <input
                  type="radio"
                  name="radiotipoini"
                  value="1"
                  class="account-type-radio"
                  id="prefos"
                  checked
                  @click="radiocambia(1)"
                />
                <label for="prefos" class="ripple-effect-dark"
                  ><i class="icon-material-outline-account-circle"></i>
                  Profesional</label
                >
              </div>

              <div>
                <input
                  type="radio"
                  name="radiotipoini"
                  value="2"
                  id="clientradio"
                  class="account-type-radio"
                  @click="radiocambia(2)"
                />
                <label for="clientradio" class="ripple-effect-dark"
                  ><i class="icon-material-outline-business-center"></i>
                  Cliente</label
                >
              </div>
            </div>
            <div class="input-with-icon-left">
              <i class="icon-material-baseline-mail-outline"></i>
              <input
                class="input-text with-border"
                id="name"
                v-model="form.name"
                placeholder="Nombres"
                required
              />
            </div>
            <div v-if="errors.email" class="text-red-500">
              {{ errors.email }}
            </div>
            <div class="input-with-icon-left">
              <i class="icon-material-baseline-mail-outline"></i>
              <input
                class="input-text with-border"
                id="email"
                v-model="form.email"
                placeholder="Correo electronico"
                required
              />
            </div>
            <div v-if="errors.password" class="text-red-500">
              {{ errors.password }}
            </div>
            <div
              class="input-with-icon-left"
              title="Debería ser de al menos 6 caracteres"
              data-tippy-placement="bottom"
            >
              <i class="icon-material-outline-lock"></i>
              <input
                v-model="form.password"
                type="password"
                id="password"
                class="input-text with-border"
                placeholder="Clave"
                required
              />
            </div>
            <div v-if="errors.password_confirmation" class="text-red-500">
              {{ errors.password_confirmation }}
            </div>
            <div class="input-with-icon-left">
              <i class="icon-material-outline-lock"></i>
              <input
                v-model="form.password_confirmation"
                type="password"
                id="password_confirmation"
                class="input-text with-border"
                placeholder="Repetir clave"
                required
              />
            </div>

            <!-- Button -->
            <button
              class="margin-top-10 button full-width button-sliding-icon ripple-effect"
              type="submit"
            >
              Registrar <i class="icon-material-outline-arrow-right-alt"></i>
            </button>
          </form>
          <!-- Social Login -->
          <div class="social-login-separator"><span>o</span></div>
          <div class="social-login-buttons">
            <button class="facebook-login ripple-effect">
              <i class="icon-brand-facebook-f"></i> Registrar con Facebook
            </button>
            <button class="google-login ripple-effect">
              <i class="icon-brand-google-plus-g"></i> Entrar con Google
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Input from "../../Jetstream/Input.vue";
import FlashMessages from "../UI/FlashMessages.vue";

export default {
  name: "Modalog",
  components: { FlashMessages, Input },
  props: {
    errors: Object,
    abremodal: Boolean,
    invitado: Boolean,
  },
  data() {
    return {
      form: {
        email: null,
        password: null,
        password_confirmation: null,
        tipoini: 1,
      },
    };
  },
  watch: {},
  mounted() {
    if (this.abremodal == true && this.invitado == true) {
      $.magnificPopup.open({
        items: {
          src: "#sign-in-dialog",
        },
        type: "inline",
      });
    }
  },
  methods: {
    radiocambia(cual) {
      this.form.tipoini = cual;
    },
    login() {
      this.$inertia.post(this.route("login"), this.form).then(() => {
        if (Object.keys(this.errors).length === 0) window.location.reload();
      });
    },
    register() {
      this.$inertia.post(this.route("register"), this.form).then(() => {
        if (Object.keys(this.errors).length === 0) window.location.reload();
      });
    },
  },
};
</script>

<style>
</style>
