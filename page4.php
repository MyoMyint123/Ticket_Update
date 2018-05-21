<?

include('configs/connection.php');
include('model/car.php');

$conn_obj = new Connection();
$conn = $conn_obj->connect();
session_start();

$seats_number = array('');
if($_POST['seatIDs']){
 if(is_array($_POST['seatIDs'])){
  $seats_number = $_POST['seatIDs'];
}else{
  $seats_number = $_POST['seatIDs'];
}
}
$seats_number = explode(',', $seats_number);

$travellers = $_SESSION["travellers"];

$car_id = $_POST['carID'];

$car_obj = new Car($conn);
$sql = "SELECT * FROM cars WHERE id='$car_id' ";
$car_result = $car_obj->select($sql);

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
        <div class="process">
          <span class="">Seat Selection => Traveler Information =></span>
        </div>
        <div class="row">
          <div class="col-md-7">
          	<div class="panel panel-default">
              <div class="panel-heading">
                Enter Traveler Information
              </div>
              <div class="panel-body">
                <form action="page5.php" method="post" class="form" name="book_ticket">
                  <input type="hidden" name="seatIDs" id="seatIDs" value="<?= $_POST['seatIDs'] ?>" />
                  <input type="hidden" name="carID" id="carID" value="<?= $car_id ?>" />
                  <div class="form-group">
                    <label for="name">Traveler Name *</label>
                    <input type="text" name="name" id="name" class="form-control" required />
                  </div>
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" class="form-control" required />
                  </div>
                  <div class="form-group">
                    <label for="phone">Phone *</label>
                    <input type="text" name="phone" id="phone" class="form-control"  required />
                    <div>
                      <small>Please enter Myanmar Cell Phone Number.</small>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-5 pull-right">
                      <button type="submit" class="form-control btn-success" >Submit and Continue</button>
                    </div>
                  </div>

                </form>
              </div>
            </div>
          </div>
          
          <div class="col-md-5">
            <div class="panel panel-default">
              <div class="panel-heading">
                Trip Information
              </div>
              <div class="panel-body">

                <?if($car_result) : ?>
                  <div class="trip_information">
                    <table class="table table-striped">
                      <tbody>
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
                          <td> Departure Time </td>
                          <td>
                            <?
                            $tmp_start_date =date_create($car_result[0]['departure_date']);
                            $departure_date = date_format($tmp_start_date,"F d, h:i A");
                            echo $departure_date;
                            ?>
                          </td>
                        </tr>
                        <tr>
                          <td>  Arrival Time </td>
                          <td>
                            <?
                            $tmp_arrived_date =date_create($car_result[0]['arrival_date']);
                            $arrived_date = date_format($tmp_arrived_date,"F d, h:i A");
                            echo $arrived_date;
                            ?>
                          </td>
                        </tr>
                        <tr>
                          <td>  Seat Number </td>
                          <td>
                            <?
                            $seat_count = count($seats_number);
                            for ($i=0; $i < $seat_count; $i++) { 
                              if($i == $seat_count-1){
                                echo $seats_number[$i];
                              }else{
                                echo $seats_number[$i] .', ';
                              }
                            }
                            ?>
                          </td>
                        </tr>
                        <tr>
                          <td>Total </td>
                          <td><?= $car_result[0]['price']* $travellers ?> MMK</td>
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
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.js"></script>
  <script>
    $(document).ready(function() {

      $.validator.addMethod("letters", function(value, element) {
        return this.optional(element) || value == value.match(/^[a-zA-Z\s]*$/);
      });

      $("form[name='book_ticket']").validate({

        // Specify validation rules
        rules: {          
          name: {
            required: true,
            letters: true
          },
          email: {
            required: true,
            email: true
          },
          phone: {
            required: true,
            number: true
          }
        },
        // Specify validation error messages
        messages: {
          name: "Please specify your name (only letters and spaces are allowed).",
          email: "Please specify a valid email address.",
          phone: "Please select your phone. Example : (09)334347330 "
        },
        
        submitHandler: function(form) {
          form.submit();
        }
      });

    });
  </script>
</body>
</html>