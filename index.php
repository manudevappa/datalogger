<?php
require_once 'mysql.php';

    $sql = "SELECT id, entry_id, data_time, network_id, node_id, volt, cur, kvh, tamper FROM meter_data";
    $result = $conn->query($sql);
    $arr_users = [];
    if ($result->num_rows > 0) {
        $arr_users = $result->fetch_all(MYSQLI_ASSOC);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Datatable</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script> 

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script type="text/javascript" src="https://cdn.datatables.net/1.11.0/js/jquery.dataTables.min.js"></script>

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.0/css/jquery.dataTables.min.css">

</head>
<body>

<!-- <div class="container"> -->

<nav class="navbar navbar-expand-lg navbar-light bg-light">
     <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <img src="images.png" alt="" width="140" height="40" class="d-inline-block align-text-top">

    </a>
    <a href="index.php"  class="navbar-brand"><h5 style="color: blue;">Total Data</h5></a>
    <a href="node.php?id=122" class="navbar-brand"><h5 style="color: blue;">Node Data</h5></a>
  </div>

</nav>

<!-- </div> -->

<hr>

<div class="container" style="padding-top: 20px;">
    <h5 style="text-align: left; padding-bottom: 20px;">Data for Network ID: 999</h5>
    <table id="userTable" class="display" style="width: 80%">
    <thead>
        <th>ID</th>
        <th>Entry ID</th>
        <th>Time</th>
        <!-- <td>Network ID</td> -->
        <td>Node_Id</td>
        <th>Volt</th>
        <th>Cur</th>
        <th>Kvh</th>
        <th>Tamper</th>

    </thead>
    <tbody>
        <?php if(!empty($arr_users)) { ?>
            <?php foreach($arr_users as $user) { ?>
                <tr>
                    <td><?php echo $user['id']; ?></td>
                    <td><?php echo $user['entry_id']; ?></td>
                    <td><?php echo $user['data_time']; ?></td>  
                    <td><?php echo $user['node_id']; ?></td>
                    <td><?php echo $user['volt']; ?></td>
                    <td><?php echo $user['cur']; ?></td>
                    <td><?php echo $user['kvh']; ?></td>
                    <td><?php echo $user['tamper']; ?></td>
                    
                </tr>
            <?php } ?>
        <?php } ?>
    </tbody>
</table>

</div>

<script>
$(document).ready(function() {
    $('#userTable').DataTable();
});
</script>



<!-- Footer -->
<footer class="page-footer font-small blue">

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">© 2021 Copyright:
    <a href="https://rioshtech.com/"> Riosh Technology</a>
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->


</body>
</html>