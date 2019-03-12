<template>
  <div>
    <v-toolbar :clipped-left="primaryDrawer.clipped" app absolute>
      <v-toolbar-side-icon
        v-if="primaryDrawer.type !== 'permanent'"
        @click.stop="primaryDrawer.model = !primaryDrawer.model"
      ></v-toolbar-side-icon>
      <v-toolbar-title>Vuetify</v-toolbar-title>
    </v-toolbar>    
  </div>
</template>

<script>
export default {
  
}
</script>
