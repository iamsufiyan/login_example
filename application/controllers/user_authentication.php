<?php
error_reporting(0);

Class User_Authentication extends CI_Controller {

    public function __construct() {
        parent::__construct();

// Load form helper library
        $this->load->helper('form');

// Load form validation library
        $this->load->library('form_validation');

// Load session library
        $this->load->library('session');

// Load database
        $this->load->model('login_database');
    }

// Show login page
    public function index() {
        $this->load->view('login_form');
    }

// Show registration page
    public function user_registration_show($id) {
        $data = array(
            'id' => $id
        );
        $this->load->view('registration_form', $data);
    }

// Validate and store registration data in database
    public function new_user_registration() {
        $points = 3;
        $ref2 = $_POST['ref2'];
        $c2 = $this->login_database->get_username($ref2);
        foreach ($c1 as $c2) {
            
        };
        $ref_name2 = "$c2->username";
        $ref3 = $_POST['ref3'];
        $c3 = $this->login_database->get_username($ref3);
        foreach ($c3 as $c4) {
            
        };
        $ref_name3 = "$c4->username";
        $r2 = 2;
        $r1 = 1;

        $this->load->helper('security');
// Check validation for user input in SignUp form
        $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
        $this->form_validation->set_rules('email_value', 'Email', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
        $this->form_validation->set_rules('ref_id', 'Referel', 'trim|required|xss_clean');

        $date = date('d-m-Y');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('registration_form');
        } else {
            $data1 = array(
                'user_name' => $this->input->post('username'),
                'user_email' => $this->input->post('email_value'),
                'user_password' => $this->input->post('password'),
                'date' => $date,
                'createdby' => $this->input->post('ref_id')
            );
            //$this->db->set($data1);

            $data2 = array(
                'user_ref' => $this->input->post('ref_id'),
                'name' => $this->input->post('username'),
                'points' => $points
            );
            //$this->db->set($data2);

            $data3 = array(
                'user_ref' => $ref2,
                'name' => $this->input->post('username'),
                'points' => $r2
            );
            //$this->db->set($data3);

            $data4 = array(
                'user_ref' => $ref3,
                'name' => $this->input->post('username'),
                'points' => $r1
            );
            if ($ref2 == 0 && $ref3 == 0) {
                $result = $this->login_database->registration_insert($data1);
                $result = $this->login_database->insert_points($data2);
            } elseif ($ref2 != 0 && $ref3 == 0) {
                $result = $this->login_database->registration_insert($data1);
                $result = $this->login_database->insert_points($data2);
                $result = $this->login_database->insert_points2($data3);
            } else {
                $result = $this->login_database->registration_insert($data1);
                $result = $this->login_database->insert_points($data2);
                $result = $this->login_database->insert_points2($data3);
                $result = $this->login_database->insert_points3($data4);
            }
            if ($result == TRUE) {
                $data['message_display'] = 'Registration Successfully !';
                redirect('user_authentication/thanks');
            } else {
                $data['message_display'] = 'Username already exist!';
                $this->load->view('registration_form', $data);
            }
        }
    }

// Check for user login process
    public function user_login_process() {
        $this->load->helper('security');
        $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');


        if ($this->form_validation->run() == FALSE) {
            if (isset($this->session->userdata['logged_in'])) {
                $this->load->view('admin_page');
            } else {
                $this->load->view('login_form');
            }
        } else {
            $data = array(
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password'),
            );
            $result = $this->login_database->login($data);
            if ($result == TRUE) {
                $username = $this->input->post('username');
                $result = $this->login_database->read_user_information($username);
                if ($result != false) {
                    $session_data = array(
                        'id' => $result[0]->id,
                        'username' => $result[0]->user_name,
                        'email' => $result[0]->user_email,
                        'date' => $result[0]->date,
                        'createdby' => $result[0]->createdby
                    );
// Add user data in session
                    $this->session->set_userdata('logged_in', $session_data);
                    $this->load->view('admin_page');
                }
            } else {
                $data = array(
                    'error_message' => 'Invalid Username or Password'
                );
                $this->load->view('login_form', $data);
            }
        }
    }

// Logout from admin page
    public function logout() {

// Removing session data
        $sess_array = array(
            'username' => ''
        );
        $this->session->unset_userdata('logged_in', $sess_array);
        $data['message_display'] = 'Successfully Logout';
        $this->load->view('login_form', $data);
    }

    public function earned() {
        if ($this->form_validation->run() == FALSE) {
            if (isset($this->session->userdata['logged_in'])) {
                $id = $_POST['ids'];
                $result = $this->login_database->check($id);
                if ($result == TRUE) {
                    $session_data = array(
                        'id' => $result[0]->id,
                        'username' => $result[0]->user_name,
                        'email' => $result[0]->user_email,
                        'date' => $result[0]->date
                    );
// Add user data in session
                    $this->session->set_userdata('logged_in', $session_data);
                    $this->load->view('earned_points');
                }
            } else {
                $this->load->view('login_form');
            }
        }
    }

    public function list_user() {
        if ($this->form_validation->run() == FALSE) {
            if (isset($this->session->userdata['logged_in'])) {
                $id = $_POST['ids'];
                $result = $this->login_database->check($id);
                if ($result == TRUE) {
                    $session_data = array(
                        'id' => $result[0]->id,
                        'username' => $result[0]->user_name,
                        'email' => $result[0]->user_email,
                        'date' => $result[0]->date
                    );
// Add user data in session
                    $this->session->set_userdata('logged_in', $session_data);
                    $this->load->view('list_user');
                }
            } else {
                $this->load->view('login_form');
            }
        }
    }

    public function referal() {
        if ($this->form_validation->run() == FALSE) {
            if (isset($this->session->userdata['logged_in'])) {
                $id = $_POST['ids'];
                $result = $this->login_database->check($id);
                if ($result == TRUE) {
                    $session_data = array(
                        'id' => $result[0]->id,
                        'username' => $result[0]->user_name,
                        'email' => $result[0]->user_email,
                        'date' => $result[0]->date
                    );
// Add user data in session
                    $this->session->set_userdata('logged_in', $session_data);
                    $this->load->view('referal');
                }
            } else {
                $this->load->view('login_form');
            }
        }
    }

    public function get_poin($points, $user_ref) {
        if ($points == 'all') {
            $user_data = $this->login_database->get_all($user_ref);
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
                <td><?php echo $a1 ?> Points</td>
                <td></td>
            </tr>
            <?php
        } else {

            $user_data = $this->login_database->get_poin($points, $user_ref);
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
                <?php
                if ($a1 == '') {
                    ?><td> <?php
                        echo "0 points";
                    } else {
                        ?><td><?php echo $a1 ?> Points</td><?php
                    }
                    ?>
                <td></td>
            </tr>
            <?php
        }
    }

    public function thanks() {
        $this->load->view('thank_you');
    }

}
?>