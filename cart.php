<?php
  include("connection_db.php");
  session_start();
  if(isset($_SESSION['where_in'])){
    $where_in= $_SESSION['where_in'];
  }
  if(isset($_SESSION['pro_qua'])){
    $pro_qua=$_SESSION['pro_qua'];
  }
?>
<!doctype html>
<html dir="rtl">
  <head>
    <title>تراثيات | السلة</title>
    <?php include('head.php')?>
  </head>
  <body>

  <!-- start navbar-->
  <nav class="navbar navbar-expand-lg ">
    <?php include('navbar.php') ?>
  </nav>
  <!-- end navbar-->

  <!--start cart-->
 <div class="cart">
    <div class="cart-head">
    <h2>سلة المشتريات</h2>
    </div>
  <div class="cart-body">
    <?php if(!empty($where_in)){
      $where_inD=trim($where_in, ",");
      echo(trim($where_in ,","));
      echo $where_inD;
    ?>
    <div class="container">
    <div class="row">
      <div class="products col-md-7">
           <?php
            $getProducts = "SELECT * FROM products where id in ($where_inD)";
            $getAllProducts = mysqli_query($conn,$getProducts);
            $products=mysqli_fetch_all($getAllProducts,MYSQLI_ASSOC);
            $_SESSION['products']=$products;
           foreach($products as $index=>$product):
           ?>
        <div class="product-details">
         <div class="row">
          <div class="col-3">
            <img src="img/<?=$product['sto_id']?>/<?=$product['img']?>" width="100%" alt="">
          </div>
          <div class="col-4">
            <ul>
              <li><?=$product['name']?></li>
              <li class="qua">   
                <label for="quantity">الكمية:</label>
                <?php
                $pro_id=$product['id'];
                ?>
                <span><?= $_SESSION['qua'][$pro_id]?> </span>
              </li>
              <li class="pr"><?=$product['price']*$_SESSION['qua'][$pro_id]?> <i class="fa-solid fa-shekel-sign"></i></li>
              <?php
              $pricee[]=$product['price']*$_SESSION['qua'][$pro_id];
              ?>
            </ul>
          </div>
          <div class="col-4 none">
          </div>
          <div class="col-1">
            <ul>
              <li><a href="cart_handel.php?delete=<?=$product['id']?>" class="btn"><i class="fa-solid fa-trash"></i></a></li>
            </ul>
          </div>
          </div>
        </div>    
        <?php endforeach; ?>
      </div>
      <div class="col-md-1"></div>
      <div class="price col-md-4">
        <h3>المبلغ الاجمالي للمنتجات :</h3>
        <span><?=array_sum($pricee)?> <i class="fa-solid fa-shekel-sign"></i></span>
        <p>تكلفة التوصيل: 20         <i class="fa-solid fa-shekel-sign"></i>
         مدن الضفة الغربية ،  40  
         <i class="fa-solid fa-shekel-sign"></i>
         مدن الداخل الفلسطيني المحتل    
         ،
         70 
         <i class="fa-solid fa-shekel-sign"></i>

          مدن قطاع غزة .
          </p>
        <a href="order_data.php?price=<?=array_sum($pricee)?>" class="btn keep">
          اتمام عملية الشراء
        </a>
      </div>
    </div>
    </div>
    <?php
       }else{
            ?>
          <div class="cart-embty">
           <img src="img/cart.png"  alt="">
           <p>سلة المشتريات الخاصة بك فارغة </p>
           <a  class="btn " href="index.php#store">التسوق الان</a>
          </div>
          <?php
        } ?>  
  </div>
</div>
  <!--end cart-->
  
   <!--start footer-->
  <div class="footer" id="footer">
   <?php include('footer.php')?>
  </div>
  <!--end footer-->

  <!--start copy-right-->
  <div class="copy-right">
    <?php include('copy_right.php')?>
  </div>
  <!--end copy-right-->

  <div class="up">
    <?php include('up.php')?>
  </div>
  <script>
    let up= document.getElementById("up");
    window.onscroll = function() {scrollFunction()};
    function scrollFunction() {
     if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
       up.style.display = "block";
       } else {
       up.style.display = "none";
       }
     }
     function upFunction(){
      document.body.scrollTop = 0;
      document.documentElement.scrollTop = 0;
     }
  </script>
    <!-- bootstrap 5 -->
    <script src="js/bootstrap.bundle.min.js"></script>
  </body>
</html>