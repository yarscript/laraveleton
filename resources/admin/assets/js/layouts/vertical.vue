<script>
import NavBar from "../components/nav-bar";
import SideBar from "../components/side-bar";
import RightBar from "../components/right-bar";
import Footer from "../components/footer";

export default {
  components: { NavBar, SideBar, RightBar, Footer },
  data() {
    return {
      isMenuCondensed: false
    };
  },
  created: () => {
    document.body.removeAttribute("data-layout", "horizontal");
    document.body.removeAttribute("data-topbar", "dark");
    document.body.removeAttribute("data-layout-size", "boxed");
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
    },
    toggleRightSidebar() {
      document.body.classList.toggle("right-bar-enabled");
    },
    hideRightSidebar() {
      document.body.classList.remove("right-bar-enabled");
    }
  }
};
</script>

<template>
  <div id="layout-wrapper">
    <NavBar  v-on:toggleMenu="toggleMenu"
    ></NavBar>
    <SideBar :is-condensed="isMenuCondensed" />
    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->

    <div class="main-content">
      <div class="page-content">
        <!-- Start Content-->
        <div class="container-fluid">
          <slot />
        </div>
      </div>
      <Footer />
    </div>
    <RightBar />
  </div>
</template>
