import Vue from 'vue'
import Router from 'vue-router'
import { interopDefault } from './utils'
import scrollBehavior from './router.scrollBehavior.js'

const _39405ba4 = () => interopDefault(import('..\\pages\\posts\\index.vue' /* webpackChunkName: "pages_posts_index" */))
const _5ccb92f1 = () => interopDefault(import('..\\pages\\area\\_id\\_title.vue' /* webpackChunkName: "pages_area__id__title" */))
const _121235c0 = () => interopDefault(import('..\\pages\\category\\_id\\_title.vue' /* webpackChunkName: "pages_category__id__title" */))
const _3901933e = () => interopDefault(import('..\\pages\\post\\_id\\_title.vue' /* webpackChunkName: "pages_post__id__title" */))
const _11a649be = () => interopDefault(import('..\\pages\\tag\\_id\\_title.vue' /* webpackChunkName: "pages_tag__id__title" */))
const _6b48f09d = () => interopDefault(import('..\\pages\\index.vue' /* webpackChunkName: "pages_index" */))

Vue.use(Router)

export const routerOptions = {
  mode: 'history',
  base: decodeURI('/'),
  linkActiveClass: 'nuxt-link-active',
  linkExactActiveClass: 'nuxt-link-exact-active',
  scrollBehavior,

  routes: [{
    path: "/posts",
    component: _39405ba4,
    name: "posts"
  }, {
    path: "/area/:id?/:title?",
    component: _5ccb92f1,
    name: "area-id-title"
  }, {
    path: "/category/:id?/:title?",
    component: _121235c0,
    name: "category-id-title"
  }, {
    path: "/post/:id?/:title?",
    component: _3901933e,
    name: "post-id-title"
  }, {
    path: "/tag/:id?/:title?",
    component: _11a649be,
    name: "tag-id-title"
  }, {
    path: "/",
    component: _6b48f09d,
    name: "index"
  }],

  fallback: false
}

export function createRouter () {
  return new Router(routerOptions)
}
