<script>
import simplebar from "simplebar-vue";

import SideNav from "./side-nav";

export default {
  components: { simplebar, SideNav },
  props: {
    isCondensed: {
      type: Boolean,
      default: false
    },
    currentRoute:{
      type: String,
      default: ''
    },
    menuItems: {
      type: Object,
      default: {}
    }
  },
  data() {
    return {
      settings: {
        minScrollbarLength: 60
      }
    };
  },

  methods: {
    toggleMenu() {
      this.$parent.toggleMenu();
    }
  }
};
</script>

<template>
  <!-- ========== Left Sidebar Start ========== -->
  <div class="vertical-menu">
    <simplebar v-if="!isCondensed" :settings="settings" class="h-100">
      <SideNav :current-route='currentRoute' :menu="menuItems"/>
    </simplebar>

    <simplebar v-else class="h-100">
       <SideNav :current-route='currentRoute' :menu="menuItems"/>
    </simplebar>
  </div>
  <!-- Left Sidebar End -->
</template>

