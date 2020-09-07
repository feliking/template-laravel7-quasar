import Vue from 'vue'
import Vuetify, { VSnackbar, VBtn, VIcon } from 'vuetify/lib'
import VuetifyToast from 'vuetify-toast-snackbar'
import colors from 'vuetify/lib/util/colors'

Vue.use(Vuetify, {
  components: {
    VSnackbar,
    VBtn,
    VIcon
  },
})
// Vue.use(VuetifyToast)

// export default new Vuetify({
//   theme:{
//     themes: {
//       light: {
//         primary: colors.red.darken4,
//       },
//     },
//   }
// })

const opts = {
  theme:{
    light: true
  }
}; 

const vueObj = new Vuetify(opts);

export default vueObj;

Vue.use(VuetifyToast, { $vuetify: vueObj.framework });