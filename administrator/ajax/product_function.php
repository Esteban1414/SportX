<?php
include '../../config/db.php';

if (!empty($_SESSION["id"])) {
  $id_user = $_SESSION["id"];
  $current_user = $conne->prepare("SELECT * FROM users WHERE id_user = ?");
  $current_user->execute([$id_user]);
  $row = $current_user->fetch(PDO::FETCH_ASSOC);
} else {
  header("Location: ../login.php");
}
date_default_timezone_set('America/Mexico_City');
$time = time();
$fecha_actual = date("Y-m-d H:i:s", $time);

if (isset($_POST['mod_id_product'])) {
  $id_product = $_POST['mod_id_product'];
  $category = $_POST['mod_category'];
  $type = $_POST['mod_type'];
  $section = $_POST['mod_section'];
  $mark = $_POST['mod_mark'];
  $name = $_POST['mod_name'];
  $description = $_POST['mod_description'];
  $size = $_POST['mod_size'];
  $stock = $_POST['mod_stock'];
  $price = $_POST['mod_price'];
  $duplicate_name = $conne->prepare("SELECT name FROM products WHERE name = ?");
  $duplicate_name->execute([$name]);
  $row = $duplicate_name->fetch(PDO::FETCH_ASSOC);
  if ($name != $row['name']) {
    $duplicate_name->execute([$name]);
    if ($duplicate_name->rowCount() > 0) {
      echo 'Product Name already exists';
    } else {
      if (!empty($_FILES['mod_image']['name'])) {
        $unlink_image = $conne->prepare("SELECT image from products WHERE id_product = ?");
        $unlink_image->execute([$id_product]);
        $row = $unlink_image->fetch(PDO::FETCH_ASSOC);
        if (file_exists("img/" . $row["image"])) {
          unlink("img/" . $row["image"]);
        }

        $newImageName = "copia_" . $_FILES['mod_image']['name'];
        $tempFilePath = $_FILES['mod_image']['tmp_name'];
        $newFilePath = "img/" . $newImageName;
        if ($section == '') {
          $section = NULL;
        }
        if ($size == '') {
          $size = NULL;
        }
        move_uploaded_file($tempFilePath, $newFilePath);
        try {
          $sql = $conne->prepare("UPDATE products SET category = ?, product_type = ?, section = ?, mark = ?, name = ?, description = ?, size = ?, stock = ?, price = ?, image = ? WHERE id_product = ?");
          $sql->execute([$category, $type, $section, $mark, $name, $description, $size, $stock, $price, $newImageName, $id_product]);
          $activity_log_mod = $conne->prepare("INSERT INTO activity_log_products (id_log_product, id_user, id_product, action, date, ip_address) VALUES(?,?,?,?,?,?)");
          $activity_log_mod->execute(['', $id_user, $id_product, 'Modified Product', $fecha_actual, $_SERVER['REMOTE_ADDR']]);
          $conne = null;
        } catch (Exception $e) {
          echo $e->getMessage();
          die();
        }
      } else {
        try {
          $sql = $conne->prepare("UPDATE products SET category = ?, product_type = ?, section = ?, mark = ?, name = ?, description = ?, size = ?, stock = ?, price = ? WHERE id_product = ?");
          $sql->execute([$category, $type, $section, $mark, $name, $description, $size, $stock, $price, $id_product]);
          $activity_log_mod = $conne->prepare("INSERT INTO activity_log_products (id_log_product, id_user, id_product, action, date, ip_address) VALUES(?,?,?,?,?,?)");
          $activity_log_mod->execute(['', $id_user, $id_product, 'Modified Product', $fecha_actual, $_SERVER['REMOTE_ADDR']]);
          $conne = null;
        } catch (Exception $e) {
          echo $e->getMessage();
          die();
        }
      }    }
  } else {
    if (!empty($_FILES['mod_image']['name'])) {
      $unlink_image = $conne->prepare("SELECT image from products WHERE id_product = ?");
      $unlink_image->execute([$id_product]);
      $row = $unlink_image->fetch(PDO::FETCH_ASSOC);
      if (file_exists("img/" . $row["image"])) {
        unlink("img/" . $row["image"]);
      }

      $newImageName = "copia_" . $_FILES['mod_image']['name'];
      $tempFilePath = $_FILES['mod_image']['tmp_name'];
      $newFilePath = "img/" . $newImageName;
      if ($section == '') {
        $section = NULL;
      }
      if ($size == '') {
        $size = NULL;
      }
      move_uploaded_file($tempFilePath, $newFilePath);
      try {
        $sql = $conne->prepare("UPDATE products SET category = ?, product_type = ?, section = ?, mark = ?, description = ?, size = ?, stock = ?, price = ?, image = ? WHERE id_product = ?");
        $sql->execute([$category, $type, $section, $mark, $description, $size, $stock, $price, $newImageName, $id_product]);
        $activity_log_mod = $conne->prepare("INSERT INTO activity_log_products (id_log_product, id_user, id_product, action, date, ip_address) VALUES(?,?,?,?,?,?)");
        $activity_log_mod->execute(['', $id_user, $id_product, 'Modified Product', $fecha_actual, $_SERVER['REMOTE_ADDR']]);
        $conne = null;
      } catch (Exception $e) {
        echo $e->getMessage();
        die();
      }
    } else {
      try {
        $sql = $conne->prepare("UPDATE products SET category = ?, product_type = ?, section = ?, mark = ?, description = ?, size = ?, stock = ?, price = ? WHERE id_product = ?");
        $sql->execute([$category, $type, $section, $mark, $description, $size, $stock, $price, $id_product]);
        $activity_log_mod = $conne->prepare("INSERT INTO activity_log_products (id_log_product, id_user, id_product, action, date, ip_address) VALUES(?,?,?,?,?,?)");
        $activity_log_mod->execute(['', $id_user, $id_product, 'Modified Product', $fecha_actual, $_SERVER['REMOTE_ADDR']]);
        $conne = null;
      } catch (Exception $e) {
        echo $e->getMessage();
        die();
      }
    }
  }
} elseif (isset($_POST['add_category'])) {
  $category = $_POST['add_category'];
  $type = $_POST['add_type'];
  $section = $_POST['add_section'];
  $mark = $_POST['add_mark'];
  $name = $_POST['add_name'];
  $description = $_POST['add_description'];
  $size = $_POST['add_size'];
  $stock = $_POST['add_stock'];
  $price = $_POST['add_price'];
  $provider = $_POST['add_provider'];

  $img_name = pathinfo($_FILES["add_image"]["name"], PATHINFO_FILENAME);
  $filename = "copia_" . $img_name . '.' . strtolower(pathinfo($_FILES['add_image']['name'], PATHINFO_EXTENSION));

  // Ubicación
  $location = 'img/' . $filename;

  // Extensión del archivo
  $file_extension = strtolower(pathinfo($location, PATHINFO_EXTENSION));

  // Extensiones de imagen válidas
  $image_ext = array("jpg", "png", "jpeg", "webp");

  // Tipos MIME permitidos
  $allowed_mime_types = array('image/jpeg', 'image/png', 'image/webp');

  $duplicate_name = $conne->prepare("SELECT * FROM products WHERE name = ?");
  $duplicate_name->execute([$name]);
  if ($duplicate_name->rowCount() > 0) {
    echo 'Product name already exists';
  } else {
    if (in_array($_FILES['add_image']['type'], $allowed_mime_types) && in_array($file_extension, $image_ext)) {
      if (move_uploaded_file($_FILES['add_image']['tmp_name'], $location)) {
        // Guardar información en la base de datos
        $nombre_archivo = $_FILES['add_image']['name'];
      }
    }
    if ($section == '') {
      $section = NULL;
    }
    if ($size == '') {
      $size = NULL;
    }
    if ($size == '') {
      $size = NULL;
    }
    try {
      $add_products = $conne->prepare("INSERT INTO products (id_product, date, category, product_type, section, mark, name, description, size, stock, price, image, provider_key) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)");
      $add_products->execute(['', $fecha_actual, $category, $type, $section, $mark, $name, $description, $size, $stock, $price, $filename, $provider]);
      $last_id = $conne->lastInsertId();
      $activity_log_add = $conne->prepare("INSERT INTO activity_log_products (id_log_product, id_user, id_product, action, ip_address, date) VALUES(?,?,?,?,?,?)");
      $activity_log_add->execute(['', $id_user, $last_id, 'Added Product', $_SERVER['REMOTE_ADDR'], $fecha_actual,]);
      $conne = null;
    } catch (Exception $e) {
      echo $e->getMessage();
      die();
    }
  }
} elseif (isset($_POST['del_id_product'])) {
  $id_product = $_POST['del_id_product'];
  try {
    $unlink_image = $conne->prepare("SELECT image from products WHERE id_product = ?");
    $unlink_image->execute([$id_product]);
    $row = $unlink_image->fetch(PDO::FETCH_ASSOC);
    if (file_exists("img/" . $row["image"])) {
      unlink("img/" . $row["image"]);
    }
    $activity_log_del = $conne->prepare("INSERT INTO activity_log_products (id_log_product, id_user, id_product, action, ip_address, date) VALUES(?,?,?,?,?,?)");
    $activity_log_del->execute(['', $id_user, NULL, 'Deleted Product', $_SERVER['REMOTE_ADDR'], $fecha_actual]);
    $delete_product = $conne->prepare("DELETE FROM products WHERE id_product = ?");
    $delete_product->execute([$id_product]);
    $conne = null;
  } catch (Exception $e) {
    echo $e->getMessage();
    die();
  }
}