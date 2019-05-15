<template>
  <div class="container">
    <div class="menu">
      <span>負責任務</span>
      <div class="border border-primary">
        <ul class="item">
          <li
            v-for="(quest, index) in questList"
            :key="quest.name"
            :class="{ active: selectedQuestIndex === index}"
            @click="handleQuestClick(index)"
          >{{quest.name}}</li>
        </ul>
      </div>
    </div>

    <div class="info border border-primary">
      <div v-if=" selectedQuestIndex >= 0 ">
        <span>選擇隊伍:</span>
        <select v-model="selectedTeamIndex">
          <option v-for="(team, index) in teamList" :key="team.name" :value="index">第 {{team.id}} 小隊</option>
        </select>

        <div>
          <div>{{reviewResult}}</div>
          <div v-if="reviewResult === '未通過'">
            <button @click="sendComplete()">通關</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      npc_id: 0,
      questList: [],
      selectedQuestIndex: -1,
      teamList: [],
      selectedTeamIndex: -1,
      reviewResult: ""
    };
  },

  computed: {
    user_id() {
      return this.$store.state.user.id;
    },

    teamLength() {
      return this.teamList.length;
    }
  },

  watch: {
    user_id(value) {
      this.getNpcId(value);
    },

    selectedQuestIndex(value){
      this.getQuestReview();
    },

    selectedTeamIndex(value) {
      this.getQuestReview();
    }
  },

  methods: {
    getNpcId(userId) {
      axios
        .get(`/api/npc/user/${userId}`)
        .then(res => {
          this.npc_id = res.data.id;
          this.getNpcQuestList(this.npc_id);
        })
        .catch(err => {
          console.log(err);
        });
    },

    getNpcQuestList(npcId) {
      axios
        .get(`/api/quest/npc/${npcId}`)
        .then(res => {
          this.questList = res.data;
        })
        .catch(err => {
          console.log(err);
        });
    },

    getTeamList(){
      axios
        .get('/api/team/list')
        .then(res => {
          this.teamList = res.data;
        })
        .catch(err => {
          console.log(err);
        })
    },

    handleQuestClick(index) {
      this.selectedQuestIndex = index;
      this.selectedTeamIndex = 0;
    },

    getQuestReview() {
      const findIndex = this.questList[this.selectedQuestIndex].quest_log.findIndex(element => element.team_id === this.selectedTeamIndex +1 );

      if(findIndex >= 0)
        this.reviewResult = "已通過";
      else
        this.reviewResult = "未通過";
    },

    sendComplete() {
      axios.post('/api/quest/review', {
        'team_id': this.teamList[this.selectedTeamIndex].id,
        'quest_id': this.questList[this.selectedQuestIndex].id
      })
      .then(res => {
        const statusCode = res.data.status;

        if(statusCode === 200)
          this.reviewResult = "已通過";

        this.getNpcQuestList(this.npc_id);
      })
    }
  },

  mounted() {
    const user_id = this.$store.state.user.id;

    if (user_id) this.getNpcId(user_id);
    this.getTeamList();
    // this.getQuestReview(this.selectedTeamIndex);
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
