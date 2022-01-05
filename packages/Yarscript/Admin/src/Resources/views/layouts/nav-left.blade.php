@php
    use Illuminate\Support\Facades\Route;

    $currentRoute = '/' . Route::current()->uri()
@endphp

<nav-left></nav-left>

@push('scripts')
    <script type="text/x-template" id="nav-left-template">
        <SideBar
                :is-condensed="isMenuCondensed"
                :menu-items='menu'
                current-route='{{ $currentRoute }}'
        ></SideBar>
    </script>

    <script>
        Vue.component('nav-left', {
            template: '#nav-left-template',
            data() {
                return {
                    isMenuCondensed: false,
                    layout: {
                        type: "vertical",
                        sidebar: "dark",
                        width: "fluid",
                        loader: true
                    },
                    menu: {}
                };
            },
            methods: {
                onSubmit(e) {
                    this.$root.onSubmit(e);
                },
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

                changeMode(mode) {
                    let cssUrl = document.getElementById("layout-css").href;
                    cssUrl = cssUrl.split("/");
                    cssUrl.pop();
                    document.cookie = "layout=" + (mode || "default");
                    switch (mode) {
                        case "dark":
                            cssUrl.push("app-dark.css");
                            break;
                        case "rtl":
                            cssUrl.push("app-rtl.css");
                            break;
                        default:
                            cssUrl.push("app.css");
                            break;
                    }
                    document.getElementById("layout-css").href = cssUrl.join("/");
                },
                changeLayout(change) {
                    this.layout = {
                        ...this.layout,
                        ...change
                    };
                    localStorage.setItem("layout", JSON.stringify(this.layout));
                },
                changeSidebar(sidebar) {
                    switch (sidebar) {
                        case "dark":
                            document.body.setAttribute("data-sidebar", "dark");
                            document.body.removeAttribute("data-topbar");
                            document.body.removeAttribute("data-sidebar-size");
                            break;
                        case "light":
                            document.body.setAttribute("data-topbar", "dark");
                            document.body.removeAttribute("data-sidebar");
                            document.body.removeAttribute("data-sidebar-size");
                            document.body.classList.remove("vertical-collpsed");
                            break;
                        case "compact":
                            document.body.setAttribute("data-sidebar-size", "small");
                            document.body.setAttribute("data-sidebar", "dark");
                            document.body.classList.remove("vertical-collpsed");
                            document.body.removeAttribute("data-topbar", "dark");
                            break;
                        case "icon":
                            document.body.setAttribute("data-keep-enlarged", "true");
                            document.body.classList.add("vertical-collpsed");
                            document.body.setAttribute("data-sidebar", "dark");
                            document.body.removeAttribute("data-topbar", "dark");
                            break;
                        case "colored":
                            document.body.setAttribute("data-sidebar", "colored");
                            document.body.removeAttribute("data-keep-enlarged");
                            document.body.classList.remove("vertical-collpsed");
                            document.body.removeAttribute("data-sidebar-size");
                            break;
                        default:
                            document.body.setAttribute("data-sidebar", "dark");
                            break;
                    }
                },
                changeWidth(width) {
                    switch (width) {
                        case "boxed":
                            document.body.setAttribute("data-layout-size", "boxed");
                            break;
                        case "fluid":
                            document.body.setAttribute("data-layout-mode", "fluid");
                            document.body.removeAttribute("data-layout-size");
                            break;
                        default:
                            document.body.setAttribute("data-layout-mode", "fluid");
                            break;
                    }
                },
                changeLoader(loader) {
                }
            },

            created() {
                const layout = JSON.parse(localStorage.getItem("layout")) || {};
                this.menu = @json($menu ?? []);

                if (layout) {
                    this.layout = {
                        ...this.layout,
                        ...layout,
                        sidebar:
                            layout?.type === "horizontal"
                                ? "light"
                                : layout?.sidebar || "dark"
                    };
                }
            },
            watch: {
                layout: {
                    immediate: true,
                    handler(newLayout, oldLayout) {
                        if (newLayout) {
                            if (
                                newLayout.sidebar !== oldLayout?.sidebar ||
                                newLayout.type !== oldLayout?.type
                            ) {
                                this.changeSidebar(newLayout.sidebar);
                            }
                            if (newLayout.loader !== oldLayout?.loader) {
                                this.changeLoader(newLayout.loader);
                            }
                            if (newLayout.width !== oldLayout?.width) {
                                this.changeWidth(newLayout.width);
                            }
                        }
                    }
                }
            }
        });
    </script>
@endpush
