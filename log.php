<?php
header("Content-Type:application/json");
if (isset($_GET['id'])) {
    include('con.php');
    $id = $_GET['id'];
    $que = mysqli_query(
        $con,
        "SELECT * FROM `tbl_user` WHERE id=$id"
    );
    if (mysqli_num_rows($que) > 0) {
        $row = mysqli_fetch_array($que);
        $name = $row['nama'];
        $user = $row['user'];
        $pass = $row['pass'];
        response($id, $name, $user, $pass);
        mysqli_close($con);
    } else {
        response(NULL, NULL, 200, "No Record Found");
    }
} else {
    response(NULL, NULL, 400, "Invalid Request");
}

function response($id, $name, $user, $pass)
{
    $response['id'] = $id;
    $response['Name'] = $name;
    $response['User'] = $user;
    $response['pass'] = $pass;

    $json_response = json_encode($response);
    echo $json_response;
}
