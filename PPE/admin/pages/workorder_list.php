<?php require_once("verifier_access.php");
require_once("../../class/Workorder.php"); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <title>Workorder List</title>
  </head>
  <body>
    <div class="wrapper">


    <?php
    require_once("header.php") ?>

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Workorder List</h1>
            </div>
          </div>
          <div class="row">
          <div class="panel panel-info">
            <table class="table table-striped">
             <thead>
               <tr>
                 <th>Workorder ID</th>
                 <th>Description</th>
                 <th>Km</th>
                 <th>Date</th>
                 <th>Cost</th>


               </tr>
             </thead>
             <tbody id="resultat-diporama">

               <?php

               $wor = new Workorder();
               $liste = $wor->liste();
               foreach($liste as $data )
               {

                ?>
                <tr>

                 <td><?php echo $data->_id; ?></td>
                 <td><?php echo $data->_descri; ?></td>
                 <td><?php echo $data->_km; ?></td>
                 <td><?php echo $data->_date; ?></td>
                 <td><?php echo $data->_cout; ?></td>
                 <?php
                 if($data->_statue=="done")
                  {?>
                 <td>
                   <a class="btn btn-primary" href="order_modif.php?id=<?php echo $data->_id; ?>">
                     <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>  Validate workorder
                   </a>
                 </td>
                 <?php }?>

              </tr>
              <?php  } ?>
            </tbody>
          </table>

              </div>
            </div>
          </div>
            <!-- /.col-lg-12 -->
        </div>


  </body>
</html>
