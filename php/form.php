<?php

require './php/ProductAttr.php';
require './php/ProductSpecs.php';

/* Initialize the variable, will be used on the front to render user's selected data */
$product_name = $product_img = $product_img_location = $product_desc = '';
$product_attr = [];
$_SESSION['form_errors'] = [];

/* Check if the submit variable and the request_method have the necessaries values, the front will prevent to receive empty or incorrect data but here we will recheck this to and advise the user is an error ocurred */
if (isset($_POST["submit"]) && $_SERVER['REQUEST_METHOD'] == 'POST') {
  /* Manage the product name */
  if (empty($_POST['product-name'])) {
    array_push($_SESSION['form_errors'], 'El nombre del producto es obligatorio');
  } else {
    $product_name = clean($_POST['product-name']);
  }

  /* Manage the user's selected file, the file will be stored on a known location to use it after on the front-end */
  $file_info = finfo_open(FILEINFO_MIME_TYPE);
  if (empty($_FILES['product-img'])) {
    array_push($_SESSION['form_errors'], 'Debes incluir una imagen del producto');
  } else {
    $product_img = $_FILES['product-img'];
    $product_img_location = $_SERVER["DOCUMENT_ROOT"] . '/prbr/img/usr_img/' . basename($product_img['name']);
    move_uploaded_file($product_img['tmp_name'], $product_img_location);
  }

  /* Manage the product attributes */
  if (empty($_POST['product-attr']) || sizeof($_POST['product-attr']) == 0) {
    array_push($_SESSION['form_errors'], 'Debes seleccionar al menos un atributo del producto');
  } else {
    $product_attr = $_POST['product-attr'];
  }

  /* Manage the product description */
  if (empty($_POST['product-desc'])) {
    array_push($_SESSION['form_errors'], 'Debes indicar una descripción del producto');
  } else {
    $product_desc = clean($_POST['product-desc']);
  }
}

/**
 * Function to clean the strings data
 */
function clean($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>