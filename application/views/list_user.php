<?php
if (isset($this->session->userdata['logged_in'])) {
    $id = ($this->session->userdata['logged_in']['id']);
    $username = ($this->session->userdata['logged_in']['username']);
    $email = ($this->session->userdata['logged_in']['email']);
    $date = ($this->session->userdata['logged_in']['date']);
    $id = ($this->session->userdata['logged_in']['id']);
}
$user_data = $this->login_database->get_username($id);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Ultimez</title>
        <meta charset="utf-8">
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container">
            <br><br>
            <br>
            <b id="logout"><a class="btn btn-success" href="<?php echo base_url() ?>index.php/user_authentication/user_login_process">Back</a></b>
            <br>
            <br>
            <div class="row">
                <div class="col-md-6"style="border: 2px solid #d8c8c8; box-shadow: 3px 3px 18px 0px rgb(191, 177, 177);">
                    <h4>Total user created by <?php echo $username ?></h4>
                    <input type="text" class="form-control sea" id="myInput" onkeyup="Function()" placeholder="Search">
                    <br>
                    <table class="table table-bordered" >
                        <tr>
                            <th>SI No</th>
                            <th>User Name</th>
                            <th>Created Date</th>
                        </tr>
                        <?php
                        $l = 1;
                        foreach ($user_data as $row) {
                            ?>
                            <tbody id="tab">
                                <tr>
                                    <td><?php echo $l ?></td>
                                    <td><?php echo $row->user_name ?></td>
                                    <td><?php echo $row->date ?></td>
                                </tr>
                            </tbody>
                            <?php
                            $l += 1;
                        }
                        $al = $l - 1;
                        ?>
                        <tr>
                            <td></td>
                            <td></td>
                            <td><b>Total User <?php echo $al ?></b></td>
                        </tr>
                    </table>
                    <script>
                        var $rows = $('#tab tr');
                        $('#myInput').keyup(function () {
                            var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();
                            $rows.show().filter(function () {
                                var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
                                return !~text.indexOf(val);
                            }).hide();
                        });
                    </script>
                </div>

            </div>
            <!--<div class="row">
                <div class="col-md-4">
                    <h4>First Level User <?php echo $sap->username ?></h4>
                    <br>
                    <table class="table table-bordered" >
                        <tr>
                            <th>SI No</th>
                            <th>User Name</th>
                            <th>Points Earned</th>
                            <th>DOJ</th>
                        </tr>
            <?php
            $i = 1;
            $s1 = $this->admin_model->get_first_level($sap->id);
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
                            <td><b>Total User <?php echo $a1 ?></b></td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-4">
                    <h4>Second Level User <?php echo $sap->username ?></h4>
                    <br>
                    <table class="table table-bordered" >
                        <tr>
                            <th>SI No</th>
                            <th>User Name</th>
                            <th>Points Earned</th>
                            <th>DOJ</th>
                        </tr>
            <?php
            $j = 1;
            $s3 = $this->admin_model->get_second_level($sap->id);
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
                        <tr>
                            <td></td>
                            <td></td><td></td>
                            <td><b>Total users in level second is <?php echo $a3 ?></b></td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-4">
                    <h4>Third Level User <?php echo $sap->username ?></h4>
                    <br>
                    <table class="table table-bordered" >
                        <tr>
                            <th>SI No</th>
                            <th>User Name</th>
                            <th>Points Earned</th>
                            <th>DOJ</th>
                        </tr>
            <?php
            $r = 1;
            $s3 = $this->admin_model->get_third_level($sap->id);
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
                </div>
            </div>-->
        </div>
    </body>
</html>
