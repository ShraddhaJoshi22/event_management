<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Event</title>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

	<style type="text/css">


	</style>
</head>

<body>

	<div id="container">
		<h1>Event List</h1>
		<!-- <button type="button" class="btn btn-primary"> Add Event</button> -->
		<a href="<?php echo base_url() . 'event/manage'; ?>" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Add Event</a>

		<div id="body">
			<table class="table">
				<thead>
					<tr>
						<th scope="col">#</th>
						<th scope="col">Title</th>
						<th scope="col">Dates</th>
						<th scope="col">Occurrence</th>
						<th scope="col">Actions</th>
					</tr>
				</thead>
				<tbody>
					<?php if (!empty($eventDetails)) {
						$no = 1;
						foreach ($eventDetails as $value) { ?>
							<tr>
								<th scope="row"><?php echo $no; ?></th>
								<td><?php echo $value->title; ?></td>
								<td><?php echo $value->start_date . ' to ' . $value->end_date; ?></td>
								<?php
								if ($value->recurrence_type == 'repeat_type1') {
									if ($value->type1_recurrence_at == 1) {
										$str1 = 'Every';
									} else if ($value->type1_recurrence_at == 2) {
										$str1 = 'Every Other';
									} else if ($value->type1_recurrence_at == 3) {
										$str1 = 'Every Third';
									} else if ($value->type1_recurrence_at == 4) {
										$str1 = 'Every Fourth';
									}

									if ($value->type1_duration == 1) {
										$str2 = 'Day';
									} else if ($value->type1_duration == 2) {
										$str2 = 'Week';
									} else if ($value->type1_duration == 3) {
										$str2 = 'Month';
									} else if ($value->type1_duration == 4) {
										$str2 = 'Year';
									}
									$finalStr = $str1 . ' ' . $str2;
								} else {
									if ($value->type2_recurrence_at == 1) {
										$str1 = 'First';
									} else if ($value->type2_recurrence_at == 2) {
										$str1 = 'Second';
									} else if ($value->type2_recurrence_at == 3) {
										$str1 = 'Third';
									} else if ($value->type2_recurrence_at == 4) {
										$str1 = 'Fourth';
									}

									if ($value->type2_day == 1) {
										$str2 = 'Sun';
									} else if ($value->type2_day == 2) {
										$str2 = 'Mon';
									} else if ($value->type2_day == 3) {
										$str2 = 'Tue';
									} else if ($value->type2_day == 4) {
										$str2 = 'Wed';
									} else if ($value->type2_day == 5) {
										$str2 = 'Thu';
									} else if ($value->type2_day == 6) {
										$str2 = 'Fri';
									} else if ($value->type2_day == 7) {
										$str2 = 'Sat';
									}

									if ($value->type2_duration == 1) {
										$str3 = 'Month';
									} else if ($value->type2_duration == 2) {
										$str3 = 'Three Month';
									} else if ($value->type2_duration == 3) {
										$str3 = 'Four Month';
									} else if ($value->type2_duration == 4) {
										$str3 = 'Six Month';
									} else if ($value->type2_duration == 5) {
										$str3 = 'Year';
									}
									$finalStr = $str1 . ' ' . $str2 . ' of the ' . $str3;
								}
								?>
								<td><?php echo $finalStr; ?></td>
								<td>
									<a href="<?php echo base_url() . 'event/view'; ?>" class="btn btn-primary" role="button" aria-pressed="true">View</a>
									<a href="<?php echo base_url() . 'event/manage/' . $value->id; ?>" class="btn btn-primary" role="button" aria-pressed="true">Edit</a>
									<a href="<?php echo base_url() . 'event/delete/' . $value->id; ?>" class="btn btn-primary" role="button" aria-pressed="true">Delete</a>

								</td>

							</tr>
					<?php $no++;
						}
					} ?>
					<!-- <tr>
						<th scope="row">2</th>
						<td>Jacob</td>
						<td>Thornton</td>
						<td>@fat</td>
					</tr>
					<tr>
						<th scope="row">3</th>
						<td>Larry</td>
						<td>the Bird</td>
						<td>@twitter</td>
					</tr> -->
				</tbody>
			</table>
		</div>


	</div>

</body>

</html>