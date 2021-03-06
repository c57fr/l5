<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Test vue.js</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>

<body>

<div class="container" id="tuto">
  <br>

  <div class="panel panel-primary">
    <div class="panel-heading">Personnes actives</div>
    <table class="table table-bordered table-striped">
      <thead>
      <tr>
        <th class="col-sm-4">Nom</th>
        <th class="col-sm-4">Prénom</th>
        <th class="col-sm-2"></th>
        <th class="col-sm-2"></th>
      </tr>
      </thead>
      <tbody>
      <tr v-for="(personne, index) in personnes">
        <td>{{ personne.nom }}</td>
        <td>{{ personne.prenom }}</td>
        <td>
          <button class="btn btn-info btn-block" @click="modifier(index)">Modifier</button>
        </td>
        <td>
          <button class="btn btn-warning btn-block" @click="supprimer(index)">Poubelle</button>
        </td>
      </tr>
      <tr>
        <td><input type="text" class="form-control" v-model="inputNom" ref="modif" placeholder="Nom"></td>
        <td><input type="text" class="form-control" v-model="inputPrenom" placeholder="Prénom"></td>
        <td colspan="2">
          <button class="btn btn-primary btn-block" @click="ajouter()">Ajouter</button>
        </td>
      </tr>
      </tbody>
    </table>
    <div class="panel-footer">
      &nbsp
      <button class="button btn btn-xs btn-warning" @click="toutPoubelle">Tout à la poubelle</button>
    </div>
  </div>

  <div class="panel panel-danger" v-show="poubelle.length">
    <div class="panel-heading">Poubelle</div>
    <table class="table table-bordered table-striped">
      <thead>
      <tr>
        <th class="col-sm-4">Nom</th>
        <th class="col-sm-4">Prénom</th>
        <th class="col-sm-2"></th>
        <th class="col-sm-2"></th>
      </tr>
      </thead>
      <tbody>
      <tr v-for="(personne, index) in poubelle">
        <td>{{ personne.nom }}</td>
        <td>{{ personne.prenom }}</td>
        <td>
          <button class="btn btn-success btn-block" v-on:click="retablir(index)">Rétablir</button>
        </td>
        <td>
          <button class="btn btn-danger btn-block" v-on:click="eliminer(index)">Supprimer</button>
        </td>
      </tr>
      </tbody>
    </table>
    <div class="panel-footer">
      &nbsp
      <div class="btn-group">
        <button class="button btn btn-xs btn-success" v-on:click="toutRetablir">Tout rétablir</button>
        <button class="button btn btn-xs btn-danger" v-on:click="toutEliminer">Tout supprimer</button>
      </div>
    </div>
  </div>

</div>

<script src="https://unpkg.com/vue@2.0.3/dist/vue.js"></script>

<script>

  new Vue({
    el: '#tuto',
    data: {
      personnes: [
        {nom: "Claret", prenom: "Marcel"},
        {nom: "Dupont", prenom: "Albert"},
        {nom: "Durand", prenom: "Jacques"},
        {nom: "Martin", prenom: "Denis"},
        {nom: "Torlet", prenom: "Arthur"}
      ],
      poubelle: [],
      inputNom: '',
      inputPrenom: ''
    },
    methods: {
      supprimer: function (index) {
        this.poubelle.push(this.personnes[index]);
        this.personnes.splice(index, 1);
        this.poubelle.sort(ordonner);
      },
      retablir: function (index) {
        this.personnes.push(this.poubelle[index]);
        this.poubelle.splice(index, 1);
        this.personnes.sort(ordonner);
      },
      eliminer: function (index) {
        this.poubelle.splice(index, 1);
      },
      toutPoubelle: function () {
        this.poubelle = this.poubelle.concat(this.personnes);
        this.poubelle.sort(ordonner);
        this.personnes = [];
      },
      toutRetablir: function () {
        this.personnes = this.personnes.concat(this.poubelle);
        this.personnes.sort(ordonner);
        this.poubelle = [];
      },
      toutEliminer: function () {
        this.poubelle = [];
      },
      ajouter: function () {
        this.personnes.push({nom: this.inputNom, prenom: this.inputPrenom});
        this.inputNom = this.inputPrenom = '';
        this.personnes.sort(ordonner);
      },
      modifier: function (index) {
        this.inputNom = this.personnes[index].nom;
        this.inputPrenom = this.personnes[index].prenom;
        this.personnes.splice(index, 1);
        this.$refs.modif.focus();
      }
    }
  });

  var ordonner = function (a, b) {
    return (a.nom.toUpperCase() > b.nom.toUpperCase())
  };

</script>

</body>

</html>