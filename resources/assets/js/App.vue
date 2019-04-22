<template>
  <div id="app">
    <navbar />
    <div id="container">
      <router-view></router-view>
    </div>
  </div>
</template>

<script>
import NavBar from './layouts/NavBar.vue';

export default {
  components: {
    'navbar': NavBar, 
  }
}
</script>
