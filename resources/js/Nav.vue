<template>
  <div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="collapse navbar-collapse">
        <div class="navbar-nav">
          <router-link to="/all/" class="nav-item nav-link">All Bills</router-link>
          <router-link to="/monthly-income/" class="nav-item nav-link">Add Monthly Income</router-link>
          <a href="/logout/" class="nav-item nav-link" v-if="isUserLoggedIn">You are logged in as {{userInfo.name}}</a>
          <a class="nav-item nav-link" v-else>Log in here</a>
        </div>
      </div>
    </nav>
  </div>
</template>

<script>
export default {
  data() {
    return {
      isUserLoggedIn: false,
      userInfo: {}
    };
  },
  created() {
    this.axios
      .get("http://127.0.0.1:8000/ca")
      .then(response => {
        console.log(response.data);

        this.userInfo = response.data;
        this.isUserLoggedIn = true;

      }).catch(error => {

      });
  }
};
</script>