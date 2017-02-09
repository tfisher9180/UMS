<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php

	class User extends CI_Model {

		public function __construct() {

			parent::__construct();
			
		}

		public function is_unique($field, $value) {

			$query = $this->db->get_where('users', array($field => $value));
			if ($query->num_rows() != 0) {
				return false;
			} else {
				return true;
			}

		}

	}

?>