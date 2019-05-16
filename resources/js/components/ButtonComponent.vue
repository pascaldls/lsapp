<template>
  <div>
    <button class="btn btn-secondary" :type="type" v-text="text"></button>
    <p v-text="test"></p>
  </div>
</template>

<script>
export default {
  props: ["text", "type"],
  data: function() {
    return {
      test: ""
    };
  },
  mounted() {
    console.log("Component mounted.");
    axios
      .get("api/vue", {})
      .then(result => {
        console.log(result);
        this.test = result.data;
      })
      .catch(err => {});
  }
};
</script>

<style>
.my-button {
  background-color: 333;
}
</style>

