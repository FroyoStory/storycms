import Http from '../../services/http'
import Template from './template.jade'
export let name = 'App'

// import '../../../css/ghost-vendor.css'
// import '../../../css/ghost-admin.css'
// import '../../../sass/app.scss'
import '../../../css/bootstrap.css'
import '../../../less/admin.less'
import '../../../less/skins/skin-blue.less'

export default {
  name,
  template: Template(),

  ready () {
    Http.init()
  }
}
