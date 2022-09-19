<?php
    require("inc.php");
    require("config.php");

 // Doctor
  if (!empty($_REQUEST['doctor'])) {
    $doctor=$_REQUEST['doctor'];
    $doctor=filter_var($doctor, FILTER_SANITIZE_STRING);
   }

 // Name
  if (!empty($_REQUEST['name'])) {
    $name=$_REQUEST['name'];
    $name=filter_var($name, FILTER_SANITIZE_STRING);
   }

   else exit("<div class=\"alert alert-danger\">Укажите имя</div>");

 // Phone
  if (!empty($_REQUEST['phone'])) {
    $phone=$_REQUEST['phone'];
    $phone=filter_var($phone, FILTER_SANITIZE_STRING);
   }

   else exit("<div class=\"alert alert-danger\">Укажите телефон</div>");

 // Email
  if (!empty($_REQUEST['email'])) {
    $email=$_REQUEST['email'];
    $email=filter_var($email, FILTER_SANITIZE_STRING);
   }

  else $email="Не указан";

 // Date
  if (!empty($_REQUEST['date'])) {
    $datepicker=$_REQUEST['date'];
    $datepicker=filter_var($datepicker, FILTER_SANITIZE_STRING);
   }

   else exit("<div class=\"alert alert-danger\">Укажите дату</div>");

 // Time
  if (!empty($_REQUEST['time'])) {
    $timepicker=$_REQUEST['time'];
    $timepicker=filter_var($timepicker, FILTER_SANITIZE_STRING);
   }

   else exit("<div class=\"alert alert-danger\">Укажите время</div>");

 // Message
  if (!empty($_REQUEST['message'])) {
    $message=$_REQUEST['message'];
    $message=filter_var($message, FILTER_SANITIZE_STRING);
  }

    else $message="Не указано";


	$to=$admin_email;
	$subject="Запись к врачу ".$doctor." - Дата: ".$datepicker." ".$timepicker;

	$date=date("d.m.Y");
	$time=date("H:i:s");

	$msg="
	  Получено: $date в $time\n
    Запись к врачу: $doctor\n
	  Контактные данные\n
		 Имя: $name\n
		 E-Mail: $email\n
		 Телефон: $phone\n
		 Дата посещения: $datepicker\n
		 Время посещения: $timepicker\n
     Пожелания: $message";

  if(!mail_utf8($to,$name,$email,$subject,$msg))
  exit("<div class=\"alert alert-danger\">Произошла ошибка при отправке записи к врачу</div>");

  else
  exit ("<div class=\"alert alert-success\">Спасибо, мы получили Вашу запись на прием!</div>");
?>
