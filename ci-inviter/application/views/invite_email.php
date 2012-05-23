<?php
/* 
 * invite_email.php
 */
?>

    <?php echo validation_errors(); ?>

    <?php echo form_open('welcome/send_email') ?>

            <label for="to">To: </label>
            <input type="input" name="to" value="<?php echo $email_list ?>" /><br />

            <label for="subject">Subject: </label>
            <input type="input" name="subject" value="<?php echo $default_subject ?>" /><br />

            <label for="message">Message: </label>
            <input type="input" name="message" value="<?php echo $default_message ?>" width="48" height="48" /><br />

            <input type="submit" name="submit" value="Send!" />

    </form>
