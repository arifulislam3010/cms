import Vue from 'vue'
import Router from 'vue-router'
import { interopDefault } from './utils'
import scrollBehavior from './router.scrollBehavior.js'

const _7c51b65c = () => interopDefault(import('..\\pages\\about.vue' /* webpackChunkName: "pages_about" */))
const _5978ec80 = () => interopDefault(import('..\\pages\\all-news.vue' /* webpackChunkName: "pages_all-news" */))
const _1612203e = () => interopDefault(import('..\\pages\\articles.vue' /* webpackChunkName: "pages_articles" */))
const _6247af44 = () => interopDefault(import('..\\pages\\article\\_id\\_title.vue' /* webpackChunkName: "pages_article__id__title" */))
const _6a0dfda4 = () => interopDefault(import('..\\pages\\category\\_id\\_title.vue' /* webpackChunkName: "pages_category__id__title" */))
const _c7ecddbe = () => interopDefault(import('..\\pages\\index.vue' /* webpackChunkName: "pages_index" */))

Vue.use(Router)

export const routerOptions = {
  mode: 'history',
  base: decodeURI('/'),
  linkActiveClass: 'nuxt-link-active',
  linkExactActiveClass: 'nuxt-link-exact-active',
  scrollBehavior,

  routes: [{
    path: "/about",
    component: _7c51b65c,
    name: "about"
  }, {
    path: "/all-news",
    component: _5978ec80,
    name: "all-news"
  }, {
    path: "/articles",
    component: _1612203e,
    name: "articles"
  }, {
    path: "/article/:id?/:title?",
    component: _6247af44,
    name: "article-id-title"
  }, {
    path: "/category/:id?/:title?",
    component: _6a0dfda4,
    name: "category-id-title"
  }, {
    path: "/",
    component: _c7ecddbe,
    name: "index"
  }],

  fallback: false
}

export function createRouter () {
  return new Router(routerOptions)
}
