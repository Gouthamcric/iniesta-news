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
        <span class="w3-bar-item w3-right"><span class="text-warning">
                    <?php
                    $query = "select * from more_details";
                    $res = mysqli_query($con, $query);
                    $out = mysqli_fetch_array($res);
                    echo $out['ch_name'];
                    ?>
        </span>News</span>
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
            <a href="#" class="w3-bar-item w3-button w3-padding w3-black"><i class="fa fa-bell fa-fw"></i>  News</a>
            <a href="admin-panel-more.php" class="w3-bar-item w3-button w3-padding"><i
                    class="fa fa-cog fa-fw"></i>  More</a><br><br>
        </div>
    </nav>


    <!-- Overlay effect when opening sidebar on small screens -->
    <div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer"
        title="close side menu" id="myOverlay"></div>

    <!-- !PAGE CONTENT! -->
    <div class="w3-main" style="margin-left:300px;margin-top:43px;">
        <div class="pt-2 text-center">
            <h1 class="text-center">News</h1>
            <br>
            <br>
            <div class="text-left mb-2 px-2">
                <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#exampleModalCenter">
                    Add a News
                </button>

                <!-- Add News -->
                <div class="modal fade text-left" id="exampleModalCenter" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-primary text-light">
                                <h5 class="modal-title" id="exampleModalLongTitle">Fill the form below to add a news
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" class="text-light">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <label for="">Category</label>
                                <select type="text" class="form-control" id="category">
                                    <?php 
                                    $query = "select * from category";
                                    $res = mysqli_query($con, $query);
                                    $count = mysqli_num_rows($res);
                                    $option = "";
                                    for($i=0;$i<$count;$i++)
                                    {   $out = mysqli_fetch_array($res);
                                        $option .= '<option value="'.$out['category'].'">'.$out['category'].'</option>';
                                    }
                                    echo $option;
                                    ?>
                                </select>
                                <br>
                                <label for="">Title</label>
                                <input type="text" class="form-control" placeholder="Enter Title" id="title">
                                <br>
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="thumbnail">
                                        <label class="custom-file-label" for="thumbnail">Choose Image</label>
                                    </div>
                                </div>
                                <br>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck1">
                                    <label class="custom-control-label" for="customCheck1">Check this checkbox if you
                                        want this news in Trending</label>
                                </div>
                                <br>
                                <label for="">News Description(This will be shown in the landing page)</label>
                                <textarea name="" cols="30" rows="5" class="form-control" id="description"></textarea>
                                <br>
                                <label for="">News Content(This will be shown once the user clicks on any particular news)</label>
                                <textarea name="" cols="30" rows="10" class="form-control" id="content"></textarea>
                                <br>
                                <div id="wrapper"></div>
                                <button type="button" class="btn btn-primary" onclick="load_input_field()">Add Sub-Heading & Sub-Content</button>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" onclick="insert_row()" data-dismiss="modal">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Edit News -->
            <div class="modal fade text-left" id="exampleModalCenter2" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-primary text-light">
                                <h5 class="modal-title" id="exampleModalLongTitle">Edit Your News
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" class="text-light">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <label for="">Category</label>
                                <input type="text" class="form-control" placeholder="Enter Category">
                                <br>
                                <label for="">Title</label>
                                <input type="text" class="form-control" placeholder="Enter Title">
                                <br>
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="inputGroupFile01">
                                        <label class="custom-file-label img-thumbnail" for="inputGroupFile01">Choose Image</label>
                                    </div>
                                </div>
                                <br>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck1">
                                    <label class="custom-control-label" for="customCheck1">Check this checkbox if you
                                        want this news in Trending</label>
                                </div>
                                <br>
                                <label for="">News Description / Content</label>
                                <textarea name="" id="" cols="30" rows="10" class="form-control"></textarea>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="px-2">
                <form class="form-inline" action="">
                    <input id="myInput" class="form-control" type="text" placeholder="Search a news">
                </form>
            </div>
            <div class="px-2 table-responsive">
                <table id="myTable" class="table table-striped text-center" style="display: table;">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Description</th>
                            <th scope="col">Category</th>
                            <th scope="col">Thumbnail</th>
                            <th scope="col">Date and Time</th>
                            <th scope="col">Trending Status</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = "select * from news order by timestamp desc";
                        $res = mysqli_query($con, $query);
                        $count = mysqli_num_rows($res);
                        for($i=0;$i<$count;$i++)
                        {
                        $out = mysqli_fetch_array($res);
                        ?>
                        <tr id='<?php echo 'row'.$out['id'];?>'>
                            <th scope="row"><?php echo $i+1;?></th>
                            <td><?php echo $out['title'];?></td>
                            <td>
                                <div>
                                <?php echo $out['description'];?>
                                </div>
                            </td>
                            <td><?php echo $out['category'];?></td>
                            <td>
                                <img src="<?php echo $out['thumbnail'];?>" alt="" width="150px" height="150px" class="img-thumbnail">
                            </td>
                            <td><?php echo $out['timestamp'];?></td>
                            <td><?php echo $out['trending_status'];?></td>
                            <td>
                                <a class="text-decoration-none text-dark" data-toggle="modal" data-target="#exampleModalCenter2"><i class="fas fa-pencil-alt"></i></a>
                            </td>
                            <td>
                                <a class="text-decoration-none text-dark" onclick="delete_row(<?php echo $out['id']; ?>)"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                        <?php
                        }
                        ?>
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
        //add sub-heading and sub-content
        function load_input_field()
        {
            var sub_heading = '<br>\n\
                               <label for="">Sub Heading</label> \n\
                               <input type="text" class="form-control sub_heading" placeholder="Enter Sub-Heading">';
            var sub_content = '<br>\n\
                               <label for="">Sub-Content</label>\n\
                               <textarea name="" id="" cols="30" rows="10" class="form-control sub_content"></textarea>\n\
                               <br>';
            $("#wrapper").append(sub_heading+sub_content);
        }
        //insert function 
        function insert_row()
        {   var flag=1;
            var category = document.getElementById("category").value;
            if(category===""){alert("category must be filled");flag=0;}
            var title = document.getElementById("title").value;
            if(title===""){alert("title must be filled");flag=0;}
            var description = document.getElementById("description").value;
            if(description===""){alert("Description must be filled");flag=0;}
            var content = document.getElementById("content").value;
            if(content===""){alert("content must be filled");flag=0;}
            var form_data = new FormData();
            form_data.append("file", document.getElementById('thumbnail').files[0]);
            var sub_heading_id = document.getElementsByClassName("sub_heading");
            var sub_headings="";
            for(var i=0;i<sub_heading_id.length;i++){
                if(i !== sub_heading_id.length-1){
                    sub_headings += sub_heading_id[i].value+"^";
                }
                else{
                    sub_headings += sub_heading_id[i].value;
                }
            }
            var sub_content_id = document.getElementsByClassName("sub_content");
            var sub_content="";
            for(var i=0;i<sub_content_id.length;i++){
                if(i !== sub_content_id.length-1){
                    sub_content += sub_content_id[i].value+"^";
                }
                else{
                    sub_content += sub_content_id[i].value;
                }
            }
            var trending_status = "0";
            if(document.getElementById("customCheck1").checked === true)
                trending_status = "1";
            if(flag===1){
                $(document).ready(function(){
                    $.ajax({
                        url:"upload.php",
                        method:"POST",
                        data: form_data,
                        contentType: false,
                        cache: false,
                        processData: false,
                        success:function(data){ 
                          $.ajax({
                            url:"insert.php",
                            method:"POST",
                            data:{category:category,title:title,description:description,content:content,sub_headings:sub_headings,data:data,sub_content:sub_content,trending_status:trending_status},
                            success:function(data){
                                alert("Successfully added!");
                                location.reload();
                            }
                        });

                        }
                    });
                });
            }
        }
        //edit function
        function edit(id){alert("edit");}
        //delete function
        function delete_row(id){
                $(document).ready(function(){
                $.ajax({
                    url:"delete_row.php",
                    method:"POST",
                    data:{id:id,from:'news'},
                    success:function(){
                        $("#row"+id).remove();
                    }
                });
            });
        }
    </script>
    <script>
        $(document).ready(function () {
            $("#myInput").on("keyup", function () {
                var value = $(this).val().toLowerCase();
                $("#myTable tr").filter(function () {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
                });
            });
        });
    </script>
</body>

</html>

