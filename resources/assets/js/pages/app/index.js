import Http from '../../services/http'
import Template from './template.jade'
export let name = 'App'

// import '../../../css/ghost-vendor.css'
import '../../../css/ghost-admin.css'
import '../../../css/bootstrap.css'
import '../../../less/admin.less'
import '../../../less/skins/skin-blue.less'
import '../../../sass/custom.sass'

export default {
  name,
  template: Template(),

  ready () {
    Http.init()
  }
}
