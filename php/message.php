<?php


if (isset($_SESSION['status'])) {
?>
  <div class="alert alert-danger alert-dismissible fade show" id="flash-msg" role="alert">
    <strong>Holy guacamole!</strong> <?php echo $_SESSION['status']; ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>

<?php
  unset($_SESSION['status']);
}




?>