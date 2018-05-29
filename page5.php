<?

include('configs/connection.php');
include('model/car.php');
include('model/user.php');

$conn_obj = new Connection();
$conn = $conn_obj->connect();
session_start();

$seats_group = '';
$seats_number = array('');
if($_POST['seatIDs']){

  $seats_group = $_POST['seatIDs'];
  $seats_number = explode(',', $seats_group);

}


$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$car_id = $_POST['carID'];


$car = new Car($conn);
$sql = "SELECT * FROM cars WHERE id='$car_id' ";
$car_result = $car->select($sql);
$invalid_seats = $car_result[0]['invalid_seats'];
$allInvalid = $invalid_seats.','.$seats_group;
$invalid_seats_array = explode(",", $allInvalid);
$total_seats = $car_result[0]['total_seat'];
$numOfInvalidSeats = count($invalid_seats_array);
$available_seats = $total_seats - $numOfInvalidSeats;

$sql = "UPDATE cars SET available_seat='$available_seats',invalid_seats='$allInvalid' WHERE id='$car_id' ";
$car->insert($sql);


$user = new User($conn);
$sql = "INSERT INTO users (car_id,name,email,phone,seat_numbers) VALUES ('$car_id','$name','$email','$phone','$seats_group')";
$user->insert($sql);


?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Bus</title>
  <link rel="stylesheet" href="dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="dist/css/jquery-ui.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />  
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
  <link rel="stylesheet" href="dist/css/style.css">
</head>
<body>
  <div class="wrapper">
    <header class="header"> 
      <nav class="navbar navbar-default">
        <div class="container">

          <div class="navbar-header">
            <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a href="#" class="navbar-brand">BusTicket</a>
          </div>

          <div id="navbarCollapse" class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
              <li class="active"><a href="index.php">Home</a></li>
              <li><a href="#">About Us</a></li>
              <li><a href="#">Services</a></li>
              <li class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle" href="#">Language <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="#">Myanmar</a></li>
                  <li class="divider"></li>
                  <li><a href="#">English</a></li>
                </ul>
              </li>
            </ul>
          </div>

        </div>
      </nav>
    </header>
    <div class="content">
      <div class="container">
        <div class="row">          
          <div class="col-md-offset-3 col-md-6">
            <div class="process">
              <span class="">Seat Selection => Traveler Information => Payment =></span>
            </div>
          </div>
        </div>
        <div class="row">          
          <div class="col-md-offset-3 col-md-6">
            <div class="panel panel-success">
              <div class="panel-heading">
                Ticket Information
              </div>
              <div class="panel-body">
                <?if($car_result) : ?>
                  <div class="trip_information">
                    <table class="table table-striped">
                      <tbody>
                        <tr>
                          <td> Traveler Name </td>
                          <td> <?= $name?> </td>
                        </tr> 
                        <tr>
                          <td> Email </td>
                          <td> <?= $email ?> </td>
                        </tr> 
                        <tr>
                          <td> Phone </td>
                          <td> <?= $phone ?> </td>
                        </tr> 
                        <tr>
                          <td> Operator </td>
                          <td> <?= $car_result[0]['name']?> </td>
                        </tr> 
                        <tr>
                          <td> Route </td>
                          <td>
                            <?= $car_result[0]['routes']?> 
                          </td>
                        </tr> 
                        
                        <tr>
                          <td>  Seat Number </td>
                          <td>
                            <?= $seats_group ?>
                          </td>
                        </tr>
                        
                      </tbody>
                    </table>          
                  </div>
                <? endif; ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script type="text/javascript" src="dist/js/jquery.min.js"></script>
  <script type="text/javascript" src="dist/js/jquery-ui.js"></script>
  <script type="text/javascript" src="dist/js/bootstrap.min.js"></script>
  <script>
    $(document).ready(function() {

    });
  </script>
</body>
</html>