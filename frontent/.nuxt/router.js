import Vue from 'vue'
import Router from 'vue-router'
import { interopDefault } from './utils'
import scrollBehavior from './router.scrollBehavior.js'

const _b496b966 = () => interopDefault(import('..\\pages\\articles.vue' /* webpackChunkName: "pages_articles" */))
const _2c176c94 = () => interopDefault(import('..\\pages\\article\\_id.vue' /* webpackChunkName: "pages_article__id" */))
const _0fd18072 = () => interopDefault(import('..\\pages\\index.vue' /* webpackChunkName: "pages_index" */))
const _5ea47965 = () => interopDefault(import('..\\pages\\_category\\index.vue' /* webpackChunkName: "pages__category_index" */))

Vue.use(Router)

export const routerOptions = {
  mode: 'history',
  base: decodeURI('/'),
  linkActiveClass: 'nuxt-link-active',
  linkExactActiveClass: 'nuxt-link-exact-active',
  scrollBehavior,

  routes: [{
      path: "/articles",
      component: _b496b966,
      name: "articles"
    }, {
      path: "/article/:id?",
      component: _2c176c94,
      name: "article-id"
    }, {
      path: "/",
      component: _0fd18072,
      name: "index"
    }, {
      path: "/:category",
      component: _5ea47965,
      name: "category"
    }],

  fallback: false
}

export function createRouter() {
  return new Router(routerOptions)
}
