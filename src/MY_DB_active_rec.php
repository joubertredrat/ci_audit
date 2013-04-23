<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * My version of active record to manage a audit in queries.
 *
 *
 * @package		CodeIgniter
 * @subpackage	Libraries
 * @author		Joubert RedRat <joubert@redrat.com.br>
 * @category	Libraries
 * @link		http://codeigniter.com/user_guide/general/routing.html
 */
class MY_DB_active_rec extends CI_DB_active_record
{
	var $CI;
	const OPERATION_INSERT = 'insert';

	/**
	 * Constructor
	 *
	 * @access	public
	 */
	public function __construct($params)
	{
		parent::__construct($params);
		$this->CI =& get_instance();
		$this->CI->load->library('session');

	}


	function insert($table = '', $set = NULL) {
		$success = parent::insert($table, $set);
		if($success)
		{
			$data['table'] = $table;
			$data['operation'] = self::OPERATION_INSERT;
			$data['query'] = parent::last_query();
			$query = parent::get($table);
			$data['final_state'] = json_encode($query->last_row('array'));
			$data['session'] = json_encode($this->CI->session->userdata);
			parent::insert('audit', $data);
		}
		return $success;
	}

	function update($table = '', $set = NULL) {
		$query = parent::get($table);
		$data['table'] = $table;
		$data['operation'] = 'update';	
		$data['initial_state'] = json_encode($query->result());
		$success = parent::update($table, $set);
		if($success)
		{
			$data['query'] = parent::last_query();
			$query = parent::get($table);
			$data['final_state'] = json_encode($query->result());
			$data['session'] = json_encode($this->CI->session->userdata);
			parent::insert('audit', $data);
		}
		return $success;
	}
}