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
    <?php require_once('page/head.html'); ?>
	
</head>
<body>
<div class="bg">
    <div class="bg1">
        <!--==============================header=================================-->
        <header>
            <?php require_once('page/header.html'); ?>
        </header>
        <!--==============================content================================-->
        <section id="content">
            <div class="container_24">
                <div class="wrapper">
                    <article class="grid_24">
                        <div class="box blue">
                            <div class="padding">
                                <h3>Leave us your number <span>and we'll call you back</span></h3>
                                <div class="wrapper p2">
                                    <?php if (!$sent): ?>
                                    <form class="jqtransform" method="post" action="">
                                        <fieldset>
                                        <div class="field">
                                            <label for="type-of-problem">
                                                <select name="type-of-problem">
                                                    <?php
                                                        foreach ($problems as $key => $label): ?>
                                                            <option value="<?php echo $key; ?>"><?php echo $label; ?></option>
                                                        <?php endforeach; ?>
                                                </select>
                                                Type of problem
                                            </label>
                                        </div>
                                        <div class="field">
                                            <label>
                                                <input name="phone" type="text" value="">
                                                Phone Number
                                            </label>
                                        </div>
                                        </fieldset>

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
                </div>
            </div>
        </section>
    </div>
</div>
<!--==============================footer=================================-->
<footer>
    <?php require_once('page/footer.html'); ?>
</footer>
</body>
</html>
