<?php require_once("verifier_access.php");
?>
<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6 lt8"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7 lt8"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8 lt8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="UTF-8" />
        <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">  -->
        <title>SEND WORKORDER </title>
		<link rel="stylesheet" type="text/css" href="admin/css/user_css.css" />
    <link href="admin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link href="admin/vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
    </head>
    <body>
        <div class="container">

            <header>
                <h1>WORKORDER</h1>

            </header>
            <section>
                <div id="container_demo" >
                    <!-- hidden anchor to stop jump http://www.css3create.com/Astuce-Empecher-le-scroll-avec-l-utilisation-de-target#wrap4  -->
                    <a class="hiddenanchor" id="toregister"></a>
                    <a class="hiddenanchor" id="tologin"></a>
                    <div id="wrapper">
                        <div id="login" class="animate form">
                            <form  action="order_add_action.php" autocomplete="on" method="post">
                                <h1> WORKORDER  </h1>
                                <p>
                                <label for="cout" class="yourkm" > Cost</label>
                                <input type="number" name="cout" min="0" max="999" />
                                </p>
                                <p>
                                <label for="km" class="yourkm" > KM </label>
                                <input type="number" name="km" min="0" max="99999" />
                              </p>

                                <div class="form-group">
                                  <label for="comment"> Description:</label>
                                  <textarea name="descri" class="form-control" rows="5" id="comment"></textarea>
                                </div>
                                <input type="hidden" name="statue" value="not yet">


                                <p class="signin button">
									<input type="submit" value="Send"/>
								</p>




                            </form>
                        </div>

                    </div>
                </div>
            </section>
        </div>
    </body>
</html>
