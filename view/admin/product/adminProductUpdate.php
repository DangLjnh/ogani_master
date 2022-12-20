<?php
session_start();
include('../../../config/db.php');
if (!$_SESSION['nameAdmin']) header('Location: ../../../index.php');
?>

<!DOCTYPE html>
<html lang="zxx">

<head>
  <meta charset="UTF-8">
  <meta name="description" content="Ogani Template">
  <meta name="keywords" content="Ogani, unica, creative, html">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <title>Ogani | Template</title>

  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

  <!-- Css Styles -->
  <link rel="stylesheet" href="../../../css/bootstrap.min.css" type="text/css">
  <link rel="stylesheet" href="../../../css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="../../../css/elegant-icons.css" type="text/css">
  <link rel="stylesheet" href="../../../css/nice-select.css" type="text/css">
  <link rel="stylesheet" href="../../../css/jquery-ui.min.css" type="text/css">
  <link rel="stylesheet" href="../../../css/owl.carousel.min.css" type="text/css">
  <link rel="stylesheet" href="../../../css/slicknav.min.css" type="text/css">
  <link rel="stylesheet" href="../../../css/style.css" type="text/css">
</head>

<body>
  <!-- Contact Form Begin -->
  <?php if (isset($_SESSION['message'])) : ?>
  <h5 class="alert alert-success"><?= $_SESSION['message']; ?></h5>
  <?php
    unset($_SESSION['message']);
  endif;
  ?>
  <?php
  if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "SELECT * FROM product WHERE id=:id LIMIT 1";
    $statement = $conn->prepare($query);
    $data = [':id' => $id];
    $statement->execute($data);

    $result = $statement->fetch(PDO::FETCH_OBJ); //PDO::FETCH_ASSOC
  }
  ?>

  <?php include('../header/headerProduct.php'); ?>

  <div class="container">
    <form action="../../../controller/product/update.php" method="POST" enctype='multipart/form-data' id="form-product">
      <div class="modal-body row">
      <input type="hidden" name="id" value="<?= $result->id ?>" />
        <div class="form-group col-6">
          <div class="col-sm-12">
            <label for="text">Tên sản phẩm: </label>
            <input type="text" value="<?= $result->name; ?>" name="name" class="form-control" placeholder="Enter name">
          </div>
        </div>
        <div class="form-group col-6">
          <div class="col-sm-12">
            <label for="text">Gía: </label>
            <input type="number" value="<?= $result->price; ?>" name="price" class="form-control" placeholder="Enter price">
          </div>
        </div>
        <div class="form-group col-6">
          <div class="col-sm-12">
            <label for="text">Cân nặng(Gam): </label>
            <input type="number" min="0" name="weight" oninput="validity.valid||(value='');" step="0.5" value="<?= $result->weight;?>"
              class="form-control" placeholder="Enter weight">
          </div>
        </div>
        <div class="form-group col-6">
          <div class="col-sm-12">
            <label for="text">Đánh giá(1-5): </label>
            <input type="number" name="vote" value="<?= $result->vote; ?>" class="form-control" min="1" max="5" placeholder="Enter name">
          </div>
        </div>
        <div class="form-group col-6">
          <label for="text">Image: </label>
          <div class="input-group">
            <div class="custom-file">
              <input type="file" class="file-image" id="inputGroupFile02" name='filess[]' multiple>
              <label class="custom-file-label" for="inputGroupFile02"><?= $result->photoURL; ?></label>
            </div>
          </div>
        </div>
        <div class="form-group col-6">
          <div class="col-sm-12">
            <label for="text">Mô tả: </label>
            <input type="text" name="desc" value="<?= $result->description;?>" class="form-control" placeholder="Enter name">
          </div>
        </div>
        <div class="form-group col-6">
          <div class="image-upload">
          <img src="../../../<?= $result->photoURL; ?>" style="object-fit: cover;" class="imgOld">
          </div>
        </div>
        <div class="form-group col-8">
          <div class="col-sm-12">
            <label for="text">Danh mục sản phẩm: </label>
            <select   name="category_product">
              <?php
              $query = "SELECT * FROM category";
              $statement = $conn->prepare($query);
              $statement->execute();
              $statement->setFetchMode(PDO::FETCH_OBJ); //PDO::FETCH_ASSOC
              $result = $statement->fetchAll();
              if ($result) {
                foreach ($result as $row) {
              ?>
              <option  ><?= $row->name; ?></option>
              <?php
                }
              } else {
                ?>
              <option value="0">No Record Found</option>
              <?php
              }
              ?>
            </select>
          </div>
        </div>
        <div class="text-center">
          <button type="submit" name="update_product_btn" class="btn btn-primary">cập nhật sản phẩm</button>
        </div>
    </form>
  </div>


  </div>
  </div>
  </div>

  <!-- <script src="../../../js/jquery-3.3.1.min.js"></script>
  <script src="../../../js/bootstrap.min.js"></script>
  <script src="../../../js/jquery.nice-select.min.js"></script>
  <script src="../../../js/jquery-ui.min.js"></script>
  <script src="../../../js/jquery.slicknav.js"></script>
  <script src="../../../js/mixitup.min.js"></script>
  <script src="../../../js/owl.carousel.min.js"></script> -->
  <script src="http://code.jquery.com/jquery-3.4.1.min.js" 
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script type="text/javascript"
    src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.js"></script>
  <script src="../../../js/jquery_product.js"></script>
  
 



  <script>
  const fileImage = document.querySelector(".file-image")
  const imageUpload = document.querySelector(".image-upload")
  const labelFile = document.querySelector(".custom-file-label")
  fileImage.addEventListener("change", (e) => handleChangeFile(e))
  const toBase64 = (file) => {
    return new Promise((resolve, reject) => {
      const reader = new FileReader();
      reader.readAsDataURL(file);
      reader.onload = () => resolve(reader.result);
      reader.onerror = (error) => reject(error);
    });
  };
  const handleChangeFile = async (e) => {
    if (e?.target && e?.target?.files[0]) {
      labelFile.textContent = e?.target?.files[0].name
      let strBase64 = await toBase64(e.target.files[0]);
      if (!imageUpload.innerHTML) {
        imageUpload.innerHTML += `
          <img
          src=data:image/jpeg;base64${strBase64}
          alt=""
          class="img-thumbnail"
          />
          `
      } else {
        const imgThumbnail = document.querySelector(".img-thumbnail")
        imgThumbnail.parentNode.removeChild(imgThumbnail);
        imageUpload.innerHTML += `
          <img
          src=data:image/jpeg;base64${strBase64}
          alt=""
          class="img-thumbnail"
          />
          `
      }
    }
  };
  </script>
</body>

</html>