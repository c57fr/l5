<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Test vue.js</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>

<body>

<div class="container">

  <div id="tuto" class="text-center">
    <h1>Vous êtes là depuis :</h1>
    <h1>
      <span class="label label-primary">{{ heures }}</span> heures
      <span class="label label-primary">{{ minutes }}</span> minutes
      <span class="label label-primary">{{ secondes }}</span> secondes
    </h1>
  </div>

</div>

<div id="tuto2">
  <a v-on:click="action">Cliquez ici !</a>
</div>

<div id="tuto3">
  <h1>
    <button class="button btn-primary" v-on:click="++n">+</button>
    {{ n }}
  </h1>
</div>

<div id="tuto4">
  <h1>
    <span class="label" v-bind:class="type" v-on:mouseover="changeType">{{type}}</span>
  </h1>
</div>

<script src="https://unpkg.com/vue@2.0.3/dist/vue.js"></script>
<script>

  var vm = new Vue({
    el: '#tuto',
    data: {
      heures: 0,
      minutes: 0,
      secondes: 0
    }
  });

  var totalSecondes = 0;

  setInterval(function () {
    var minutes = Math.floor(++totalSecondes / 60);
    vm.secondes = totalSecondes - minutes * 60;
    vm.heures = Math.floor(minutes / 60);
    vm.minutes = minutes - vm.heures * 60;
  }, 1000);

  new Vue({
    el: '#tuto2',
    methods: {
      action: function () {
        alert('On a cliqué !');
      }
    }
  });

  new Vue({
    el: '#tuto3',
    data: {n: 0}
  });

  new Vue({
    el: '#tuto4',
    data: {
      type: 'label-primary'
    },
    methods: {
      changeType: function () {
        this.type = (this.type == 'label-primary') ? 'label-success' : 'label-primary';
      }
    }
  });

</script>

</body>

</html>