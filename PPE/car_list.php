<?php require_once("verifier_access.php");
require_once("class/Car.php"); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <!-- Bootstrap Core CSS -->
    <link href="admin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="admin/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="admin/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="admin/vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="admin/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <title>Cars List</title>
  </head>
  <body>
    <div class="wrapper">


    <?php
    require_once("header.php") ?>

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Cars List
                  </h1>
            </div>
          </div>
          <div class="row">
          <div class="panel panel-info">
            <table class="table table-striped">
             <thead>
               <tr>
                 <th>Car ID</th>
                 <th>Type</th>
                 <th>With Whom</th>
                 <th>Statue</th>

               </tr>
             </thead>
             <tbody id="resultat-diporama">

               <?php

               $cat = new Car();
               $liste = $cat->liste();
               foreach($liste as $data )
               {

                ?>
                <tr>

                 <td><?php echo $data->_id; ?></td>
                 <td><?php echo $data->_type; ?></td>
                 <td><?php echo $data->_whom; ?></td>
                 <td><?php echo $data->_statue; ?></td>

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
