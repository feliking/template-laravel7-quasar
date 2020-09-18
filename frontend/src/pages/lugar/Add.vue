<template>
  <q-dialog v-model="dialog" persistent>
    <q-card style="width: 300px">
      <q-form @submit="save()" ref="form">
        <q-toolbar class="glossy bg-primary text-white">

          <q-toolbar-title><span class="text-weight-bold">Nuevo</span></q-toolbar-title>

          <q-btn flat round dense icon="close" v-close-popup />
        </q-toolbar>

        <q-card-section class="q-gutter-sm">
          <div class="row">
            <div class="col-12">
              <q-input
                v-model="form.nombre"
                label="Nombre"
                :rules="[v => !!v || 'Este campo es requerido']"
              />
            </div>
          </div>
        </q-card-section>

        <q-card-actions class="flex flex-center">
          <q-btn
            color="negative"
            @click="close()"
          >
            Cancelar
          </q-btn>
          <q-btn
            color="positive"
            @click="save()"
            :loading="loading"
          >
            Guardar
          </q-btn>
        </q-card-actions>
      </q-form>
    </q-card>
  </q-dialog>
</template>

<script>
export default {
  name: 'Add',
  data () {
    return {
      dialog: false,
      form: {},
      loading: false
    }
  },
  mounted () {
    this.$root.$on('openDialogAdd', () => {
      this.dialog = true
    })
  },
  methods: {
    close () {
      this.dialog = false
      this.$refs.form.resetValidation()
      this.form = {}
      this.$root.$emit('closeDialog')
    },
    async save () {
      this.loading = true
      try {
        await this.$axios.post('lugar', this.form)
        this.$q.notify({
          message: 'Guardado correctamente',
          color: 'positive',
          icon: 'check',
          position: 'bottom-right'
        })
      } catch (e) {
        console.log(e)
      }
      this.loading = false
      this.close()
    }
  }
}
</script>
