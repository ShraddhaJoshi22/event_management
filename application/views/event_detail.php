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
		<h1>Event View Page</h1>

		<div id="body">
			<?php if (!empty($eventDetails)) { ?>
				<h3><?php echo $eventDetails->title; ?></h3>
				<table class="table">
					<thead>
						<tr>
							<th scope="col">Date</th>
							<th scope="col">Day Name</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$no = 1;
						$begin = new DateTime($eventDetails->start_date);
						$end   = new DateTime($eventDetails->end_date);

						$cnt = 0;
						for ($i = $begin; $i <= $end; $i->modify('+1 day')) {

						?>
							<tr>
								<?php
								if ($eventDetails->recurrence_type == 'repeat_type1') {
									if ($eventDetails->type1_recurrence_at == 1) {
										$str1 = 'Every';
								?>
										<td><?php echo $i->format("Y-m-d"); ?></td>
										<td><?php echo $i->format("D"); ?></td>
										<?php } else if ($eventDetails->type1_recurrence_at == 2) {
										$str1 = 'Every Other';
										if ($no % 2 == 0) {
										?>
											<td><?php echo $i->format("Y-m-d"); ?></td>
											<td><?php echo $i->format("D"); ?></td>
										<?php }
									} else if ($eventDetails->type1_recurrence_at == 3) {
										$str1 = 'Every Third';
										if ($no % 3 == 0) {
										?>
											<td><?php echo $i->format("Y-m-d"); ?></td>
											<td><?php echo $i->format("D"); ?></td>

										<?php }
									} else if ($eventDetails->type1_recurrence_at == 4) {
										$str1 = 'Every Fourth';
										if ($no % 4 == 0) {
										?>
											<td><?php echo $i->format("Y-m-d"); ?></td>
											<td><?php echo $i->format("D"); ?></td>
								<?php	}
									}

									if ($eventDetails->type1_duration == 1) {
										$str2 = 'Day';
									} else if ($eventDetails->type1_duration == 2) {
										$str2 = 'Week';
									} else if ($eventDetails->type1_duration == 3) {
										$str2 = 'Month';
									} else if ($eventDetails->type1_duration == 4) {
										$str2 = 'Year';
									}
									// $finalStr = $str1 . ' ' . $str2;

									if ($eventDetails->type1_recurrence_at == 1 && $eventDetails->type1_duration == 1) {
										$cnt++;
									}

									if ($eventDetails->type1_recurrence_at == 2 && $eventDetails->type1_duration == 1) {
										if ($no % 2 == 0) {
											$cnt++;
										}
									}

									if ($eventDetails->type1_recurrence_at == 3 && $eventDetails->type1_duration == 1) {
										if ($no % 3 == 0) {
											$cnt++;
										}
									}

									if ($eventDetails->type1_recurrence_at == 4 && $eventDetails->type1_duration == 1) {
										if ($no % 4 == 0) {
											$cnt++;
										}
									}

									if ($eventDetails->type1_recurrence_at == 1 && $eventDetails->type1_duration == 2) {
										if ($no % 7 == 0) {
											$cnt++;
										}
									}
									if ($eventDetails->type1_recurrence_at == 1 && $eventDetails->type1_duration == 3) {
										if ($no % 30 == 0 || $no % 31 == 0) {
											$cnt++;
										}
									}
									if ($eventDetails->type1_recurrence_at == 2 && $eventDetails->type1_duration == 4) {
										if ($no % 2 == 0 && $no % 7 == 0) {
											$cnt++;
										}
									}

									if ($eventDetails->type1_recurrence_at == 2 && $eventDetails->type1_duration == 2) {
										$cnt++;
									}
								} else {
									if ($eventDetails->type2_recurrence_at == 1) {
										$str1 = 'First';
									} else if ($eventDetails->type2_recurrence_at == 2) {
										$str1 = 'Second';
									} else if ($eventDetails->type2_recurrence_at == 3) {
										$str1 = 'Third';
									} else if ($eventDetails->type2_recurrence_at == 4) {
										$str1 = 'Fourth';
									}

									if ($eventDetails->type2_day == 1) {
										$str2 = 'Sun';
									} else if ($eventDetails->type2_day == 2) {
										$str2 = 'Mon';
									} else if ($eventDetails->type2_day == 3) {
										$str2 = 'Tue';
									} else if ($eventDetails->type2_day == 4) {
										$str2 = 'Wed';
									} else if ($eventDetails->type2_day == 5) {
										$str2 = 'Thu';
									} else if ($eventDetails->type2_day == 6) {
										$str2 = 'Fri';
									} else if ($eventDetails->type2_day == 7) {
										$str2 = 'Sat';
									}

									if ($eventDetails->type2_duration == 1) {
										$str3 = 'Month';
									} else if ($eventDetails->type2_duration == 2) {
										$str3 = 'Three Month';
									} else if ($eventDetails->type2_duration == 3) {
										$str3 = 'Four Month';
									} else if ($eventDetails->type2_duration == 4) {
										$str3 = 'Six Month';
									} else if ($eventDetails->type2_duration == 5) {
										$str3 = 'Year';
									}
									$finalStr = $str1 . ' ' . $str2 . ' of the ' . $str3;
								}
								?>

							</tr>

						<?php $no++;
						} ?>
						<tr>
							<td colspan="2">Total Recurrence Event: <?php echo $cnt++; ?></td>
						</tr>
					</tbody>
				</table>
			<?php } ?>
		</div>
	</div>

</body>

</html>