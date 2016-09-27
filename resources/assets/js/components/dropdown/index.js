import { $ } from '../../bootstrap'
import template from './template.jade'

export default {
  name: 'Dropdown',
  replace: true,
  template: template(),
  props: {
    text: {
      default: '<i class="options icon-arrow2"></i><span class="sr-only">Toggle Settings Menu</span>'
    }
  },

  data () {
    return {
      dropdown: false
    }
  },

  ready () {
    var mouse_is_inside = false

    $('dropdown > .dropdown-menu').hover(() => {
      mouse_is_inside = true
    }, () => {
      mouse_is_inside = false
    })

    $(document).mouseup(() => {
      if (!mouse_is_inside) {
        this.dropdown = false
      }
    })
  },

  methods: {
    click () {
      this.dropdown === false ? this.dropdown = true : this.dropdown = false
    }
  }
}
