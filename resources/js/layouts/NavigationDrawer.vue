<template>
  <div>
    <v-navigation-drawer
      v-model="primaryDrawer.model"
      :permanent="primaryDrawer.type === 'permanent'"
      :temporary="primaryDrawer.type === 'temporary'"
      :clipped="primaryDrawer.clipped"
      :floating="primaryDrawer.floating"
      :mini-variant="primaryDrawer.mini"
      absolute
      overflow
      app
    ></v-navigation-drawer>    
  </div>
</template>

<script>
export default {
  name: 'NavigationDrawer' 
}
</script>
