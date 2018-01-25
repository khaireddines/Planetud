<?php require_once("verifier_access.php");
@$id = $_GET['id'];

if( !empty($id) ) {
	require_once("../../class/Car.php");
	$car= new Car();
	$cat = $car->details($id);
}?>
<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6 lt8"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7 lt8"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8 lt8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="UTF-8" />
        <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">  -->
        <title>Registration Car</title>
		<link rel="stylesheet" type="text/css" href="../css/user_css.css" />
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link href="../vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
    </head>
    <body>
        <div class="container">

            <header>
                <h1>Registration Form</h1>

            </header>
            <section>
                <div id="container_demo" >
                    <!-- hidden anchor to stop jump http://www.css3create.com/Astuce-Empecher-le-scroll-avec-l-utilisation-de-target#wrap4  -->
                    <a class="hiddenanchor" id="toregister"></a>
                    <a class="hiddenanchor" id="tologin"></a>
                    <div id="wrapper">
                        <div id="login" class="animate form">
                            <form  action="add_car_action.php" autocomplete="on" method="post">
                                <h1> ADD CAR </h1>
                                <p>
                                    <label for="usernamesignup" class="uname" >Type</label>
                                    <input id="usernamesignup" name="type" required="required" type="text" placeholder="mysuperusername690" value="<?php echo @($cat->_type); ?>" />
                                </p>
                                <p>
                                    <label for="emailsignup" class="uname"  > Whom</label>
                                    <input id="emailsignup" name="whom" required="required" type="text" placeholder="salah" value="<?php echo @($cat->_whom);?>"/>
                                </p>
                                <p>
                                <label for="statue" > Statue </label><br>
                                <select class="selectpicker" name="statue">
                                  <option value="Available" data-icon="glyphicon-user">Available</option>
                                  <option value="Unavailable">Unavailable</option>

                                </select>
                              </p>
                              

                                <p class="signin button">
									<input type="submit" value="ADD"/>
								</p>




                            </form>
                        </div>

                    </div>
                </div>
            </section>
        </div>
    </body>
</html>
