
<html>    
    <head>
        <title>Registration Form</title>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css">
        <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro|Open+Sans+Condensed:300|Raleway' rel='stylesheet' type='text/css'>
    </head>
    <?php
    $user_data = $this->login_database->check($id);
    foreach ($user_data as $row) {
        
    }
    ?>
    <body>
        <div id="main">
            <div id="login">
                <h2>Registration Form</h2>
                <?php
                if($row->id != $id){
                    echo "<h2>Invalid Reference Id</h2>";
                }else{
                    echo "<h2>Valid Reference Id</h2>";
                }
                ?>
                
                <hr/>
                <?php
                echo "<div class='error_msg'>";
                echo validation_errors();
                echo "</div>";
                echo form_open('user_authentication/new_user_registration');

                echo form_label('Create Username : ');
                echo"<br/>";
                echo form_input('username');
                echo "<div class='error_msg'>";
                if (isset($message_display)) {
                    echo $message_display;
                }
                echo "</div>";
                echo"<br/>";
                echo form_label('Email : ');
                echo"<br/>";
                $data = array(
                    'type' => 'email',
                    'name' => 'email_value'
                );
                echo form_input($data);
                echo"<br/>";
                echo"<br/>";
                echo form_label('Password : ');
                echo"<br/>";
                echo form_password('password');
                echo"<br/>";



                ?><label>Refered By</label>
                <input style = "" type = "text" readonly name = "ref_id" id = "ref_id" value = "<?php echo $row->id ?>">
                <label style = "display: none">Created By</label>
                <input style = "display: none" type = "text" readonly value = "<?php echo $row->createdby ?>" name = "ref2">

                <?php
                $result = $this->login_database->earned_p1($row->createdby);
                foreach ($result as $r1) {
                    
                }
                if ($r1->createdby != $r1->id) {
                    ?><input style="display: none" type="text" readonly value="<?php echo $r1->createdby ?>"  name="ref3"><?php
                }
                ?>
                <?php
                echo"<br/>";
                echo form_submit('submit', 'Sign Up');
                echo form_close();
                ?>
                <a href="<?php echo base_url() ?> ">For Login Click Here</a>
            </div>
        </div>
    </body>
</html>