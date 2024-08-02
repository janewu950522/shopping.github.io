<?php  
    require('../Connections/conn.php'); 
    if(isset($_POST['msg']) && $_POST['msg']=="msg"){
        $sql_add = "INSERT INTO guestbook(name,email,content,post_time) VALUES('$_POST[name]', '$_POST[email]', '$_POST[content]', NOW())";
        mysqli_query($link, $sql_add);
        echo "<script>alert('留言成功');</script>";
    }  
?>
<!DOCTYPE html>


<html lang="">

<head>
    <title>生鮮蔬果網-聯絡我們</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link href="../layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
    <link href="../layout/styles/bootstrap.css" rel="stylesheet" type="text/css" media="all">
    <link href="../layout/styles/animation_button.css" rel="stylesheet" type="text/css" media="all">
    <link rel="shortcut icon" href="../images/icon/strawberry.ico">
</head>

<body id="top">

    <!-- Top Background Image Wrapper -->
    <div class="bgded overlay" style="background-image:url('../images/demo/backgrounds/01.jpg');">
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
                        <li><a href="../manage/m_login.php" title="Admin Login"><i class="fas fa-edit" style="color:gold;"></i></a></li>
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
                    <a class="navbar-brand" href="../index.php">生鮮蔬果網</a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="menu1">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="active"><a href="../index.php">回首頁 <span class="sr-only">(current)</span></a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">去購物<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="shop.php#vegetable">有機蔬菜</a></li>
                                <li><a href="shop.php#fruit">當季水果</a></li>
                                <li><a href="shop.php#grocery">生鮮雜貨</a></li>
                            </ul>
                            <li><a href="shopping-cart.php">購物車</a></li>
                            <li><a href="message.php">聯絡我們</a></li>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- ################################################################################################ -->
        <div id="breadcrumb" class="hoc clear">
            <!-- ################################################################################################ -->
            <h6 class="heading">聯絡我們</h6>
            <ul class="heading">
                <li><a href="../index.php">Home</a></li>
                <li><a href="#">message</a></li>
            </ul>
        </div>
    </div>
    <!-- End Top Background Image Wrapper -->
    <!-- ################################################################################################ -->
    <div class="wrapper row3">
        <main class="hoc container clear">
            <!-- main body -->
            <!-- ################################################################################################ -->
            <div class="content heading">
                <div id="comments">
                    <?php if(@isset($_GET['msgboard']) && $_GET['msgboard']=="yes"){
                        require('msgboard.php');
                    }
                    else{ ?>
                    <h2><b>留言</b></h2><br>
                    <a href="?msgboard=yes"><span  class="custom-btn btn-5 "style="float:right; text-align: center; text-decoration: none;">留言板</span></a>                    
                    <form name="form" action="" method="POST">
                        <div class="one_third first">
                            <label for="name">姓名<span>*</span></label>
                            <input type="text" name="name" id="name" value="" size="22" required>
                        </div>
                        <div class="one_third">
                            <label for="email">E-Mail <span>*</span></label>
                            <input name="email" type="email" id="email" size="22"> </div>
                        <div class="block clear">
                          <label for="content">留言<span>*</span></label>
                            <textarea name="content" id="content" cols="25" rows="10" required></textarea>
                        </div>
                        <div>
                            <input type="hidden" name="msg" value="msg">
                            <input type="submit" name="submit" value="提交"> &nbsp;
                            <input type="reset" name="reset" value="重寫">
                        </div>
                    </form>
                    <?php } ?>
                </div>
            </div>
        </main>
    </div>
    <!-- ################################################################################################ -->
    <!-- ################################################################################################ -->
    <!-- ################################################################################################ -->
    <div class="bgded overlay row4" style="background-image:url('../images/demo/backgrounds/05.jpg');">
        <footer id="footer" class="hoc clear">
            <!-- ################################################################################################ -->
            <div class="center btmspace-50">
                <h6 class="heading" style="color: darkorange; font-size: 20px;">生鮮蔬果網</h6>
                <ul class="faico clear">
                    <li><a class="faicon-line" href="#"><i class=" fab fa-line"></i></a></li>
                    <li><a class="faicon-facebook" href="#"><i class="fab fa-facebook"></i></a></li>
                    <li><a class="faicon-pinterest" href="#"><i class="fab fa-pinterest"></i></a></li>
                    <li><a class="faicon-twitter" href="#"><i class="fab fa-twitter"></i></a></li>
                </ul>
                <p class="nospace heading" style="font-size:small;">Contact Us On Other Website.</p>
            </div>
            <!-- ################################################################################################ -->
            <hr class="btmspace-50">
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
    <a id="backtotop" href="#top"><i class="fas fa-chevron-up"></i></a>
    <!-- JAVASCRIPTS -->
    <script src="../layout/scripts/jquery.min.js"></script>
    <script src="../layout/scripts/jquery.backtotop.js"></script>
    <script src="../layout/scripts/jquery.mobilemenu.js"></script>
    <script src="../layout/scripts/bootstrap.js"></script>
</body>

</html>