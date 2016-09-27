import Http from '../../../services/http'
import Template from './template.jade'
import Mixins from '../mixins'
export let name = 'post-edit'

let model = {
  title: '',
  slug: '',
  markdown: '',
  html: '',
  is_featured: '',
  is_page: '',
  status: '',
  visibility: '',
  meta_title: '',
  meta_description: '',
  author_id: '',
  published_at: ''
}

export default {
  name,
  template: Template(),

  data () {
    return {
      control: false,
      errors: Object.assign({}, model),
      form: Object.assign({}, model)
    }
  },

  route: {
    data (transition) {
      let id = transition.to.params.id
      let request = [ Http.get('posts/' + id) ]

      return Promise.all(request).then(succCb => {
        return {
          form: succCb[0].data
        }
      }, errCb => {

      })
    }
  },

  methods: {
    save (status) {
      let vm = this
      vm.form.status = status
      Http.put('posts/' + vm.form.id, vm.form).then(succCb => {

      }, errCb => {

      })
    },
    delete () {

    }
  },

  mixins: [ Mixins ]
}
