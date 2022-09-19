<?php
    require("inc.php");
    require("config.php");

 // Name
  if (!empty($_REQUEST['name'])) {
    $name=$_REQUEST['name'];
    $name=filter_var($name, FILTER_SANITIZE_STRING);
   }

   else {
     echo "<script>$(\".message\").toggle();$(\".message\").toggle().hide(\"fast\").show(\"fast\"); </script>";
     echo "<script>$(\".message .alert\").addClass('alert-danger').removeClass('alert-success'); </script>";
     echo "Укажите имя";
     exit();
   }

 // Phone
  if (!empty($_REQUEST['phone'])) {
    $phone=$_REQUEST['phone'];
    $phone=filter_var($phone, FILTER_SANITIZE_STRING);
   }

   else {
     echo "<script>$(\".message\").toggle();$(\".message\").toggle().hide(\"fast\").show(\"fast\"); </script>";
     echo "<script>$(\".message .alert\").addClass('alert-danger').removeClass('alert-success'); </script>";
     echo "Укажите телефон";
     exit();
   }

 // Email
  if (!empty($_REQUEST['email'])) {
    $email=$_REQUEST['email'];
    $email=filter_var($email, FILTER_SANITIZE_STRING);
   }

  else $email="Не указан";

 // Message
  if (!empty($_REQUEST['message'])) {
    $message=$_REQUEST['message'];
    $message=filter_var($message, FILTER_SANITIZE_STRING);
  }

  else {
    echo "<script>$(\".message\").toggle();$(\".message\").toggle().hide(\"fast\").show(\"fast\"); </script>";
    echo "<script>$(\".message .alert\").addClass('alert-danger').removeClass('alert-success'); </script>";
    echo "Укажите сообщение";
    exit();
  }


	$to=$admin_email;
	$subject="Письмо с сайта";

	$date=date("d.m.Y");
	$time=date("H:i:s");

	$msg="
	  Получено: $date в $time\n
	  Контактные данные\n
		 Имя: $name\n
		 E-Mail: $email\n
		 Телефон: $phone\n
     Сообщение: $message";

  if(!mail_utf8($to,$name,$email,$subject,$msg)) {
    echo "<script>$(\".message\").toggle();$(\".message\").toggle().hide(\"fast\").show(\"fast\"); </script>";
    echo "<script>$(\".message .alert\").addClass('alert-danger').removeClass('alert-success'); </script>";
    echo "Произошла ошибка при отправке письма";
    exit();
  }

  else {
    echo "<script>jQuery(\".message\").toggle();jQuery(\".message\").toggle().hide(\"fast\").show(\"fast\");jQuery('#contactForm')[0].reset();</script>";
  	echo "<script>jQuery(\".message .alert\").addClass('alert-success').removeClass('alert-danger'); </script>";
  	echo "Спасибо, мы получили Ваше письмо!";
  	echo "<script>jQuery(\"#name\").removeClass(\"error\");jQuery(\"#email\").removeClass(\"error\");jQuery(\"#message\").removeClass(\"error\");</script>";
  	echo "<script>jQuery(\".message .alert\").delay(4000).hide(\"fast\");</script>";
  	exit();
  }
?>
