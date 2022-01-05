<script>
import i18n from "../i18n";
import simplebar from "simplebar-vue";
import axios from "axios";

/**
 * Nav-bar Component
 */
export default {
  data() {
    return {
      languages: [
        {
          flag: "/images/flags/us.jpg",
          language: "en",
          title: "English",
        },
        {
          flag: "/images/flags/french.jpg",
          language: "fr",
          title: "French",
        },
        {
          flag: "/images/flags/spain.jpg",
          language: "es",
          title: "Spanish",
        },
        {
          flag: "/images/flags/chaina.png",
          language: "zh",
          title: "Chinese",
        },
        {
          flag: "/images/flags/arabic.png",
          language: "ar",
          title: "Arabic",
        },
      ],
      lan: i18n.locale,
      text: null,
      flag: null,
      value: null,
    };
  },
  components: {simplebar},
  mounted() {
    this.value = this.languages.find((x) => x.language === i18n.locale);
    this.text = this.value.title;
    this.flag = this.value.flag;
  },
  methods: {
    toggleMenu() {
      document.body.classList.toggle("sidebar-enable");

      if (window.screen.width >= 992) {
        // eslint-disable-next-line no-unused-vars
        document.body.classList.toggle("vertical-collpsed");
      } else {
        // eslint-disable-next-line no-unused-vars
        document.body.classList.remove("vertical-collpsed");
      }
      this.isMenuCondensed = !this.isMenuCondensed;
      console.log('this.$parent', this.$parent);
      // this.$parent.toggleMenu();
      this.$parent.$emit('toggleMenu');
      this.$emit('toggleMenu');
    },
    toggleRightSidebar() {
      this.$parent.toggleRightSidebar();
    },
    initFullScreen() {
      document.body.classList.toggle("fullscreen-enable");
      if (
          !document.fullscreenElement &&
          /* alternative standard method */ !document.mozFullScreenElement &&
          !document.webkitFullscreenElement
      ) {
        // current working methods
        if (document.documentElement.requestFullscreen) {
          document.documentElement.requestFullscreen();
        } else if (document.documentElement.mozRequestFullScreen) {
          document.documentElement.mozRequestFullScreen();
        } else if (document.documentElement.webkitRequestFullscreen) {
          document.documentElement.webkitRequestFullscreen(
              Element.ALLOW_KEYBOARD_INPUT
          );
        }
      } else {
        if (document.cancelFullScreen) {
          document.cancelFullScreen();
        } else if (document.mozCancelFullScreen) {
          document.mozCancelFullScreen();
        } else if (document.webkitCancelFullScreen) {
          document.webkitCancelFullScreen();
        }
      }
    },
    setLanguage(locale, country, flag) {
      this.lan = locale;
      this.text = country;
      this.flag = flag;
      i18n.locale = locale;
      localStorage.setItem("locale", locale);
    }
  },
};
</script>

<template>
  <header id="page-topbar">
    <div class="navbar-header">
      <div class="d-flex">
        <!-- LOGO -->
        <div class="navbar-brand-box">
          <a href="/" class="logo logo-dark">
            <span class="logo-sm">
              <img src="/images/logo.svg" alt height="22"/>
            </span>
            <span class="logo-lg">
              <img src="/images/logo-dark.png" alt height="17"/>
            </span>
          </a>

          <a href="/" class="logo logo-light">
            <span class="logo-sm">
              <img src="/images/logo-light-2.svg" alt height="25"/>
            </span>
            <span class="logo-lg">
              <img src="/images/logo-light-2.svg" alt height="40"/>
            </span>
          </a>
        </div>

        <button
            id="vertical-menu-btn"
            type="button"
            class="btn btn-sm px-3 font-size-16 header-item"
            @click="toggleMenu"
        >
          <i class="fa fa-fw fa-bars"></i>
        </button>

      </div>

      <div class="d-flex">

        <div class="dropdown d-none d-lg-inline-block ml-1">
          <button type="button" class="btn header-item noti-icon" @click="initFullScreen">
            <i class="bx bx-fullscreen"></i>
          </button>
        </div>

        <b-dropdown right variant="white" toggle-class="header-item">
          <template v-slot:button-content>
            <span class="d-none d-xl-inline-block ml-1">{{ $t('navbar.dropdown.henry.text') }}</span>
            <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
          </template>
          <!-- item-->
          <a href="/admin/logout" class="dropdown-item text-danger">
            <i class="bx bx-power-off font-size-16 align-middle mr-1 text-danger"></i>
            {{ $t('navbar.dropdown.henry.list.logout') }}
          </a>
        </b-dropdown>

      </div>
    </div>
  </header>
</template>
