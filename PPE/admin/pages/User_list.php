<?php require_once("verifier_access.php");
require_once("../../class/User.php"); ?>
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
    <title>add_user</title>
  </head>
  <body>
    <div class="wrapper">


    <?php
    require_once("header.php") ?>

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Users List
                  <a type="button" class="btn btn-primary btn-lg pull-right" href="add_user.php">
                  ADD User </a></h1>
            </div>
          </div>
          <div class="row">
          <div class="panel panel-info">
            <table class="table table-striped">
             <thead>
               <tr>
                 <th>name</th>
                 <th>type</th>
                 
                 <th>SUPPRIMER</th>
               </tr>
             </thead>
             <tbody id="resultat-diporama">

               <?php

               $cat = new User();
               $liste = $cat->liste();
               foreach($liste as $data )
               {

                ?>
                <tr>

                 <td><?php echo $data->_name; ?></td>
                 <td><?php echo $data->_type; ?></td>

                 <td>
                  <a href="user_supp_action.php?id=<?php echo $data->_login; ?>" class="btn btn-danger btn-mini">
                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Supp
                  </a>
                </td>
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
