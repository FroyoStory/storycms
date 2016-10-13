import template from './template.jade'
import SimpleMDE from 'simplemde'

export default {
  template: template(),

  data () {
    return {
      htmlResult: 'Test'
    }
  },

  ready () {
    this.editor = new SimpleMDE({
      element: document.querySelector('.simplemde'),
      forceSync: true
    })
  },

  computed: {
    compiledMarkdown: function () {
      return this.htmlResult
    }
  },

  methods: {
    updateEditor: function (e) {
      this.htmlResult = e.target.value
    }
  }
}
