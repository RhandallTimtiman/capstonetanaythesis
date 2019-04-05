<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Tanay Tourism">
  <meta name="author" content="Tanay Tourism">

	<meta http-equiv='cache-control' content='no-cache, no-store, must-revalidate'>
	<meta http-equiv='expires' content='0'>
	<meta http-equiv='pragma' content='no-cache'>

	<link rel="shortcut icon" href="<?php echo base_url('assets/images/favicon.png'); ?>" type="image/x-icon" />

	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap/bootstrap.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap/bootstrap-theme.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap/bootstrap-datetimepicker.min.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap/bootstrap-switch.min.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/ripple.min.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/font-awesome/css/all.css'); ?>">

	<link rel="stylesheet" href="<?php echo base_url('assets/css/common.css?tm='.date('mdYHisA')); ?>">

	<?php echo $this->template->meta; ?>

  <title><?php echo $this->template->title; ?></title>

	<script>
		var baseurl = "<?php echo base_url(); ?>";
		var defctrl = "<?php echo ENV['default_controller'] ?? 'home'; ?>";
		var today = "<?php echo date('mdYHisA'); ?>";
		var image_path = "<?php echo ENV['image_upload_path'] ?? 'assets/images/'; ?>";
		var admin_path = "<?php echo ENV['api_path'] ?? '../administrator/'; ?>";
		var items_per_page = <?php echo ENV['items_per_page'] ?? 5; ?>;
	</script>
</head>
<body>
	<div class="container container-fluid">
		<div class="container-background">
			<?php echo $this->template->widget('header'); ?>
			<?php echo $this->template->content; ?>
			<?php echo $this->template->widget('footer'); ?>
		</div>
	</div>
</body>

<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap-switch.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/moment.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/autoNumeric/autoNumeric.min.js'); ?>"></script>
<script async defer  src="https://maps.googleapis.com/maps/api/js?key=<?php echo ENV['gmapi']; ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/common.js?tm='.date('mdYHisA')); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/pages.js?tm='.date('mdYHisA')); ?>"></script>

<?php echo $this->template->javascript; ?>
<?php echo $this->template->stylesheet; ?>
</html>
