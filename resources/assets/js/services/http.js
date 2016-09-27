import $ from 'jquery'
export default {

  request (method, url, data, succCb = null, errorCb = null) {

    // NProgress.start()

    return $.ajax({
      data,
      dataType: 'json',
      url: '/api/' + url,
      method: method.toUpperCase(),
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    }).done(succCb).fail(errorCb)
  },

  get (url, data, succ = null, error = null) {
    return this.request('get', url, data, succ, error)
  },

  post (url, data, succ = null, error = null) {
    return this.request('post', url, data, succ, error)
  },

  put (url, data, succ = null, error = null) {
    return this.request('put', url, data, succ, error)
  },

  delete (url, data, succ = null, error = null) {
    return this.request('delete', url, data, succ, error)
  },

  init () {
    $(document).ajaxComplete((e, r, settings) => {
      // NProgress.done()

      if (r.status !== 200) {
        console.log(r)
        // Notify.error('Error ' + r.status + ' : ' + r.statusText)
      }

      if (r.status === 400 || r.status === 401 || r.status === 403) {
        window.location.href = '/signin'
        // Storage.remove('auth')
        // vm.$dispatch('unauthorized')
      }

      if (r.status === 404) {
        // window.location.href = '#!/errors/notfound'
      }

    })
  }

}
