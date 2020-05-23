<?php
include 'connection.php';
?>
<html>

<head>
    <title>Admin Panel</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/18dd5346aa.js" crossorigin="anonymous"></script>
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
        crossorigin="anonymous"></script>
    <style>
        html,
        body,
        h1,
        h2,
        h3,
        h4,
        h5 {
            font-family: "Raleway", sans-serif
        }
    </style>
</head>

<body class="w3-light-grey">

    <!-- Top container -->
    <div class="w3-bar w3-top w3-black w3-large" style="z-index:4">
        <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey"
            onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
        <span class="w3-bar-item w3-right"><span class="text-warning">INIESTA</span>News</span>
    </div>

    <!-- Sidebar/menu -->
    <nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
        <div class="w3-container">
            <h5>Dashboard</h5>
        </div>
        <div class="w3-bar-block">
            <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black"
                onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>
            <a href="#" class="w3-bar-item w3-button w3-padding w3-black"><i class="fa fa-bank fa-fw"></i>  Category</a>
            <a href="admin-panel-news.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bell fa-fw"></i> 
                News</a>
            <a href="admin-panel-more.php" class="w3-bar-item w3-button w3-padding"><i
                    class="fa fa-cog fa-fw"></i>  More</a>
        </div>
    </nav>


    <!-- Overlay effect when opening sidebar on small screens -->
    <div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer"
        title="close side menu" id="myOverlay"></div>

    <!-- !PAGE CONTENT! -->
    <div class="w3-main" style="margin-left:300px;margin-top:43px;">
        <div class="pt-2 text-center">
            <h1 class="text-center">Category</h1>
            <br>
            <br>
            <div class="px-2">
                <form class="form-inline justify-content-end" action="">
                    <input class="form-control" type="text" placeholder="Enter Category" id='category'>
                    <button class="btn btn-dark ml-2" onclick='insert()'>Add Category</button>
                </form>
            </div>
            <div class="px-2 table-responsive">
                <table class="table table-striped text-center" style="display: table;" id='table'>
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Category</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = "select * from category";
                        $res = mysqli_query($con, $query);
                        $count = mysqli_num_rows($res);
                        for($i=0;$i<$count;$i++)
                        {$out = mysqli_fetch_array($res);
                        ?>
                        <tr id='<?php echo "row".$out['id'];?>'>
                            <th scope="row"><?php echo $i+1;?></th>
                            <td><?php echo $out['category']; ?></td>
                            <td><a class="text-decoration-none text-dark" onclick='delete_row(<?php echo $out['id'];?>)'><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>

        </div>

        <!-- End page content -->
    </div>

    <script>
        // Get the Sidebar
        var mySidebar = document.getElementById("mySidebar");

        // Get the DIV with overlay effect
        var overlayBg = document.getElementById("myOverlay");

        // Toggle between showing and hiding the sidebar, and add overlay effect
        function w3_open() {
            if (mySidebar.style.display === 'block') {
                mySidebar.style.display = 'none';
                overlayBg.style.display = "none";
            } else {
                mySidebar.style.display = 'block';
                overlayBg.style.display = "block";
            }
        }

        // Close the sidebar with the close button
        function w3_close() {
            mySidebar.style.display = "none";
            overlayBg.style.display = "none";
        }
        function insert()
        {   var category = document.getElementById("category").value;
            $(document).ready(function(){
                $.ajax({
                    url:"insert.php",
                    method:"POST",
                    data:{category:category,from:'category'},
                    success:function(){
                        $("#table").append(category);
                    }
                });
            });
        }
        function delete_row(id){
                $(document).ready(function(){
                $.ajax({
                    url:"delete_row.php",
                    method:"POST",
                    data:{id:id,from:'category'},
                    success:function(){
                        $("#row"+id).remove();
                    }
                });
            });
        }
    </script>

</body>

</html>