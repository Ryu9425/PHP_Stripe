<?php 

class Transaction
{
	private $db;

	function __construct()
	{
		$this->db = new Database;
	}

	function addTransaction($data){
		//prepare query
		$this->db->query('INSERT INTO tbl_trans (amount) VALUES(:amount)');

		//Bind Values
    	
    	$this->db->bind(':amount', $data['amount']);
    	

    	//Execute
    	if ($this->db->execute()) {
    		return true;
    	} else {
    		return false;
    	}
	}

        public function getTransaction()
    {
        $this->db->query('SELECT * FROM tbl_trans ORDER BY creat_date DESC');

        $result = $this->db->resultset();
        return $result;
    }
}