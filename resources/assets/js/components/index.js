import Dropdown from './dropdown'
import Sidebar from './sidebar'
import Header from './header'

const components = {
  Dropdown,
  Sidebar,
  Header,

  install (Vue) {
    Vue.component('dropdown', Dropdown)
    Vue.component('sidebar', Sidebar)
    Vue.component('comp_header', Header)
  }
}

export default components
