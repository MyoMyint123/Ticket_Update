<?

include('configs/connection.php');
include('model/car.php');

$conn_obj = new Connection();
$conn = $conn_obj->connect();

$depart_date = $_POST['depart_date'];
$route = $_POST['route'];
$noOfseats = $_POST['noOfseats'];
$action = $_POST['action'];

$car = new Car($conn);

$sql = '';

if($action == ''){

	$sql = "SELECT id, name, departure_date, arrival_date, price, routes, images FROM cars WHERE routes='$route' AND departure_date < '$depart_date' AND  now() < departure_date AND available_seat >= '$noOfseats' ";
}else{
	
	$sql = "SELECT id, name, departure_date, arrival_date, price, routes, images FROM cars WHERE routes='$route' AND departure_date < '$depart_date' AND  now() < departure_date AND available_seat >= '$noOfseats' AND DATE_FORMAT(departure_date, '%p')='$action' ";
}

$car_data = $car->select($sql);

?>

 
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
											$duration = $interval->format("%D days %h Hours %I Minutes");
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
			<p>
				No ticket available on the selected date. Please try searching for other dates.
			</p>
		</div>
		<? endif ?>
		