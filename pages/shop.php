<!DOCTYPE html>
<?php require('../Connections/connect.php'); 
session_start();

if(isset($_SESSION['buy'])){    
    
    if(@$_POST['buy']){
        $_SESSION['buy'][$_SESSION['buy_code']]=$_POST['buy'];
        $_SESSION['buy_code']++;
        // $i=1;
        // while($i<=count($_SESSION['buy'])){
        //     echo $_SESSION['buy'][$i]."<br>";
        //     $i++;
        // }
    }
}
else{
    $_SESSION['buy']=array();
    $_SESSION['buy_code']=1;
}
?>

<html lang="">

<head>
    <title>生鮮蔬果網-購物</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link href="../layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
    <link href="../layout/styles/bootstrap.css" rel="stylesheet" type="text/css" media="all">
    <link rel="shortcut icon" href="../images/icon/strawberry.ico">
</head>

<script>
    $('#myModal').on('shown.bs.modal', function() {
        $('#myInput').focus()
    })
</script>

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
                                <li><a href="#vegetable">有機蔬菜</a></li>
                                <li><a href="#fruit">當季水果</a></li>
                                <li><a href="#grocery">生鮮雜貨</a></li>
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
                <li><a href="#">shop</a></li>
            </ul>
        </div>
    </div>
    <!-- End Top Background Image Wrapper -->
    <!-- ################################################################################################ -->
    <div class="wrapper row3">
        <main class="hoc container clear">
            <!-- main body -->
            <!-- ################################################################################################ -->
            <section class="hoc container clear" id="vegetable">
                <div class="sectiontitle">
                    <p class="heading underline font-x2">有機蔬菜</p>
                </div>
                <div class="row">
                <?php
                    foreach ($pdo->query('select * from product where product_type = "v"') as $row) {; 
                        $row['product_info'] = nl2br($row['product_info']); ?>
                        <div class="col-sm-4 col-md-3">
                            <div class="thumbnail">
                                <img src="../images/shopping/<?php if($row['product_img']){echo $row['product_img'];}else{echo "demo.png";} ?>">
                                <div class="caption">
                                    <h3><?php echo $row['product_name']; ?></h3>
                                    <h4>$<?php echo $row['product_price']; ?></h4>
                                    <form name="form" action="" method="POST">
                                    <p>
                                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#<?php echo $row['product_id']; ?>">商品介紹</button>
                                        <div class="modal fade" id="<?php echo $row['product_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        <h4 class="modal-title" id="myModalLabel"><?php echo $row['product_name']; ?></h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <?php echo $row['product_info']; ?>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">關閉</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="hidden" name="buy" value="<?php echo $row['product_id']; ?>">
                                        <button type="submit" class="btn btn-warning" onclick="alert('已加入購物車')">購買</button>
                                    </p>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php }; ?>                   
                </div>
            </section>
            <section class="hoc container clear" id="fruit">
                <div class="sectiontitle">
                    <p class="heading underline font-x2">當季水果</p>
                </div>
                <div class="row">
                <?php
                    foreach ($pdo->query('select * from product where product_type = "f"') as $row) {; 
                        $row['product_info'] = nl2br($row['product_info']); ?>
                        <div class="col-sm-4 col-md-3">
                            <div class="thumbnail">
                                <img src="../images/shopping/<?php echo $row['product_img']; ?>">
                                <div class="caption">
                                    <h3><?php echo $row['product_name']; ?></h3>
                                    <h4>$<?php echo $row['product_price']; ?></h4>
                                    <form name="form" action="" method="POST">
                                    <p>
                                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#<?php echo $row['product_id']; ?>">商品介紹</button>
                                        <div class="modal fade" id="<?php echo $row['product_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        <h4 class="modal-title" id="myModalLabel"><?php echo $row['product_name']; ?></h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <?php echo $row['product_info']; ?>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">關閉</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="hidden" name="buy" value="<?php echo $row['product_id']; ?>">
                                        <button type="submit" class="btn btn-warning" onclick="alert('已加入購物車')">購買</button>
                                    </p>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php }; ?> 
                </div>
            </section>
            <section class="hoc container clear" id="grocery">
                <div class="sectiontitle">
                    <p class="heading underline font-x2">生鮮雜貨</p>
                </div>
                <div class="row">
                <?php
                    foreach ($pdo->query('select * from product where product_type = "g"') as $row) {; 
                        $row['product_info'] = nl2br($row['product_info']); ?>
                        <div class="col-sm-4 col-md-3">
                            <div class="thumbnail">
                                <img src="../images/shopping/<?php echo $row['product_img']; ?>">
                                    <div class="caption">
                                    <h3><?php echo $row['product_name']; ?></h3>
                                    <h4>$<?php echo $row['product_price']; ?></h4>
                                    <form name="form" action="" method="POST">
                                    <p>
                                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#<?php echo $row['product_id']; ?>">商品介紹</button>
                                        <div class="modal fade" id="<?php echo $row['product_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        <h4 class="modal-title" id="myModalLabel"><?php echo $row['product_name']; ?></h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <?php echo $row['product_info']; ?>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">關閉</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="hidden" name="buy" value="<?php echo $row['product_id']; ?>">
                                        <button type="submit" class="btn btn-warning" onclick="alert('已加入購物車')">購買</button>
                                    </p>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php }; ?> 
                </div>
            </section>
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
        ?> - All Rights Reserved - <a href="../index.php">sensermyhome.epizy.com</a></p>
             
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