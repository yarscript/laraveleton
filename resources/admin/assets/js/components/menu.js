export const menuItems = [
    {
        id: 1,
        label: "menuitems.menu.text",
        subItems: [
            {
                id: 2,
                label: "menuitems.dashboards.text",
                icon: "bxs-dashboard",
                link: "/admin/dashboard"
            },
            {
                id: 200,
                label: "menuitems.Yarscript.text",
                icon: "bxs-dashboard",
                link: "/admin/Yarscript"
            },
            {
                id: 8,
                label: "menuitems.calendar.text",
                icon: "bx-calendar",
                link: "/admin/calendar"
            }
        ]
    },
    {
        id: 6,
        isLayout: true
    },

    /* Orders */
    {
        id: 242,
        label: "menuitems.orders.title.text",
        subItems: [
            {
                id: 243,
                label: "menuitems.orders.orders.text",
                icon: "bx-list-ul",
                link: "/admin/sales/orders"
            },
            {
                id: 244,
                label: "menuitems.orders.order-fulfilment.text",
                icon: "bx-file",
                link: ""
            },
            {
                id: 245,
                label: "menuitems.orders.abandoned-carts.text",
                icon: "bx-briefcase",
                link: ""
            },
            {
                id: 246,
                label: "menuitems.orders.returns.text",
                icon: "bx-file",
                link: ""
            }
        ],
    },

    /* Sales */
    {
        id: 7,
        label: "menuitems.sales-title.text",
        subItems: [
            {
                id: 201,
                label: "menuitems.orders.text",
                icon: "bx-list-ul",
                link: "/admin/sales/orders"
            },
            {
                id: 202,
                label: "menuitems.invoices.text",
                icon: "bx-file",
                link: "/admin/sales/invoices"
            },
            {
                id: 203,
                label: "menuitems.shipments.text",
                icon: "bxs-briefcase",
                link: "/admin/sales/shipments"
            },
            {
                id: 204,
                label: "menuitems.returns.text",
                icon: "bxs-file",
                link: "/admin/sales/refunds"
            },
        ]
    },
    /* Sales end */

    /* Catalog */
    {
        id: 205,
        label: "menuitems.catalog-title.text",
        subItems: [
            {
                id: 206,
                label: "menuitems.products.text",
                icon: "bx-package",
                link: "/admin/catalog/products",
            },
            {
                id: 207,
                label: "menuitems.categories.text",
                icon: "bx-package",
                link: "/admin/catalog/categories",
            },
            {
                id: 208,
                label: "menuitems.attributes.text",
                icon: "bx-store",
                link: "/admin/catalog/attributes"
            },
            {
                id: 209,
                label: "menuitems.families.text",
                icon: "bx-envelope",
                link: "/admin/catalog/families"
            },
        ]
    },
    /* Catalog end */

    /* Customers */
    {
        id: 211,
        label: "menuitems.customers-title.text",
        subItems: [
            {
                id: 212,
                label: "menuitems.customers.text",
                icon: "bxs-discount",
                link: "/admin/customers"
            },
            {
                id: 213,
                label: "menuitems.groups.text",
                icon: "bx-shopping-bag",
                link: "/admin/groups"
            },
            {
                id: 214,
                label: "menuitems.reviews.text",
                icon: "bx-envelope",
                link: "/admin/reviews"
            },
            {
                id: 215,
                label: "menuitems.subscribers.text",
                icon: "bx-wallet",
                link: "/admin/subscribers"
            },
        ]
    },
    /* Customers end */

    /* Promotions */
    {
        id: 217,
        label: "menuitems.promotions.title.text",
        subItems: [
            {
                id: 218,
                label: "menuitems.promotions.catalog.text",
                icon: "bx-home",
                link: "/admin/promotions/catalog-rules"
            },
            {
                id: 240,
                label: "menuitems.promotions.cart.text",
                icon: "bx-store",
                link: "/admin/promotions/cart-rules"
            }
        ]

        // id: 217,
        // label: "menuitems.content.title.text",
        // subItems: [
        //     {
        //         id: 218,
        //         label: "menuitems.content.home-page.text",
        //         icon: "bx-home",
        //         link: "/admin/content/homepage"
        //     },
        //     {
        //         id: 240,
        //         label: "menuitems.content.collections.text",
        //         icon: "bx-store",
        //         link: "/admin/content/collections"
        //     },
        //     {
        //         id: 219,
        //         label: "menuitems.content.megamenu.text",
        //         icon: "bx-list-ul",
        //         link: "/admin/content/megamenu"
        //     },
        //     {
        //         id: 220,
        //         label: "menuitems.content.lookbook.text",
        //         icon: "bx-aperture",
        //         link: "/admin/content/lookbook"
        //     },
        //     {
        //         id: 221,
        //         label: "menuitems.content.content-pages.text",
        //         icon: "bx-file",
        //         link: "/admin/content/pages"
        //     },
        //     {
        //         id: 222,
        //         label: "menuitems.content.header.text",
        //         icon: "bx-file",
        //         link: "/admin/content/header"
        //     },
        //     {
        //         id: 223,
        //         label: "menuitems.content.footer.text",
        //         icon: "bx-file",
        //         link: "/admin/content/footer"
        //     }
        // ]
    },
    /* Promotions end */

    /* CMS start */
    {
        id: 210,
        "label": "menuitems.cms.title.text",
        subItems: [
            {
                id: 219,
                label: "menuitems.cms.pages.text",
                icon: "bx-list-ul",
                link: "/admin/cms"
            }
        ]
    },
    /* CMS end */

    /* Settings start */
    {
        id: 216,
        "label": "menuitems.settings.title.text",
        subItems: [
            {
                id: 220,
                label: "menuitems.settings.locales.text",
                icon: "bx-list-ul",
                link: "/admin/locales"
            },
            {
                id: 221,
                label: "menuitems.settings.currencies.text",
                icon: "bx-list-ul",
                link: "/admin/currencies"
            },
            {
                id: 222,
                label: "menuitems.settings.exchange.text",
                icon: "bx-list-ul",
                link: "/admin/exchange_rates"
            },
            {
                id: 223,
                label: "menuitems.settings.inventory.text",
                icon: "bx-list-ul",
                link: "/admin/inventory_sources"
            },
            {
                id: 232,
                label: "menuitems.settings.channels.text",
                icon: "bx-list-ul",
                link: "/admin/channels"
            },
            {
                id: 233,
                label: "menuitems.settings.users.text",
                icon: "bx-list-ul",
                link: "/admin/users"
            },
            {
                id: 234,
                label: "menuitems.settings.sliders.text",
                icon: "bx-list-ul",
                link: "/admin/sliders"
            },
            {
                id: 235,
                label: "menuitems.settings.taxes.text",
                icon: "bx-list-ul",
                link: "/admin/taxes"
            },
        ]
    },
    /* Settings end */

    /* Configure start */
    {
        id: 236,
        label: "menuitems.configure.title.text",
        subItems: [
            {
                id: 237,
                label: "menuitems.configure.general.text",
                icon: "bx-list-ul",
                link: "/admin/configuration/general"
            },
            {
                id: 238,
                label: "menuitems.configure.catalog.text",
                icon: "bx-list-ul",
                link: "/admin/configuration/catalog"
            },
            {
                id: 239,
                label: "menuitems.configure.customer.text",
                icon: "bx-list-ul",
                link: "/admin/configuration/customer"
            },
            {
                id: 240,
                label: "menuitems.configure.sales.text",
                icon: "bx-list-ul",
                link: "/admin/configuration/sales"
            },
            {
                id: 241,
                label: "menuitems.configure.email.text",
                icon: "bx-list-ul",
                link: "/admin/configuration/email"
            },
        ]
    },
    /* Configure end */

    /* POS start */
    {
        id: 224,
        label: "menuitems.pos.title.text",
        subItems: [
            {
                id: 225,
                label: "menuitems.pos.pos.text",
                icon: "bx-user-circle",
                link: "/admin/pos/users"
            },
            {
                id: 226,
                label: "menuitems.pos.receipt-editor.text",
                icon: "bxs-user-detail",
                link: "/admin/pos/banks"
            },
            {
                id: 227,
                label: "menuitems.pos.closing-reports.text",
                icon: "bx-receipt",
                link: "/admin/pos/reports"
            }
        ]
    },
    /* POS end */

    /* Analytics */
    {
        id: 228,
        label: "menuitems.analytics.title.text",
        subItems: [
            {
                id: 229,
                label: "menuitems.analytics.dashboards.text",
                icon: "bxs-bar-chart-alt-2",
                link: "/admin/analytics/dashboard"
            },
            {
                id: 230,
                label: "menuitems.analytics.reports.text",
                icon: "bx-task",
                link: "/admin/analytics/reports"
            }
        ]
    },
    /* Analytics end */
];
