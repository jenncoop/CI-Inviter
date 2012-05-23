<?php
/* 
 * invite_email.php
 */
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
	<title>CI Inviter</title>

        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url().'/js/gen.js' ?>"></script>
        <style type="text/css">
            #wrapper{
                margin: 0 auto;
                width: 700px;
            }

            .short-text{
                width: 500px;
            }

            .long-text{
                width: 500px;
                height: 100px;
            }

            .label-wrapper{
                width: 100px;
                float: left;
            }
        </style>
    </head>
    <body>
        <div id="wrapper">
            
            <?php echo validation_errors(); ?>
            <?php echo form_open('welcome/send_email') ?>

                    <div class="label-wrapper"><label for="to">To: </label></div>
                    <input type="input" class="short-text" name="to" value="<?php echo $email_list ?>" /><br />
                    <br />
                    <div class="label-wrapper"><label for="subject">Subject: </label></div>
                    <input type="input" class="short-text" name="subject" value="<?php echo $default_subject ?>" /><br />
                    <br />
                    <div class="label-wrapper"><label for="message">Message: </label></div>
                    <textarea type="input" class="long-text" name="message" value="<?php echo $default_message ?>"></textarea><br />
                    <br />
                    <input type="submit" name="submit" value="Send!" />

            </form>            
        </div>
    </body>
</html>

