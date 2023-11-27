<?php 

$ret  = " SELECT *  FROM  `system_settings`"; 
$stmt = $mysqli->prepare($ret);
$stmt->execute(); 
$res = $stmt->get_result(); 
while ($auth = $res->fetch_object()) {

?>


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Banking</title>
    
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">

    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css"> 

    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">

    <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.css">

    <link rel="stylesheet" type="text/css" href="plugins/datatable/custom_dt_html5.css">

    <link rel="stylesheet" href="dist/css/adminlte.css">
    <script src="dist/js/swal.js"></script>


<!-- this is for successful creation alert -->
<?php if(isset($success)) { ?>
    <script>
        setTimeout(function(){ 
            swal("success", "<?php echo $success; ?>", "success" ); 
        }, 
        100);
    </script>
 
  <?php }  ?>


<!-- this is for failed account creation -->
  <?php if(isset($err))  {  ?>
    <script>
        setTimeout(function(){ 
            swal("Failed", "<?php echo $err; ?>", "error" ); 
        }, 
        100);
    </script>
  <?php } ?>

  <!-- this is for information -->
  <?php if(isset($info))  {  ?>
    <script>
        setTimeout(function(){ 
            swal("Success", "<?php echo $info; ?>", "Information" ); 
        }, 
        100);
    </script>
  <?php } ?>


  </head>

  <?php } ?>