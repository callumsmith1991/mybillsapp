<template>
  <div>
    <h2>Are you sure you want to delete {{bill.title}}?</h2>
    <form @submit.prevent="deleteBill">
      <div class="form-group">
        <button type="submit" class="btn btn-primary">Yes</button>
      </div>
    </form>
  </div>
</template>

<script>
var test = document.getElementById("api_token");
test = test.getAttribute("data-api");

export default {
  data() {
    return {
      bill: {},
      loading: true,
      apiKey: ""
    };
  },
  created() {
    this.apiKey = test;

    this.axios
      .get(
        "http://127.0.0.1:8000/api/delete/" +
          this.$route.params.id +
          "?api_token=" +
          this.apiKey +
          ""
      )
      .then(response => {
        this.bill = response.data;
        this.loading = false;
        console.log(response.data);
      });
  },
  methods: {
    deleteBill() {
      this.axios
        .delete(
          "http://127.0.0.1:8000/api/delete/"+this.$route.params.id+"?api_token=" + this.apiKey + "",
          this.bill
        )
        .then(
          response => (
            this.$router.push({ name: "home" }), console.log(response.data)
          )
        )
        .catch(error => console.log(error))
        .finally(() => (this.loading = false));
    }
  }
};
</script>