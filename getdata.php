<?php

include('koneksi.php');

if( !$koneksi){
    return;
}

$query = "SELECT * FROM tb_cuaca";   // id, suhu, humid, lux, ts
$result = mysqli_query($koneksi, $query);

$goToJSON = array();

if( mysqli_num_rows($result) > 0){
    while($rows = mysqli_fetch_assoc($result)){

        echo 'id: ' . $rows['id'] . '<br>';//', suhu: ' . $rows['suhu'] . ', ts: ' . 
        // $rows['ts'] . '<br>';

        // arr = [5,3,2,4];
        $arr = array('id' => $rows['id']);// ,'ts' => $rows['ts'],'te' => $rows['suhu']);
        // ('id' => 45, 'ts' => 45, 'te' = 43)
        // ('id' => 43, 'ts' => 40, 'te' = 48)
        // ('id' => 45, 'ts' => 45, 'te' = 43)
        // ('id' => 43, 'ts' => 40, 'te' = 48)
        // ('id' => 45, 'ts' => 45, 'te' = 43)
        // ('id' => 43, 'ts' => 40, 'te' = 48)
        // ('id' => 45, 'ts' => 45, 'te' = 43)
        // ('id' => 43, 'ts' => 40, 'te' = 48)s


        array_push($goToJSON, $arr);
        // 300
    }

    // echo json_encode($goToJSON);
   // echo json_encode(array('data' => $goToJSON));
}
else{
    echo 'tidak ada data';
}

?>