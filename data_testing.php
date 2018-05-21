<? 

// Testing Page
include('configs/connection.php');
include('model/car.php');

$conn_obj = new Connection();
$conn = $conn_obj->connect();

$car = new Car($conn);
print_r($car);
// $user->insert("UPDATE cars SET available_seat=17,invalid_seats='3,4,5,67,8,' WHERE id=1 ");
$car_data = $car->select("SELECT * from cars where DATE_FORMAT(departure_date, '%p')='PM' ");
print_r($car_data);

?>