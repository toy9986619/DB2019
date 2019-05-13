export const userStore = {
  state: {
    isLogin: false,
    user: {},
  },

  login(user) {
    this.state.user = user;
    this.state.isLogin = true;
  },

  logout() {
    this.state.user = {};
    this.state.isLogin = false;
  },
};
