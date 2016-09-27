import Dropdown from './dropdown'
import Sidebar from './sidebar'

const components = {
  Dropdown,
  Sidebar,

  install (Vue) {
    Vue.component('dropdown', Dropdown)
    Vue.component('sidebar', Sidebar)
  }
}

export default components
