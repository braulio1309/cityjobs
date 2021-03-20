<template>
  <body class="gray">
    <div id="wrapper">
      <backend-header :invitado="invitados" :user="user" />
      <div class="clearfix"></div>
      <div class="dashboard-container">
        <menu-lateral :cualactivo="cual" />
        <div class="dashboard-content-container" data-simplebar>
          <div class="dashboard-content-inner">
            <breadcumb> Mensajes</breadcumb>
            <div class="messages-container margin-top-0">
              <div class="messages-container-inner" v-if="muestra == false">
                <div class="messages-inbox">
                  <div class="messages-headline">
                    <h6><em>No hay mensajes por leer</em></h6>
                  </div>
                </div>
              </div>
              <div class="messages-container-inner" v-else>
                <!-- Messages -->
                <div class="messages-inbox">
                  <div class="messages-headline">
                    <div class="input-with-icon">
                      <input
                        id="autocomplete-input"
                        type="text"
                        placeholder="Buscar"
                      />
                      <i class="icon-material-outline-search"></i>
                    </div>
                  </div>

                  <ul>
                    <li
                      v-for="(chat, index) in chats"
                      v-bind:key="chat.id"
                      :class="{ 'active-message': index == cuales }"
                    >
                      <a href="#" @click="muestra_detalle(index)">
                        <div class="message-avatar">
                          <i class="status-icon status-online"></i
                          ><img :src="chat.foto" alt="" />
                        </div>

                        <div class="message-by">
                          <div class="message-by-headline">
                            <h5>{{ chat.nombre }}</h5>
                            <humano :date="chat.ultimo_time" />
                          </div>
                          <p>
                            {{ chat.ultimo_chat }}
                          </p>
                        </div>
                      </a>
                    </li>
                  </ul>
                </div>
                <!-- Messages / End -->

                <mensajes-content
                  :sms="lossms"
                  :nombre="elnombre"
                  :id_otro="id_otro"
                  :user="user"
                  :errors="errors"
                  :cuales="cuales"
                  @enviachat="enviachat"
                />
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
import Humano from "../../Mixins/Humano.vue";
import MensajesContent from "./MensajesContent.vue";

export default {
  components: {
    BackendHeader,
    MenuLateral,
    FooterInterno,
    Breadcumb,
    MensajesContent,
    Humano,
  },
  props: {
    errors: Object,
    flash: Object,
    user: Object,
    chats: Array,
  },
  data() {
    return {
      cual: 2,
      invitados: false,
      lossms: null,
      muestra: false,
      elnombre: "",
      id_otro: 0,
      cuales: 0,
      form: {
        quien_envia: 0,
      },
    };
  },
  methods: {
    muestra_detalle(indice) {
      this.lossms = this.chats[indice].todos;
      this.elnombre = this.chats[indice].nombre;
      this.id_otro = this.chats[indice].id;
      this.cuales = indice;
      this.actualiza_leido(this.id_otro);
    },
    actualiza_leido(cualid) {
      this.form.quien_envia = cualid;
      this.$inertia
        .patch(this.route("chat.leidos", this.form.quien_envia))
        .then(() => {});
    },
    enviachat(objeto) {
      this.$inertia.post(this.route("chat.store"), objeto.form).then(() => {
        this.muestra_detalle(objeto.cual);
        objeto.form.mensaje = "";
      });
    },
  },
  mounted() {
    if (this.chats !== null && this.chats.length > 0) {
      this.muestra = true;
      this.lossms = this.chats[0].todos;
      this.elnombre = this.chats[0].nombre;
      this.id_otro = this.chats[0].id;
      this.actualiza_leido(this.id_otro);
    }
  },
};
</script>

<style>
</style>
