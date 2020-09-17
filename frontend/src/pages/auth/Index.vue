<template>
  <q-page padding class="flex flex-center">
    <q-card style="min-width: 500px">
      <q-form @submit="submit()">
        <q-toolbar class="bg-primary glossy text-white">
          <q-toolbar-title>Login</q-toolbar-title>
        </q-toolbar>
        <q-card-section class="q-gutter-sm">
          <q-input
            v-model="form.email"
            label="Correo Electrónico"
            :rules="[rules.required('email')]"
            @input="clearErrors('email')">
            <template v-slot:prepend>
              <q-icon name="people" />
            </template>
          </q-input>
          <q-input
            v-model="form.password"
            :type="isPwd ? 'password' : 'text'"
            label="Contraseña"
            :rules="[rules.required('password')]"
            @input="clearErrors('password')">
            <template v-slot:append>
              <q-icon
                :name="isPwd ? 'visibility_off' : 'visibility'"
                class="cursor-pointer"
                @click="isPwd = !isPwd"
              />
            </template>
            <template v-slot:prepend>
              <q-icon name="lock" />
            </template>
          </q-input>
        </q-card-section>
        <q-card-actions>
          <q-btn
            color="primary"
            class="full-width glossy"
            rounded
            type="submit"
            :loading="loading">
            Ingresar
          </q-btn>
        </q-card-actions>
      </q-form>
    </q-card>
  </q-page>
</template>

<script>
import Form from '../../mixins/form'

export default {
  name: 'Index',
  mixins: [Form],
  data () {
    return {
      form: {
        email: null,
        password: null
      },
      isPwd: true
    }
  },
  created () {
    this.form.email = this.$route.query.email || null
  },
  methods: {
    submit () {
      this.loading = true
      this.$axios.post('login', this.form)
        .then(res => {
          this.$store.dispatch('auth/saveToken', res.data)
          this.$store.dispatch('auth/setUser', res.data)
          this.$router.push({ name: 'index' })
          this.$q.notify({
            message: 'Bienvenido',
            color: 'positive',
            icon: 'check',
            position: 'bottom-right'
          })
        })
        .catch(err => {
          console.log(err)
        })
        .then(() => {
          this.loading = false
        })
    }
  }
}
</script>
