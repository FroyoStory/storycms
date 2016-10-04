import Dropdown from './dropdown'
import Sidebar from './sidebar'
import Header from './header'
import Editor from './editor'

const components = {
  Dropdown,
  Sidebar,
  Header,
  Editor,

  install (Vue) {
    Vue.component('dropdown', Dropdown)
    Vue.component('sidebar', Sidebar)
    Vue.component('comp_header', Header)
    Vue.component('editor', Editor)
  }
}

export default components
