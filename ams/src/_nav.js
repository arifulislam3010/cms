export default {
  items: [
    {
      name: 'Dashboard',
      url: '/dashboard',
      icon: 'icon-speedometer',
      badge: {
        variant: 'primary',
        // text: 'NEW'
      }
    },
    {
      name: 'Settings',
      url: '/settings/category',
      icon: 'fa fa-money',
      children: [
        {
          name: 'language',
          url: '/settings/language',
          icon: 'fa fa-life-bouy'
        },
        {
          name: 'category',
          url: '/settings/category',
          icon: 'fa fa-life-bouy'
        },
        {
          name: 'topic',
          url: '/settings/topic',
          icon: 'fa fa-life-bouy'
        },
        {
          name: 'area',
          url: '/settings/area',
          icon: 'fa fa-life-bouy'
        },
        {
          name: 'tags',
          url: '/settings/tags',
          icon: 'fa fa-life-bouy'
        },
        {
          name: 'scroll',
          url: '/settings/scroll',
          icon: 'fa fa-life-bouy'
        },


      ]
    },
    {
      name: 'Manage News',
      url: '/news/list',
      icon: 'fa fa-money',
      url: '/news/add',
      children: [
        {
          name: 'General News',
          url: '/news/list',
          icon: 'fa fa-life-bouy',
          children: [
            {
              name: 'Create News',
              url: '/news/add',
              icon: 'fa fa-life-bouy'
            },
            {
              name: 'Edit News',
              url: '/news/edit-news-list',
              icon: 'fa fa-life-bouy'
            },
            {
              name: 'List News',
              url: '/news/list',
              icon: 'fa fa-life-bouy'
            },
            {
              name: 'Schedule News',
              url: '/news/scheduled-news',
              icon: 'fa fa-life-bouy'
            },
            {
              name: "Reporter's News",
              url: '/news/reporters-news',
              icon: 'fa fa-life-bouy'
            },
          ]
        },
        {
          name: 'Topic News',
          url: '/news/scheduled-news',
          icon: 'fa fa-life-bouy',
          children: [
            {
              name: 'Create Topic',
              url: '/news/add',
              icon: 'fa fa-life-bouy'
            },
            {
              name: 'Topic News',
              url: '/news/list',
              icon: 'fa fa-life-bouy'
            },
            {
              name: 'List Topic',
              url: '/news/list',
              icon: 'fa fa-life-bouy'
            },
          ]
        },
        {
          name: "Arcrive",
          url: '/news/reporters-news',
          icon: 'fa fa-life-bouy'
        },
      ]
    },
    {
      name: 'Media Manager',
      url: '/gallery/list',
      icon: 'fa fa-life-bouy',
      url: '/gallery/list',
      children: [
        {
          name: 'Photo Gallery',
          url: '/gallery/list',
          icon: 'fa fa-life-bouy',
          children: [
            {
              name: 'Add Photo',
              url: '/gallery/add-album',
              icon: 'fa fa-life-bouy'
            },
            {
              name: 'Photo List',
              url: '/gallery/list',
              icon: 'fa fa-life-bouy'
            },
          ]
        },
        {
          name: 'Video Gallery',
          url: '/gallery/list',
          icon: 'fa fa-life-bouy',
          children: [
            {
              name: 'Add Video',
              url: '/gallery/add-album',
              icon: 'fa fa-life-bouy'
            },
            {
              name: 'Video List',
              url: '/gallery/list',
              icon: 'fa fa-life-bouy'
            },
          ]
        },
      ]
    },
    {
      name: 'News Controls',
      url: '/settings/category',
      icon: 'fa fa-money',
      children: [
        {
          name: 'Tag',
          url: '/settings/scroll',
          icon: 'fa fa-life-bouy'
        },
        {
          name: 'Category',
          url: '/settings/category',
          icon: 'fa fa-life-bouy'
        },
        {
          name: 'Topic',
          url: '/settings/topic',
          icon: 'fa fa-life-bouy'
        },
        {
          name: 'Area',
          url: '/settings/area',
          icon: 'fa fa-life-bouy'
        },
        {
          name: 'Section',
          url: '/settings/area',
          icon: 'fa fa-life-bouy'
        },
      ]
    },
<<<<<<< HEAD
=======


    // {
    //   name: 'Items',
    //   url: '/category',
    //   icon: 'fa fa-money',
    //   children: [
    //     {
    //       name: 'Category',
    //       url: '/category',
    //       icon: 'fa fa-life-bouy'
    //     },
    //     {
    //       name: 'item',
    //       url: '/item',
    //       icon: 'fa fa-life-bouy'
    //     },
    //   ]
    // },
>>>>>>> e9d68a92c29dfeec6b605ffb4a2abacfc57ec2c2
    {
      name: 'Admin Controls',
      url: '/user-role',
      icon: 'fa fa-money',
      children: [
        {
          name: 'User Role',
          url: '/user-role',
          icon: 'icon-star'
        },
        {
          name: 'User List',
          url: '/user-list',
          icon: 'icon-star'
        },
      ]
    },
    {
      name: 'Manage Poll',
      url: '/ManagePoll',
      icon: 'fa fa-money',
    },
    {
      name: 'Advertisements',
      url: '/Advertisements',
      icon: 'fa fa-money',
    },
    
    {
      name: 'Geo Graphical',
      url: '/GGM',
      icon: 'fa fa-money',
    },
    {
      name: 'Language',
      url: '/lm',
      icon: 'fa fa-money',
    },
    {
      name: 'Comments',
      url: '/comments',
      icon: 'fa fa-money',
    },
    
    {
      name: 'Theme',
      url: '/tm',
      icon: 'fa fa-money',
      children: [
        {
          name: 'Theme',
          url: 't',
          icon: 'icon-star'
        },
        {
          name: 'Pages',
          url: '/pa',
          icon: 'icon-star'
        },
        {
          name: 'Customize',
          url: '/cu',
          icon: 'icon-star'
        },
        {
          name: 'Widgets',
          url: '/wi',
          icon: 'icon-star'
        },
        {
          name: 'Header',
          url: '/hea',
          icon: 'icon-star'
        },
        {
          name: 'Footer',
          url: '/foo',
          icon: 'icon-star'
        },
        {
          name: 'Menus',
          url: '/me',
          icon: 'icon-star'
        },
      ]
    },

    // {
    //   name: 'Expense',
    //   url: '/expense',
    //   icon: 'cui-dollar icons',
    //   children: [
    //     {
    //       name: 'Expense Type',
    //       url: '/income/expense-type',
    //       icon: 'cui-layers icons'
    //     },
    //     {
    //       name: 'Project Expense',
    //       url: '/income/booking',
    //       icon: 'fa fa-dollar'
    //     },
    //     {
    //       name: 'Other Expense',
    //       url: '/income/installment',
    //       icon: 'fa fa-dollar'
    //     }
    //   ]
    // },
    // {
    //   title: true,
    //   name: 'Report',
    //   class: '',
    //   wrapper: {
    //     element: '',
    //     attributes: {}
    //   }
    // },
    // {
    //   name: 'Income Report',
    //   url: '/income-report',
    //   icon: 'fa fa-linode',
    //   children: [
    //     {
    //       name: 'Payment Report',
    //       url: '/income-report/advance-payment-report',
    //       icon: 'fa fa-money'
    //     },
    //     {
    //       name: 'Other Income Report',
    //       url: '/income-report/other-income-report',
    //       icon: 'fa fa-money'
    //     }
    //   ]
    // },
    // {
    //   name: 'Expense Report',
    //   url: '/income-report',
    //   icon: 'fa fa-minus-square-o',
    //   children: [
    //     {
    //       name: 'ProjectExpense Report',
    //       url: '/income-report/advance-payment-report',
    //       icon: 'fa fa-gbp'
    //     },
    //     {
    //       name: 'Other Expense Report',
    //       url: '/income-report/other-income-report',
    //       icon: 'fa fa-gbp'
    //     }
    //   ]
    // },
    // {
    //   title: true,
    //   name: 'Theme',
    //   class: '',
    //   wrapper: {
    //     element: '',
    //     attributes: {}
    //   }
    // },
    // {
    //   name: 'Colors',
    //   url: '/theme/colors',
    //   icon: 'icon-drop'
    // },
    // {
    //   name: 'Typography',
    //   url: '/theme/typography',
    //   icon: 'icon-pencil'
    // },
    // {
    //   title: true,
    //   name: 'Components',
    //   class: '',
    //   wrapper: {
    //     element: '',
    //     attributes: {}
    //   }
    // },
    // {
    //   name: 'Base',
    //   url: '/base',
    //   icon: 'icon-puzzle',
    //   children: [
    //     {
    //       name: 'Breadcrumbs',
    //       url: '/base/breadcrumbs',
    //       icon: 'icon-puzzle'
    //     },
    //     {
    //       name: 'Cards',
    //       url: '/base/cards',
    //       icon: 'icon-puzzle'
    //     },
    //     {
    //       name: 'Carousels',
    //       url: '/base/carousels',
    //       icon: 'icon-puzzle'
    //     },
    //     {
    //       name: 'Collapses',
    //       url: '/base/collapses',
    //       icon: 'icon-puzzle'
    //     },
    //     {
    //       name: 'Forms',
    //       url: '/base/forms',
    //       icon: 'icon-puzzle'
    //     },
    //     {
    //       name: 'Jumbotrons',
    //       url: '/base/jumbotrons',
    //       icon: 'icon-puzzle'
    //     },
    //     {
    //       name: 'List Groups',
    //       url: '/base/list-groups',
    //       icon: 'icon-puzzle'
    //     },
    //     {
    //       name: 'Navs',
    //       url: '/base/navs',
    //       icon: 'icon-puzzle'
    //     },
    //     {
    //       name: 'Navbars',
    //       url: '/base/navbars',
    //       icon: 'icon-puzzle'
    //     },
    //     {
    //       name: 'Paginations',
    //       url: '/base/paginations',
    //       icon: 'icon-puzzle'
    //     },
    //     {
    //       name: 'Popovers',
    //       url: '/base/popovers',
    //       icon: 'icon-puzzle'
    //     },
    //     {
    //       name: 'Progress Bars',
    //       url: '/base/progress-bars',
    //       icon: 'icon-puzzle'
    //     },
    //     {
    //       name: 'Switches',
    //       url: '/base/switches',
    //       icon: 'icon-puzzle'
    //     },
    //     {
    //       name: 'Tables',
    //       url: '/base/tables',
    //       icon: 'icon-puzzle'
    //     },
    //     {
    //       name: 'Tabs',
    //       url: '/base/tabs',
    //       icon: 'icon-puzzle'
    //     },
    //     {
    //       name: 'Tooltips',
    //       url: '/base/tooltips',
    //       icon: 'icon-puzzle'
    //     }
    //   ]
    // },
    // {
    //   name: 'Buttons',
    //   url: '/buttons',
    //   icon: 'icon-cursor',
    //   children: [
    //     {
    //       name: 'Buttons',
    //       url: '/buttons/standard-buttons',
    //       icon: 'icon-cursor'
    //     },
    //     {
    //       name: 'Button Dropdowns',
    //       url: '/buttons/dropdowns',
    //       icon: 'icon-cursor'
    //     },
    //     {
    //       name: 'Button Groups',
    //       url: '/buttons/button-groups',
    //       icon: 'icon-cursor'
    //     },
    //     {
    //       name: 'Brand Buttons',
    //       url: '/buttons/brand-buttons',
    //       icon: 'icon-cursor'
    //     }
    //   ]
    // },
    // {
    //   name: 'Charts',
    //   url: '/charts',
    //   icon: 'icon-pie-chart'
    // },
    // {
    //   name: 'Icons',
    //   url: '/icons',
    //   icon: 'icon-star',
    //   children: [
    //     {
    //       name: 'CoreUI Icons',
    //       url: '/icons/coreui-icons',
    //       icon: 'icon-star',
    //       badge: {
    //         variant: 'info',
    //         text: 'NEW'
    //       }
    //     },
    //     {
    //       name: 'Flags',
    //       url: '/icons/flags',
    //       icon: 'icon-star'
    //     },
    //     {
    //       name: 'Font Awesome',
    //       url: '/icons/font-awesome',
    //       icon: 'icon-star',
    //       badge: {
    //         variant: 'secondary',
    //         text: '4.7'
    //       }
    //     },
    //     {
    //       name: 'Simple Line Icons',
    //       url: '/icons/simple-line-icons',
    //       icon: 'icon-star'
    //     }
    //   ]
    // },
    // {
    //   name: 'Notifications',
    //   url: '/notifications',
    //   icon: 'icon-bell',
    //   children: [
    //     {
    //       name: 'Alerts',
    //       url: '/notifications/alerts',
    //       icon: 'icon-bell'
    //     },
    //     {
    //       name: 'Badges',
    //       url: '/notifications/badges',
    //       icon: 'icon-bell'
    //     },
    //     {
    //       name: 'Modals',
    //       url: '/notifications/modals',
    //       icon: 'icon-bell'
    //     }
    //   ]
    // },
    // {
    //   name: 'Widgets',
    //   url: '/widgets',
    //   icon: 'icon-calculator',
    //   badge: {
    //     variant: 'primary',
    //     text: 'NEW'
    //   }
    // },
    // {
    //   divider: true
    // },
    // {
    //   title: true,
    //   name: 'Extras'
    // },
    // {
    //   name: 'Pages',
    //   url: '/pages',
    //   icon: 'icon-star',
    //   children: [
    //     {
    //       name: 'Login',
    //       url: '/pages/login',
    //       icon: 'icon-star'
    //     },
    //     {
    //       name: 'Register',
    //       url: '/pages/register',
    //       icon: 'icon-star'
    //     },
    //     {
    //       name: 'Error 404',
    //       url: '/pages/404',
    //       icon: 'icon-star'
    //     },
    //     {
    //       name: 'Error 500',
    //       url: '/pages/500',
    //       icon: 'icon-star'
    //     }
    //   ]
    // },
    // {
    //   name: 'Disabled',
    //   url: '/dashboard',
    //   icon: 'icon-ban',
    //   badge: {
    //     variant: 'secondary',
    //     text: 'NEW'
    //   },
    //   attributes: { disabled: true },
    // },
    // {
    //   name: 'Download CoreUI',
    //   url: 'http://coreui.io/vue/',
    //   icon: 'icon-cloud-download',
    //   class: 'mt-auto',
    //   variant: 'success',
    //   attributes: { target: '_blank', rel: 'noopener' }
    // },
    // {
    //   name: 'Try CoreUI PRO',
    //   url: 'http://coreui.io/pro/vue/',
    //   icon: 'icon-layers',
    //   variant: 'danger',
    //   attributes: { target: '_blank', rel: 'noopener' }
    // },


  ],
}
