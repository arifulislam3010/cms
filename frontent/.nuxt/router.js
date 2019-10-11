import Vue from 'vue'
import Router from 'vue-router'
import { interopDefault } from './utils'
import scrollBehavior from './router.scrollBehavior.js'

const _1fccb4a6 = () => interopDefault(import('..\\pages\\about.vue' /* webpackChunkName: "pages_about" */))
const _2dc920e2 = () => interopDefault(import('..\\pages\\all-news.vue' /* webpackChunkName: "pages_all-news" */))
const _b496b966 = () => interopDefault(import('..\\pages\\articles.vue' /* webpackChunkName: "pages_articles" */))
const _47a05334 = () => interopDefault(import('..\\pages\\category\\index.vue' /* webpackChunkName: "pages_category_index" */))
const _45d1929c = () => interopDefault(import('..\\pages\\category\\_id.vue' /* webpackChunkName: "pages_category__id" */))
const _017f8ced = () => interopDefault(import('..\\pages\\article\\_id\\_title.vue' /* webpackChunkName: "pages_article__id__title" */))
const _0fd18072 = () => interopDefault(import('..\\pages\\index.vue' /* webpackChunkName: "pages_index" */))

Vue.use(Router)

export const routerOptions = {
  mode: 'history',
  base: decodeURI('/'),
  linkActiveClass: 'nuxt-link-active',
  linkExactActiveClass: 'nuxt-link-exact-active',
  scrollBehavior,

  routes: [{
      path: "/about",
      component: _1fccb4a6,
      name: "about"
    }, {
      path: "/all-news",
      component: _2dc920e2,
      name: "all-news"
    }, {
      path: "/articles",
      component: _b496b966,
      name: "articles"
    }, {
      path: "/category",
      component: _47a05334,
      name: "category"
    }, {
      path: "/category/:id",
      component: _45d1929c,
      name: "category-id"
    }, {
      path: "/article/:id?/:title?",
      component: _017f8ced,
      name: "article-id-title"
    }, {
      path: "/",
      component: _0fd18072,
      name: "index"
    }],

  fallback: false
}

export function createRouter() {
  return new Router(routerOptions)
}
