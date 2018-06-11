<html>
    <?php
    if (isset($this->session->userdata['logged_in'])) {
        $username = ($this->session->userdata['logged_in']['username']);
        $email = ($this->session->userdata['logged_in']['email']);
        $date = ($this->session->userdata['logged_in']['date']);
        $id = ($this->session->userdata['logged_in']['id']);
        $createdby = ($this->session->userdata['logged_in']['createdby']);
    } else {
        header("location: login");
    }
                                             
    $result4 = $this->login_database->sel_points($id);
    foreach ($result4 as $row3) {
        $a1 = $a1 + $row3->points;
    }
    $result = $this->login_database->check($id);
    foreach ($result as $row) {
        
    }
    $result2 = $this->login_database->check_count($id);
    foreach ($result2 as $row1) {
        
    }
    $w1 = $this->login_database->get_name($createdby);
    foreach ($w1 as $w2) {
        
    }
    ?>
    <head>
        <style>
            input[type=submit] {
                background-color: #ffffff!important;
                color: black!important;
                border: 2px solid #fffffe!important;
                padding:0px!important;
            }
            form{
                border: 1px solid #00c0ef !important;
                padding: 0px 14px 0px 14px;
                background: #00c0ef !important;
                color: white;
                border-radius: 5px;
            }
        </style>
        <title>Admin Page</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="<?php echo base_url(); ?>css/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>css/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css">
        <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro|Open+Sans+Condensed:300|Raleway' rel='stylesheet' type='text/css'>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div id="profile">
                    <?php
                    echo "Hello <b id='welcome'><i>" . $username . "</i> !</b>";
                    echo "<br/>";
                    echo "<br/>";
                    echo "Welcome to Your Page";
                    echo "<br/>";
                    echo "<br/>";
                    echo "Your Username is " . $username;
                    echo "<br/>";
                    echo "Your Email is " . $email;
                    echo "<br/>";
                    echo "Date " . $date;
                    echo "<br/>";
                    echo "Invited By " . $w2->user_name;
                    echo "<br/>";
                    ?>            
                    <b id="logout"><a href="logout">Logout</a></b>
                </div>
            </div>
            <br>
            <br>
            <div class="row">
                <div id="profile">
                    <div class="col-md-4">
                        <?php echo form_open('user_authentication/earned'); ?>
                        <input style="display: none" type="id" name="ids" value="<?php echo $id ?>"/>
                        <p><h4>Wallet</h4>
                        Earned Points<br>
                        <?php
                        echo $a1;
                        ?>
                        </p>
                        <input type="submit" class="" value="click here">
                        <?php echo form_close(); ?>
                    </div>


                    <div class="col-md-4">
                        <?php echo form_open('user_authentication/list_user'); ?>
                        <input style="display: none" type="id" name="ids" value="<?php echo $id ?>"/>
                        <p><h4>User Created by <?php echo $username ?></h4>
                        <br>
                        <?php
                        echo $row1->count;
                        ?>
                        </p>
                        <input type="submit" class="" value="click here">
                        <?php echo form_close(); ?>
                    </div>
                    <div class="col-md-4">
                        <?php echo form_open('user_authentication/referal'); ?>
                        <input style="display: none" type="id" name="ids" value="<?php echo $id ?>"/>
                        <p><h4>Referel</h4>
                        <br><br>
                        </p>
                        <input type="submit" class="" value="click here">
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
            <!--<a target="_blank" href="http://localhost/login/index.php/user_authentication/user_registration_show/<?php echo $id ?>"><h4>Referral</h4></a>-->
        </div>
    </div>
    <br/>
</body>
</html>