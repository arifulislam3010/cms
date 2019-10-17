import Vue from 'vue'
import Router from 'vue-router'
import { interopDefault } from './utils'
import scrollBehavior from './router.scrollBehavior.js'

const _294b53a0 = () => interopDefault(import('..\\pages\\about.vue' /* webpackChunkName: "pages_about" */))
const _b545ce88 = () => interopDefault(import('..\\pages\\all-news.vue' /* webpackChunkName: "pages_all-news" */))
const _61f64c7a = () => interopDefault(import('..\\pages\\articles.vue' /* webpackChunkName: "pages_articles" */))
const _5ed84acc = () => interopDefault(import('..\\pages\\article\\_id\\_title.vue' /* webpackChunkName: "pages_article__id__title" */))
const _c166da30 = () => interopDefault(import('..\\pages\\category\\_id\\_title.vue' /* webpackChunkName: "pages_category__id__title" */))
const _49032e65 = () => interopDefault(import('..\\pages\\index.vue' /* webpackChunkName: "pages_index" */))

Vue.use(Router)

export const routerOptions = {
  mode: 'history',
  base: decodeURI('/'),
  linkActiveClass: 'nuxt-link-active',
  linkExactActiveClass: 'nuxt-link-exact-active',
  scrollBehavior,

  routes: [{
      path: "/about",
      component: _294b53a0,
      name: "about"
    }, {
      path: "/all-news",
      component: _b545ce88,
      name: "all-news"
    }, {
      path: "/articles",
      component: _61f64c7a,
      name: "articles"
    }, {
      path: "/article/:id?/:title?",
      component: _5ed84acc,
      name: "article-id-title"
    }, {
      path: "/category/:id?/:title?",
      component: _c166da30,
      name: "category-id-title"
    }, {
      path: "/",
      component: _49032e65,
      name: "index"
    }],

  fallback: false
}

export function createRouter() {
  return new Router(routerOptions)
}
