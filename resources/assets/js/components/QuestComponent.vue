<template>
  <div class="container">
    <div class="menu">
      <div>
        <ul class="list-group">
          <li
            v-for="(item) in menu"
            class="list-group-item"
            :class="{ active: activeIndex === item}"
            :key="item"
            @click="showList(item)"
          >{{item}}</li>
        </ul>
      </div>

      <div class="quest-container border border-primary">
        <ul v-if="activeIndex === '已完成'" class="item">
          <li
            v-for="item in completedQuest"
            :key="item.quest.name"
            :class="{ active: selectedQuest.name === item.quest.name }"
            @click="getQuestInfo(item.quest.id)"
          >{{item.quest.name}}</li>
        </ul>

        <ul v-else class="item">
          <li
            v-for="item in notCompleteQuest"
            :key="item.name"
            :class="{ active: selectedQuest.name === item.name }"
            @click="getQuestInfo(item.id)"
          >{{item.name}}</li>
        </ul>
      </div>
    </div>

    <div class="info border border-primary">
      <div v-if="selectedQuest">
        <span>任務名稱:{{selectedQuest.name}}</span>
        <section>任務敘述:{{selectedQuest.description}}</section>
        <section>負責人:{{selectedQuest.npc.name}}</section>
      </div>
    </div>
  </div>
</template>

<script>
// TODO: 將任務清單重構

export default {
  data() {
    return {
      menu: ["未完成", "已完成"],
      activeIndex: "未完成",
      allQuest: [],
      completedQuest: [],
      selectedQuest: ""
    };
  },

  methods: {
    showList(index) {
      this.activeIndex = index;
    },

    getAllQuest() {
      axios
        .get("/api/quest")
        .then(res => {
          this.allQuest = res.data;
        })
        .catch(err => {
          console.log(err);
        });
    },

    getCompletedQuestList(team_id) {
      axios
        .get("/api/quest/completed-quest", {
          params: {
            team_id: team_id
          }
        })
        .then(res => {
          this.completedQuest = res.data;
        })
        .catch(err => {
          console.log(err);
        });
    },

    getQuestInfo(questId) {
      axios
        .get(`/api/quest/info/${questId}`)
        .then(res => {
          this.selectedQuest = res.data;
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
