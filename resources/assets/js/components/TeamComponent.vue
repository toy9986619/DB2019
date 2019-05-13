<template>
  <div class="container">
    <div class="team">
      <span class="team-title">第一小隊</span>
      <table class="table table-sm table-bordered">
        <thead>
          <tr>
            <th scope="col"></th>
            <th scope="col">姓名</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">隊輔</th>
            <td>王小明</td>
          </tr>
          <tr>
            <th scope="row">隊員</th>
            <td>陳美華</td>
          </tr>
        </tbody>
      </table>
    </div>

    <div class="team">
      <span class="team-title">第二小隊</span>
      <table class="table table-sm table-bordered">
        <thead>
          <tr>
            <th scope="col"></th>
            <th scope="col">姓名</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">隊輔</th>
            <td>王小明</td>
          </tr>
          <tr>
            <th scope="row">隊員</th>
            <td>陳美華</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script>
export default {
  
}
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
