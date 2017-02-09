<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php

	class Pages extends CI_Controller {

		public function __construct() {

			parent::__construct();
			if (!$this->ion_auth->logged_in()) {
				redirect('users/login');
			}

		}

		public function view($page = 'home') {

			if (!file_exists(APPPATH.'views/pages/'.$page.'.php')) {
				show_404();
			}

			$header = array();
			$header['page'] = 'home';

			$this->load->view('templates/header', $header);
			$this->load->view('pages/'.$page);
			$this->load->view('templates/footer');

		}

	}

?>