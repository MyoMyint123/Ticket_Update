<?
	/**
	* 
	*/
	class Connection
	{
		private $user = 'root';
		private $password = '';
		
		function __construct()
		{
			
		}

		public function connect()
		{
			$conn = new PDO('mysql:host=localhost;dbname=ticket', $this->user, $this->password);
			return $conn;
		}

	}

?>