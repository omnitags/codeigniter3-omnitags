<base href="<?= base_url('assets/') ?>">
<!DOCTYPE html>
<html lang="en">

<?php $this->load->view($head) ?>

<!-- signup dan login memiliki style yg sama -->

<body class="login">
  <?php foreach ($tbl_a1 as $tl_a1): ?>
    <div id="background-image">
      <img src="img/<?= $tabel_b7 ?>/<?= $tl_a1->$tabel_b7_field5 ?>">
    </div>
  <?php endforeach ?>

  <div class="container">

    <!-- membuat konten berada tepat di tengah2 halaman  -->
    <div class="row justify-content-center align-items-center h-100">
      <div class="col-lg-5 login">

        <!-- link kembali -->
        <a class="text-decoration-none" href="<?= site_url('home') ?>">Kembali ke beranda</a>

        <h1 class="text-center"><?= $title ?><?= $phase ?></h1>

        <!-- form signup -->
        <form action="<?= site_url($tabel_c2 . '/tambah') ?>" method="post">
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-user"></i></span>
            </div>
            <input class="form-control" type="text" required name="<?= $tabel_c2_field2_input ?>"
              placeholder="Masukkan <?= $tabel_c2_field2_alias ?>">
            <input type="hidden" name="<?= $tabel_c2_field6_input ?>" value="<?= $tabel_c2_field6_value5 ?>">
          </div>

          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-envelope"></i></span>
            </div>
            <input class="form-control" type="email" required name="<?= $tabel_c2_field3_input ?>"
              placeholder="Masukkan <?= $tabel_c2_field3_alias ?>">
          </div>

          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-key"></i></span>
            </div>
            <input class="form-control" id="psw" type="password" required name="<?= $tabel_c2_field4_input ?>"
              placeholder="Masukkan <?= $tabel_c2_field4_alias ?>" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
              title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
          </div>

          <div id="message">
            <label class="checkpass">Password must contain the following:</label><br>
            <div class="row">
              <div class="col-md-6">
                <label id="letter" class="checkpass invalid">A <b>lowercase</b> letter</label><br>
                <label id="capital" class="checkpass invalid">A <b>capital (uppercase)</b> letter</label><br>

              </div>
              <div class="col-md-6">
                <label id="number" class="checkpass invalid">A <b>number</b></label><br>
                <label id="length" class="checkpass invalid">Minimum <b>8 characters</b></label>

              </div>
            </div>
          </div>

          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-key"></i></span>
            </div>
            <input class="form-control" type="password" required name="konfirm"
              placeholder="Konfirmasi <?= $tabel_c2_field4_alias ?>">
          </div>

          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-phone"></i></span>
            </div>
            <input class="form-control" type="text" required name="<?= $tabel_c2_field5_input ?>"
              placeholder="Masukkan <?= $tabel_c2_field5_alias ?>">
          </div>

          <!-- pesan untuk pengguna yang signup -->
          <p class="small text-center text-danger"><?= $this->session->flashdata($this->views['flash1']) ?></p>

          <!-- tombol signup dan login -->
          <div class="form-group d-flex justify-content-around">
            <a class="btn btn-light text-primary login" type="button" href="<?= site_url($tabel_c2 . '/login') ?>">Sign In</a>
            <button class="btn btn-primary login" type="submit">Create account</button>
          </div>

        </form>

      </div>
    </div>
  </div>

  <style>
    /* Apply styles to the background image container */
    #background-image {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      z-index: -1;
      /* Ensure the background image is behind other content */
    }

    /* Apply blur effect to the background image */
    #background-image img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      filter: blur(5px);
      /* Adjust blur intensity as needed */
      transform: scale(1.1);
    }

    /* Other styles for your form and other content */
    .container {
      position: relative;
      /* Ensure other content stays on top */
      z-index: 1;
      /* Ensure other content stays on top */
    }
  </style>


  <script>
    var myInput = document.getElementById("psw");
    var letter = document.getElementById("letter");
    var capital = document.getElementById("capital");
    var number = document.getElementById("number");
    var length = document.getElementById("length");

    // When the user clicks on the password field, show the message box
    myInput.onfocus = function () {
      document.getElementById("message").style.display = "block";
    }

    // When the user clicks outside of the password field, hide the message box
    myInput.onblur = function () {
      document.getElementById("message").style.display = "none";
    }

    // When the user starts to type something inside the password field
    myInput.onkeyup = function () {
      // Validate lowercase letters
      var lowerCaseLetters = /[a-z]/g;
      if (myInput.value.match(lowerCaseLetters)) {
        letter.classList.remove("invalid");
        letter.classList.add("valid");
      } else {
        letter.classList.remove("valid");
        letter.classList.add("invalid");
      }

      // Validate capital letters
      var upperCaseLetters = /[A-Z]/g;
      if (myInput.value.match(upperCaseLetters)) {
        capital.classList.remove("invalid");
        capital.classList.add("valid");
      } else {
        capital.classList.remove("valid");
        capital.classList.add("invalid");
      }

      // Validate numbers
      var numbers = /[0-9]/g;
      if (myInput.value.match(numbers)) {
        number.classList.remove("invalid");
        number.classList.add("valid");
      } else {
        number.classList.remove("valid");
        number.classList.add("invalid");
      }

      // Validate length
      if (myInput.value.length >= 8) {
        length.classList.remove("invalid");
        length.classList.add("valid");
      } else {
        length.classList.remove("valid");
        length.classList.add("invalid");
      }
    }
  </script>

  <script src="jquery.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <script src="fontawesome/js/all.js"></script>
</body>

</html>