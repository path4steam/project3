<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>eCommerce Project</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap-lumen.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/store-style.css" rel="stylesheet">
    <link href="css/register.css" rel="stylesheet">

    <!-- You can forget about IE8 or lower support. This is the future baby. -->

</head>

<body>
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">eCommerce Project</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <div class="container" id="wrap">

    <?php
    $message = @$_GET['error'];
    switch ($message) {
        case 'fields_empty':
            echo "<div class=\"alert alert-danger\" role=\"alert\">Some fields were empty, fill out the whole form.</div>";
            break;
        case 'unmatching_passwords':
            echo "<div class=\"alert alert-danger\" role=\"alert\">Passwords didn't match.</div>";
            break;
        case 'username_taken':
            echo "<div class=\"alert alert-danger\" role=\"alert\">Username already taken. Pick another.</div>";
            break;
        default:
            # code...
            break;
    }
        if (@$_GET['registered'] == 'true'){
                echo "<div class=\"alert alert-success\" role=\"alert\">You have registered successfully.</div>";
        }
        ?>

        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <form action="registration.php" method="post" accept-charset="utf-8" class="form" role="form">
                    <!-- Form Title -->
                    <legend>Register</legend>
                    <!-- Caption -->
                    <h4>Registration allows you to comment and purchase items.</h4>
                    <div class="row">
                        <div class="col-xs-6 col-md-6">
                            <input type="text" name="firstname" value="" class="form-control input-lg" placeholder="First Name"  />
                        </div>
                        <div class="col-xs-6 col-md-6">
                            <input type="text" name="lastname" value="" class="form-control input-lg" placeholder="Last Name"  />
                        </div>
                    </div>
                    <input type="email" name="email" value="" class="form-control input-lg" placeholder="Your Email" required />
                    <input type="text" name="username" value="" class="form-control input-lg" placeholder="Your Username" required />
                    <input type="password" name="password" value="" class="form-control input-lg" placeholder="Password"  />
                    <input type="password" name="confirm_password" value="" class="form-control input-lg" placeholder="Confirm Password"/>
                    <button class="btn btn-lg btn-primary btn-block signup-btn" type="submit" name="register">Create my account</button>
                </form>
            </div>
        </div>
    </div>
    <div class="container">
        <hr>
        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; eCommerce Project 2014</p>
                </div>
            </div>
        </footer>
    </div>
    <!-- /.container -->

    <!-- jQuery Version 1.11.0 -->
    <script src="js/jquery-1.11.0.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>
</html>