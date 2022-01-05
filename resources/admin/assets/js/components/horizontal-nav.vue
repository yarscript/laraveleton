<script>
export default {
  mounted: function () {
      // this.coloredHeader();
  },
  methods: {
    /**
     * Menu clicked show the submenu
     */
    onMenuClick(event) {
      event.preventDefault();
      const nextEl = event.target.nextSibling;
      if (nextEl && !nextEl.classList.contains("show")) {
        const parentEl = event.target.parentNode;
        if (parentEl) {
          parentEl.classList.remove("show");
        }
        nextEl.classList.add("show");
      } else if (nextEl) {
        nextEl.classList.remove("show");
      }
      return false;
    },
    topbarLight() {
      document.body.setAttribute("data-topbar", "light");
      document.body.removeAttribute("data-layout-size", "boxed");
    },
    boxedWidth() {
      document.body.setAttribute("data-layout-size", "boxed");
      document.body.removeAttribute("data-topbar", "light");
      document.body.setAttribute("data-topbar", "dark");
    },
    coloredHeader() {
      document.body.setAttribute("data-topbar", "colored");
      document.body.removeAttribute("data-layout-size", "boxed");
    }
  }
};
</script>
<template>
  <div class="topnav">
    <div class="container-fluid">
      <nav class="navbar navbar-light navbar-expand-lg topnav-menu">
        <div id="topnav-menu-content" class="collapse navbar-collapse">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="/">
                <i class="bx bx-home-circle mr-2"></i>Dashboard
              </a>
            </li>

            <li class="nav-item dropdown">
              <a
                id="topnav-components"
                class="nav-link dropdown-toggle arrow-none"
                href="#"
                role="button"
                data-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false"
                @click="onMenuClick"
              >
                <i class="bx bx-tone mr-2"></i>UI Elements
                <div class="arrow-down"></div>
              </a>
              <div
                class="dropdown-menu mega-dropdown-menu px-2 dropdown-mega-menu-xl"
                aria-labelledby="topnav-components"
              >
                <div class="row">
                  <div class="col-lg-4">
                    <a href="/ui/alerts" class="dropdown-item">Alerts</a>
                    <a href="/ui/buttons" class="dropdown-item">Buttons</a>
                    <a href="/ui/cards" class="dropdown-item">Cards</a>
                    <a href="/ui/carousel" class="dropdown-item">Carousel</a>
                    <a href="/ui/dropdowns" class="dropdown-item">Dropdowns</a>
                    <a href="/ui/grid" class="dropdown-item">Grid</a>
                  </div>
                  <div class="col-lg-4">
                    <a href="/ui/images" class="dropdown-item">Images</a>
                    <a href="/ui/modals" class="dropdown-item">Modals</a>
                    <a href="/ui/rangeslider" class="dropdown-item">Range Slider</a>
                    <a href="/ui/progressbars" class="dropdown-item">Progress Bars</a>
                    <a href="/ui/sweet-alert" class="dropdown-item">Sweet-Alert</a>
                    <a href="/ui/tabs-accordions" class="dropdown-item">Tabs & Accordions</a>
                  </div>
                  <div class="col-lg-4">
                    <a href="/ui/typography" class="dropdown-item">Typography</a>
                    <a href="/ui/video" class="dropdown-item">Video</a>
                    <a href="/ui/general" class="dropdown-item">General</a>
                    <a href="/ui/colors" class="dropdown-item">Colors</a>
                  </div>
                </div>
              </div>
            </li>

            <li class="nav-item dropdown">
              <a
                id="topnav-pages"
                class="nav-link dropdown-toggle arrow-none"
                href="#"
                role="button"
                data-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false"
                @click="onMenuClick"
              >
                <i class="bx bx-customize mr-2"></i>Apps
                <div class="arrow-down"></div>
              </a>
              <div class="dropdown-menu" aria-labelledby="topnav-pages">
                <a href="/calendar" class="dropdown-item">Calendar</a>
                <div class="dropdown">
                  <a
                    id="topnav-email"
                    class="dropdown-item dropdown-toggle arrow-none"
                    href="#"
                    role="button"
                    data-toggle="dropdown"
                    aria-haspopup="true"
                    aria-expanded="false"
                    @click="onMenuClick"
                  >
                    Email
                    <div class="arrow-down"></div>
                  </a>
                  <div class="dropdown-menu" aria-labelledby="topnav-email">
                    <a href="/email/inbox" class="dropdown-item">Inbox</a>
                    <a href="/email/reademail" class="dropdown-item">Read Email</a>
                  </div>
                </div>
                <div class="dropdown">
                  <a
                    id="topnav-ecommerce"
                    class="dropdown-item dropdown-toggle arrow-none"
                    href="#"
                    role="button"
                    data-toggle="dropdown"
                    aria-haspopup="true"
                    aria-expanded="false"
                    @click="onMenuClick"
                  >
                    Ecommerce
                    <div class="arrow-down"></div>
                  </a>
                  <div class="dropdown-menu" aria-labelledby="topnav-ecommerce">
                    <a href="/ecommerce/products" class="dropdown-item">Products</a>
                    <a href="/ecommerce/product-detail" class="dropdown-item">Product Detail</a>
                    <a href="/ecommerce/orders" class="dropdown-item">Orders</a>
                    <a href="/ecommerce/customers" class="dropdown-item">Customers</a>
                    <a href="/ecommerce/cart" class="dropdown-item">Cart</a>
                    <a href="/ecommerce/checkout" class="dropdown-item">Checkout</a>
                    <a href="/ecommerce/shops" class="dropdown-item">Shops</a>
                    <a href="/ecommerce/add-product" class="dropdown-item">Add Product</a>
                  </div>
                </div>

                <div class="dropdown">
                  <a
                    id="topnav-project"
                    class="dropdown-item dropdown-toggle arrow-none"
                    href="#"
                    role="button"
                    data-toggle="dropdown"
                    aria-haspopup="true"
                    aria-expanded="false"
                    @click="onMenuClick"
                  >
                    Projects
                    <div class="arrow-down"></div>
                  </a>
                  <div class="dropdown-menu" aria-labelledby="topnav-project">
                    <a href="/projects/grid" class="dropdown-item">Projects Grid</a>
                    <a href="/projects/list" class="dropdown-item">Projects List</a>
                    <a href="/projects/overview" class="dropdown-item">Project Overview</a>
                    <a href="/projects/create" class="dropdown-item">Create New</a>
                  </div>
                </div>
                <div class="dropdown">
                  <a
                    id="topnav-task"
                    class="dropdown-item dropdown-toggle arrow-none"
                    href="#"
                    role="button"
                    data-toggle="dropdown"
                    aria-haspopup="true"
                    aria-expanded="false"
                    @click="onMenuClick"
                  >
                    Tasks
                    <div class="arrow-down"></div>
                  </a>
                  <div class="dropdown-menu" aria-labelledby="topnav-task">
                    <a href="/tasks/list" class="dropdown-item">Task List</a>
                    <a href="/tasks/kanban" class="dropdown-item">Kanban Board</a>
                    <a href="/tasks/create" class="dropdown-item">Create Task</a>
                  </div>
                </div>
                <div class="dropdown">
                  <a
                    id="topnav-contact"
                    class="dropdown-item dropdown-toggle arrow-none"
                    href="#"
                    role="button"
                    data-toggle="dropdown"
                    aria-haspopup="true"
                    aria-expanded="false"
                    @click="onMenuClick"
                  >
                    Contacts
                    <div class="arrow-down"></div>
                  </a>
                  <div class="dropdown-menu" aria-labelledby="topnav-contact">
                    <a href="/contacts/grid" class="dropdown-item">User Grid</a>
                    <a href="/contacts/list" class="dropdown-item">User List</a>
                    <a href="/contacts/profile" class="dropdown-item">Profile</a>
                  </div>
                </div>
              </div>
            </li>

            <li class="nav-item dropdown">
              <a
                id="topnav-charts"
                class="nav-link dropdown-toggle arrow-none"
                href="#"
                role="button"
                data-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false"
                @click="onMenuClick"
              >
                <i class="bx bx-collection mr-2"></i>Components
                <div class="arrow-down"></div>
              </a>
              <div class="dropdown-menu" aria-labelledby="topnav-charts">
                <div class="dropdown">
                  <a
                    id="topnav-form"
                    class="dropdown-item dropdown-toggle arrow-none"
                    href="#"
                    role="button"
                    data-toggle="dropdown"
                    aria-haspopup="true"
                    aria-expanded="false"
                    @click="onMenuClick"
                  >
                    Forms
                    <div class="arrow-down"></div>
                  </a>
                  <div class="dropdown-menu" aria-labelledby="topnav-form">
                    <a href="/form/elements" class="dropdown-item">Form Elements</a>
                    <a href="/form/validation" class="dropdown-item">Form Validation</a>
                    <a href="/form/advanced" class="dropdown-item">Form Advanced</a>
                    <a href="/form/editor" class="dropdown-item">Form Editor</a>
                    <a href="/form/uploads" class="dropdown-item">Form File Upload</a>
                    <a href="/form/repeater" class="dropdown-item">Form Repeater</a>
                    <a href="/form/wizard" class="dropdown-item">Form Wizard</a>
                    <a href="/form/mask" class="dropdown-item">Form Mask</a>
                  </div>
                </div>
                <div class="dropdown">
                  <a
                    id="topnav-table"
                    class="dropdown-item dropdown-toggle arrow-none"
                    href="#"
                    role="button"
                    data-toggle="dropdown"
                    aria-haspopup="true"
                    aria-expanded="false"
                    @click="onMenuClick"
                  >
                    Tables
                    <div class="arrow-down"></div>
                  </a>
                  <div class="dropdown-menu" aria-labelledby="topnav-table">
                    <a href="/tables/basictable" class="dropdown-item">Basic Tables</a>
                    <a href="/tables/advancedtable" class="dropdown-item">Advanced Table</a>
                  </div>
                </div>
                <div class="dropdown">
                  <a
                    id="topnav-table"
                    class="dropdown-item dropdown-toggle arrow-none"
                    href="#"
                    role="button"
                    data-toggle="dropdown"
                    aria-haspopup="true"
                    aria-expanded="false"
                    @click="onMenuClick"
                  >
                    Charts
                    <div class="arrow-down"></div>
                  </a>
                  <div class="dropdown-menu" aria-labelledby="topnav-table">
                    <a href="/charts/apex" class="dropdown-item">Apex charts</a>
                    <a href="/charts/chartjs" class="dropdown-item">Chartjs Chart</a>
                    <a href="/charts/chartist" class="dropdown-item">Chartist Chart</a>
                  </div>
                </div>
                <div class="dropdown">
                  <a
                    id="topnav-table"
                    class="dropdown-item dropdown-toggle arrow-none"
                    href="#"
                    role="button"
                    data-toggle="dropdown"
                    aria-haspopup="true"
                    aria-expanded="false"
                    @click="onMenuClick"
                  >
                    Icons
                    <div class="arrow-down"></div>
                  </a>
                  <div class="dropdown-menu" aria-labelledby="topnav-table">
                    <a href="/icons/boxicons" class="dropdown-item">Boxicons</a>
                    <a href="/icons/materialdesign" class="dropdown-item">Material Design</a>
                    <a href="/icons/dripicons" class="dropdown-item">Dripicons</a>
                    <a href="/icons/fontawesome" class="dropdown-item">Font awesome</a>
                  </div>
                </div>
                <div class="dropdown">
                  <a
                    id="topnav-map"
                    class="dropdown-item dropdown-toggle arrow-none"
                    href="#"
                    role="button"
                    data-toggle="dropdown"
                    aria-haspopup="true"
                    aria-expanded="false"
                    @click="onMenuClick"
                  >
                    Maps
                    <div class="arrow-down"></div>
                  </a>
                  <div class="dropdown-menu" aria-labelledby="topnav-map">
                    <a href="/maps/google" class="dropdown-item">Google Maps</a>
                  </div>
                </div>
              </div>
            </li>

            <li class="nav-item dropdown">
              <a
                id="topnav-more"
                class="nav-link dropdown-toggle arrow-none"
                href="#"
                role="button"
                data-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false"
                @click="onMenuClick"
              >
                <i class="bx bx-file mr-2"></i>Extra pages
                <div class="arrow-down"></div>
              </a>
              <div class="dropdown-menu" aria-labelledby="topnav-more">
                <div class="dropdown">
                  <a
                    id="topnav-invoice"
                    class="dropdown-item dropdown-toggle arrow-none"
                    href="#"
                    role="button"
                    data-toggle="dropdown"
                    aria-haspopup="true"
                    aria-expanded="false"
                    @click="onMenuClick"
                  >
                    Invoices
                    <div class="arrow-down"></div>
                  </a>
                  <div class="dropdown-menu" aria-labelledby="topnav-invoice">
                    <a href="/invoices/list" class="dropdown-item">Invoice List</a>
                    <a href="/invoices/detail" class="dropdown-item">Invoice Detail</a>
                  </div>
                </div>
                <div class="dropdown">
                  <a
                    id="topnav-utility"
                    class="dropdown-item dropdown-toggle arrow-none"
                    href="#"
                    role="button"
                    data-toggle="dropdown"
                    aria-haspopup="true"
                    aria-expanded="false"
                    @click="onMenuClick"
                  >
                    Utility
                    <div class="arrow-down"></div>
                  </a>
                  <div class="dropdown-menu" aria-labelledby="topnav-utility">
                    <a href="/pages/starter" class="dropdown-item">Starter Page</a>
                    <a href="/pages/maintenance" class="dropdown-item">Maintenance</a>
                    <a href="/pages/timeline" class="dropdown-item">Timeline</a>
                    <a href="/pages/faqs" class="dropdown-item">FAQs</a>
                    <a href="/pages/pricing" class="dropdown-item">Pricing</a>
                    <a href="/pages/404" class="dropdown-item">Error 404</a>
                    <a href="/pages/500" class="dropdown-item">Error 500</a>
                  </div>
                </div>
              </div>
            </li>

            <li class="nav-item dropdown active">
              <a
                class="nav-link dropdown-toggle arrow-none"
                href="#"
                id="topnav-layout"
                role="button"
                data-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false"
                @click="onMenuClick"
              >
                <i class="bx bx-layout mr-2"></i>Layouts
                <div class="arrow-down"></div>
              </a>
              <div class="dropdown-menu dropdown-menu-right active" aria-labelledby="topnav-layout">
                <a class="dropdown-item active" href="/layout/horizontal">Horizontal</a>
                <a
                  class="dropdown-item"
                  href="javascript:void(0);"
                  @click="() => $root.changeLayout('vertical')"
                >Vertical</a>
                <a
                  @click="topbarLight"
                  href="javascript: void(0);"
                  class="dropdown-item"
                >Light Topbar</a>
                <a @click="boxedWidth" href="javascript: void(0);" class="dropdown-item">Boxed</a>
                <a
                  @click="coloredHeader"
                  href="javascript: void(0);"
                  class="dropdown-item"
                >Colored Header</a>
              </div>
            </li>
          </ul>
        </div>
      </nav>
    </div>
  </div>
</template>
