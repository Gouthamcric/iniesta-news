<?php
include 'connection.php';
if($_REQUEST['from']=="news" && isset($_REQUEST['id']))
{
    $query = 'delete from news where id='.$_REQUEST['id'].'';
    $res = mysqli_query($con, $query);
}
if($_REQUEST['from']=="category" && isset($_REQUEST['id']))
{
    $query = 'delete from category where id='.$_REQUEST['id'].'';
    $res = mysqli_query($con, $query);
}

