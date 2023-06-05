<?php 
session_start();
include '../connection_db.php';
?>
<!DOCTYPE html>
<html>
<html dir="rtl">
<head>
<head>
    <?php include('head.php')?>
  </head>
<body>
  <?php
  if(isset($_GET['id']) || isset($_SESSION['upAddId'])){
    $id=$_GET['id'];
    $_SESSION['upAddId']=$id;

     $getAdmin = "SELECT * FROM admins WHERE id= $id";
     $getAdminData = mysqli_query($conn,$getAdmin);
     $admin=mysqli_fetch_all($getAdminData,MYSQLI_ASSOC);
    ?>
    <div class="update">
    <form class="row g-3 pt-5 align-center" method="POST" action="admin_handel.php?id=<?php $id?>">
      <h3>تعديل</h3>
    <?php
      //طباعة الاخطاء 
      if(isset($_SESSION['errors'])){
       $errors=$_SESSION['errors'];
       if(!empty($errors)){
      ?>
      <p class="alert alert-danger">
      <?php     
      foreach($errors as $error){
      echo $error;
      echo"<br>";
      }
      }
      unset($_SESSION['errors']);
       } 
      
    ?>
   </p>
      <div class="form-floating">
        <input type="text" class="form-control" id="name" name="name" placeholder="name" value="<?=$admin[0]['name']?>">
        <label for="name">الاسم
        </label>
     </div>
     <div class="form-floating">
        <input type="password" class="form-control" id="Password" name="password" placeholder="Password" value="<?=$admin[0]['password']?>">
        <label for="Password">كلمة المرور</label>
     </div>

       <select  name="status" class="form-select" aria-label="Default select example">
       <option selected>الحالة</option>
       <option  value="1">مسؤول رئيسي</option>
       <option  value="0">مسؤول</option>
      </select>

       <div class="col-12">
         <button type="submit" class="btn btn-primary" name="updateAdmin" value="updateAdmin">حفظ البيانات الجديدة</button>
         <a class="btn btn-primary" href="show.php?no=1">عودة</a>
       </div>
    </form>
  </div>
  <?php
  }
  ?>
</body>
</html>