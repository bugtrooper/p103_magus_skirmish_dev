<?php

  if (isset($_POST["reset-request-submit"])){

    $selector = bin2hex(random_bytes(8));
    $token = random_bytes(32);

    $url = "http://magusskirmish.ddns.net/create-new-password.php?selector=" . $selector . "&validator=" . bin2hex($token);

    $expires = date("U") + 900;

    require 'dbh.php';

    $userEmail = $_POST["email"];
    $sql = "DELETE FROM pwdReset WHERE pwdResetEmail=?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      echo "There was an error!";
      exit();
    }
    else {
      mysqli_stmt_bind_param($stmt, "s", $userEmail);
      mysqli_stmt_execute($stmt);
    }

    $sql = "INSERT INTO pwdReset (pwdResetEmail, pwdResetSelector, pwdResetToken, pwdResetExpires) VALUES (?,?,?,?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      echo "There was an error!";
      exit();
    }
    else {
      $hashedToken = password_hash($token, PASSWORD_DEFAULT);
      mysqli_stmt_bind_param($stmt, "ssss", $userEmail, $selector, $hashedToken, $expires);
      mysqli_stmt_execute($stmt);
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);

    require '../PHPMailer/PHPMailerAutoload.php';
    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'ssl';
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = '465';
    $mail->isHTML();
    $mail->Username = 'magus.skirmish.project@gmail.com';
    $mail->Password = 'kclkqdgtqzsuqqry';
    $mail->SetFrom('magus.skirmish.project@gmail.com','Magus Skirmish Project');
    $mail->Subject = 'Reset your password';
    $mail->Body = '<p>Recieved password reset request</p>
                  <p>Here is your link:
                  <a href="' . $url . '">' . $url . '</a></p>';
    $mail->AddAddress($userEmail);
    $mail->addReplyTo('magus.skirmish.project@gmail.com');

    $mail->Send();
    if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
  } else {
    header("Location: ../reset-password.php?reset=mailsent");
  }

  }
  else {
    header("Location: ../index.php");
  }


?>
