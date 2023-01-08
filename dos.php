<?php
include('con.php');
if (isset($_GET['id'])) {
    include('con.php');
    $id = $_GET['id'];
    $que = mysqli_query(
        $con,
        "SELECT * FROM `tbl_dosen` WHERE id=$id"
    );
    if (mysqli_num_rows($que) > 0) {
        $row = mysqli_fetch_array($que);
        $name = $row['nama'];
        $matkul = $row['matkul'];
        $hp = $row['no_hp'];
        response($id, $name, $matkul, $hp);
        mysqli_close($con);
    } else {
        response(NULL, NULL, 200, "No Record Found");
    }
} else {
    response(NULL, NULL, 400, "Invalid Request");
}

function response($id, $name, $matkul, $hp)
{
    $response['id'] = $id;
    $response['name'] = $name;
    $response['matkul'] = $matkul;
    $response['no_hp'] = $hp;

    $json_response = json_encode($response);
    echo $json_response;
}
