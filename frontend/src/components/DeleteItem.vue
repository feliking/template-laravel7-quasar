<template>
  <q-dialog v-model="dialog">
    <q-card>
      <q-card-section>
          <div class="text-h6">Eliminar</div>
        </q-card-section>
      <q-card-section>
        ¿Está seguro de eliminar el registro?
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
          @click="deleteItem()"
        >
          Eliminar
        </q-btn>
      </q-card-actions>
    </q-card>
  </q-dialog>
</template>

<script>
export default {
  name: 'Delete',
  data () {
    return {
      dialog: false,
      ctx: {
        url: ''
      }
    }
  },
  mounted () {
    this.$root.$on('deleteDialog', params => {
      this.dialog = true
      this.ctx = JSON.parse(params)
    })
  },
  methods: {
    close () {
      this.dialog = false
      this.ctx = {}
      this.$root.$emit('closeDialog')
    },
    async deleteItem () {
      try {
        await this.$axios.delete(this.ctx.url)
        this.$q.notify({
          message: 'Registro eliminado',
          color: 'positive',
          position: 'bottom-right'
        })
        this.close()
      } catch (error) {
        console.log(error)
      }
    }
  }
}
</script>
