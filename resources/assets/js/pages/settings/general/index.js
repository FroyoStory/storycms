import Template from './template.jade'
export let name = 'settings-general'

let model = {
  title: '',
  description: '',
  facebook: '',
  twitter: '',
  instagram: '',
  youtube: '',
  active_theme: ''
}

export default {
  name,
  template: Template(),

  data () {
    return {
      errors: Object.assign({}, model),
      form: Object.assign({}, model)
    }
  }
}
