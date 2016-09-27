import { $ } from '../../bootstrap'
import Markdown from 'marked'
import Slugify from 'slugify'

export default {

  ready () {
    $('body').addClass('editor')
  },

  destroyed () {
    $('body').removeClass('editor')
  },

  methods: {
    settings () {
      this.control === false ? this.control = true : this.control = false
      if (this.control === true) {
        $('body').addClass('settings-menu-expanded')
        $('.gh-viewport').addClass('settings-menu-expanded')
      } else {
        $('body').removeClass('settings-menu-expanded')
        $('.gh-viewport').removeClass('settings-menu-expanded')
      }
    }
  },

  watch: {
    'form.title' (val, oldVal) {
      this.form.slug = Slugify(val.toLowerCase())
    }
  },

  filters: {
    marked: Markdown
  }
}
