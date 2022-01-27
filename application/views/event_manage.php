<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Event Manage</title>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" />
	<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css" /> -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />

	<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" integrity="sha512-aOG0c6nPNzGk+5zjwyJaoRUgCdOrfSDhmMID2u4+OIslr0GjpLKo7Xm0Ao3xmpM4T8AmIouRkqwj1nrdVsLKEQ==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
	<link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
	<link rel="stylesheet" href="/resources/demos/style.css">


	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

	<!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js">
	</script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js">
	</script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js">
	</script> -->


	<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->

	<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
	<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js" integrity="sha512-37T7leoNS06R80c8Ulq7cdCDU5MNQBwlYoy1TX/WUsLFC2eYNqtKlV0QjH7r8JpG/S0GUMZwebnVFLPd6SU5yg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

	<style type="text/css">
		.error {
			color: red;
		}
	</style>
</head>

<body>

	<div id="container">
		<?php if (isset($eventDetails) && !empty($eventDetails)) { ?>
			<h1>Edit Event</h1>
		<?php } else { ?>
			<h1>Add Event</h1>
		<?php } ?>


		<div id="body">

			<?php if (isset($eventDetails) && !empty($eventDetails)) { ?>
				<form action="<?php echo base_url() . "event/save/" . $eventDetails->id; ?>" method="POST" name="eventForm" id="eventForm">
				<?php } else { ?>
					<form action="<?php echo base_url() . "event/save"; ?>" method="POST" name="eventForm" id="eventForm">
					<?php } ?>

					<?php //echo form_open('form'); 
					?>
					<div class="form-group">
						<label for="title">Event Title</label>
						<input type="text" class="form-control col-md-6" id="title" name="title" value="<?php echo (isset($eventDetails) && !empty($eventDetails)) ? $eventDetails->title : set_value('title'); ?>" placeholder="Event Title">
					</div>
					<div class="form-group">
						<label for="start_date">Event Start Date</label>
						<input type="text" class="form-control col-md-6 datepicker" id="start_date" name="start_date" value="<?php echo (isset($eventDetails) && !empty($eventDetails)) ? $eventDetails->start_date : set_value('start_date'); ?>">
					</div>

					<div class="form-group">
						<label for="end_date">Event End Date</label>
						<input type="text" class="form-control col-md-6 datepicker" id="end_date" name="end_date" value="<?php echo (isset($eventDetails) && !empty($eventDetails)) ? $eventDetails->end_date : set_value('end_date'); ?>">
					</div>

					<div class="form-group">
						<label>Recurrence</label>
					</div>
					<div class="custom-control custom-radio">
						<input type="radio" id="repeat_type1" name="recurrence_type" class="custom-control-input" value="1" <?php echo (isset($eventDetails) && !empty($eventDetails)) ? (set_value('recurrence_type', $eventDetails->recurrence_type) == "repeat_type1" ? "checked" : "")  : ""  ?>>
						<label class="custom-control-label" for="repeat_type1">Repeat</label>

						<select class="custom-select col-md-2" id="type1_recurrence_at" name="type1_recurrence_at">
							<!-- <option selected>Choose...</option> -->
							<option value="1" <?php echo (isset($eventDetails) && !empty($eventDetails) && $eventDetails->type1_recurrence_at == "1") ? 'selected="selected"' : ""; ?>>Every</option>
							<option value="2" <?php echo (isset($eventDetails) && !empty($eventDetails) && $eventDetails->type1_recurrence_at == "2") ? 'selected="selected"' : ""; ?>>Every Other</option>
							<option value="3" <?php echo (isset($eventDetails) && !empty($eventDetails) && $eventDetails->type1_recurrence_at == "3") ? 'selected="selected"' : ""; ?>>Every Third</option>
							<option value="4" <?php echo (isset($eventDetails) && !empty($eventDetails) && $eventDetails->type1_recurrence_at == "4") ? 'selected="selected"' : ""; ?>>Every Fourth</option>
						</select>

						<select class="custom-select col-md-2" id="type1_duration" name="type1_duration">
							<!-- <option selected>Choose...</option> -->
							<option value="1" <?php echo (isset($eventDetails) && !empty($eventDetails) && $eventDetails->type1_duration == "1") ? 'selected="selected"' : ""; ?>>Day</option>
							<option value="2" <?php echo (isset($eventDetails) && !empty($eventDetails) && $eventDetails->type1_duration == "2") ? 'selected="selected"' : ""; ?>>Week</option>
							<option value="3" <?php echo (isset($eventDetails) && !empty($eventDetails) && $eventDetails->type1_duration == "3") ? 'selected="selected"' : ""; ?>>Month</option>
							<option value="4" <?php echo (isset($eventDetails) && !empty($eventDetails) && $eventDetails->type1_duration == "4") ? 'selected="selected"' : ""; ?>>Year</option>
						</select>

					</div>

					<div class="custom-control custom-radio">
						<input type="radio" id="repeat_type2" name="recurrence_type" class="custom-control-input" value="2" <?php echo (isset($eventDetails) && !empty($eventDetails)) ? (set_value('recurrence_type', $eventDetails->recurrence_type) == "repeat_type2" ? "checked" : "")  : ""  ?>>
						<label class="custom-control-label" for="repeat_type2">Repeat on the</label>

						<select class="custom-select col-md-2" id="type2_recurrence_at" name="type2_recurrence_at">
							<!-- <option selected>Choose...</option> -->
							<option value="1" <?php echo (isset($eventDetails) && !empty($eventDetails) && $eventDetails->type1_duration == "1")  ? 'selected="selected"' : ""; ?>>First</option>
							<option value="2" <?php echo (isset($eventDetails) && !empty($eventDetails) && $eventDetails->type1_duration == "2") ? 'selected="selected"' : ""; ?>>Second</option>
							<option value="3" <?php echo (isset($eventDetails) && !empty($eventDetails) && $eventDetails->type1_duration == "3") ? 'selected="selected"' : ""; ?>>Third</option>
							<option value="4" <?php echo (isset($eventDetails) && !empty($eventDetails) && $eventDetails->type1_duration == "4") ? 'selected="selected"' : ""; ?>>Fourth</option>
						</select>

						<select class="custom-select col-md-2" id="type2_day" name="type2_day">
							<!-- <option selected>Choose...</option> -->
							<option value="1" <?php echo (isset($eventDetails) && !empty($eventDetails) && $eventDetails->type2_day == "1") ? 'selected="selected"' : ""; ?>>Sun</option>
							<option value="2" <?php echo (isset($eventDetails) && !empty($eventDetails) && $eventDetails->type2_day == "2") ? 'selected="selected"' : ""; ?>>Mon</option>
							<option value="3" <?php echo (isset($eventDetails) && !empty($eventDetails) && $eventDetails->type2_day == "3") ? 'selected="selected"' : ""; ?>>Tue</option>
							<option value="4" <?php echo (isset($eventDetails) && !empty($eventDetails) && $eventDetails->type2_day == "4") ? 'selected="selected"' : ""; ?>>Wed</option>
							<option value="5" <?php echo (isset($eventDetails) && !empty($eventDetails) && $eventDetails->type2_day == "5") ? 'selected="selected"' : ""; ?>>Thu</option>
							<option value="6" <?php echo (isset($eventDetails) && !empty($eventDetails) && $eventDetails->type2_day == "6") ? 'selected="selected"' : ""; ?>>Fri</option>
							<option value="7" <?php echo (isset($eventDetails) && !empty($eventDetails) && $eventDetails->type2_day == "7") ? 'selected="selected"' : ""; ?>>Sat</option>
						</select>

						of the
						<select class="custom-select col-md-2" id="type2_duration" name="type2_duration">
							<!-- <option selected>Choose...</option> -->
							<option value="1" <?php echo (isset($eventDetails) && !empty($eventDetails) && $eventDetails->type2_duration == "1") ? 'selected="selected"' : ""; ?>>Month</option>
							<option value="2" <?php echo (isset($eventDetails) && !empty($eventDetails) && $eventDetails->type2_duration == "2") ? 'selected="selected"' : ""; ?>>3 Months</option>
							<option value="3" <?php echo (isset($eventDetails) && !empty($eventDetails) && $eventDetails->type2_duration == "3") ? 'selected="selected"' : ""; ?>>4 Months</option>
							<option value="4" <?php echo (isset($eventDetails) && !empty($eventDetails) && $eventDetails->type2_duration == "4") ? 'selected="selected"' : ""; ?>>6 Months</option>
							<option value="5" <?php echo (isset($eventDetails) && !empty($eventDetails) && $eventDetails->type2_duration == "5") ? 'selected="selected"' : ""; ?>>Year</option>
						</select>
					</div>


					<br />
					<input type="submit" class="btn btn-primary" value="Submit" />

					<a href="<?php echo base_url() . 'event'; ?>" class="btn btn-primary" role="button" aria-pressed="true">Cancel</a>

					<?php //echo form_close(); 
					?>
					</form>

		</div>


	</div>


	<script>
		$(function() {
			$(".datepicker").datepicker({
				dateFormat: 'yy-mm-dd'
			});
		});
		$(document).ready(function() {
			// $(".datepicker").datepicker({
			// 	clearBtn: true,
			// 	format: "dd/mm/yyyy",
			// 	autoclose: true,
			// });

			// $(".datepicker").on("change", function() {
			// 	let pickedDate = $("input").val();
			// 	$("#showdate").text(
			// 		`You picked this ${pickedDate} Date`);
			// });

			// $(".datepicker").datepicker();

			$("#eventForm").validate({
				// Specify validation rules
				rules: {
					title: {
						required: true,
						minlength: 5
					},
					start_date: {
						required: true
					},
					end_date: {
						required: true
					},
					recurrence_type: {
						required: true
					}
				},
				// Specify validation error messages
				messages: {

					title: {
						required: "Please provide a title",
						minlength: "Your title must be at least 5 characters long"
					},
					start_date: "Please enter your start date",
					end_date: "Please enter your end date",

				},
				errorPlacement: function(error, element) {

					error.insertAfter(element);

				},
				// Make sure the form is submitted to the destination defined
				// in the "action" attribute of the form when valid
				submitHandler: function(form) {
					form.submit();
				}
			});

		});
	</script>
</body>

</html>