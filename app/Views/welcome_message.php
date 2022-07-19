<!DOCTYPE html>
<html>
<head>
<!-- Font Awesome -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
  rel="stylesheet"
/>
<!-- Google Fonts -->
<link
  href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
  rel="stylesheet"
/>
<!-- MDB -->
<link
  href="/css/mdb.min.css"
  rel="stylesheet"
/>
<style>
.gp {
    border: 1px solid #c9d5dd;
    margin-bottom: 10px;
    padding-top: 14px;
}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular.min.js"></script>

</head>
<body>
  <!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-3 fg-light">
  <!-- Container wrapper -->
  <div class="container-fluid">
    <!-- Toggle button -->
    <button
      class="navbar-toggler"
      type="button"
      data-mdb-toggle="collapse"
      data-mdb-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <i class="fas fa-bars"></i>
    </button>

    <!-- Collapsible wrapper -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <!-- Navbar brand -->
      <a class="navbar-brand mt-2 mt-lg-0" href="#">
        <img
          src="/icon.jpg"
          height="50"
          alt="MDB Logo"
          loading="lazy"
        />
      </a>
      <!-- Left links -->
      <ul class="navbar-nav text-center px-4 me-auto mb-2 mb-lg-0">
        <h3 style="color: white;">Seawden Compania de Seguros S.A.</h3>
      </ul>
      <!-- Left links -->
    </div>
    <!-- Collapsible wrapper -->

    <!-- Right elements -->
    <div class="d-flex align-items-center">

      <!-- Avatar -->
      <div class="dropdown">
        <a
          class="dropdown-toggle d-flex align-items-center hidden-arrow"
          href="#"
          id="navbarDropdownMenuAvatar"
          role="button"
          data-mdb-toggle="dropdown"
          aria-expanded="false"
          style="color: white;"
        >
        <i class="fas p-1 fa-user"></i> <?= session()->get("name") ?>
        </a>
        <ul
          class="dropdown-menu dropdown-menu-end"
          aria-labelledby="navbarDropdownMenuAvatar"
        >
          <li>
            <a class="dropdown-item" href="/logout">Salir</a>
          </li>
        </ul>
      </div>
    </div>
    <!-- Right elements -->
  </div>
  <!-- Container wrapper -->
</nav>
<!-- Navbar -->
<div class="container" ng-app="polizas">
  <div class="row" ng-controller="polizaController" data-ng-init="reset()">
  <div class="col-3">
  <h2>Historial</h2>
  <div>
      <a href="/">NUEVO</a>
    </div>
    <poliza-list></poliza-list>
  <div class="row">
    <?php foreach($polizas as $p): ?>
    <div class="small">
      <a href="/poliza/<?=$p["poliza"] ?>"><?=date("d/m/Y", strtotime( $p["create_at"]))." ".$p["poliza"]." ".$p["aplicacion"]?></a>
    </div>
    <?php endforeach;?>
    <div>
    <?php if($page): ?>
    <a class="btn" href="?page=<?= $page - 1 ?>"><</a>
    <?php endif; ?>
    <?php if(count($polizas) > 9): ?>
      <a class="btn" href="?page=<?= $page + 1 ?>">></a>
    <?php endif; ?>
    </div>
  </div>
  </div>
<div class="col-9">
<ul class="nav nav-tabs mb-3" id="ex1" role="tablist">
  <li class="nav-item" role="presentation">
    <a
      class="nav-link active"
      id="ex1-tab-1"
      data-mdb-toggle="tab"
      href="#ex1-tabs-1"
      role="tab"
      aria-controls="ex1-tabs-1"
      aria-selected="true"
      >DATOS</a
    >
  </li>
  <li class="nav-item" role="presentation">
    <a
      class="nav-link"
      id="ex1-tab-2"
      data-mdb-toggle="tab"
      href="#ex1-tabs-2"
      role="tab"
      aria-controls="ex1-tabs-2"
      aria-selected="false"
      >DOCUMENTOS</a
    >
  </li>

</ul>
<!-- Tabs navs -->

<!-- Tabs content -->
<div class="tab-content " id="ex1-content">
  <div
    class="tab-pane fade show active"
    id="ex1-tabs-1"
    role="tabpanel"
    aria-labelledby="ex1-tab-1"
  >

<form ng-submit="submitPolizaForm()">

<div>
    <h2><?=isset($poliza)?"Poliza #".$poliza['poliza']:"Nueva Poliza" ?></h2>
</div>
  
<div class="row">
<section class="p-4  w-100">
      <button type="button" class="btn btn-outline-primary"><i class="fa fa-print" aria-hidden="true"></i> Imprimir</button>
      <button type="submit" class="btn btn-outline-warning"><i class="fas fa-save"></i> Guardar</button>
    </section>
</div>


  <!-- Text input -->
  <div class="row gp">

  <div class="form-outline col  m-1 mb-4">
    <input type="number" id="form6Example3" ng-model="poliza.poliza" class="form-control" required <?= isset($poliza)?"readonly ng-init='poliza.poliza=".$poliza['poliza']."'":"" ?> />
    <label class="form-label" for="form6Example3">POLIZA</label>
  </div>
  <div class="form-outline col  m-1 mb-4">
    <input type="number" id="form6Example3" ng-model="poliza.aplicacion" class="form-control" required/>
    <label class="form-label" for="form6Example3">APLICACION</label>
  </div>
  <div class="form-outline col  m-1 mb-4">
    <input type="text" id="form6Example3" ng-model="poliza.a_favor" class="form-control" required/>
    <label class="form-label" for="form6Example3">A FAVOR DE</label>
  </div>
  <!-- Text input -->
  <div class="form-group col  m-1 mb-4">
    <select  ng-model="poliza.desde" class="select" required>
    <?php
        foreach($paises as $p):
      ?>
      <option value="<?=$p?>"><?= $p ?></option>
      <?php endforeach;?>
    </select>
    <label class="form-label select-label" for="form6Example4">DESDE</label>
  </div>
  <div class="form-group col  m-1 mb-4">
    <select  ng-model="poliza.hasta" id="form6Example5" class="select" required >
      <?php
        foreach($paises as $p):
      ?>
      <option value="<?=$p?>"><?= $p ?></option>
      <?php endforeach;?>
    </select>
    <label class="form-label select-label" for="form6Example5">HASTA:</label>
  </div>
  </div>
  <div class="row gp">
    <div class="form-group col mb-4 m-1">
      <select id="sobre" class="select" ng-model="poliza.sobre" style="display: inline;" required>
                    <option value="CAMION">CAMION</option>
                    <option value="VAPOR">VAPOR</option>
                    <option value="AVION">AVION</option>
                  </select>
    <label class="form-label select-label" for="hola">SOBRE EL</label>
    </div>
  <div class="form-outline col  m-1 mb-4">
    <input type="date" id="anunciado" ng-model="poliza.anunciado" class="form-control" required/>
    <label class="form-label" for="anunciado">ANUNCIADO PARA:</label>
  </div>
  </div>
  <div class="row gp">
  <div class="form-outline col-8  m-1 mb-4">
    <input type="text" id="form6Example5" ng-model="poliza.lugar" class="form-control" required/>
    <label class="form-label" for="form6Example5">LUGAR Y FECHA</label>
  </div>
  <div class="form-outline col  m-1 mb-4">
    <input type="text" id="form6Example5" ng-model="poliza.marca" class="form-control" required/>
    <label class="form-label" for="form6Example5">MARCA</label>
  </div>
  </div>
  <div class="row gp">
  <div class="form-outline col  m-1 mb-4">
    <input type="number" id="nos" ng-model="poliza.nos" class="form-control" required/>
    <label class="form-label" for="nos">NOS</label>
  </div>
  <div class="form-outline col  m-1 mb-4">
    <input type="number" min="0"  ng-model="poliza.peso"  step="0.01" id="peso" class="form-control" required/>
    <label class="form-label" for="peso">PESO BRUTO</label>
  </div>
  <div class="form-outline col  m-1 mb-4">
    <input type="number" id="form6Example5" ng-model="poliza.bultos" min="0" class="form-control" required/>
    <label class="form-label" for="form6Example5">CANTIDAD DE BULTOS</label>
  </div>
  </div>
  <div class="row gp">
  <div class="col  m-1 mb-4"  required>
  <label class="form-label" for="form6Example5">CONTENIDO</label>
<br/>
    <small>SEGÚN FACTURA O INVOICE ADJUNTO</small>
    <input style="display: inline-block;width:40%;" ng-model="poliza.contenido" class="form-control" type="text" id="form6Example5"  required/>
    <small>MERCADERIAS EN GENERAL</small>
  </div>
  </div>
  <div class="row gp">
  <div class="form-outline col  m-1 mb-4">
    <input type="number" id="asegurado" step="0.01" min="0" ng-model="poliza.asegurado" class="form-control" required />
    <label class="form-label" for="asegurado">VALOR ASEGURADO</label>
  </div>
  <div class="form-outline col  m-1 mb-4">
    <input type="number" id="porcentaje" step="0.01" min="0" ng-model="poliza.porcentaje" class="form-control" />
    <label class="form-label"  for="porcentaje">%</label>
  </div>
  <div class="form-outline col  m-1 mb-4">
    <input type="number" id="dde" step="0.01" min="0" ng-model="poliza.dde" class="form-control" />
    <label class="form-label"  for="dde">Derechos de Emision</label>
  </div>
  </div>
  <div class="row gp">
    <label>PRIMA</label>
    <table class="table table-sm">
      <tr>
        <td>SUMA ASEGURADA</td><td>{{ poliza.asegurado }}</td>
      </tr>
      <tr>
        <td>TASA ({{poliza.porcentaje}}%)</td><td>{{ poliza.porcentaje}}%</td>
      </tr>
      <tr>
        <td>PRIMA NETA</td>
        <td ng-bind="prima_neta=(poliza.asegurado * poliza.porcentaje/100.0)| number:2"></td>
      </tr>
      <tr>
        <td>C.S.C.V.S ({{poliza.cscvs*100 | number:2}}%)</td><td ng-bind="cscvs=(prima_neta * poliza.cscvs) | number:2"></td>
      </tr>
      <tr>
        <td>S.S.C. ({{poliza.ssc*100 |number:2}}%)</td><td ng-bind="ssc=(prima_neta * poliza.ssc)| number:2"></td>
      </tr>
      <tr>
        <td>DERECHOS DE EMISION</td><td ng-bind="dde=(poliza.dde)| number:2"></td>
      </tr>
      <tr>
        <td>SUBTOTAL</td><td ng-bind="subtotal=(dde+prima_neta+cscvs+ssc) | number:2"></td>
      <tr>
        <td>IVA ({{poliza.iva*100}}%)</td><td ng-bind="iva=(subtotal*poliza.iva) | number:2">0</td>
      </tr>
      <tr>
        <td><b>TOTAL</b></td><td ng-bind="total=(subtotal+iva) | number:2">0</td>
      </tr>
    </table>
  </div>
  <div class="row gp">
  <div class="form-outline col  m-1 mb-4">
    <textarea class="form-control" id="exampleFormControlTextarea3" ng-model="poliza.observaciones" rows="3"></textarea>  
    <label class="form-label" for="form6Example5">OBSERVACIONES</label>
  </div>
  <div class="form-outline col  m-1 mb-4">
    <input type="text" id="embarcado_por" ng-model="poliza.embarcado_por" class="form-control" required/>
    <label class="form-label" for="embarcado_por">EMBARCADO POR</label>
  </div>
  
  </div>
  
  <!-- Message input -->
  <input type="hidden" ng-model="poliza.cscvs" ng-init="poliza.cscvs=0.035">
  <input type="hidden" ng-model="poliza.ssc" ng-init="poliza.ssc=0.005">
  <input type="hidden" ng-model="poliza.iva" ng-init="poliza.iva=0.12">
</form>
  </div>
  <div class="tab-pane fade" id="ex1-tabs-2" role="tabpanel" aria-labelledby="ex1-tab-2">
  <div class="row pt-4">
  <div class="col text-center"><a href="/pdf1/<?=$poliza["poliza"]??""?>"><i class="fa-solid fa-4x fa-file-pdf"></i>Documento</a></div>
  <div class="col text-center"><a href="/pdf2/<?=$poliza["poliza"]??""?>"><i class="fa-solid fa-4x fa-file-pdf"></i>FRONTAL</a></div>
  <div class="col text-center"><a href="/pdf3/<?=$poliza["poliza"]??""?>"><i class="fa-solid fa-4x fa-file-pdf"></i>REVERSO</a></div>
</div>
</div>
</div>
</div>
  </div>
</div>
<footer class="text-light mt-4 text-center bg-primary p-3">
 <h4>COPYRIGHT <?= date("Y") ?> &copy; todos los derechos reservados SWADEN S.A.</h4>
</footer>
<!-- MDB -->
<script>
var app = angular.module('polizas', []);
/*
app.
  component('polizaList', {
    template:
        '<ul>kjj' +
          '<li ng-repeat="phone in $ctrl.phones">' +
            '<span>{{p.poliza}}jj</span>' +
            '<p></p>' +
          '</li>' +
        '</ul>',
    controller: function PhoneListController(){
      //const res = 
     // const json = await res.json();
      //console.log(json)
      //this.kk = [...json];
       fetch("/polizas/"+0).then(s =>{
        $ctrl.phones = [
          {
            name: 'Nexus S',
            snippet: 'Fast just got faster with Nexus S.'
          }, {
            name: 'Motorola XOOM™ with Wi-Fi',
            snippet: 'The Next, Next Generation tablet.'
          }, {
            name: 'MOTOROLA XOOM™',
            snippet: 'The Next, Next Generation tablet.'
          }
        ];})
    }
  });*/


app.controller("polizaController", function ($scope, $http) {
    $scope.poliza_clean = {
      poliza: <?= isset($poliza)?$poliza["poliza"]:"''"?>,
      aplicacion: <?= isset($poliza)?$poliza["aplicacion"]:"''"?>,
      a_favor: "<?= isset($poliza)?$poliza["a_favor"]:""?>",
      desde: "<?= isset($poliza)?$poliza["desde"]:""?>",
      hasta: "<?= isset($poliza)?$poliza["hasta"]:""?>",
      sobre:"<?= isset($poliza)?$poliza["sobre"]:""?>",
      anunciado: new Date("<?= $poliza["anunciado"]??""?>"),
      lugar: "<?= isset($poliza)?$poliza["lugar"]:""?>",
      marca: "<?= isset($poliza)?$poliza["marca"]:""?>",
      nos: <?= isset($poliza)?$poliza["nos"]:"''"?>,
      peso: <?= isset($poliza)?$poliza["peso"]:"''"?>,
      bultos: <?= isset($poliza)?$poliza["bultos"]:"''"?>,
      contenido: <?= json_encode(isset($poliza)?$poliza["contenido"]:"")?>,
      asegurado: <?= isset($poliza)?$poliza["asegurado"]:"''"?>,
      porcentaje: <?= isset($poliza)?$poliza["porcentaje"]:"''"?>,
      observaciones:<?= json_encode( isset($poliza)?$poliza["observaciones"]:"") ?>,
      embarcado_por: "<?= isset($poliza)?$poliza["embarcado_por"]:""?>",
      iva: <?= isset($poliza)?$poliza["iva"]:"''"?>,
      ssc: <?= isset($poliza)?$poliza["ssc"]:"''"?>,
      dde: <?= isset($poliza)?$poliza["dde"]:"''"?>,
      cscvs: <?= isset($poliza)?$poliza["cscvs"]:"''"?>
    };

    $scope.reset = ()=>{
      $scope.poliza = angular.copy($scope.poliza_clean);
    }
    $scope.submitPolizaForm = function () {
        console.log($scope.poliza);
        const onSuccess =  (data, status, headers, config)=> {
            alert(data.data.message);

              window.location = "/poliza/"+$scope.poliza.poliza;

        };
        var onError = function (data, status, headers, config) {
            alert('Error');
        }
        $http.post('/', { ...$scope.poliza })
            .then(onSuccess)
            .catch(onError);
    };
    
})
</script>
<script
  type="text/javascript"
  src="/js/mdb.min.js"
></script>
</body>
</html>