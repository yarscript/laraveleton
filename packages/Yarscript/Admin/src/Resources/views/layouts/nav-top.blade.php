<nav-top></nav-top>

@push('scripts')
    <script type="text/x-template" id="nav-top-template">
        <NavBar />
    </script>

    <script>
        console.log('Vue', window.Vue);
        Vue.component('nav-top', {
            template: '#nav-top-template',
            data() {
                return {
                    isMenuCondensed: false,
                    layout: {
                        type: "vertical",
                        width: "fluid",
                        topbar: "light",
                        loader: true
                    }
                };
            },
            methods: {
                onSubmit(e) {
                    this.$root.onSubmit(e);
                },

                changeTopbar(topbar) {
                    switch (topbar) {
                        case "dark":
                            document.body.setAttribute("data-topbar", "dark");
                            break;
                        case "light":
                            document.body.setAttribute("data-topbar", "light");
                            document.body.removeAttribute("data-layout-size", "boxed");
                            break;
                        case "colored":
                            document.body.setAttribute("data-topbar", "colored");
                            document.body.removeAttribute("data-layout-size", "boxed");
                            break;
                        default:
                            document.body.setAttribute("data-topbar", "dark");
                            break;
                    }
                },
            },

            created() {
                const layout = JSON.parse(localStorage.getItem("layout")) || {};
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
                                newLayout.topbar !== oldLayout?.topbar ||
                                newLayout.type !== oldLayout?.type
                            ) {
                                this.changeTopbar(newLayout.topbar);
                            }
                        }
                    }
                }
            }
        });
    </script>
@endpush
