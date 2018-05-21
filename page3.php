<?

include('configs/connection.php');
include('model/car.php');

$conn_obj = new Connection();
$conn = $conn_obj->connect();
session_start();

$car_id = $_POST['car_id'];
$noOfseats = isset($_POST['noOfseats']) ? $_POST['noOfseats'] : '';

$car = new Car($conn);
$sql = "SELECT * FROM cars WHERE id='$car_id' ";
$car_data = $car->select($sql);
$invalid_seats = $car_data[0]['invalid_seats'];  

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
          <span class="">Seat Selection =></span>
        </div>
        <div class="row">
          <div class="col-md-7">
            <div class="panel panel-default">
              <div class="panel-heading">
               Please select <?= $noOfseats ?> seats
             </div>
             <div class="panel-body">

              <div class="row">
                <div class="col-md-offset-2 col-md-8 ">
                  <div class="driver-seat">
                    Driver
                  </div>
                  <table class="table-seat-plan" id="seat-table" width="100%">
                    <tbody>
                      <tr>
                        <td><a href="#" class="seat" data-seat-number="1"></a></td>
                        <td><a href="#" class="seat" data-seat-number="2"></a></td>
                        <td><span class="aisle"></span></td>
                        <td><a href="#" class="seat" data-seat-number="3"></a></td>
                        <td><a href="#" class="seat" data-seat-number="4"></a></td>
                      </tr>
                      <tr>
                        <td><a href="#" class="seat" data-seat-number="5"></a></td>
                        <td><a href="#" class="seat" data-seat-number="6"></a></td>
                        <td><span class="aisle"></span></td>
                        <td><a href="#" class="seat" data-seat-number="7"></a></td>
                        <td><a href="#" class="seat" data-seat-number="8"></a></td>
                      </tr>
                      <tr>
                        <td><a href="#" class="seat" data-seat-number="9"></a></td>
                        <td><a href="#" class="seat" data-seat-number="10"></a></td>
                        <td><span class="aisle"></span></td>
                        <td><a href="#" class="seat" data-seat-number="11"></a></td>
                        <td><a href="#" class="seat" data-seat-number="12"></a></td>
                      </tr>
                      <tr>
                        <td><a href="#" class="seat" data-seat-number="13"></a></td>
                        <td><a href="#" class="seat" data-seat-number="14"></a></td>
                        <td><span class="aisle"></span></td>
                        <td><a href="#" class="seat" data-seat-number="15"></a></td>
                        <td><a href="#" class="seat" data-seat-number="16"></a></td>
                      </tr>
                      <tr>
                        <td><a href="#" class="seat" data-seat-number="17"></a></td>
                        <td><a href="#" class="seat" data-seat-number="18"></a></td>
                        <td><span class="aisle"></span></td>
                        <td><a href="#" class="seat" data-seat-number="19"></a></td>
                        <td><a href="#" class="seat" data-seat-number="20"></a></td>
                      </tr>
                      <tr>
                        <td><a href="#" class="seat" data-seat-number="21"></a></td>
                        <td><a href="#" class="seat" data-seat-number="22"></a></td>
                        <td><span class="aisle"></span></td>
                        <td><a href="#" class="seat" data-seat-number="23"></a></td>
                        <td><a href="#" class="seat" data-seat-number="24"></a></td>
                      </tr>
                      <tr>
                        <td><a href="#" class="seat" data-seat-number="25"></a></td>
                        <td><a href="#" class="seat" data-seat-number="26"></a></td>
                        <td><span class="aisle"></span></td>
                        <td><a href="#" class="seat" data-seat-number="27"></a></td>
                        <td><a href="#" class="seat" data-seat-number="28"></a></td>
                      </tr>
                      <tr>
                        <td><a href="#" class="seat" data-seat-number="29"></a></td>
                        <td><a href="#" class="seat" data-seat-number="30"></a></td>
                        <td><span class="aisle"></span></td>
                        <td><a href="#" class="seat" data-seat-number="31"></a></td>
                        <td><a href="#" class="seat" data-seat-number="32"></a></td>
                      </tr>
                      <tr>
                        <td><a href="#" class="seat" data-seat-number="33"></a></td>
                        <td><a href="#" class="seat" data-seat-number="34"></a></td>
                        <td><span class="aisle"></span></td>
                        <td><a href="#" class="seat" data-seat-number="35"></a></td>
                        <td><a href="#" class="seat" data-seat-number="36"></a></td>
                      </tr>
                      <tr>
                        <td><a href="#" class="seat" data-seat-number="37"></a></td>
                        <td><a href="#" class="seat" data-seat-number="38"></a></td>
                        <td><span class="aisle"></span></td>
                        <td><a href="#" class="seat" data-seat-number="39"></a></td>
                        <td><a href="#" class="seat" data-seat-number="40"></a></td>
                      </tr>
                      <tr>
                        <td><a href="#" class="seat" data-seat-number="41"></a></td>
                        <td><a href="#" class="seat" data-seat-number="42"></a></td>
                        <td><span class="aisle"></span></td>
                        <td><a href="#" class="seat" data-seat-number="43"></a></td>
                        <td><a href="#" class="seat" data-seat-number="44"></a></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>


            </div>
          </div>            
        </div>
        <div class="col-md-5">
          <div class="panel panel-default">
            <div class="panel-heading">
             Trip Information
           </div>
           <div class="panel-body">

            <?if($car_data) : ?>
              <div class="trip_information">
                <table class="table">
                  <tbody>
                    <tr>
                      <td> Operator </td>
                      <td> <?= $car_data[0]['name']?> </td>
                    </tr> 
                    <tr>
                      <td> Route </td>
                      <td>
                        <?= $car_data[0]['routes']?> 
                      </td>
                    </tr> 
                    <tr>
                      <td> Departure Time </td>
                      <td>
                        <?
                        $tmp_start_date =date_create($car_data[0]['departure_date']);
                        $departure_date = date_format($tmp_start_date,"F d, h:i A");
                        echo $departure_date;
                        ?>
                      </td>
                    </tr>
                    <tr>
                      <td>  Arrival Time </td>
                      <td>
                        <?
                        $tmp_arrived_date =date_create($car_data[0]['arrival_date']);
                        $arrived_date = date_format($tmp_arrived_date,"F d, h:i A");
                        echo $arrived_date;
                        ?>
                      </td>
                    </tr>
                    <tr>
                      <td>Total </td>
                      <td><?= $car_data[0]['price']* $noOfseats ?> MMK</td>
                    </tr> 
                  </tbody>
                </table>       
                <hr>   
              </div>
            <? endif; ?>

            <h3 class="text-muted text-center">Please select <?= $noOfseats ?> seats</h3>
            <h2 class="seats_to_select text-muted text-center">&nbsp;</h2>


            <form method="post" action="page4.php">

              <input type="hidden" name="seatIDs" id="seatIDs" value="" />
              <input type="hidden" name="carID" id="carID" value="<?= $car_id ?>" />

              <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <button type="submit" class="btn btn-success form-control">Continue To Travel Info</button>
                </div>
              </div>


            </form>


          </div>
        </div>

      </div>

    </div>
  </div>
</div>
<div class="footer">
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center">
        © 2018 BusTicket.com
      </div>
    </div>
  </div>
</div>

</div>
<script type="text/javascript" src="dist/js/jquery.min.js"></script>
<script type="text/javascript" src="dist/js/jquery-ui.js"></script>
<script type="text/javascript" src="dist/js/bootstrap.min.js"></script>
<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/all.js" integrity="sha384-xymdQtn1n3lH2wcu0qhcdaOpQwyoarkgLVxC/wZ5q7h9gHtxICrpcaSUfygqZGOe" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script>

  $(document).ready(function() {
    var invalid_seats = [<?= $invalid_seats ?>];
    $("a.seat").each(function(){
      var num = $(this).data('seat-number');
      if(invalid_seats.includes(num)){
        $(this).addClass('seat-unavailable');
        $(this).append('<span><i class="fa fa-users" aria-hidden="true"></i></span>');
      }else{
        $(this).addClass('seat-available');
        $(this).append('<span>'+num+'</span>');
      }
    });

    var seats = <?= $noOfseats ?>;
    var count = seats;
    var seat_array = new Array();

    $(".seat-available").click(function(){
      var seat_number ='';
      if($(this).hasClass("seat-selected")){

        if(count <= seats){
          $(this).removeClass("seat-selected");
          count++;
          seat_number = $(this).data("seat-number");

        // delete seat_array[seat_number];
        seat_array.splice($.inArray(seat_number, seat_array),1);
        console.log(seat_array);
        $('.seats_to_select').text('');

        //reduce selected seat      
        if(seat_array.length > 0){
          $('#seatIDs').val(seat_array);
          $.each( seat_array, function( index, value ){
            $('.seats_to_select').append('<span class="badge">'+value+'</span> ');

          });
        }else{
          seat_array = new Array();
        }            
      } 

    }else{
      if(count >= 1){
       $(this).addClass("seat-selected");
       count--;
       seat_number = $(this).data("seat-number");

       seat_array.push(seat_number);

       console.log(seat_array);
       $('.seats_to_select').text('');
       $('#seatIDs').val(seat_array);
       $.each( seat_array, function( index, value ){
        $('.seats_to_select').append('<span class="badge">'+value+'</span> ');
      });
     }
   }
 });    

  // $(".seat-unavailable span").html('<span><i class="fa fa-users" aria-hidden="true"></i></span>');

});


</script>
</body>
</html>
