<script>

export default {
  props: {
    currentRoute: {
      type: String,
      default: ''
    },
    menu: {
      type: Object,
      default: {}
    }
  },
  data() {
    return {
      // Menu: {
      //   dashboard: {
      //     name: 'Dashboard',
      //     route: 'admin.dashboard.index',
      //     url: window.location.origin + '/admin/dashboard'
      //   },
      //   user: {
      //     name: 'Users',
      //     children: {
      //       userList: {
      //         name: 'Users List',
      //         route: 'admin.user.index',
      //         url: window.location.origin + '/admin/user'
      //       },
      //       createUser: {
      //         name: 'Create User',
      //         route: 'admin.user.create',
      //         url: window.location.origin + '/admin/user/create'
      //       },
      //     }
      //   },
      //   text: {
      //     name: 'Texts',
      //     children: {
      //       textList: {
      //         name: 'Texts List',
      //         route: 'admin.text.index',
      //         url: window.location.origin + '/admin/text'
      //       },
      //       createText: {
      //         name: 'Create Text',
      //         route: 'admin.text.create',
      //         url: window.location.origin + '/admin/text/create'
      //       },
      //     }
      //   },
      //   comment: {
      //     name: 'Comments',
      //     children: {
      //       commentList: {
      //         name: 'Comment List',
      //         route: 'admin.comment.index',
      //         url: window.location.origin + '/admin/comment'
      //       },
      //       createComment: {
      //         name: 'Create Comment',
      //         route: 'admin.comment.create',
      //         url: window.location.origin + '/admin/comment/create'
      //       },
      //     }
      //   },
      //   partner: {
      //     name: 'Partners',
      //     children: {
      //       partnerList: {
      //         name: 'Partner List',
      //         route: 'admin.partner.index',
      //         url: window.location.origin + '/admin/partner'
      //       },
      //       createPartner: {
      //         name: 'Create Partner',
      //         route: 'admin.partner.create',
      //         url: window.location.origin + '/admin/partner/create'
      //       },
      //     }
      //   },
      //   pages: {
      //     name: 'Pages',
      //     children: {
      //       pageList: {
      //         name: 'Page List',
      //         route: 'admin.page.index',
      //         url: window.location.origin + '/admin/page'
      //       },
      //       createPage: {
      //         name: 'Create Page',
      //         route: 'admin.page.create',
      //         url: window.location.origin + '/admin/page/create'
      //       },
      //     }
      //   },
      //   ecologyRegions: {
      //     name: 'Ecology Regions',
      //     children: {
      //       ecologyRegionList: {
      //         name: 'Ecology Region List',
      //         route: 'admin.ecology.region.index',
      //         url: window.location.origin + '/admin/ecology/region'
      //       },
      //       createEcologyRegion: {
      //         name: 'Create Ecology Region',
      //         route: 'admin.ecology.region.create',
      //         url: window.location.origin + '/admin/ecology/region/create'
      //       },
      //     }
      //   },
      //   ecologyTrees: {
      //     name: 'Ecology Trees',
      //     children: {
      //       ecologyTreesList: {
      //         name: 'Ecology Trees List',
      //         route: 'admin.ecology.trees.index',
      //         url: window.location.origin + '/admin/ecology/tree'
      //       },
      //       createEcologyTree: {
      //         name: 'Create Ecology Tree',
      //         route: 'admin.ecology.trees.create',
      //         url: window.location.origin + '/admin/ecology/tree/create'
      //       },
      //     }
      //   },
      // }
    };
  },
  mounted: function () {
    console.log(this.menu, 'menus')
  },
  created() {
    Object.keys(this.menu).forEach(index => {
      this.hasActiveChild(this.menu[index]);
    });
  },
  methods: {
    /**
     * Returns true or false if given menu item has child or not
     * @param item menuItem
     */
    hasItems(item) {
      return item.children && Object.keys(item.children).length > 0;
    },

    toggleMenu(items) {
      // ul
      const item = $("#" + items);

      item.toggleClass('mm-show');
      item.parent('li').toggleClass('mm-active');
      item.parent('li').children('a').toggleClass('mm-active');
    },

    hasActiveChild(item) {
      const childKeys = item.children && Object.keys(item.children);

      if (childKeys) {
        childKeys.forEach(index => {
          if (item.children[index].route === this.currentRoute) {
            item.hasActiveChild = true;
          }
        });
      }
    }
  },
};
</script>

<template>
  <!--- Sidemenu -->

  <!-- Left Menu Start -->

  <div id="sidebar-menu">
    <ul id="side-menu" class="metismenu list-unstyled">
      <template v-for="(item,k) in menu">
        <li :key="k" class="menu-item" :class="{'mm-active': item.hasActiveChild}">
          <a
              v-if="hasItems(item)"
              class="side-nav-link-a-ref parent has-arrow waves-effect"
              :class="{'mm-active': item.hasActiveChild}"
              href="javascript:void(0);"
              @click="toggleMenu(k)"
          >
            <i v-if="item['icon-class']" :class="`bx ${item['icon-class']}`"></i>
            <span>{{ item.name }}</span>
          </a>

          <a
              v-else
              :href="item.url"
              class="side-nav-link-ref parent waves-effect"
          >
            <i v-if="item['icon-class']" :class="`bx ${item['icon-class']}`"></i>
            <span>{{ item.name }}</span>
          </a>

          <ul v-if="hasItems(item)" :id="k" class="sub-menu mm-collapse"
              :class="{['mm-show']: item.hasActiveChild }" aria-expanded="true">
            <li v-for="(submenu, index) in item.children" :key="index" class="menu-item"
                :class="{['mm-active']: currentRoute === submenu.route }">
              <a :href="submenu.url" class="side-nav-link-ref"
                 :class="{active: currentRoute === submenu.route }">
                <i :class="`bx ${submenu['icon-class']}`"></i>
                {{ submenu.name }}
              </a>
            </li>
          </ul>
        </li>
      </template>
    </ul>
  </div>
  <!-- Sidebar -->
</template>
