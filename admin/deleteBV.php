<?php


$tweetID = $_GET['id'];


$conn=mysqli_connect('localhost','root','','twitter');
if(!$conn){
    die("kết nối thất bại");
}

$sql ="DELETE FROM tweet WHERE tweetID='$tweetID'";

$number=mysqli_query($conn,$sql);

if($number > 0){
    header("location:tweet.php");
}else{
    header("location:tweet.php");
}
?>