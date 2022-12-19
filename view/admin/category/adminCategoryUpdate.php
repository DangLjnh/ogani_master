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
    $categoryID = $_GET['id'];

    $query = "SELECT * FROM category WHERE categoryID=:categoryID LIMIT 1";
    $statement = $conn->prepare($query);
    $data = [':categoryID' => $categoryID];
    $statement->execute($data);

    $result = $statement->fetch(PDO::FETCH_OBJ); //PDO::FETCH_ASSOC
  }
  ?>

  <?php include('../header/headerCategory.php'); ?>

  <div class="container">
    <form action="../../../controller/category/update.php" method="POST" enctype='multipart/form-data'>
      <div class="modal-body row">
        <input type="hidden" name="id" value="<?= $result->categoryID ?>" />
        <div class="form-group col-6">
          <div class="col-sm-12">
            <label for="text">Name: </label>
            <input type="text" value="<?= $result->name; ?>" name="name" class="form-control" placeholder="Enter name"
              require>
          </div>
        </div>
        <div class="form-group col-6 d-flex align-items-end">
          <div class="input-group">
            <div class="custom-file">
              <input type="file" class="file-image" id="inputGroupFile02" name='files[]' multiple>
              <label class="custom-file-label" for="inputGroupFile02"><?= $result->photoURL; ?></label>
            </div>
          </div>
        </div>
        <div class=" col-6">
        </div>
        <div class="col-6">
          <div class="image-upload">
            <img src="../<?= $result->photoURL; ?>" style="object-fit: cover;" class="imgOld">
          </div>
        </div>
        <div class="text-center">
          <button type="submit" name="update_category_btn" class="btn btn-primary">Update user</button>
        </div>
    </form>
  </div>


  </div>
  </div>
  </div>

  <script>
  const fileImage = document.querySelector(".file-image")
  const imageUpload = document.querySelector(".image-upload")
  const labelFile = document.querySelector(".custom-file-label")
  labelFile.textContent = labelFile.textContent.slice(14)
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
    const imgOld = document.querySelector(".imgOld")
    if (e?.target && e?.target?.files[0]) {
      labelFile.textContent = e?.target?.files[0].name
      let strBase64 = await toBase64(e.target.files[0]);
      if (imgOld) {
        imgOld.parentNode.removeChild(imgOld)
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