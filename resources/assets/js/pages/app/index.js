import Http from '../../services/http'
import Template from './template.jade'
export let name = 'App'

import '../../../css/ghost-admin.css'
import '../../../css/ghost-vendor.css'
// import '../../../sass/app.scss'

export default {
  name,
  template: Template(),

  ready () {
    Http.init()
  }
}
