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
        <span class="w3-bar-item w3-right"><span class="text-warning" id='heading'>INIESTA</span>News</span>
    </div>

    <!-- Sidebar/menu -->
    <nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
        <div class="w3-container">
            <h5>Dashboard</h5>
        </div>
        <div class="w3-bar-block">
            <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black"
                onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>
            <a href="admin-panel-category.php" class="w3-bar-item w3-button w3-padding"><i
                    class="fa fa-bank fa-fw"></i>  Category</a>
            <a href="admin-panel-news.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bell fa-fw"></i> 
                News</a>
            <a href="" class="w3-bar-item w3-button w3-padding w3-black"><i class="fa fa-cog fa-fw"></i>  More</a><br><br>
        </div>
    </nav>


    <!-- Overlay effect when opening sidebar on small screens -->
    <div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer"
        title="close side menu" id="myOverlay"></div>

    <!-- !PAGE CONTENT! -->
    <div class="w3-main" style="margin-left:300px;margin-top:43px;">
        <div class="pt-2 text-center">
            <h1 class="text-center">More</h1>
        </div>
        <div class="jumbotron">
            <div class="row justify-content-md-center">
                <div class="col-md-10">
                    <h1>Site Details</h1>
                    <?php
                    $query = "select * from more_details";
                    $res = mysqli_query($con, $query);
                    $out = mysqli_fetch_array($res);
                    ?>
                    <div class="text-right">
                        <a type="button" class="text-decoration-none text-info" data-toggle="modal" data-target="#exampleModal">Edit <i class="fas fa-pencil-alt"></i></a>
                    </div>
                    <br>
                    <div>
                        <span class="text-info text-decoration-bold">Channel Name :</span>&emsp;<span class="channel-name" id='ch_name_content'><?php echo $out['ch_name'];?></span>
                    </div>
                    <br>
                    <div>
                        <span class="text-info text-decoration-bold">Facebook :</span>&emsp;<span class="facebook"><a href='<?php echo $out['fb'];?>' id='fb_link'><?php echo $out['fb'];?></a></span>
                    </div>
                    <br>
                    <div>
                        <span class="text-info text-decoration-bold">LinkedIn :</span>&emsp;<span class="linkedin"><a href='<?php echo $out['ln'];?>' id='ln_link'><?php echo $out['ln'];?></a></span>
                    </div>
                    <br>
                    <div>
                        <span class="text-info text-decoration-bold">Twitter :</span>&emsp;<span class="twitter"><a href='<?php echo $out['tw'];?>' id='tw_link'><?php echo $out['tw'];?></a></span>
                    </div>
                </div>
            </div>
        </div>

        <!------------------------------ modal ----------------------------------->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header bg-primary text-light">
                  <h5 class="modal-title" id="exampleModalLabel">Edit Details</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-light">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <label for="">Channel Name</label>
                  <input type="text" class="form-control" value='<?php echo $out['ch_name']; ?>' id='ch_name'>
                  <br>
                  <label for="">Facebook</label>
                  <input type="text" class="form-control" value='<?php echo $out['fb']; ?>' id='fb'>
                  <br>
                  <label for="">LinkedIn</label>
                  <input type="text" class="form-control" value='<?php echo $out['ln']; ?>' id='ln'>
                  <br>
                  <label for="">Twitter</label>
                  <input type="text" class="form-control" value='<?php echo $out['tw']; ?>' id='tw'>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary" data-dismiss="modal" aria-label="Close" onclick="submit_more()">Save changes</button>
                </div>
              </div>
            </div>
          </div>

        <!------------------------- End modal content ---------------------------->

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
        // save changes made .
        function submit_more()
        {
            $(document).ready(function(){
                var ch_name=document.getElementById('ch_name').value;
                var fb=document.getElementById('fb').value;
                var ln=document.getElementById('ln').value;
                var tw=document.getElementById('tw').value;
                $.ajax({
                    url:"update.php",
                    method:"POST",
                    data:{ch_name:ch_name,fb:fb,ln:ln,tw:tw},
                    success:function(data){
                        alert(data);
                        $('#ch_name_content').text(ch_name);
                        $('#heading').text(ch_name);
                        $('#fb_link').text(fb);
                        $('#ln_link').text(ln);
                        $('#tw_link').text(tw);
                    }
                });
            });
        }
    </script>
    <script src="more.js"></script>
</body>

</html>