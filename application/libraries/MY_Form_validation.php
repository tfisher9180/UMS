<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php

	class MY_Form_validation extends CI_Form_validation {

		public function __construct() {

			parent::__construct();

		}

		/**
		 * Not Unique
		 *
		 * Replica of CodeIgniter source code
		 * Return TRUE if record found
		 *
		 * @param	string	$str
		 * @param	string	$field
		 * @return	bool
		 */
		public function not_unique($str, $field) {

			sscanf($field, '%[^.].%[^.]', $table, $field);
			return isset($this->CI->db)
				? ($this->CI->db->limit(1)->get_where($table, array($field => $str))->num_rows() != 0)
				: FALSE;

		}

	}

?>