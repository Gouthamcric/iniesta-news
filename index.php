<?php include("connection.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INIESTA News</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/18dd5346aa.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="top-header bg-danger text-light">
        <div id="google_translate_element" class="text-left"></div>
        <div class="container text-right">
            <i class="far fa-calendar-alt"></i>&ensp;<span class="date"></span>
            <marquee behavior="" direction="right">INIESTA NEWS</marquee>
        </div>
    </div>
    <div class="navigation-bar bg-light py-1">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a href="" class="navbar-brand"><i class="far fa-newspaper fa-2x"></i></a>
                <button class="navbar-toggler border-light" type="button" data-toggle="collapse"
                    data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Home</a>
                        </li>
                        <?php
                        $query = "select * from category";
                        $res = mysqli_query($con, $query);
                        $cat_count = mysqli_num_rows($res);
                        for($i=0;$i<$cat_count;$i++)
                        {
                        $out = mysqli_fetch_array($res);    
                        echo '             
                        <li class="nav-item">
                            <a class="nav-link" href="#'.$out['category'].'">'.$out['category'].'</a>
                        </li>';
                        }
                        ?>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
    <div class="bg-danger text-light mb-3 py-5">
        <div class="container">
            <div class="d-flex justify-content-between flex-wrap align-items-center">
                <div class="d-flex flex-column">
                    <div class="d-flex align-items-center">
                        <img class="logo-img" src="images/iniesta-logo.jpg" alt="">
                        <h1 class="font-weight-bold ml-1"><span class="text-warning">INIESTA</span>News</h1>
                    </div>
                    <h5 class="ml-5 pl-4">READ EVERYTHING</h5>
                </div>
                <div class="d-flex justify-content-around" style="min-width: 50%;">
                    <i class="fas fa-search"></i>
                    <i class="fab fa-linkedin-in"></i>
                    <i class="fab fa-google-plus-g"></i>
                    <i class="fab fa-twitter"></i>
                    <i class="fab fa-facebook-f"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="jumbotron text-center text-dark">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere iste assumenda molestiae, laborum odit,
                corrupti tenetur, reiciendis quam earum ab placeat voluptate ipsa distinctio eum veniam esse doloribus
                rerum
                illo?</p>
        </div>
    </div>
    <div class="py-5 image-pallets text-center text-light">
        <div class="row" style="height: 440px;">
            <div class="col-md-6 pt-2">
                <i class="far fa-calendar-alt"></i>&ensp;<span class="date"></span>
                <br>
                <p>Lorem ipsum dolor sit amet
                    consectetur adipisicing elit.</p>
            </div>
            <div class="col-md-6 pr-0">
                <div class="row" style="height: 50%;">
                    <div class="col-md-6 pt-2">
                        <i class="far fa-calendar-alt"></i>&ensp;<span class="date"></span>
                        <br>
                        <p>Lorem ipsum dolor sit amet
                            consectetur adipisicing elit.</p>
                    </div>
                    <div class="col-md-6 pt-2">
                        <i class="far fa-calendar-alt"></i>&ensp;<span class="date"></span>
                        <br>
                        <p>Lorem ipsum dolor sit amet
                            consectetur adipisicing elit.</p>
                    </div>
                </div>
                <div class="row" style="height: 50%;">
                    <div class="col-md-6 pt-2">
                        <i class="far fa-calendar-alt"></i>&ensp;<span class="date"></span>
                        <br>
                        <p>Lorem ipsum dolor sit amet
                            consectetur adipisicing elit.</p>
                    </div>
                    <div class="col-md-6 pt-2">
                        <i class="far fa-calendar-alt"></i>&ensp;<span class="date"></span>
                        <br>
                        <p>Lorem ipsum dolor sit amet
                            consectetur adipisicing elit.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php 
    $outer_query = "select distinct(category) from news";
    $outer_res = mysqli_query($con, $outer_query);
    $cat_count2= mysqli_num_rows($outer_res);
    for($j=0;$j<$cat_count2;$j++)
    {
    $category = mysqli_fetch_array($outer_res); 
    ?>
    
    <div class="trending py-5" id="<?php echo $category['category'];?>">
        <div class="container">
            <h1><?php echo $category['category'];?></h1>
            <hr class="border-danger">
            <!-------------------------------------------card deck -------------------------------------------------> 
            <div class="card-deck">
                <?php 
                $query = "select * from news order by timestamp desc";
                $res = mysqli_query($con, $query);
                $news_count = mysqli_num_rows($res);
                for($i=0;$i<$news_count;$i++)
                {
                $out = mysqli_fetch_array($res);    
                ?>
                
                <div class="card bg-dark">
                    <a href="single.php?id=<?php echo $out['id']; ?>" class="text-decoration-none text-white">
                    <img src="<?php echo $out['thumbnail'];?>" class="card-img" alt="...">
                    <div class="card-img-overlay">
                        <h5 class="card-title"><?php echo $out['title'];?></h5>
                        <p class="card-text"><?php echo $out['description'];?>.</p>
                        <?php
                        date_default_timezone_set('Asia/Kolkata');
                        $curr_time=date('Y-m-d H:i:s');
                        $sub_query = 'SELECT TIMESTAMPDIFF(MINUTE,"'.$out['timestamp'].'","'.$curr_time.'") as dif';
                        $sub_res = mysqli_query($con, $sub_query);
                        $sub_out = mysqli_fetch_array($sub_res);
                        ?>
                        <p class="card-text">Last updated <?php echo $sub_out['dif'];?> mins ago</p>
                    </div>
                </a>
                </div>
                
                <?php
                }
                ?>
            </div>   
        </div>
    </div>
  
    <?php
    }
    ?>
    <div class="news py-5">
        <div class="container justify-content-center">
            <h1>Health,Fitness and Entertainment</h1>
            <hr class="border-danger">
            <!------------------------------------------- Other card deck ------------------------------------------------->
            <div class="card-deck rounded-top justify-content-around bg-danger pt-4">
                <div class="card bg-light mb-3" style="max-width: 18rem;">
                    <div class="card-header">Header</div>
                    <div class="card-body">
                        <h5 class="card-title">Light card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's content.</p>
                    </div>
                </div>
                <div class="card bg-light mb-3" style="max-width: 18rem;">
                    <div class="card-header">Header</div>
                    <div class="card-body">
                        <h5 class="card-title">Light card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's content.</p>
                    </div>
                </div>
                <div class="card bg-light mb-3" style="max-width: 18rem;">
                    <div class="card-header">Header</div>
                    <div class="card-body">
                        <h5 class="card-title">Light card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's content.</p>
                    </div>
                </div>
            </div>
            <div class="card-deck rounded-bottom  justify-content-around bg-danger">
                <div class="card bg-light mb-3" style="max-width: 18rem;">
                    <div class="card-header">Header</div>
                    <div class="card-body">
                        <h5 class="card-title">Light card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's content.</p>
                    </div>
                </div>
                <div class="card bg-light mb-3" style="max-width: 18rem;">
                    <div class="card-header">Header</div>
                    <div class="card-body">
                        <h5 class="card-title">Light card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's content.</p>
                    </div>
                </div>
                <div class="card bg-light mb-3" style="max-width: 18rem;">
                    <div class="card-header">Header</div>
                    <div class="card-body">
                        <h5 class="card-title">Light card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's content.</p>
                    </div>
                </div>
            </div>
            <div class="card-deck rounded-bottom  justify-content-around bg-danger">
                <div class="card bg-light mb-3" style="max-width: 18rem;">
                    <div class="card-header">Header</div>
                    <div class="card-body">
                        <h5 class="card-title">Light card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's content.</p>
                    </div>
                </div>
                <div class="card bg-light mb-3" style="max-width: 18rem;">
                    <div class="card-header">Header</div>
                    <div class="card-body">
                        <h5 class="card-title">Light card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's content.</p>
                    </div>
                </div>
                <a href="single.php" class="text-decoration-none text-dark">
                    <div class="card bg-light mb-3" style="max-width: 18rem;">
                        <div class="card-header">Header</div>
                        <div class="card-body">
                            <h5 class="card-title">Light card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                of
                                the card's content.</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>


    <!-- footer -->
    <div class="footer text-center">
        <div class="footer-top row">
            <div class="col-lg-4">
                <h5><u><b>Help for you</b></u></h5>
                <h6><a type="button" data-toggle="modal" data-target="#contactModal">Contact Support</a></h6>
                <h6>FAQs</h6>
            </div>
            <div class="col-lg-4">
                <h5><u><b>Safety and Privacy</b></u></h5>
                <h6><a href="TERMS OF SERVICES.pdf">Terms of services</a></h6>
                <h6><a href="">Privacy Policy</a></h6>
                <h6>Safety Tips</h6>
            </div>
            <div class="col-lg-4">
                <h5><u><b>About</b></u></h5>
                <h6><a type="button" data-toggle="modal" data-target="#aboutModalScrollable">About us</a></h6>
                <h6><a type="button" data-toggle="modal" data-target="#careerModalLong">Careers</a></h6>
                <h6>Media</h6>
            </div>
        </div>
        <div class="footer-icons">
            <a href="https://www.facebook.com/iniestawebtech/"><i class="fab fa-facebook-f fa-2x"></i></a>
            <a href="https://www.linkedin.com/in/iniesta-webtech-solution-private-limited-111b82184/"><i
                    class="fab fa-linkedin fa-2x"></i></a>
            <a href="https://www.instagram.com/iniestawebtech/"><i class="fab fa-instagram fa-2x"></i></a>
        </div>
        <div class="text-center">
            <a href="">
                <h6>&copy; INIESTA 2020</h6>
            </a>
        </div>

    </div>
    <!-- footer end -->

    <!-- contact-modal -->
    <div style="text-align: left;" class="modal fade" id="contactModal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Contact Support</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Iniesta webtech solution pvt ltd <br>
                        Ring us at: <br>
                        9871428181 <br>
                        8182818101 <br>
                        Ping us at: <br>
                        email- Iniestawebtech@gmail.com <br>
                        Office Address <br>
                        Office number 3 third floor H-61 sector 63 Noida <br>
                        Uttar pradesh <br>
                        201306 <br></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- terms of services model -->
    <div style="text-align: left;" class="modal fade" id="careerModalLong" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Careers</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>
                        <b>Service. Community. Quality.</b><br>
                        Our goal is to develop and nurture the world's largest digital marketplace, a place where
                        people
                        can find and purchase all the services they need and create any company they dream of. As an
                        employee, the progress of our users and the celebration of your own personal development
                        inspires your work. Join in with us. <br>
                        <b>Our purpose comes first.</b><br>
                        It still feels like day one We believe the freelance economy is still at its earliest
                        stages. We
                        take
                        the view that — as early advocates of it — our task is to do it as holistically as we can,
                        to
                        introduce to all our goal of encouraging people to dream of living their work. <br>
                        We are an organisation powered by intent. Everything we do stems from our desire to inspire
                        people around the world to live their dream of working, develop their company from the
                        ground
                        up and become financially and professionally independent.
                        <b>Locations</b><br>

                        ---------- ------------ --------------- <br>
                        Teams (Our Iniesta Employees) <br>
                        XXXXX <br>
                        YYYYY <br>
                        ZZZZZ <br>
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- About us modal -->
    <div style="text-align: left;" class="modal fade" id="aboutModalScrollable" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">About us</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>
                        <b>Our Story</b><br>
                        The Iniesta story begins over a decade ago, when the tech lead of a Silicon Valley startup
                        realized his close friend in Athens would be perfect for an internet project. The team
                        agreed he
                        was the most effective choice, but were concerned about working with someone halfway round
                        the
                        globe. <br>

                        <b>A new way of working is born</b><br>
                        In response, the 2 friends created a brand new web-based platform that brought visibility
                        and
                        trust to remote work. it had been so successful the 2 realized other businesses would also
                        take
                        pleasure in reliable access to a bigger pool of quality talent, while workers would enjoy
                        freedom and adaptability to seek out jobs online. Together they decided to begin a
                        corporation
                        that might deliver on the promise of this technology.
                        Fast-forward to today, that technology is that the foundation of Iniesta — the most
                        important
                        global freelancing website. With countless jobs posted on Iniesta annually, freelancers are
                        earning money by providing companies with over 5,000 skills across over 70 categories of
                        labor.
                        <br>
                        <b>A world of opportunities</b><br>
                        Through Iniesta businesses get more done, connecting with freelancers to figure on projects
                        from
                        web and mobile app development to SEO, social media marketing, content writing, graphic
                        design,
                        admin help and thousands of other projects. Iniesta makes it fast, simple, and
                        cost-effective to
                        seek out, hire, work with, and pay the most effective professionals anywhere, any time.
                        <br>
                        <b>Iniesta’s vision</b> <br>
                        To be the number one flexible talent solution in the world. <br>
                        <b>Iniesta's mission</b><br>
                        To create economic opportunities so people have better lives. <br>
                        <b>Iniesta’s values</b><br>
                        Put our community first. <br>
                        Inspire a boundless future of work. <br>
                        Build amazing teams. <br>
                        Have a bias towards action. <br>
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>





    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
        crossorigin="anonymous"></script>
    <script src="index.js"></script>
    <script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
}
</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
</body>

</html>