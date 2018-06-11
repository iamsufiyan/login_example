<?php
if (isset($this->session->userdata['logged_in'])) {
    $id = ($this->session->userdata['logged_in']['id']);
    $username = ($this->session->userdata['logged_in']['username']);
    $email = ($this->session->userdata['logged_in']['email']);
    $date = ($this->session->userdata['logged_in']['date']);
    $id = ($this->session->userdata['logged_in']['id']);
}

$user_data = $this->login_database->get_points($id);

?>

<html lang="en">
    <head>
        <title>Ultimez</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="<?php echo base_url(); ?>css/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>css/bootstrap.min.js"></script>
        <style>
            .btn-danger {
                color: black!important;
                background-color: #ffffff!important;
                border-color: #c5b9b9!important;
            }
        </style>
        <script>
            function get_poin(val) {
                var id = document.getElementById("ids").value
<?php $base = base_url(); ?>
                var url = "<?php echo"$base"; ?>index.php/User_Authentication/get_poin/" + val + '/' + id;
                $.ajax({
                    type: 'post',
                    url: url,
                    success: function (response) {
                        document.getElementById("tab").innerHTML = response;
                    }
                });
            }
        </script>
    </head>

    <body>
        <div class="container">
            <br><br>
            
            
            <div class="row">
                <b id="logout"><a href="<?php echo base_url() ?>index.php/user_authentication/user_login_process">Back</a></b>
                <br>
                <div class="col-md-10" style="border: 2px solid #d8c8c8; box-shadow: 3px 3px 18px 0px rgb(191, 177, 177);">
                    <h4>Point Table of <?php echo $username ?></h4>
                    <input style="display:none" type="text" id="ids" value="<?php echo $id ?>">
                    <select name="get_poin" class="form-control" id="get_poin" onchange="get_poin(this.value);">
                        <option value="all">All</option>
                        <option value="3">First Level</option>
                        <option value="2">Second Level</option>
                        <option value="1">Third Level</option>
                    </select>
                    <br>
                    <input type="text" class="form-control sea" id="myInput" onkeyup="Function()" placeholder="Search">
                    <br>
                    <table class="table table-bordered">
                        <tr>
                            <th>SI No</th>
                            <th>Name</th>
                            <th>Earned Points</th>
                            <th>DOJ</th>
                        </tr>
                        <tbody id="tab">
                            <?php
                            $i = 1;
                            foreach ($user_data as $row) {
                                ?>

                                <tr>
                                    <td><?php echo $i ?></td>
                                    <td><?php echo $row->name ?></td>
                                    <td><?php echo $row->points ?> Points</td>
                                    <td><?php echo $row->date ?></td>
                                </tr>

                                <?php
                                $i += 1;
                                $a1 = $a1 + $row->points;
                            }
                            ?>
                            <tr>
                                <td></td>
                                
                                <td>Total Points</td>
                                <td><?php
                                if ($a1 == '') {
                                    ?>0 Points</td><?php
                                    } else {
                                        echo $a1
                                        ?> Points</td><?php
                            }
                                    ?></td>
                                    <td></td>
                            </tr>
                        </tbody>

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
        </div>
    </body>
</html>

