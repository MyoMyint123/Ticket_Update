<?php

$routes = array('Yangon','Mandalay','Monywa','Pakokku');
$numOfTraArr = array(1,2,3,4,5,6);
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

    <div class="banner">
      <div class="container">
        <div class="row">
          <div class="col-sm-8">

            <form method="get" action="page2.php" name="search_route">
              <div class="row">
                <div class="col-md-6">
                  <label for="from_city" class="search_lable">From</label>
                  <select id="from_city" class="form-control js-dropdown" name="from_city" required>
                    <option value="">Select City</option>
                    <? foreach ($routes as $key => $value) :?>
                      <option value="<?= $value ?>"><?= $value ?></option>
                    <? endforeach;?>
                  </select>
                </div>
                <div class="col-md-6">
                  <label for="to_city" class="search_lable">To</label>
                  <select id="to_city" class="form-control js-dropdown" name="to_city" required>
                    <option value="">Select City</option>
                    <? foreach ($routes as $key => $value) :?>
                      <option value="<?= $value ?>" ><?= $value ?></option>
                    <? endforeach;?>
                  </select>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <label for="depart_date" class="search_lable">Departure Date</label>
                  <input type="text"  class="form-control" name="depart_date" id="depart_date" autocomplete="off" required />
                </div>
                <div class="col-md-6">
                  <div class="row">
                    <div class="col-md-6">
                      <label for="noOfseats" class="search_lable">No: of Seats</label>
                      <select id="noOfseats" class="form-control" name="noOfseats" required >
                        <? foreach ($numOfTraArr as $key => $value): ?>
                          <option value="<?= $value ?>" ><?= $value ?></option>  
                        <? endforeach; ?>
                      </select>
                    </div>
                    <div class="col-md-6">
                      <label for="submit" class="search_lable">&nbsp;</label>
                      <button type="submit" id="submit" class="form-control btn-primary"><i class="fa fa-search" aria-hidden="true"></i> Search</button>
                    </div>
                  </div>
                </div>
              </div>              
            </form>

          </div>
          <div class="col-sm-4">
            <div class="side-box">
              <h3>* Instant Booking *</h3>
              <p>
                Book online express bus tickets in Myanmar. Instant booking confirmation. Pay securely with VISA, MASTER, MPU and CBPay.
              </p>
              <a href="" class="btn btn-outline" id="learn-more">Learn More</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="our_partners text-center">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
            <h2>Our Partner</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6 marbot-10">
            <img class="img-responsive" src="dist/images/express_02.jpg" alt="...">
          </div>
          <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6 marbot-10">
            <img class="img-responsive" src="dist/images/express_03.jpg" alt="...">
          </div>
          <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6 marbot-10">
            <img class="img-responsive" src="dist/images/express_04.jpg" alt="...">
          </div>

          <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6 marbot-10">
            <img class="img-responsive" src="dist/images/express_05.jpg" alt="...">
          </div>
          <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6 marbot-10">
            <img class="img-responsive" src="dist/images/express_06.jpg" alt="...">
          </div>
          <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6 marbot-10">
            <img class="img-responsive" src="dist/images/express_02.jpg" alt="...">
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
  <script type="text/javascript" src="dist/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.js"></script>
  <script type="text/javascript" src="dist/js/jquery-ui.js"></script>

  <script>
    $(document).ready(function() {
      $('#depart_date').datepicker({ 
        dateFormat: 'yy-mm-dd',
        minDate: new Date()

      });
      
      $('.js-dropdown').select2();

      // $('#from_city').change(function(){
      //   var selected_value = $(this).find(":selected").val();
      //   console.log(selected_value);
      //   if(selected_value != ''){
      //     $('#to_city option[value!='+selected_value+']').show();
      //     $('#to_city option[value='+selected_value+']').hide();
      //   }
      // });

      // $('#to_city').change(function(){
      // var selected_value = $(this).find(":selected").val();
      // console.log(selected_value);
      // if(selected_value != ''){
      //   $('#from_city option[value!='+selected_value+']').show();
      //   $('#from_city option[value='+selected_value+']').hide();
      //  }
      // });

    });
  </script>
</body>
</html>
