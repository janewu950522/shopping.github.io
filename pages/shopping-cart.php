<!DOCTYPE html>
<?php require('../Connections/conn.php'); 
session_start();
if(@$_GET['buy']=="done"){
    unset($_SESSION['buy']);
    unset($_SESSION['buy_code']);
    unset($_SESSION['total']);
}
?>


<html lang="">

<head>
    <title>生鮮蔬果網-購物車</title>
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
            <h6 class="heading">購物車</h6>
            <ul class="heading">
                <li><a href="../index.php">Home</a></li>
                <li><a href="#">Shopping-cart</a></li>
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
                <div>
                    <h2><b>購物車</b></h2><br>
                    <table class="table table-hover ">
                        <tr>
                            <td>#</td>
                            <td>品項</td>
                            <td>價格</td>
                        </tr>
                        <?php 
                        if(isset($_SESSION['buy'])){
                            $_SESSION['total']=0;
                            $i=1;
                            while($i<=count($_SESSION['buy'])){   
                                $sql = 'SELECT * FROM product where product_id="'.$_SESSION['buy'][$i].'"'; 
                                $result = mysqli_query($link, $sql); 
                                $record = mysqli_fetch_array($result);                             
                                echo '<tr>
                                <td>'.$i.'</td>
                                <td>'.$record['product_name'].'</td>
                                <td>'.$record['product_price'].'</td>
                                </tr>';
                                $i++;
                                $_SESSION['total']+=$record['product_price'];
                            }
                        }; ?>
                    </table>
                </div>
            </div>
            <h4>小計：<?php echo @$_SESSION['total']; ?></h4>
            <div style="float: right;">
            <a href="info.php"><input class="custom-btn btn-16" type="button" value="結帳"></a> &nbsp;
            <a href="?buy=done"><input class="custom-btn btn-16" type="button" value="清空購物車" onclick="if(!confirm('確定清空？')) { return false;}"></a>
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
            <p class="fl_left">Copyright &copy;
                <?php
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