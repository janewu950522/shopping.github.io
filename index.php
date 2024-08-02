<!DOCTYPE html>
<?php require('Connections/connect.php'); 
    session_start();
    if(isset($_GET['login']) && $_GET['login']=="logout"){
        unset($_SESSION['login']);
    }
?>

<html lang="">

<head>
    <title>生鮮蔬果網</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
    <link href="layout/styles/bootstrap.css" rel="stylesheet" type="text/css" media="all">
    <link href="layout/styles/animation_button.css" rel="stylesheet" type="text/css" media="all">
    <link rel="shortcut icon" href="images/icon/strawberry.ico">
</head>
<style>
    ul#stats li p a {
        display: inline-block;
        width: 120px;
        height: 30px;
        text-align: center;
        color: darkorange;
        border: 1px darkorange solid;
        border-radius: 4px;
        padding-top: 5px;
        text-decoration: none;
        font-size: 20px;
    }
    
    ul#stats li p:hover a {
        background-color: darkorange;
        color: white;
    }
    
    .no_underline {
        text-decoration: none;
    }
</style>

<body id="top">
    <!-- ################################################################################################ -->
    <!-- ################################################################################################ -->
    <!-- ################################################################################################ -->
    <!-- Top Background Image Wrapper -->
    <div class="bgded overlay" style="background-image:url('images/demo/backgrounds/01.jpg');">
        <!-- ################################################################################################ -->
        <div class="wrapper row0">
            <div id="topbar" class="hoc clear">
                <div class="fl_left">
                    <ul class="nospace">
                        <li><i class="fas fa-phone rgtspace-5"></i> (06) 1234567</li>
                        <li><i class="far fa-envelope rgtspace-5"></i>test@gmail.com</li>
                    </ul>
                </div>
                <div class="fl_right">
                    <ul class="nospace">
                    <li><i class="fas fa-clock rgtspace-5"></i>
                            <?php
                                date_default_timezone_set("Asia/Taipei");
                                $date=(date("Y/m/d l"));
                                echo $date;
                            ?>
                        </li>
                        <li><a href="manage/m_login.php" title="Admin Login"><i class="fas fa-edit" style="color:gold;"></i></a></li>
                    </ul>
                    <!-- ################################################################################################ -->
                </div>
            </div>
        </div>
        <!-- ################################################################################################ -->
        <nav class="navbar navbar-inverse heading">
            <div class="container-fluid  row1">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php">生鮮蔬果網</a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="menu1">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="active"><a href="index.php">回首頁<span class="sr-only">(current)</span></a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">去購物<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="pages/shop.php#vegetable">有機蔬菜</a></li>
                                <li><a href="pages/shop.php#fruit">當季水果</a></li>
                                <li><a href="pages/shop.php#grocery">生鮮雜貨</a></li>
                            </ul>
                            <li><a href="pages/shopping-cart.php">購物車</a></li>
                            <li><a href="pages/message.php">聯絡我們</a></li>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- ################################################################################################ -->
        <div id="pageintro" class="hoc clear">
            <!-- ################################################################################################ -->
            <article>
                <h1 class="heading" style="color: darkorange;"><b>生鮮蔬果網</b></h1>
                <h5 class="heading" style="font-size: large;">Enjoy Fresh And Delicious</h5>
                <footer>
                    <ul class="nospace inline pushright">
                        <li><a class="custom-btn btn-14" href="pages/shop.php"><span>購物</span></a></li>
                        <li><a class="custom-btn btn-14" href="ebook/""><span>電子書</span></a></li>
                    </ul>
                </footer>
            </article>
            <!-- ################################################################################################ -->
        </div>
        <!-- ################################################################################################ -->
    </div>
    <!-- End Top Background Image Wrapper -->
    <!-- ################################################################################################ -->
    <!-- ################################################################################################ -->
    <!-- ################################################################################################ -->
    <div class="wrapper row3">
        <main class="hoc container clear">
            <!-- main body -->
            <!-- ################################################################################################ -->
            <section id="introblocks">
                <ul class="nospace group btmspace-80">
                    <li class="one_third first">
                        <figure>
                            <a class="imgover" href="pages/shop.php#vegetable"><img src="images/demo/gallery/01.jpg" alt=""></a>
                            <figcaption>
                                <h6 class="heading" style="font-size: large;">有機蔬菜</h6>
                            </figcaption>
                        </figure>
                    </li>
                    <li class="one_third">
                        <figure>
                            <a class="imgover" href="pages/shop.php#fruit"><img src="images/demo/gallery/02.jpg" alt=""></a>
                            <figcaption>
                                <h6 class="heading" style="font-size: large;">當季水果</h6>
                            </figcaption>
                        </figure>
                    </li>
                    <li class="one_third">
                        <figure>
                            <a class="imgover" href="pages/shop.php#grocery"><img src="images/demo/gallery/03.jpg" alt=""></a>
                            <figcaption>
                                <h6 class="heading" style="font-size: large;">生鮮雜貨</h6>
                            </figcaption>
                        </figure>
                    </li>
                </ul>
            </section>
            <hr>
            <section class="hoc container clear" id="news">
                <div class="sectiontitle">
                    <p class="heading underline font-x2">News</p>
                </div>
                <div class="row">
                <?php
                    foreach ($pdo->query('select * from news ORDER BY date DESC') as $row) { ;?>                                                                                                                   
                    <div class="alert alert-<?php echo $row['color']; ?>" role="alert">
                        <strong><?php echo $row['date'] ; ?></strong> <?php echo $row['title']; ?><a href="pages/news.php?news_id=<?php echo $row['news_id']; ?>" style="float: right" class="alert-link">>>More</a></div>                
                <?php }; ?>
                </div>
            </section>
            <!-- ################################################################################################ -->
            <!-- ################################################################################################ -->
            <!-- ################################################################################################ -->
            <!-- / main body -->
        </main>
    </div>
    <!-- ################################################################################################ -->
    <!-- ################################################################################################ -->
    <!-- ################################################################################################ -->
    <div class="bgded overlay" id="introduce" style="background-image:url('images/demo/backgrounds/02.jpg');">
        <section id="splitfifty" class="hoc container clear">
            <div class="sectiontitle">
                <p class="heading underline font-x2">About Us</p>
            </div>
            <div class="bgded clear" style="background-image:url('images/demo/backgrounds/03.jpg');">
                <!-- ################################################################################################ -->
                <article>
                    <h4 class="heading font-x2" style="color:darkorange;">生鮮蔬果網</h4>
                    <h5>堅持選擇最新鮮、最自然的生鮮蔬果，是您健康生活的好選擇</h5>
                    <a href="pages/message.php"><span  class="custom-btn btn-5 "style="text-align: center; text-decoration: none;">聯絡我們</span></a>
                </article>
                <!-- ################################################################################################ -->
            </div>
        </section>
    </div>
    <!-- ################################################################################################ -->
    <!-- ################################################################################################ -->
    <!-- ################################################################################################ -->
    <div class="bgded overlay row4" style="background-image:url('images/demo/backgrounds/05.jpg');">
        <footer id="footer" class="hoc clear">
            <!-- ################################################################################################ -->
            <div class="center btmspace-50">
                <p class="heading" style="color: darkorange;font-size:20px;">生鮮蔬果網</p>
                <ul class="faico clear">
                    <li><a class="faicon-line" href="#"><i class=" fab fa-line"></i></a></li>
                    <li><a class="faicon-facebook" href="#"><i class="fab fa-facebook"></i></a></li>
                    <li><a class="faicon-pinterest" href="#"><i class="fab fa-pinterest"></i></a></li>
                    <li><a class="faicon-twitter" href="#"><i class="fab fa-twitter"></i></a></li>
                </ul>
                <p class="nospace heading" style="font-size:small;">Contact Us On Other Website.</p>
            </div>
            <!-- ################################################################################################ -->
            <hr>
        </footer>
        <div id="copyright" class="hoc clear">
            <!-- ################################################################################################ -->
            <p class="fl_left">Copyright &copy; <?php
        date_default_timezone_set("Asia/Taipei");
        $date=(date("Y"));
        echo $date;
        ?> - All Rights Reserved -  <a href="../index.php">sensermyhome.epizy.com</a></p>
             
            <!-- ################################################################################################ -->
        </div>
    </div>
    <!-- ################################################################################################ -->
    <!-- ################################################################################################ -->
    <!-- ################################################################################################ -->
    <a id="backtotop" href="#top"><i class="fas fa-chevron-up"></i></a>
    <!-- JAVASCRIPTS -->
    <script src="layout/scripts/jquery.min.js"></script>
    <script src="layout/scripts/jquery.backtotop.js"></script>
    <script src="layout/scripts/jquery.mobilemenu.js"></script>
    <script src="layout/scripts/bootstrap.js"></script>
</body>

</html>