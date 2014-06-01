<?php
    $sent = false;
    $problems = array(
        'mechanical' => 'Mechanical Problem',
        'non-starter' => 'Non Starter',
        'general-service' => 'General Service',
        'mot' => 'MOT'
    );
    if ($_POST) {
        if (isset ($problems[$_POST['type-of-problem']])) {
            $body = "Problem: " . $problems[$_POST['type-of-problem']] . '<br>';
            $body .= "Phone Number: " . $_POST['phone'];

            if (mail('wmmechanic@icloud.com', 'Website enquiry', $body)) {
                $sent = true;
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Wimbledon Mobile Mechanic</title>
    <?php include_once('page/head.html'); ?>
</head>
<body>
<div class="bg">
    <div class="bg1">

        <!--==============================header=================================-->
        <header class="container-fluid">
            <?php include_once('page/header.html'); ?>
        </header>
        <!--==============================content================================-->
        <section class="container-fluid">
                    <article class="row">
                        <div class="col-xs-12">
                            <div class="box blue padding">
                                <h3>Leave us your number <span>and we'll call you back</span></h3>
                                <div class="wrapper p2">
                                    <?php if (!$sent): ?>
                                    <form class="" method="post" action="" role="form">

                                        <div class="form-group">
                                            <label for="type-of-problem">Type of problem</label>
											<select name="type-of-problem"  class="form-control">
												<?php
													foreach ($problems as $key => $label): ?>
														<option value="<?php echo $key; ?>"><?php echo $label; ?></option>
													<?php endforeach; ?>
											</select>
                                        </div>
                                        <div class="form-group">
                                            <label>Phone Number</label>
                                            <input required class="form-control" name="phone" type="tel" value="" placeholder="Enter Your Phone Number Here">
                                        </div>


                                        <div class="buttons-wrapper">
                                            <input value="Send" class="button" type="submit" name="submit">
                                        </div>
                                    </form>
                                    <?php else: ?>
                                        <p>Your enquiry has been sent. We will get in touch as soon as possible.</p>
                                    <?php endif; ?>
                                </div>
                                <!--<a class="button1" href="#">All services &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <span></span></a>-->
                            </div>
                        </div>
                    </article>

        </section>
    </div>
</div>
<!--==============================footer=================================-->
<footer class="container-fluid">
    <?php require_once('page/footer.html'); ?>
</footer>
</body>
</html>
