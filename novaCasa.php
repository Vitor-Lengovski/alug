<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
  <link rel="shortcut icon" href="img/favicon.png">

  <title>Adicionar casa</title>

  <!-- Bootstrap CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- bootstrap theme -->
  <link href="css/bootstrap-theme.css" rel="stylesheet">
  <!--external css-->
  <!-- font icon -->
  <link href="css/elegant-icons-style.css" rel="stylesheet" />
  <link href="css/font-awesome.min.css" rel="stylesheet" />
  <!-- Custom styles -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet" />

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
  <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
      <script src="js/lte-ie7.js"></script>
    <![endif]-->

    <!-- =======================================================
      Theme Name: NiceAdmin
      Theme URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
      Author: BootstrapMade
      Author URL: https://bootstrapmade.com
    ======================================================= -->
</head>

<body>
  <!-- container section start -->
  <section id="container" class="">
    
    <?php include_once "header.html";?>

    <?php include_once "menu.html";?>

    <?php
        if (isset($_GET['id'])) {
            include_once "class/casa.php";
            $casa = new Casa();
            $casa->setIdCasa($_GET['id']);
            $dados = $casa->buscarDados();
            
        }
        
    ?>
    
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="icon_document_alt"></i>Adicionar Casa</h3>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading"></header>
              <div class="panel-body">
                <div class="form">
                  <form class="form-validate form-horizontal " id="register_form" method="POST" action="processa/casa.php">
                    <input type="hidden" name="id" value = "<?php if(isset($dados)) echo $dados ["idCasa"]; ?>">
                    <div class="form-group ">
                      <label for="fullname" class="control-label col-lg-2">Morador principal</label>
                      <div class="col-lg-10">
                        <input class=" form-control" id="morador" value = "<?php if(isset($dados)) echo $dados ["morador"];  ?>" name="morador" type="text" />
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="address" class="control-label col-lg-2">Número de moradores</label>
                      <div class="col-lg-10">
                        <input class=" form-control" id="moradores" value = "<?php if(isset($dados)) echo $dados ["moradores"];  ?>" name="moradores" type="number" />
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="username" class="control-label col-lg-2">Número da casa <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control " id="numero" value = "<?php if(isset($dados)) echo $dados ["numero"];  ?>" name="numero" type="number" />
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="password" class="control-label col-lg-2">Valor do aluguel <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control " id="aluguel" value = "<?php if(isset($dados)) echo $dados ["aluguel"];  ?>" name="aluguel" type="number" />
                      </div>
                    </div>
                    <div class="form-group ">
                        <label for="ccomment" class="control-label col-lg-2">Localização</label>
                        <div class="col-lg-10">
                            <textarea class="form-control " id="localizacao" name="localizacao" required><?php if(isset($dados)) echo $dados ["localizacao"];  ?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                      <div class="col-lg-offset-2 col-lg-10">
                        <button class="btn btn-primary" type="submit">Save</button>
                        <button class="btn btn-default" type="button">Cancel</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </section>
          </div>
        </div>
      </section>
    </section>
    <div class="text-right">
      <div class="credits">
          <!--
            All the links in the footer should remain intact.
            You can delete the links only if you purchased the pro version.
            Licensing information: https://bootstrapmade.com/license/
            Purchase the pro version form: https://bootstrapmade.com/buy/?theme=NiceAdmin
          -->
          Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
    </div>
    
  </section>
  

  <!-- javascripts -->
  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <!-- nice scroll -->
  <script src="js/jquery.scrollTo.min.js"></script>
  <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
  <!-- jquery validate js -->
  <script type="text/javascript" src="js/jquery.validate.min.js"></script>

  <!-- custom form validation script for this page-->
  <script src="js/form-validation-script.js"></script>
  <!--custome script for all page-->
  <script src="js/scripts.js"></script>


</body>

</html>
