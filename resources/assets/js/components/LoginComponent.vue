<template>
  <div class="container">
    <div class="row justify-content-md-center mt-5">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">Login</div>
          <div class="card-body">
            <form class="form-horizontal">
              <div class="form-group row">
                <label for="email" class="col-lg-4 col-form-label text-lg-right">E-Mail Address</label>

                <div class="col-lg-6">
                  <input v-model="email" id="email" type="email" name="email" required autofocus>
                  <!-- @if ($errors->has('email'))
                  <div class="invalid-feedback">
                    <strong>{{ $errors->first('email') }}</strong>
                  </div>@endif-->
                </div>
              </div>

              <div class="form-group row">
                <label for="password" class="col-lg-4 col-form-label text-lg-right">Password</label>

                <div class="col-lg-6">
                  <input v-model="password" id="password" type="password" name="password" required>
                  <!-- @if ($errors->has('password'))
                  <div class="invalid-feedback">
                    <strong>{{ $errors->first('password') }}</strong>
                  </div>@endif-->
                </div>
              </div>

              <div class="form-group row">
                <div class="col-lg-6 offset-lg-4">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input type="checkbox" class="form-check-input" name="remember"> Remember Me
                    </label>
                  </div>
                </div>
              </div>

              <div class="form-group row">
                <div class="col-lg-8 offset-lg-4">
                  <button type="submit" class="btn btn-primary" @click.stop.prevent="submit()">Login</button>

                  <!-- <route-link to=""
                  <a
                    class="btn btn-link"
                    href="{{ route('password.request') }}"
                  >Forgot Your Password?</a>-->
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { userStore } from '../stores/userStore.js';

export default {
  data() {
    return {
      email: "",
      password: ""
    };
  },

  methods: {
    submit() {
      axios
        .post("/login", {
          email: this.email,
          password: this.password,
        })
        .then(res => {
          userStore.login(res.data.user);
          this.$router.push('/');
        })
        .catch(error => {
          if(error.code === 422){
            console.log(error.response);
          }else {
            console.log(error);
          }
        });
    }
  },
};
</script>

<style lang="sass" scoped>

</style>
