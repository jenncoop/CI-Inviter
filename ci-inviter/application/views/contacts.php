<?php
/* 
 * contacts.php
 */
?>

<!DOCTYPE html>
<html>
    <head>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url().'/js/gen.js' ?>"></script>
    </head>
    <body>
        <div id="contact_list">
        <?php echo form_open('welcome/invite_contacts') ?>

            <div class="checkbox" style="float: left; width: 50px;"><input type="checkbox" name="select_all" value="select_all" id="select_all" checked="checked" onclick="toggleChecked(this.checked)" /></div>
            <div style="float: left;">Select All</div>
            <br /><br />

            
                <?php foreach($contacts as $email => $name):?>

                    <div id="contact" style="margin-bottom: 30px; width: 500px;">
                        <div class="checkbox" style="float: left; width: 50px;">
                            <input type="checkbox" name="contact_list[]" value="<?php echo $email ?>" checked="checked" />
                        </div>
                        <div class="name" style="float: left;"><?php echo $name ?></div>
                        <div class="email" style="float: right;"><?php echo $email ?></div>
                    </div>
                    <br />

                <?php endforeach ?>
       

            <input type="submit" name="submit" value="Invite!" />

        </form>

        </div>
    </body>
</html>