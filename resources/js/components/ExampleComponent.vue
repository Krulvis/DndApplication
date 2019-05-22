<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card card-default">
          <div class="card-header">{{ post }}</div>

          <div class="card-body">
            <h1>Current Player</h1>
            <p>I have {{ }} money</p>
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
      post: "test"
    };
  },
  mounted() {
    console.log("Component mounted.");
  }
};
</script>
