<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php

	class Users extends CI_Controller {

		public function __construct() {
			
			parent::__construct();
			$this->load->model('user');
			$this->load->helper('form');

		}

		public function login() {

			if ($this->ion_auth->logged_in()) {
				redirect('/home');
			}

			$header = array();
			$header['page'] = 'login';

			$footer = array();
			$footer['scripts'] = array('jquery.validate.min.js', 'login_validate.js');

			if ($_POST) {
				$this->load->library('form_validation');

				$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
				$this->form_validation->set_rules('password', 'Password', 'required');

				$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

				if ($this->form_validation->run() == FALSE) {
					$this->load->view('templates/header', $header);
					$this->load->view('users/login');
					$this->load->view('templates/footer', $footer);
				} else {
					if ($this->ion_auth->login($this->input->post('email', TRUE), $this->input->post('password', TRUE))) {
						redirect('/home');
					} else {
						$this->session->set_flashdata('msg', '<div class="has-error"><span class="help-block">Username or password incorrect</span></div>');

						$this->load->view('templates/header', $header);
						$this->load->view('users/login');
						$this->load->view('templates/footer', $footer);
					}
				}
			} else {
				$this->load->view('templates/header', $header);
				$this->load->view('users/login');
				$this->load->view('templates/footer', $footer);
			}

		}

		public function logout() {

			$this->ion_auth->logout();

			$this->session->set_flashdata('msg', '<div class="has-success"><span class="help-block">Your password has been successfully changed. Please login to continue!</span></div>');

			redirect('users/login');

		}

		public function register() {

			if ($this->ion_auth->logged_in()) {
				redirect('/home');
			}

			$header = array();
			$header['page'] = 'register';

			$footer = array();
			$footer['scripts'] = array('jquery.validate.min.js', 'register_validate.js');

			if ($_POST) {
				$this->load->library('form_validation');

				$this->form_validation->set_rules('fname', 'First name', 'required|min_length[2]|max_length[35]');
				$this->form_validation->set_rules('lname', 'Last name', 'required|min_length[2]|max_length[35]');
				$this->form_validation->set_rules('email', 'Email', 'required|valid_email|min_length[3]|max_length[254]|is_unique[users.email]');
				$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]|max_length[20]');

				$this->form_validation->set_message('is_unique', 'This email address is already taken!');

				$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

				if ($this->form_validation->run() == FALSE) {
					$this->load->view('templates/header', $header);
					$this->load->view('users/register');
					$this->load->view('templates/footer', $footer);
				} else {
					$email = $this->input->post('email', TRUE);
					$password = $this->input->post('password', TRUE);
					$fname = $this->input->post('fname', TRUE);
					$lname = $this->input->post('lname', TRUE);

					$additional_data = array(
						'first_name' => $fname,
						'last_name' => $lname
					);

					if ($this->ion_auth->register($email, $password, $email, $additional_data)) {
						$this->session->set_flashdata('msg', '<div class="has-success"><span class="help-block">Registration successful! Please login to continue</span></div>');
						redirect('users/login');
					} else {
						$this->session->set_flashdata('msg', '<div class="has-error"><span class="help-block">There was an error during your registration. Please try again</span></div>');
						redirect('users/login');
					}
				}
			}

			$this->load->view('templates/header', $header);
			$this->load->view('users/register');
			$this->load->view('templates/footer', $footer);

		}

		public function ajax_email_check() {
			$email = $this->input->post('email', TRUE);

			if ($this->user->is_unique('email', $email)) {
				// is unique
				$data['success'] = true;
			} else {
				// email taken
				$data['success'] = false;
			}
			echo json_encode($data);
		}

		public function forgot_password() {

			$header = array();
			$header['page'] = 'forgot';

			$footer = array();
			$footer['scripts'] = array('jquery.validate.min.js', 'forgot_validate.js');

			if ($_POST) {
				$this->load->library('form_validation');

				$this->form_validation->set_rules('email', 'Email', 'required|valid_email|not_unique[users.email]');

				$this->form_validation->set_message('not_unique', 'We couldn\'t find an account associated with this email address');

				$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

				if ($this->form_validation->run() == FALSE) {
					$this->load->view('templates/header', $header);
					$this->load->view('users/forgot_password');
					$this->load->view('templates/footer', $footer);
				} else {
					if ($this->ion_auth->forgotten_password($this->input->post('email', TRUE))) {
						// no errors
						$this->session->set_flashdata('msg', '<div class="has-success"><span class="help-block">An email containing instructions to reset your password has been sent to your email address.</span></div>');
						redirect('users/login');
					} else {
						// errors
						$this->session->set_flashdata('msg', '<div class="has-error"><span class="help-block">There was an error processing your request. Please try again!</span></div><div class="has-error"><span class="help-blocK">'.$this->ion_auth->errors().'</span></div>');
						redirect('users/forgot_password');
					}
				}
			}

			$this->load->view('templates/header', $header);
			$this->load->view('users/forgot_password');
			$this->load->view('templates/footer', $footer);

		}

		public function reset_password($code) {

			$header = array();
			$header['page'] = 'reset';

			$footer = array();
			$footer['scripts'] = array('jquery.validate.min.js', 'reset_validate.js');

			if (!$code) {
				show_404();
			}

			$user = $this->ion_auth->forgotten_password_check($code);
			$data['user_id'] = $user->id;

			if ($user) {
				// token is valid - display reset form

				if ($_POST) {
					$this->load->library('form_validation');

					$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]|max_length[20]');
					$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');

					$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

					if ($this->form_validation->run() == FALSE) {
						redirect('users/reset_password/'.$code, 'refresh');
					} else {
						if ($user->id != $this->input->post('user_id')) {
							// something might be wrong
							$this->ion_auth->clear_forgotten_password_code($code);
							$this->session->set_flashdata('msg', '<div class="has-error"><span class="help-block">There was an error processing your request</span></div><div class="has-error"><span class="help-blocK"></span></div>');
							redirect('users/login');
						} else {
							// request is valid, change the password
							$identity = $user->{$this->config->item('identity', 'ion_auth')};
							if ($this->ion_auth->reset_password($identity, $this->input->post('password'))) {
								$this->session->set_flashdata('msg', '<div class="has-success"><span class="help-block">Your password has been successfully changed. Please login to continue!</span></div>');
								redirect('users/login');
							} else {
								$this->session->set_flashdata('msg', '<div class="has-error"><span class="help-block">There was an error changing your password</span></div><div class="has-error"><span class="help-blocK"></span></div>');
								redirect('users/reset_password/'.$code);
							}
						}
					}
				}

				$this->load->view('templates/header', $header);
				$this->load->view('users/reset_password', $data);
				$this->load->view('templates/footer', $footer);
			} else {
				// token invalid
				$this->session->set_flashdata('msg', '<div class="has-error"><span class="help-block">Token has expired or is invalid, please request a new reset email</span></div><div class="has-error"><span class="help-blocK"></span></div>');
				redirect('users/forgot_password');
			}

		}

		public function change_password() {

			if (!$this->ion_auth->logged_in()) {
				redirect('users/login');
			}

			$header = array();
			$header['page'] = 'change';

			$footer = array();
			$footer['scripts'] = array('jquery.validate.min.js', 'change_validate.js');

			if ($_POST) {
				$this->load->library('form_validation');

				$this->form_validation->set_rules('old_password', 'Old Password', 'required');
				$this->form_validation->set_rules('password', 'New Password', 'required|min_length[6]|max_length[20]');
				$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');

				$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

				if ($this->form_validation->run() == FALSE) {
					$this->load->view('templates/header', $header);
					$this->load->view('users/change_password');
					$this->load->view('templates/footer', $footer);
				} else {
					$identity = $this->session->userdata('identity');

					if ($this->ion_auth->change_password($identity, $this->input->post('old_password'), $this->input->post('password'))) {
						$this->logout();
					} else {
						$this->session->set_flashdata('msg', '<div class="has-error"><span class="help-block">'.$this->ion_auth->errors().'</span></div><div class="has-error"><span class="help-blocK"></span></div>');
						redirect('users/change_password');
					}
				}
			}

			$this->load->view('templates/header', $header);
			$this->load->view('users/change_password');
			$this->load->view('templates/footer', $footer);

		}

		public function ajax_check_password() {

			$user = $this->ion_auth->user()->row();
			$old_password = $this->input->post('old_password', TRUE);
			$password_matches = $this->ion_auth->hash_password_db($user->id, $old_password);

			if ($password_matches) {
				$match = 'true';
			} else {
				$match = 'This password did not match your existing password';
			}
			echo json_encode($match);

		}

	}

?>