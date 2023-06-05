<?php
include("connection_db.php");
  session_start();
  if(isset($_GET['delete'])){
    foreach (array_keys($_SESSION['cart'], $_GET['delete'], true) as $key) {
     unset($_SESSION['cart'][$key]);
    } 
    unset($_SESSION['qua'][$_GET['delete']]);
    }
    

  if(!isset($_SESSION['cart'])){
    $_SESSION['cart']=array();
    }

  if(isset($_GET['pro_id'])){
    $_SESSION['cart'][]=$_GET['pro_id'];

   }
   $where_in=implode(',',$_SESSION['cart']);
   $_SESSION['where_in']=$where_in;


   if(!isset($_SESSION['qua'])){
    $_SESSION['qua']=array();
    }

   if(isset($_GET['quantity'])){
     $pro_id=$_GET['pro_id'];
     $pro_qua=$_GET['quantity'];

     $_SESSION['qua'][$pro_id]=$pro_qua;
   }
      $_SESSION['pro_qua']=$pro_qua;

   header('location:cart.php?add=t');

?>
