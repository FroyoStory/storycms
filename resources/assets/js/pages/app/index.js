import Http from '../../services/http'
import Template from './template.jade'
export let name = 'App'

export default {
  name,
  template: Template(),

  ready () {
    Http.init()
  }
}
