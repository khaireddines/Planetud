<?php require_once("verifier_access.php");
$id=$_GET['id'] ;?>
<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6 lt8"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7 lt8"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8 lt8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="UTF-8" />
        <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">  -->
        <title>modify statue</title>
		<link rel="stylesheet" type="text/css" href="../css/user_css.css" />
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link href="../vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
    </head>
    <body>
        <div class="container">

            <header>
                <h1> modify statue</h1>

            </header>
            <section>
                <div id="container_demo" >
                    <!-- hidden anchor to stop jump http://www.css3create.com/Astuce-Empecher-le-scroll-avec-l-utilisation-de-target#wrap4  -->
                    <a class="hiddenanchor" id="toregister"></a>
                    <a class="hiddenanchor" id="tologin"></a>
                    <div id="wrapper">
                        <div id="login" class="animate form">
                            <form  action="order_modify.php?id=<?php echo $id ?>" autocomplete="on" method="post">
                                <h1> modify statue </h1>

                                <label for="statue" > Statue </label><br>
                                <select class="selectpicker" name="statue">
                                  <option value="Validate" data-icon="glyphicon-user">Validate</option>
                                  <option value="not yet">not yet </option>

                                </select>


                                <p class="signin button">
									<input type="submit" value="Validate"/>
								</p>




                            </form>
                        </div>

                    </div>
                </div>
            </section>
        </div>
    </body>
</html>
