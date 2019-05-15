<template>
  <div class="container">
    <div class="menu">
      <span>持有物品清單</span>
      <div class="border border-primary">
        <ul class="item">
          <li
            v-for="(item) in itemList"
            :key="item.item.name"
            :class="{ active: selectedItem.name === item.item.name}"
            @click="getItemInfo(item.item_id)"
          >{{item.item.name}}</li>
        </ul>
      </div>
    </div>

    <div class="info border border-primary">
      <div v-if="selectedItem">
        <span>物品名稱:{{selectedItem.name}}</span>
        <section>物品敘述:{{selectedItem.description}}</section>
      </div>
    </div>
  </div>
</template>

<script>
// TODO: 將物品清單重構

export default {
  data() {
    return {
      itemList: [],
      selectedItem: ""
    };
  },

  methods: {
    getItemList(team_id) {
      axios
        .get("/api/item/item-list", {
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
    },

    getItemInfo(itemId) {
      axios
        .get(`/api/item/info/${itemId}`)
        .then(res => {
          this.selectedItem = res.data;
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
      this.getItemList(value);
    }
  },

  mounted() {
    const team_id = this.$store.state.user.team_id;
    this.getItemList(team_id);
  }
};
</script>

<style lang="scss" scoped>
.menu {
  width: 30%;
  height: 100%;
}

.info {
  width: 65%;
  height: 100%;
  margin-left: auto;
}

.container {
  display: flex;
  height: 400px;
}

.item {
  .active {
    color: #fff;
    background-color: #3097d1;
  }
}
</style>
