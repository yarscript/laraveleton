<script>
/**
 * Right sidebar component
 */
export default {
  components: {},
  data() {
    return {
      config: {
        handler: this.handleRightBarClick,
        middleware: this.middleware,
        events: ["click"],
      },
      layout: this.$root.layout.type,
      width: this.$root.layout.width,
      sidebarType: this.$root.layout.sidebar,
      topbar: this.$root.layout.topbar,
      loader: this.$root.layout.loader,
    };
  },

  methods: {
    hide() {
      this.$parent.toggleRightSidebar();
    },
    // eslint-disable-next-line no-unused-vars
    handleRightBarClick(e, el) {
      this.$parent.hideRightSidebar();
    },
    // eslint-disable-next-line no-unused-vars
    middleware(event, el) {
      return !event.target.classList.contains("toggle-right");
    },
    changeLayout(layout) {
        this.sidebarType = "dark";
        this.topbar = "light";
      this.$root.changeLayout({
          type: layout,
          sidebar: "dark",
          topbar: "light"
      });
    },
    changeType(type) {
      return this.$root.changeLayout({ sidebar: type });
    },
    changeWidth(width) {
      return this.$root.changeLayout({ width: width });
    },
    changeTopbartype(value) {
      return this.$root.changeLayout({ topbar: value });
    },
    changeloader() {
      return this.$root.changeLayout({ loader: this.loader });
    },
  },
};
</script>

<template>
  <div>
    <div v-click-outside="config" class="right-bar">
      <div>
        <div class="rightbar-title px-3 py-4">
          <a href="javascript:void(0);" class="right-bar-toggle float-right" @click="hide">
            <i class="mdi mdi-close noti-icon"></i>
          </a>
          <h5 class="m-0">Settings</h5>
        </div>
        <div class="p-3">
          <h6 class="mb-0">Layout</h6>
          <hr class="mt-1" />
          <b-form-radio-group v-model="layout" stacked @input="changeLayout($event)">
            <b-form-radio value="vertical" class="mb-1">Vertical</b-form-radio>
            <b-form-radio value="horizontal" class="mb-1">Horizontal</b-form-radio>
          </b-form-radio-group>
          <!-- Width -->
          <h6 class="mt-3">Width</h6>
          <hr class="mt-1" />
          <b-form-radio-group v-model="width" stacked @input="changeWidth($event)">
            <b-form-radio value="fluid" class="mb-1">Fluid</b-form-radio>
            <b-form-radio value="boxed">Boxed</b-form-radio>
          </b-form-radio-group>

          <!-- Sidebar -->
          <div v-if="layout === 'vertical'">
            <h6 class="mt-3">Sidebar</h6>
            <hr class="mt-1" />
            <b-form-radio-group v-model="sidebarType" stacked @input="changeType($event)">
              <b-form-radio value="dark" class="mb-1">Dark</b-form-radio>
              <b-form-radio value="light" class="mb-1">Light</b-form-radio>
              <b-form-radio value="compact" class="mb-1">Compact</b-form-radio>
              <b-form-radio value="icon" class="mb-1">Icon</b-form-radio>
              <b-form-radio value="colored">Colored</b-form-radio>
            </b-form-radio-group>
          </div>

          <!-- Topbar -->
          <div v-if="layout === 'horizontal'">
            <h6 class="mt-3">Topbar</h6>
            <hr class="mt-1" />
            <b-form-radio-group v-model="topbar" stacked @input="changeTopbartype($event)">
              <b-form-radio value="dark" class="mb-1">Dark</b-form-radio>
              <b-form-radio value="light" class="mb-1">Light</b-form-radio>
              <b-form-radio value="colored" class="mb-1">Colored</b-form-radio>
            </b-form-radio-group>
          </div>

          <!-- Preloader -->
          <h6 class="mt-3">Preloader</h6>
          <hr class="mt-1" />

          <b-form-checkbox
            v-model="loader"
            name="check-button"
            switch
            @input="changeloader"
          >Preloader</b-form-checkbox>
        </div>
        <!-- Settings -->
        <h6 class="text-center mb-0">Choose Mode</h6>

        <div class="p-4">
          <div class="mb-2">
            <a href="javascript: void(0);" @click="$root.changeMode('default')">
              <img src="/images/layouts/layout-1.jpg" class="img-fluid img-thumbnail" alt />
            </a>
          </div>

          <div class="mb-2">
            <a href="javascript: void(0);" @click="$root.changeMode('dark')">
              <img src="/images/layouts/layout-2.jpg" class="img-fluid img-thumbnail" alt />
            </a>
          </div>

          <div class="mb-2">
            <a href="javascript: void(0);" @click="$root.changeMode('rtl')">
              <img src="/images/layouts/layout-3.jpg" class="img-fluid img-thumbnail" alt />
            </a>
          </div>
        </div>
      </div>
    </div>

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>
  </div>
</template>

<style lang="scss"></style>
