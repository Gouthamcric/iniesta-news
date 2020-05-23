<?php
include 'connection.php';
if(isset($_REQUEST['ch_name']) && isset($_REQUEST['fb']) && isset($_REQUEST['ln']) && isset($_REQUEST['tw']))
{
    $query = 'update more_details set ch_name="'.$_REQUEST['ch_name'].'" where id=1';
    $res = mysqli_query($con, $query);
    $query = 'update more_details set fb="'.$_REQUEST['fb'].'" where id=1';
    $res = mysqli_query($con, $query);
    $query = 'update more_details set ln="'.$_REQUEST['ln'].'" where id=1';
    $res = mysqli_query($con, $query);
    $query = 'update more_details set tw="'.$_REQUEST['tw'].'" where id=1';
    $res = mysqli_query($con, $query);
    echo "successfully updated";
}
