<?php
session_start();
if (isset($_GET['value'])) {
  if ($_GET['value'] == '') {
    $_SESSION['cart'] = $_GET['value'];
  } else {
    $_SESSION['cart'] = $_SESSION['cart'] + 1;
  }
  echo 'Session variable set to ' . $_SESSION['cart'];
  header('Location: ../index.php');
} else {
  echo 'No value specified for session variable';
}
