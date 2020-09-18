<template>
  <q-layout view="hHh Lpr lff">
    <q-header elevated>
      <q-toolbar>
        <q-btn
          flat
          dense
          round
          icon="menu"
          aria-label="Menu"
          @click="switchDrawer()"
        />

        <q-toolbar-title>
          {{ title }}
        </q-toolbar-title>

      </q-toolbar>
    </q-header>

    <AppNav />
    <q-page-container>
      <transition
        appear
        enter-active-class="animated fadeIn"
        leave-active-class="animated fadeOut"
      >
        <router-view />
      </transition>
    </q-page-container>
  </q-layout>
</template>

<script>
import AppNav from '../components/main/AppNav'
import { env } from '../env'

export default {
  name: 'MainLayout',
  components: {
    AppNav
  },
  data () {
    return {
      title: ''
    }
  },
  methods: {
    switchDrawer () {
      this.$root.$emit('switchDrawer')
    }
  },
  mounted () {
    this.title = env.APP_NAME
  }
}
</script>
