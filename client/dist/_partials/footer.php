<?php 

$ret  = " SELECT *  FROM  `system_settings`"; 
$stmt = $mysqli->prepare($ret);
$stmt->execute(); 
$res = $stmt->get_result(); 
while ($auth = $res->fetch_object()) {  


?>

<footer class="main-footer">
    <strong> &copy; <?php echo date('Y'); ?> -Justice Orogun
    All rights reserved. 
    </strong>
    <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 1.0
    </div>
</footer>

<?php } ?>