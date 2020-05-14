<main>
  <h1>Reset your password</h1>
  <p>An e-mail will be send to you with instructions on how to reset your password.</p>
  <form action="processing/reset-request.php" method="post">
    <input type="email" name="email" placeholder="Enter your e-mail adress...">
    <button type="submit" name="reset-request-submit">Recive new password by email.</button>
  </form>
  <?php
    if (isset($_GET["reset"])) {
      if ($_GET["reset"] == "success") {
        echo ' <p class="signupsuccess">Check your e-mail!</p>';
      }
      else if ($_GET['reset'] == "mailsent") {
          echo '<p class="signupsuccess">Email sent!</p>';
        }
    }
  ?>

</main>
