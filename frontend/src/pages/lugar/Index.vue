<template>
  <q-page padding>
    <q-table
      title="Lugares"
      :data="table"
      :columns="columns"
      row-key="id"
      :pagination.sync="pagination"
      :loading="loading"
      :filter="filter"
    >
    <template v-slot:top-right>
      <q-input borderless dense debounce="300" v-model="filter" placeholder="Search">
        <template v-slot:append>
          <q-icon name="search" />
        </template>
      </q-input>
    </template>
      <template v-slot:pagination="scope">
        <q-btn
          v-if="scope.pagesNumber > 2"
          icon="first_page"
          color="grey-8"
          round
          dense
          flat
          :disable="scope.isFirstPage"
          @click="firstPage()"
        />

        <q-btn
          icon="chevron_left"
          color="grey-8"
          round
          dense
          flat
          :disable="scope.isFirstPage"
          @click="prevPage()"
        />

        <q-btn
          icon="chevron_right"
          color="grey-8"
          round
          dense
          flat
          :disable="scope.isLastPage"
          @click="nextPage()"
        />

        <q-btn
          v-if="pagesNumber > 2"
          icon="last_page"
          color="grey-8"
          round
          dense
          flat
          :disable="scope.isLastPage"
          @click="lastPage()"
        />
      </template>
    </q-table>
  </q-page>
</template>

<script>
export default {
  data () {
    return {
      pagination: {
        sort: 'desc',
        desending: false,
        page: 1,
        rowsPerPage: 10,
        rowsNumber: 100
      },
      serverResponse: {
        current_page: 0,
        data: [],
        first_page_url: '',
        from: 11,
        last_page: 10,
        last_page_url: '',
        next_page_url: '',
        path: '',
        per_page: 10,
        prev_page_url: '',
        to: 20,
        total: 100
      },
      columns: [
        {
          name: 'nombre',
          required: true,
          label: 'Nombre',
          align: 'center',
          field: row => row.nombre,
          format: val => `${val}`
        }
      ],
      table: [],
      loading: false,
      filter: ''
    }
  },

  computed: {
    pagesNumber () {
      return Math.ceil(this.serverResponse.total / this.serverResponse.per_page)
    }
  },
  mounted () {
    this.getTable()
  },
  methods: {
    async getTable () {
      this.loading = true
      const res = await this.$axios.get('lugar')
      this.serverResponse = res.data
      this.table = this.serverResponse.data
      this.pagination = {
        page: this.serverResponse.current_page,
        rowsPerPage: this.serverResponse.per_page,
        rowsNumber: this.serverResponse.total
      }
      this.loading = false
    },
    async nextPage () {
      this.loading = true
      const res = await this.$axios.get(this.serverResponse.next_page_url)
      this.serverResponse = res.data
      this.table = this.serverResponse.data
      this.pagination = {
        page: this.serverResponse.current_page,
        rowsPerPage: this.serverResponse.per_page,
        rowsNumber: this.serverResponse.total
      }
      this.loading = false
    },
    async prevPage () {
      this.loading = true
      const res = await this.$axios.get(this.serverResponse.prev_page_url)
      this.serverResponse = res.data
      this.table = this.serverResponse.data
      this.pagination = {
        page: this.serverResponse.current_page,
        rowsPerPage: this.serverResponse.per_page,
        rowsNumber: this.serverResponse.total
      }
      this.loading = false
    },
    async firstPage () {
      this.loading = true
      const res = await this.$axios.get(this.serverResponse.first_page_url)
      this.serverResponse = res.data
      this.table = this.serverResponse.data
      this.pagination = {
        page: this.serverResponse.current_page,
        rowsPerPage: this.serverResponse.per_page,
        rowsNumber: this.serverResponse.total
      }
      this.loading = false
    },
    async lastPage () {
      this.loading = true
      const res = await this.$axios.get(this.serverResponse.last_page_url)
      this.serverResponse = res.data
      this.table = this.serverResponse.data
      this.pagination = {
        page: this.serverResponse.current_page,
        rowsPerPage: this.serverResponse.per_page,
        rowsNumber: this.serverResponse.total
      }
      this.loading = false
    }
  }
}
</script>
