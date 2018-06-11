<?php
if (isset($this->session->userdata['logged_in'])) {
    $id = ($this->session->userdata['logged_in']['id']);
    $username = ($this->session->userdata['logged_in']['username']);
    $email = ($this->session->userdata['logged_in']['email']);
    $date = ($this->session->userdata['logged_in']['date']);
    $id = ($this->session->userdata['logged_in']['id']);
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Ultimez</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script>
            function copyToClipboard(element) {
                var $temp = $("<input>");
                $("body").append($temp);
                $temp.val($(element).text()).select();
                document.execCommand("copy");
                $temp.remove();
            }
        </script>
        <style>
            .col-md-3 {
                padding-right: 15px !important;
                padding-left: 15px !important;
            }
            .fa {
                padding: 7px;
                font-size: 30px;
                width: 50px;
                text-align: center;
                text-decoration: none;
                margin: 5px 2px;
                border-radius:25px!important;
            }
            .fa:hover {
                opacity: 0.7;
            }
            .fa-facebook {
                background: #3B5998;
                color: white;
            }

            .fa-twitter {
                background: #55ACEE;
                color: white;
            }

            .fa-google {
                background: #dd4b39;
                color: white;
            }

            .fa-linkedin {
                background: #007bb5;
                color: white;
            }

            .fa-youtube {
                background: #bb0000;
                color: white;
            }
        </style>
    </head>
    <body>
        <div class="container" style="background: #1d191908!important;">
            <br><br>
            <b id="logout"><a href="<?php echo base_url() ?>index.php/user_authentication/user_login_process">Back</a></b>
            <br>

            <br>
            <div class="row">
                <div class="col-md-8">
                    <h4><p id="p1"><a target="_blank"  href="<?php echo base_url() ?>/index.php/user_authentication/user_registration_show/<?php echo $id ?>"><?php echo base_url() ?>/index.php/user_authentication/user_registration_show/<?php echo $id ?></a></p></h4>

                    <button onclick="copyToClipboard('#p1')">Copy Link</button>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-8">
                    <a href="#" class="fa fa-facebook"></a>
                    <a href="#" class="fa fa-twitter"></a>
                    <a href="#" class="fa fa-google"></a>
                    <a href="#" class="fa fa-linkedin"></a>
                    <a href="#" class="fa fa-youtube"></a>
                </div>
            </div>
            <br>
            <div class="row" style="border: 2px solid #d8c8c8; box-shadow: 3px 3px 18px 0px rgb(191, 177, 177); padding-bottom: 17px;">
                <div class="col-md-4">
                    <h4>First Level User <?php echo $sap->username ?></h4>
                    <br>
                    <table class="table table-bordered" style="display: none" >
                        <tr>
                            <th>SI No</th>
                            <th>User Name</th>
                            <th>Points Earned</th>
                            <th>DOJ</th>
                        </tr>
                        <?php
                        $i = 1;
                        $s1 = $this->login_database->get_first_level($id);
                        foreach ($s1 as $s2) {
                            ?>
                            <tbody id="tab">
                                <tr>
                                    <td><?php echo $i ?></td>
                                    <td><?php echo $s2->name ?></td>
                                    <td><?php echo $s2->points ?></td>
                                    <td><?php echo $s2->date ?></td>
                                </tr>
                            </tbody>
                            <?php
                            $i += 1;
                        }
                        $a1 = $i - 1;
                        ?>
                        <tr>
                            <td></td>
                            <td></td><td></td>
                            <td><b>Total User in first level <?php echo $a1 ?></b></td>
                        </tr>
                    </table>
                    <h4><b>Total User in first level <?php echo $a1 ?></b></h4>
                </div>
                <div class="col-md-4">
                    <h4>Second Level User <?php echo $sap->username ?></h4>
                    <br>
                    <table class="table table-bordered" style="display: none">
                        <div>
                            <tr>
                                <th>SI No</th>
                                <th>User Name</th>
                                <th>Points Earned</th>
                                <th>DOJ</th>
                            </tr>
                            <?php
                            $j = 1;
                            $s3 = $this->login_database->get_second_level($id);
                            foreach ($s3 as $s4) {
                                ?>
                                <tbody id="tab">
                                    <tr>
                                        <td><?php echo $j ?></td>
                                        <td><?php echo $s4->name ?></td>
                                        <td><?php echo $s4->points ?></td>
                                        <td><?php echo $s4->date ?></td>
                                    </tr>
                                </tbody>
                                <?php
                                $j += 1;
                            }
                            $a3 = $j - 1;
                            ?>
                        </div>
                        <tr>
                            <td></td>
                            <td></td><td></td>
                            <td><b>Total users in level second is <?php echo $a3 ?></b></td>
                        </tr>
                    </table>
                    <h4><b>Total users in second level is <?php echo $a3 ?></b></h4>
                </div>
                <div class="col-md-4">
                    <h4>Third Level User <?php echo $sap->username ?></h4>
                    <br>
                    <table class="table table-bordered" style="display: none">
                        <tr>
                            <th>SI No</th>
                            <th>User Name</th>
                            <th>Points Earned</th>
                            <th>DOJ</th>
                        </tr>
                        <?php
                        $r = 1;
                        $s3 = $this->login_database->get_third_level($id);
                        foreach ($s3 as $s4) {
                            /*    $s7 = $this->admin_model->doj($s4->name);{                                
                              } */
                            ?>
                            <tbody id="tab">
                                <tr>
                                    <td><?php echo $r ?></td>
                                    <td><?php echo $s4->name ?></td>
                                    <td><?php echo $s4->points ?></td>
                                    <td><?php echo $s4->date ?></td>
                                </tr>
                            </tbody>
                            <?php
                            $r += 1;
                        }
                        $a4 = $r - 1;
                        ?>
                        <tr>
                            <td></td>
                            <td></td><td></td>
                            <td><b>Total users in level third is <?php echo $a4 ?></b></td>
                        </tr>
                    </table>
                    <h4><b>Total users in level third is <?php echo $a4 ?></b></h4>
                </div>
            </div>
        </div>
    </body>
</html>