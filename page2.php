<?

include('configs/connection.php');
include('model/car.php');

session_start();
$conn_obj = new Connection();
$conn = $conn_obj->connect();

$routes = array('Yangon','Mandalay','Monywa','Pakokku');

$from_city = isset($_GET['from_city']) ? $_GET['from_city'] : '';
$to_city = isset($_GET['to_city']) ? $_GET['to_city'] : '';
$depart_date = isset($_GET['depart_date']) ? $_GET['depart_date'] : '';
$noOfseats = isset($_GET['noOfseats']) ? $_GET['noOfseats'] : '';

$numOfTraArr = array(1,2,3,4,5,6);

$route = $from_city.'-'.$to_city;

$car = new Car($conn);
$car_data = '';
$sql = "SELECT * FROM cars WHERE routes='$route' AND departure_date < '$depart_date' AND  now() < departure_date AND available_seat >= '$noOfseats' ";
$car_data = $car->select($sql);

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Bus</title>
  <link rel="stylesheet" href="dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="dist/css/jquery-ui.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />  
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
    <div class="top-search-div">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <form method="get" action="page2.php" name="search_route" >
              <div class="row">
                <div class="col-md-3 col-sm-5 col-xs-6 margin-top-sm">
                  <label for="from_city" class="search_lable">From</label>
                  <select id="from_city" class="form-control js-dropdown" name="from_city" required >
                    <option value="">Select City</option>
                    <? foreach ($routes as $key => $value) :?>
                    <option value="<?= $value ?>" <?= $value == $from_city ? 'selected':'' ?> ><?= $value ?></option>
                  <? endforeach;?>
                </select>
              </div>
              <div class="col-md-3 col-sm-5 col-xs-6 margin-top-sm">
                <label for="to_city" class="search_lable">To</label>
                <select id="to_city" class="form-control js-dropdown" name="to_city" required >
                  <option value="">Select City</option>
                  <? foreach ($routes as $key => $value) :?>
                  <option value="<?= $value ?>" <?= $value == $to_city ? 'selected':'' ?>  ><?= $value ?></option>
                <? endforeach;?>
              </select>
            </div>
            <div class="col-md-2 col-sm-5 col-xs-6 margin-top-sm">
              <label for="depart_date" class="search_lable">Departure Date</label>
              <input type="text"  class="form-control" name="depart_date" id="depart_date" value="<?= $depart_date ?>" required />
            </div>
            <div class="col-md-2 col-sm-5 col-xs-6 margin-top-sm">
              <label for="noOfseats" class="search_lable">No: of Seats</label>
              <select id="noOfseats" class="form-control" name="noOfseats" required >
                <? foreach ($numOfTraArr as $key => $value): ?>
                <option value="<?= $value ?>" <?= $value == $noOfseats ? 'selected' : '' ?> ><?= $value ?></option>  
              <? endforeach; ?>
            </select>
          </div>
          <div class="col-md-2 col-sm-5 col-xs-6 margin-top-sm">
            <label for="submit" class="search_lable">&nbsp;</label>
            <button type="submit" id="submit" class="form-control btn-primary"><i class="fa fa-search" aria-hidden="true"></i> Search</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
</div>

<div class="content-section">
  <div class="container">

    <div class="row">
      <div class="col-md-3">
        <div class="filter-side-box">
          <h4>Filter Time</h3>
            <hr />
            <form>
            <input type="radio" name="time_option" id="time_option_any" value="" checked /> Any Time<br />
              <input type="radio" name="time_option" id="time_option_am" value="AM" /> A M<br />
              <input type="radio" name="time_option" id="time_option_pm" value="PM" /> P M  
            </form> 
          </div>
        </div>
        <div class="col-md-9"> 
          <div class="result"> 
          <?if(is_array($car_data)) : ?>          
          <div class="trip_result_list">
            <? foreach ($car_data as $key => $value) :?>
            <div class="trip_result">
              <div class="bus-info">Bus Information</div>
              <div class="row">
                <div class="col-md-6 col-xs-12">
                  <div class="box trip_info">
                    <h3>
                      <strong>
                        <?
                        $tmp_start_time =date_create($value['departure_date']);
                        $depart_time = date_format($tmp_start_time,"h:i A");
                        echo $depart_time;
                        ?>
                      </strong>
                    </h3>
                    <p>
                      <?= $value['routes'] ?>
                    </p>
                    <p><strong>Departure Time : </strong>
                      <span>
                        <?
                        $tmp_start_date =date_create($value['departure_date']);
                        $departure_date = date_format($tmp_start_date,"F d, h:i A");
                        echo $departure_date;
                        ?>
                      </span>
                    </p>
                    <p>
                      <strong>Arrival Time : </strong>
                      <span>
                        <?
                        $tmp_arrived_date =date_create($value['arrival_date']);
                        $arrived_date = date_format($tmp_arrived_date,"F d, h:i A");
                        $interval = date_diff($tmp_start_date,$tmp_arrived_date);
                        $duration = $interval->format("%h Hours %I Minutes");
                        echo $arrived_date." <span>&nbsp;&nbsp;Duration : </span>".$duration;
                        ?>
                      </span>
                    </p>

                  </div>
                </div>
                <div class="col-md-3 col-xs-6">
                  <div class="box car_info">
                    <div>
                      <img src="<?= $value['images'] ?>" width="100%" />
                    </div>

                    <p><?= $value['name'] ?></p>
                  </div>
                </div>
                <div class="col-md-3 col-xs-6">
                  <div class="box select_seat_btn">
                    <p class="rate">
                      <strong><?= $value['price']?> </strong> <span>MMK/seat</span>
                    </p>
                    <p>
                      Total : <?= $value['price']* $noOfseats ?> MMK
                    </p>

                    <form action="page3.php" method="post">
                      <input type="hidden" name="noOfseats" value="<?= $noOfseats ?>">
                      <input type="hidden" name="car_id" value="<?= $value['id'] ?>">
                      <button type="submit" class="form-control btn-danger">Select Seats</button>
                    </form>

                  </div>
                </div>
              </div>
            </div>
          <? endforeach; ?>
        </div>
      <? else : ?>
      <div class="row text-center no_result"> 
      <div class="col-md-12">
                  <div class="box">
        <p>
          No ticket available on the selected date. Please try searching for other dates.
        </p>
        </div>
        </div>
      </div>
    <? endif ?>
    </div>
  </div>
</div>

</div>
</div>
<div class="render">

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
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.js"></script>

<script>
  $(document).ready(function() {
    $('#depart_date').datepicker({ 
      dateFormat: 'yy-mm-dd',
      minDate: new Date()

    });

    var depart_date = '<?= $depart_date ?>';
    var noOfseats = '<?= $noOfseats ?>';
    var route = '<?= $route ?>';

    $('.js-dropdown').select2();

    $("form input:radio").click(function(){
      var filter_type = $(this).val();
      console.log(filter_type); 
      $.ajax({
        url: "ajax_search.php", 
        data: {
          action: filter_type,
          depart_date: depart_date,
          noOfseats: noOfseats,
          route: route
        },
        type: 'POST',
        success: function(result){
          console.log(result);
          $('.result').html("");
          $('.result').html(result);
        },
        dataType: "html"
      });
    });

  });
</script>
</body>
</html>
