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




<div class="row text-center">
<center class="container" style="max-width: 60%">
<img
          src="/icon.jpg"
          height="200"
          alt="MDB Logo"
          loading="lazy"
        />
      </a>

<div  style="border: 1px solid; padding: 15%;">
<div class="row">
    <div class="col">INICIO VIGENCIA:</div><div class="col"></div><div class="col">FIN VIGENCIA</div><div class="col"></div>
</div>
<div class="row">
    <div class="col">FECHA EMISION:</div><div class="col"></div><div class="col">ESTADO:</div><div class="col"></div>
</div>
<div class="row">
    <div class="col">ASEGURADO:</div><div class="col"><?= $poliza["asegurado"] ?? ""?></div>
</div>
<div class="row">
    <div class="col">CONTRATANTE:</div><div class="col"></div>
</div>
<div class="row">
    <div class="col">SUMA ASEGURADA:</div><div class="col"></div><div class="col">CUOTA INICIAL:</div><div class="col"></div>
</div>
</div>
</body>
</html>