import Vue from 'vue'
import Router from 'vue-router'

Vue.use(Router)

const _7b6ee76c = () => import('..\\resources\\nuxt\\pages\\services.vue' /* webpackChunkName: "pages_services" */).then(m => m.default || m)
const _3ee80205 = () => import('..\\resources\\nuxt\\pages\\our-works.vue' /* webpackChunkName: "pages_our-works" */).then(m => m.default || m)
const _4f3cc4a6 = () => import('..\\resources\\nuxt\\pages\\login.vue' /* webpackChunkName: "pages_login" */).then(m => m.default || m)
const _60190c2a = () => import('..\\resources\\nuxt\\pages\\dashboard\\index.vue' /* webpackChunkName: "pages_dashboard_index" */).then(m => m.default || m)
const _21fbc05e = () => import('..\\resources\\nuxt\\pages\\about.vue' /* webpackChunkName: "pages_about" */).then(m => m.default || m)
const _397643e4 = () => import('..\\resources\\nuxt\\pages\\contact.vue' /* webpackChunkName: "pages_contact" */).then(m => m.default || m)
const _fe39bf14 = () => import('..\\resources\\nuxt\\pages\\logout.vue' /* webpackChunkName: "pages_logout" */).then(m => m.default || m)
const _45fd000f = () => import('..\\resources\\nuxt\\pages\\register.vue' /* webpackChunkName: "pages_register" */).then(m => m.default || m)
const _0eb9fa96 = () => import('..\\resources\\nuxt\\pages\\index.vue' /* webpackChunkName: "pages_index" */).then(m => m.default || m)



if (process.client) {
  window.history.scrollRestoration = 'manual'
}
const scrollBehavior = function (to, from, savedPosition) {
  // if the returned position is falsy or an empty object,
  // will retain current scroll position.
  let position = false

  // if no children detected
  if (to.matched.length < 2) {
    // scroll to the top of the page
    position = { x: 0, y: 0 }
  } else if (to.matched.some((r) => r.components.default.options.scrollToTop)) {
    // if one of the children has scrollToTop option set to true
    position = { x: 0, y: 0 }
  }

  // savedPosition is only available for popstate navigations (back button)
  if (savedPosition) {
    position = savedPosition
  }

  return new Promise(resolve => {
    // wait for the out transition to complete (if necessary)
    window.$nuxt.$once('triggerScroll', () => {
      // coords will be used if no selector is provided,
      // or if the selector didn't match any element.
      if (to.hash) {
        let hash = to.hash
        // CSS.escape() is not supported with IE and Edge.
        if (typeof window.CSS !== 'undefined' && typeof window.CSS.escape !== 'undefined') {
          hash = '#' + window.CSS.escape(hash.substr(1))
        }
        try {
          if (document.querySelector(hash)) {
            // scroll to anchor by returning the selector
            position = { selector: hash }
          }
        } catch (e) {
          console.warn('Failed to save scroll position. Please add CSS.escape() polyfill (https://github.com/mathiasbynens/CSS.escape).')
        }
      }
      resolve(position)
    })
  })
}


export function createRouter () {
  return new Router({
    mode: 'history',
    base: '/',
    linkActiveClass: 'nuxt-link-active',
    linkExactActiveClass: 'nuxt-link-exact-active',
    scrollBehavior,
    routes: [
		{
			path: "/services",
			component: _7b6ee76c,
			name: "services"
		},
		{
			path: "/our-works",
			component: _3ee80205,
			name: "our-works"
		},
		{
			path: "/login",
			component: _4f3cc4a6,
			name: "login"
		},
		{
			path: "/dashboard",
			component: _60190c2a,
			name: "dashboard"
		},
		{
			path: "/about",
			component: _21fbc05e,
			name: "about"
		},
		{
			path: "/contact",
			component: _397643e4,
			name: "contact"
		},
		{
			path: "/logout",
			component: _fe39bf14,
			name: "logout"
		},
		{
			path: "/register",
			component: _45fd000f,
			name: "register"
		},
		{
			path: "/",
			component: _0eb9fa96,
			name: "index"
		},
		{
			path: "/__laravel_nuxt__",
			component: _0eb9fa96,
			name: "__laravel_nuxt__"
		}
    ],
    
    
    fallback: false
  })
}
