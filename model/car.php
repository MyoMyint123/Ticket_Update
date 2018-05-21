<?
/**
* 
*/
class Car
{
	private $conn;
	public function __construct($conn)
	{

		$this->conn = $conn;

	}

	public function select($sql)
	{
		$car_data = $this->conn->query($sql);
		$car_row_count = $car_data->rowCount();
		$car_result = array();
		if($car_row_count > 0){
		  $car_result = $car_data->fetchall();
		  return $car_result;
		}
		return "No Data Found";
	}

	public function insert($sql)
	{
		$this->conn->query($sql);
	}

}
?>