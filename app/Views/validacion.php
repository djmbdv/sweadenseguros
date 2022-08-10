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
.col-title{
  font-weight: bold;
  color: blue;
}
.row{
  padding: 10px;
  border-bottom: 1px solid;
}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular.min.js"></script>

</head>
<body>




<div class="row text-center">
<center class="container" style="max-width: 60%">
<img
          src="/icon.jpg"
          height="200"
          alt="SWEADEN"
          loading="lazy"
        />
      </a>

<div  style="border: 1px solid; padding: 15%;">
<div class="row">
    <div class="col col-title">INICIO VIGENCIA:</div><div class="col"><?=  $poliza["lugar"] ?></div><div class="col col-title">FIN VIGENCIA</div><div class="col"></div>
</div>
<div class="row">
    <div class="col col-title">FECHA EMISION:</div><div class="col"><?=  $poliza["lugar"] ?></div><div class="col col-title">ESTADO:</div><div class="col"><?= $poliza["estado"] ?></div>
</div>
<div class="row">
    <div class="col col-title">ASEGURADO:</div><div class="col"><?= $poliza["a_favor"] ?></div>
</div>
<div class="row">
    <div class="col col-title">CONTRATANTE:</div><div class="col"></div>
</div>
<div class="row">
    <div class="col col-title">SUMA ASEGURADA:</div><div class="col"><?= $poliza["asegurado"] ?? ""?></div><div class="col col-title">CUOTA INICIAL:</div><?= number_format($poliza["porcentaje"] * $poliza["asegurado"] / 100.0,2)?><div class="col"></div>
</div>
</div>
</body>
</html>