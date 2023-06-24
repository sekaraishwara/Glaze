<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Rental Room</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <link href="style.css" rel="stylesheet">
</head>
<body>
    <!-- ======= Appointment Section ======= -->
    <section id="appointment" class="appointment section-bg">
    <?php 
include("config.php");

if(isset($_POST['submit'])){
  $room_id = $_POST['room_id'];
  $room_label = $_POST['room_label'];
  $room_location = $_POST['room_location'];
  $room_window = $_POST['room_window'];
  $room_monthly_price = $_POST['room_monthly_price'];
  $room_availibility = $_POST['room_availibility'];
  $room_description = $_POST['room_description'];

  $sql = "INSERT INTO room VALUES ('$room_id','$room_label','$room_location','$room_window','$room_monthly_price','$room_availibility','$room_description')";

  $act =mysqli_query($conn, $sql);

  if($act)
  {
    header('location:room_admin.php');
  }else {
    echo "<script>
    alert('Input Failed!!');
    window.location.href='room_admin.php';
    </script>";
  }

}

 ?>

      <div class="container">

        <div class="section-title">
          <h2>Fill The Form Below</h2>
        </div>
        <form action="" method="POST">
                  <table>
                  <?php 

$query = mysqli_query($conn, "SELECT max(room_id) as idTerbesar FROM room");
  $data = mysqli_fetch_array($query);
  $room_id = $data['idTerbesar'];

  $urutan = (int) substr($room_id, 2, 2);

  $urutan++;

  $huruf = "R";
  $room_id = $huruf . sprintf("%02s", $urutan);
     ?>
                   <tr>
                    <td for="ID">ID</td>
                    <td><input type="text" class="form-control" name="room_id" value="<?= $room_id; ?>" required readonly></td>
                  </tr>
                   <tr>
                    <td for="Label">Label</td>
                    <td><input type="text" class="form-control" name="room_label" required></td>
                  </tr>
                   <tr>
                    <td for="Location">Location</td>
                    <td><input type="text" class="form-control" name="room_location" required></td>
                  </tr>
                   <tr>
                    <td for="Window">Window</td>
                    <td><input type="text" class="form-control" name="room_window" required></td>
                  </tr>
                   <tr>
                    <td for="Monthly Price">Monthly Price (Rp)</td>
                    <td><input type="number" class="form-control" name="room_monthly_price" required></td>
                  </tr>
                   <tr>
                    <td for="Availibility">Availibility</td>
                    <td><input type="text" class="form-control" name="room_availibility" required></td>
                  </tr>
                   <tr>
                    <td for="Description">Description</td>
                    <td><textarea class="form-control" name="room_description" required></textarea></td>
                  </tr>
                  <tr>
                <td></td>
                <td>
                  <button type="submit" name="submit">Save</button>
                  <button type="reset" >Reset</button>
                </td>
                </tr>
              </table>
                </form>
</body>
</html>