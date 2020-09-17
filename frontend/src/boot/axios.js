import axios from 'axios'
import { env } from '../env'
import { Notify } from 'quasar'
export default ({ app, router, store, Vue }) => {
  axios.defaults.baseURL = env.API_URL

  axios.interceptors.request.use(config => {
    config.headers['X-Requested-With'] = 'XMLHttpRequest'

    const token = store.getters['auth/token']
    if (token) {
      config.headers.Authorization = 'Bearer ' + token
    }
    return config
  }, error => {
    return Promise.reject(error)
  })

  axios.interceptors.response.use(response => {
    return response
  }, async error => {
    if (store.getters['auth/token']) {
      // TODO: Find more reliable way to determine when Token state
      if (error.response.status === 401 && error.response.data.message === 'Token has expired') {
        const { data } = await axios.post('login/refresh')
        store.dispatch('auth/saveToken', data)
        return axios.request(error.config)
      }
      if (error.response.status === 401 ||
        (error.response.status === 500 && (
          error.response.data.message === 'Token has expired and can no longer be refreshed' ||
          error.response.data.message === 'The token has been blacklisted'
        ))
      ) {
        store.dispatch('auth/destroy')
        router.push({ name: 'login' })
      }
    }
    error.response.data.message !== undefined && Notify.create({ color: 'negative', message: 'Something went wrong.', position: 'bottom-right' })
    error.response.data.error !== undefined && Notify.create({ color: 'negative', message: 'Something went wrong.', position: 'bottom-right' })
    return Promise.reject(error)
  })
  Vue.prototype.$axios = axios
}
