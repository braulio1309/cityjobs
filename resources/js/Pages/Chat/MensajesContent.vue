<template>
  <!-- Message Content -->
  <div class="message-content">
    <div class="messages-headline">
      <h4>{{ nombre }}</h4>
      <a href="#" class="message-action"
        ><i class="icon-feather-trash-2"></i> Borrar</a
      >
    </div>
    <!-- Message Content Inner -->
    <div class="message-content-inner" id="contenidos">
      <div
        class="message-bubble"
        :class="{ me: chat.quien_recibe !== $page.user.id }"
        v-for="(chat, index) in sms"
        v-bind:key="chat.id"
      >
        <div class="message-bubble-inner">
          <div class="message-text">
            {{ chat.mensaje }}
            <humano :date="chat.created_at" :clase="colri" />
          </div>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
    <!-- Message Content Inner / End -->

    <!-- Reply Area -->
    <div class="message-reply" v-if="sms!==null">
      <textarea
        maxlength="1000"
        cols="1"
        rows="1"
        placeholder="Mensaje"
        v-model="form.mensaje"
        id="mensaje"
      ></textarea>
      <button class="button ripple-effect" @click="envia_sms()">Enviar</button>
    </div>
  </div>
  <!-- Message Content -->
</template>

<script>
import Humano from "../../Mixins/Humano.vue";
export default {
  components: { Humano },
  props: {
    sms: Array,
    nombre: String,
    id_otro: Number,
    user: Object,
    errors: Object,
    cuales: Number,
  },
  data() {
    return {
      colri: "tiempo",
      form: {
        quien_envia: this.user.id,
        quien_recibe: null,
        mensaje: null,
      },
    };
  },
  mounted() {
    var objDiv = document.getElementById("contenidos");
    objDiv.scrollTop = objDiv.scrollHeight;
  },
  methods: {
    envia_sms() {
      this.form.quien_recibe = this.id_otro;
      this.$emit("enviachat", { form: this.form, cual: this.cuales });
      var objDiv = document.getElementById("contenidos");
      objDiv.scrollTop = 50000;
    },
  },
};
</script>

<style>
</style>
