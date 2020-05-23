<?php
include 'connection.php';
if($_REQUEST['from'] == "category")
{
  $query = 'insert into category(category) values("'.$_REQUEST['category'].'")';
  mysqli_query($con, $query);
}
else{
    $query = 'insert into news(category,title,description,content,sub_headings,sub_content,thumbnail,trending_status) '
            . 'values("'.$_REQUEST['category'].'","'.$_REQUEST['title'].'","'.$_REQUEST['description'].'",'
            . '"'.$_REQUEST['content'].'","'.$_REQUEST['sub_headings'].'","'.$_REQUEST['sub_content'].'",'
            . '"'.$_REQUEST['data'].'","'.$_REQUEST['trending_status'].'")';
    $res = mysqli_query($con, $query);
    echo "ok";
}
?>
