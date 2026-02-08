<?php
session_start();
include("config/db.php");

if(!isset($_SESSION['user_id'])){
    header("location:login.php");
    exit;
}


if(isset($_POST['book'])){
    $uid = $_SESSION['user_id'];
    $route = $_POST['route'];
    $pass = "PASS".rand(1000,9999);

    mysqli_query($conn, "INSERT INTO passes VALUES('','$uid','$route','$pass','')");
    echo "<div class='card mt-4 shadow'>
  <div class='card-body'>
    <h4 class='text-success'>Bus Pass Confirmed</h4>
    <hr>
    <p><b>Pass Number:</b> $pass</p>
    <p><b>Status:</b> Active</p>
    <p><b>Issued Date:</b> ".date("d M Y")."</p>
    <p class='text-muted'>Show this pass during travel</p>
  </div>
</div>
";

}
?>

<h3 class="mb-3">Book Your Bus Pass</h3>

<form method="POST" class="card p-4 shadow-sm">
  <label class="mb-2">Select Route</label>
  <select name="route" class="form-select mb-3" required>
    <?php
    $routes = mysqli_query($conn, "SELECT * FROM routes");
    while($r = mysqli_fetch_assoc($routes)){
      echo "<option value='{$r['id']}'>{$r['source']} → {$r['destination']}</option>";
    }
    ?>
  </select>

  <button name="book" class="btn btn-primary">Book Pass</button>
</form>

