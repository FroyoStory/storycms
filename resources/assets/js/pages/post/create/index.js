import Http from '../../../services/http'
import Template from './template.jade'
import Mixins from '../mixins'
export let name = 'post-create'

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

  methods: {
    init () {
      this.form.is_featured = false
      this.form.is_page = false
      this.form.status = 'draft'
      this.form.visibility = 'public'
    },

    save (status) {
      let vm = this
      vm.form.status = status
      Http.post('posts', vm.form).then(succCb => {

      }, errCb => {

      })
    }
  },

  mixins: [ Mixins ]
}
