<template>
  <div class="container">
    <p class="count">
      <span>￥</span>
      <ICountUp :delay="delay" :endVal="endVal" :options="options" @ready="onReady" />
    </p>
  </div>
</template>

<script>
import ICountUp from "vue-countup-v2";
export default {
  name: "index",
  components: {
    ICountUp
  },
  data() {
    return {
      delay: 1000,
      endVal: parseInt(document.getElementById("property").value),
      options: {
        useEasing: true,
        useGrouping: true,
        separator: ",",
        decimal: ".",
        prefix: "",
        suffix: ""
      }
    };
  },
  methods: {
    onReady: function(instance, CountUp) {
      const that = this;
      instance.update(that.endVal + 100);
    }
  }
};
</script>

<style>
@import url("https://fonts.googleapis.com/css?family=Fredoka+One|Open+Sans:300");

body {
  margin: 0;
  padding: 0;
}

.container {
  width: 100vw;
  min-height: 100vh;
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-pack: center;
  -ms-flex-pack: center;
  justify-content: center;
  -webkit-box-align: center;
  -ms-flex-align: center;
  align-items: center;
  background-color: bisque;
}

.count {
  text-align: center;
  font-size: 64px;
  font-family: "Fredoka One", cursive;
}
</style>
