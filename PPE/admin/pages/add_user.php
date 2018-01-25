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
        <title>Registration User</title>
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
                            <form  action="user_new_action.php" autocomplete="on" method="post">
                                <h1> Sign up </h1>

                                <p>
                                    <label for="usernamesignup" class="uname" >Login</label>
                                    <input id="usernamesignup" name="login" required="required" type="text" placeholder="mysuperusername690"  />
                                </p>
                                <p>
                                    <label for="emailsignup" class="uname"  > Name</label>
                                    <input id="emailsignup" name="name" required="required" type="text" placeholder="salah"/>
                                </p>
                                <p>
                                    <label for="passwordsignup" class="youpasswd" > password </label>
                                    <input id="passwordsignup" name="pw" required="required" type="password" placeholder="eg. X8df!90EO"/>
                                </p>

                                <p>
                                    <label for="select"  >Type </label><br>
                                    <select class="selectpicker" name="type">
                                      <option value="leader" data-icon="glyphicon-user">Team Leader</option>
                                      <option value="worker">Worker</option>

                                    </select>
                                </p>
                                <p class="signin button">
									<input type="submit" value="Sign up"/>
								</p>




                            </form>
                        </div>

                    </div>
                </div>
            </section>
        </div>
    </body>
    <script type="text/javascript">
    var login;
    if (login) {
      alert("it works");

    }

    </script>
</html>
