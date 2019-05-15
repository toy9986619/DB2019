<template>
  <div class="container">
    <div v-for="(item, index) in team" :key="item.name" class="team">
      <p>第 {{index+1}} 小隊</p>
      <p class="team-title">{{item.name}}</p>
      <table class="table table-sm table-bordered">
        <thead>
          <tr>
            <th scope="col"></th>
            <th scope="col">姓名</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="member in item.member" :key="member.name">
            <th scope="row">{{getMemberType(member.type)}}</th>
            <td>{{member.name}}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      team: {}
    };
  },

  methods: {
    getTeam() {
      axios
        .get("/api/team")
        .then(res => {
          this.team = res.data;
        })
        .catch(err => {
          console.log(err);
        });
    },

    getMemberType(type) {
      return type === 'worker' ? '隊輔' : '隊員';
    }
  },

  mounted() {
    this.getTeam();
  }
};
</script>

<style lang="scss" scoped>
.container {
  display: flex;
}

.team {
  width: 15%;
  margin: 10px;

  .team-title {
    margin: 10px;
  }
}
</style>
