import Template from './template.jade'
import Markdown from 'marked'
import Http from '../../../services/http'

export let name = 'post-list'
export default {
  name,
  template: Template(),

  data () {
    return {
      posts: [],
      post: null
    }
  },

  route: {
    data (transition) {
      let request = [ Http.get('posts') ]

      return Promise.all(request).then((succCb) => {
        return {
          posts: succCb[0].data
        }
      })
    }
  },

  methods: {
    show (index) {
      this.post = this.posts[index]
    }
  },

  filters: {
    marked: Markdown
  }
}
