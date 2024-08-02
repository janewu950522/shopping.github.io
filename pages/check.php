<!DOCTYPE html>
<?php require('../Connections/conn.php'); 
session_start();

if(@$_POST['buy']=="true"){
        $sql_buy="INSERT INTO buy (name  , email, phone, address, note, total) VALUES (
        '".$_POST["name"]."',
        '".$_POST["email"]."',
        '".$_POST["phone"]."',
        '".$_POST["address"]."',
        '".$_POST["note"]."',
        '".$_SESSION['total']."')";
        mysqli_query($link, $sql_buy);
        $sql_showid="select id from buy order by id DESC LIMIT 1";
        $result_showid=mysqli_query($link, $sql_showid);
        $buyid= mysqli_fetch_array($result_showid);
        $i=1;                                   
        while($i<=count($_SESSION['buy'])){
            $sql_catch= 'SELECT product_name FROM product where product_id="'.$_SESSION['buy'][$i].'"'; 
            $result_catch= mysqli_query($link, $sql_catch);
            $product_name= mysqli_fetch_array($result_catch);                                
            $sql_list="INSERT INTO list (id, name) VALUES (
                '".$buyid['id']."',
                '".$product_name['product_name']."')";
            mysqli_query($link, $sql_list);
            $i++;
            }
    header('Location:shopping-cart.php?buy=done');
}
?>

<html lang="">

<head>
    <title>生鮮蔬果網-購物</title>
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
                        <li><i class="fas fa-clock rgtspace-5"></i>
                            <?php
                                date_default_timezone_set("Asia/Taipei");
                                $date=(date("Y/m/d l"));
                                echo $date;
                            ?>
                        </li>
                        <li><i class="fas fa-phone rgtspace-5"></i> (06) 1234567</li>
                        <li><i class="far fa-envelope rgtspace-5"></i>test@gmail.com</li>                        
                    </ul>
                </div>
                <div class="fl_right">
                    <ul class="nospace">                    
                        <li><a href="../manage/m_login.php" title="Admin Login"><i class="fas fa-edit" style="color:gold;"></i></a> 後台</li>
                        <li><a href="http://sensermyhome.epizy.com/" title="infinityfree"><i class="fas fa-edit" style="color:gold;"></i></a> infinityfree</li>
                        <li><a href="http://sensermyhome.epizy.com/manage/m_login.php" title="Admin Login"><i class="fas fa-edit" style="color:gold;"></i></a> 外網後台</li>
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
            <h6 class="heading">購物</h6>
            <ul class="heading">
                <li><a href="../index.php">Home</a></li>
                <li><a href="shopping-cart.php">shopping-cart</a></li>
                <li><a href="#">check</a></li>
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
                    <h2><b>請確認訂單資訊</b></h2>
                    <br>
                <form action="" method="post">    
                    <?php
                        echo "<p>姓名：".@$_POST['name']."</p>".
                        "<p>E-MAIL：".@$_POST['email']."</p>".
                        "<p>電話：".@$_POST['phone']."</p>".
                        "<p>住址：".@$_POST['address']."</p>".
                        "<p>備註：".@$_POST['note']."</p>";
                    ?>
                    <br>
                    <p>訂單資訊：</p>
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
                    <h4>小計：<?php echo $_SESSION['total']; ?></h4>                    
                        <div style="float: right;">
                            <input type="hidden" name="name" value="<?php echo $_POST['name']; ?>"> &nbsp;
                            <input type="hidden" name="email" value="<?php echo $_POST['email']; ?>"> &nbsp;
                            <input type="hidden" name="phone" value="<?php echo $_POST['phone']; ?>"> &nbsp;
                            <input type="hidden" name="address" value="<?php echo $_POST['address']; ?>"> &nbsp;
                            <input type="hidden" name="note" value="<?php echo $_POST['note']; ?>"> &nbsp;
                            <input type="hidden" name="buy" value="true"> &nbsp;
                            <input class="custom-btn btn-16" type="submit" onClick="alert('親愛的客戶：\r感謝您的購物，您的訂單我們會盡速為您處理，祝您購物愉快！')"  value="確定"> &nbsp;
                            <input class="custom-btn btn-16" type="reset"" onClick="history.back();" value="回上一頁">
                        </div>
                    </form>
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
        ?> - All Rights Reserved - <a href="#">Domain Name</a></p>
            <p class="fl_right">Template by <a target="_blank" href="https://www.os-templates.com/" title="Free Website Templates">OS Templates</a></p>
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