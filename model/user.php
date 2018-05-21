<?

/**
* 
*/
class User
{
	private $conn;
	public function __construct($conn)
	{
		$this->conn = $conn;
	}

	public function select($sql)
	{
		# code...
	}

	public function insert($sql)
	{
		$this->conn->query($sql);
	}

}

?>