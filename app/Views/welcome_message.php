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
          src="icon.jpg"
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
            <a class="dropdown-item" href="#">Salir</a>
          </li>
        </ul>
      </div>
    </div>
    <!-- Right elements -->
  </div>
  <!-- Container wrapper -->
</nav>
<!-- Navbar -->
<div class="container">

  <div class="row">
  <div class="col-3">
  <h2>Historial</h2>

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
  <li class="nav-item" role="presentation">
    <a
      class="nav-link"
      id="ex1-tab-3"
      data-mdb-toggle="tab"
      href="#ex1-tabs-3"
      role="tab"
      aria-controls="ex1-tabs-3"
      aria-selected="false"
      >CONSULTA</a
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

<form>

<div>
    <h2>Nueva Poliza</h2>
</div>
  
<div class="row">
<section class="p-4  w-100">
      <button type="button" class="btn btn-outline-primary"><i class="fa fa-print" aria-hidden="true"></i> Imprimir</button>
      <button type="button" class="btn btn-outline-warning"><i class="fas fa-save"></i> Guardar</button>
    </section>
</div>


  <!-- Text input -->
  <div class="row gp">

  <div class="form-outline col  m-1 mb-4">
    <input type="text" id="form6Example3" class="form-control" />
    <label class="form-label" for="form6Example3">POLIZA</label>
  </div>
  <div class="form-outline col  m-1 mb-4">
    <input type="text" id="form6Example3" class="form-control" />
    <label class="form-label" for="form6Example3">APLICACION</label>
  </div>
  <div class="form-outline col  m-1 mb-4">
    <input type="text" id="form6Example3" class="form-control" />
    <label class="form-label" for="form6Example3">A FAVOR DE</label>
  </div>
  <!-- Text input -->
  <div class="form-outline col  m-1 mb-4 datepicker">
    <input type="text" class="form-control" />
    <label class="form-label" for="form6Example4">DESDE</label>
  </div>
  <div class="form-outline col  m-1 mb-4 datepicker">
    <input type="text" id="form6Example5" class="form-control" />
    <label class="form-label" for="form6Example5">HASTA:</label>
  </div>
  </div>
  <div class="row gp">
    <div class="form-group col mb-4 m-1">
      <select id="hola" class="select" style="display: inline;">
            
                    <option value="2">CAMION</option>
                    <option value="3">VAPOR</option>
                    <option value="4">AVION</option>
                  </select>
    <label class="form-label select-label" for="hola">SOBRE EL</label>
    </div>
  <div class="form-outline col  m-1 mb-4 datepicker">
    <input type="text" id="form6Example5" class="form-control" />
    <label class="form-label" for="form6Example5">ANUNCIADO PARA:</label>
  </div>
  </div>
  <div class="row gp">
  <div class="form-outline col-8  m-1 mb-4">
    <input type="text" id="form6Example5" class="form-control" />
    <label class="form-label" for="form6Example5">LUGAR Y FECHA</label>
  </div>
  <div class="form-outline col  m-1 mb-4">
    <input type="text" id="form6Example5" class="form-control" />
    <label class="form-label" for="form6Example5">MARCA</label>
  </div>
  </div>
  <div class="row gp">
  <div class="form-outline col  m-1 mb-4">
    <input type="text" id="form6Example5" class="form-control" />
    <label class="form-label" for="form6Example5">NOS</label>
  </div>
  <div class="form-outline col  m-1 mb-4">
    <input type="text" id="form6Example5" class="form-control" />
    <label class="form-label" for="form6Example5">PESO BRUTO</label>
  </div>
  <div class="form-outline col  m-1 mb-4">
    <input type="text" id="form6Example5" class="form-control" />
    <label class="form-label" for="form6Example5">CANTIDAD DE BULTOS</label>
  </div>
  </div>
  <div class="row gp">
  <div class="col  m-1 mb-4">
  <label class="form-label" for="form6Example5">CONTENIDO</label>
<br/>
    <small>SEGÚN FACTURA O INVOICE ADJUNTO</small>
    <input style="display: inline-block;width:40%;" class="form-control" type="text" id="form6Example5"  />
    <small>MERCADERIAS EN GENERAL</small>
  </div>
  </div>
  <div class="row gp">
  <div class="form-outline col  m-1 mb-4">
    <input type="text" id="form6Example5" class="form-control" />
    <label class="form-label" for="form6Example5">VALOR ASEGURADO</label>
  </div>
  <div class="form-outline col  m-1 mb-4">
    <input type="text" id="form6Example5" class="form-control" />
    <label class="form-label" for="form6Example5">%</label>
  </div>
  <div class="form-outline col  m-1 mb-4">
    <input type="text" id="form6Example5" class="form-control" />
    <label class="form-label" for="form6Example5">PRIMA</label>
  </div>
  </div>
  <!-- Message input -->

</form>
  </div>
  <div class="tab-pane fade" id="ex1-tabs-2" role="tabpanel" aria-labelledby="ex1-tab-2">
  <div class="row pt-4">
  <div class="col text-center"><a href="#"><i class="fa-solid fa-4x fa-file-pdf"></i> Documento1</a></div>
  <div class="col text-center"><a href="#"><i class="fa-solid fa-4x fa-file-pdf"></i> Documento2</a></div>
  <div class="col text-center"><a href="#"><i class="fa-solid fa-4x fa-file-pdf"></i> Documento3</a></div>
</div>
</div>
  <div class="tab-pane fade" id="ex1-tabs-3" role="tabpanel" aria-labelledby="ex1-tab-3">
    Tab 3 content
  </div>
</div>
</div>
  </div>
</div>
<footer class="text-light mt-4 text-center bg-primary p-3">
 <h4>COPYRIGHT <?= date("Y") ?> &copy; todos los derechos reservados SWADEN S.A.</h4>
</footer>
<!-- MDB -->
<script
  type="text/javascript"
  src="/js/mdb.min.js"
></script>
</body>
</html>