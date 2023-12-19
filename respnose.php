<?php
$id = $_GET["id"];

$conn = mysqli_connect("localhost","root","","ticket");
$result = mysqli_query($conn,"SELECT * FROM comments WHERE ticket_id = '$id'");
$htmlreturn = "";
while($row = mysqli_fetch_assoc($result)){
    $htmlreturn .= '<h1>'. $row["mescription"] .'</h1>';
}
echo $htmlreturn;