<?php
  include("connection_db.php");
  session_start();
  extract($_POST);
  $errors=[];
/*
  if($sent=="ارسال"){
   if(empty($subj)){
      $errors[]="لا يمكن ارسال رسالة فارغة";
   }else{
      $feedback = "INSERT INTO `feedbacks`( `content`) VALUES ('$subj')";
      if ($conn->query($feedback) === TRUE) {
         echo"done";
      }else{
         echo"nnnnnnn";
      }
   }
  }
*/
  
    if($sent=="ارسال"){
        if(empty($subj)){
            $errors[]="لا يمكن ارسال رسالة فارغة";
         }
         else{
            $feedback=" INSERT INTO  `feedbacks` (content) VALUES('$subj') ";

            if ($conn->query($feedback) === TRUE) {
                echo"done";
             } else {
               print_r($mysqli -> error_list);

             // $errors[]="حدث خطا ما , حاول مرة اخرى";
             } 
         }
    }

    if(!empty($errors)){
        $_SESSION['errors']=$errors;
        header("location:feedback.php");
     }else{
        $_SESSION['sent']="تم ارسال رسالتك بنجاح";
        header("location:feedback.php");
     }
<<<<<<< HEAD

   
   
=======
   
     
   

>>>>>>> effad56b3cc31fdd4acbaf875837bcc02e2459d3

?>