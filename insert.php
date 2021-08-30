<!DOCTYPE html>
<html>
  
<head>
    <title>
        Insert Data
    </title>
    <script src="https://cdn.datatables.net/1.11.0/css/jquery.dataTables.min.css"></script>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

    <!-- for every 10 seconds this page will get refresh and  -->
    <meta http-equiv="refresh" content="10;url=insert.php" />
</head>

<body>

<?php
include 'mysql.php';
$json = file_get_contents("https://api.thingspeak.com/channels/1337388/feeds.json?api_key=5FN5RB100M0CTAEG");
$jsondata = json_decode($json);
$result = count($jsondata->feeds);

// get the last ID associative Entry ID
$sql = "SELECT * FROM `meter_data` ORDER BY `id` DESC LIMIT 1";
$result =  $conn->query($sql);
// $row = $result->fetch_assoc();

while ($row = $result->fetch_assoc()) {
    $field1name = $row["id"];
    $entry_field = $row["entry_id"];
}

// echo "ID : ". $field1name. "Entry ID: ". $entry_field;


for ($i=2; $i < 100; $i++) { 
    // echo "Loop execution".$i;
    $entry_id = $jsondata->feeds[$i] ->entry_id;

    if($entry_id > $entry_field){

        $time = $jsondata->feeds[$i] ->created_at;
        $meter_data = $jsondata->feeds[$i] ->field1;
        
        $str_arr = explode (",", $meter_data); 
    
        $network_id = $str_arr[0];
        $node_id = $str_arr[1];
        $vol = $str_arr[2];
        $vol = intdiv($vol, 100);
        $cur = $str_arr[3];
        $kvh = $str_arr[4];
        $tamper = $str_arr[5];

        $convert = strtotime($time);
        date_default_timezone_set('Asia/Kolkata');
        $data_time = date('Y/m/d h:i:s', $convert); 
        
        
        echo $i."Network_ID: " . $str_arr[0] . "\t". "Node_ID: ". $str_arr[1] . "\t". "Volt: ". $str_arr[2] . "\t" . "Cur: " . $str_arr[3] . "\t". "KVh: " . $str_arr[4] . "\t" . "Tamper: " .$str_arr[5] ;
        echo $data_time;
        

        $sql = "INSERT INTO meter_data (entry_id, data_time, network_id, node_id, volt, cur, kvh, tamper)
        VALUES ('$entry_id', '$data_time', '$network_id', '$node_id', '$vol', '$cur', '$kvh','$tamper')";
   
       if ($conn->query($sql) === TRUE) {
       echo "New record created successfully";
       echo "<br>";  
       $last_id = $conn->insert_id;
       } else {
       echo "Error: " . $sql . "<br>" . $conn->error;
       echo "<br>";   
       }
    }
}

    $conn->close();

?>

</body>
</html>