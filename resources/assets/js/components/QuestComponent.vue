<template>
  <div class="container">
    <div>
      <ul class="list-group">
        <li
          v-for="(item) in menu"
          class="list-group-item"
          :class="{ active: activeIndex === item}"
          :key="item"
          @click="showList(item)"
        >{{item}}</li>
        <!-- <li class="list-group-item active">未完成</li>
        <li class="list-group-item">已完成</li>-->
      </ul>
    </div>
    <div class="quest-container border border-primary">
      <ul v-if="activeIndex === '已完成'">
        <li v-for="item in completedQuest" :key="item.quest.name">{{item.quest.name}}</li>
      </ul>

      <ul v-else>
        <li v-for="item in notCompleteQuest" :key="item.name">{{item.name}}</li>
      </ul>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      menu: ["未完成", "已完成"],
      activeIndex: "未完成",
      allQuest: [],
      completedQuest: []
    };
  },

  methods: {
    showList(index) {
      this.activeIndex = index;
    },

    getAllQuest() {
      axios("/api/quest")
        .then(res => {
          this.allQuest = res.data;
        })
        .catch(err => {
          console.log(err);
        });
    },

    getCompletedQuestList(team_id) {
      axios("/api/quest/completed-quest", {
        params: {
          team_id: team_id
        }
      })
        .then(res => {
          console.log(res);
          this.completedQuest = res.data;
        })
        .catch(err => {
          console.log(err);
        });
    }
  },

  computed: {
    team_id() {
      return this.$store.state.user.team_id;
    },

    notCompleteQuest() {
      let completedIdList = [];

      this.completedQuest.forEach(item => {
        completedIdList.push(item.quest.id);
      });

      const notCompleteQuestList = this.allQuest.filter(
        item => !completedIdList.includes(item.id)
      );

      return notCompleteQuestList;
    }
  },

  watch: {
    team_id(value) {
      this.getCompletedQuestList(value);
    }
  },

  mounted() {
    const team_id = this.$store.state.user.team_id;

    this.getAllQuest();

    if (team_id) {
      this.getCompletedQuestList(team_id);
    }
  }
};
</script>

<style lang="scss" scoped>
.list-group {
  flex-direction: row;
  .list-group-item {
    margin-bottom: 0px;
  }
}

.quest-container {
  z-index: 99;
}
</style>
