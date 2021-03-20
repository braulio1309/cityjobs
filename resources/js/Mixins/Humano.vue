<template>
  <span :class="clase">{{ diffForHumans }}</span>
</template>

<script>
import Vue from "vue";
import dayjs from "dayjs";
import relativeTime from "dayjs/plugin/relativeTime";

import "dayjs/locale/es";

export default {
  created() {
    dayjs.locale("es");
    dayjs.extend(relativeTime);
  },

  mounted() {
    this.diffForHumans=dayjs(this.date).fromNow();

  },
  props: {
    date: {
      type: String,
      required: true,
    },
    clase:{
        type:String,
        default:"",
    }
  },
  data() {
    return {
        diffForHumans:null,
    };
  },
};
</script>
