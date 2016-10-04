import { Vue, VueRouter, $ } from './bootstrap'
import app from './pages/app'
import components from './components'
import router from './router'

// Hack for jquery plugins
// ----------------------------------------
window.$ = $
window.jQuery = $
require('bootstrap-sass')
require('admin-lte')

Vue.use(VueRouter)
Vue.use(components)

const Routes = new VueRouter({
  root: '',
  linkActiveClass: 'active',
  hashbang: true,
  suppressTransitionError: true
})

Routes.map(router)

Routes.start(Vue.extend({
  components: { app }
}), document.body)
