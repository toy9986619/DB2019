<template>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <router-link to="/" class="navbar-brand">Laravel</router-link>
      <button
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
        <ul class="navbar-nav">
          <li class="nav-item">
            <router-link to="/team" class="nav-link">隊伍資訊</router-link>
          </li>
          <li v-if="!isLogin" class="nav-item">
            <router-link to="/login" class="nav-link">Login</router-link>
          </li>
          <!-- <li v-if="!userState.isLogin" class="nav-item">
            <router-link to="/register" class="nav-link">Register</router-link>
          </li>-->

          <li v-else class="nav-item dropdown">
            <a
              href="#"
              class="nav-link dropdown-toggle"
              id="navbarDropdownMenuLink"
              data-toggle="dropdown"
              aria-haspopup="true"
              aria-expanded="false"
            >{{userName}}</a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
              <router-link to="/quest" class="dropdown-item">任務資訊</router-link>
              <router-link to="/item" class="dropdown-item">持有物品</router-link>
              <a href="/#" class="dropdown-item" @click.stop.prevent="logout()">Logout</a>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</template>

<script>
export default {
  data() {
    return {};
  },

  computed: {
    isLogin() {
      return this.$store.state.isLogin;
    },

    userName() {
      return this.$store.state.user.name;
    }
  },

  methods: {
    checkLoginState() {
      axios
        .get("/check_login")
        .then(res => {
          const data = res.data;

          if (data) {
            this.$store.commit("login", data);
          }
        })
        .catch(err => {
          console.log(err);
        });
    },

    logout() {
      axios
        .post("/logout")
        .then(res => {
          axios.defaults.headers.common["X-CSRF-TOKEN"] = res.data.csrf;
          let token = document.head.querySelector('meta[name="csrf-token"]');
          token.content = res.data.csrf;

          this.$store.commit("logout");
          this.$router.push("/");
        })
        .catch(err => console.log(err));
    }
  },

  mounted() {
    this.checkLoginState();
  }
};
</script>


<style>
</style>