<template>
  <div class="container">
    <div>
      <ul class="list-group">
        <li>testing</li>
      </ul>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      itemList: []
    };
  },

  methods: {
    getItemList(team_id) {
      axios("/api/item/item-list", {
        params: {
          team_id: team_id
        }
      })
        .then(res => {
          this.itemList = res.data;
        })
        .catch(err => {
          console.log(err);
        });
    }
  },

  computed: {
    team_id() {
      return this.$store.state.user.team_id;
    }
  },

  watch: {
    team_id(value) {
      this.getCompletedQuestList(value);
    }
  },

  mounted() {
    const team_id = this.$store.state.user.team_id;
    this.getItemList(team_id);
  }
};
</script>

<style lang="scss" scoped>
</style>
