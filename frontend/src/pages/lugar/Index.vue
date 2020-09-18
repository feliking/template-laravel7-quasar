<template>
  <div class="q-pa-md">
    <Add />
    <Edit />
    <DeleteItem />
    <q-table
      title="Lugares"
      :data="table"
      :columns="columns"
      row-key="id"
      :loading="loading"
      :filter="filter"
      binary-state-sort
    >
      <template v-slot:top-right>
        <q-input class="q-mr-lg" borderless dense debounce="300" v-model="filter" placeholder="Search">
          <template v-slot:append>
            <q-icon name="search" />
          </template>
        </q-input>
        <q-space></q-space>
        <q-separator vertical />
        <q-btn
          icon="add"
          round
          class="glossy q-ml-lg"
          title="Agregar"
          color="primary"
          @click.prevent="addData()"
        >
        </q-btn>
      </template>

      <template v-slot:body-cell-opciones="props">
        <q-td :props="props">
          <q-btn
            flat
            color="primary"
            icon="edit"
            title="Editar"
            @click="editData(props.row)"
          >
          </q-btn>
          <q-btn
            flat
            color="negative"
            icon="delete"
            title="Eliminar"
            @click="deleteData(props.row)"
          >
          </q-btn>
        </q-td>
      </template>
    </q-table>
  </div>
</template>

<script>
import Add from './Add'
import Edit from './Edit'
import DeleteItem from '../../components/DeleteItem'

export default {
  name: 'Index',
  components: {
    Add,
    Edit,
    DeleteItem
  },
  data () {
    return {
      filter: '',
      loading: false,
      columns: [
        {
          name: 'nombre',
          required: true,
          label: 'Nombre',
          align: 'center',
          field: row => row.nombre,
          format: val => `${val}`
        },
        {
          name: 'opciones',
          required: true,
          label: 'Opciones',
          align: 'center'
        }
      ],
      table: []
    }
  },
  mounted () {
    this.getTable()
    this.$root.$on('closeDialog', () => {
      this.getTable()
    })
  },
  methods: {
    async getTable () {
      this.loading = true
      try {
        const res = await this.$axios.get('lugar')
        this.table = res.data
        this.loading = false
      } catch (error) {
        console.log(error)
      }
      this.loading = false
    },
    addData () {
      this.$root.$emit('openDialogAdd')
    },
    editData (item) {
      this.$root.$emit('openDialogEdit', item)
    },
    deleteData (item) {
      const data = {
        url: `lugar/${item.id}`
      }
      this.$root.$emit('deleteDialog', JSON.stringify(data))
    }
  }
}
</script>
