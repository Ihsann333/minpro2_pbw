<?php
include 'koneksi.php';

$page = isset($_GET['page']) ? $_GET['page'] : 'home';

$profile = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM profile"));
$sertifikat = mysqli_query($conn, "SELECT * FROM sertifikat");
?>

<!DOCTYPE html>
<html>
<head>
  <title>Ihsan Portfolio</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

<nav class="nav">
  <h2 class="logo">My Portofolio</h2>
  <ul>
    <li><a href="?page=home">Home</a></li>
    <li><a href="?page=about">About Me</a></li>
    <li><a href="?page=certificates">Certificates</a></li>
  </ul>
</nav>

<!-- HOME -->
<?php if($page == 'home') { ?>
<section class="hero">
  <div class="hero-left">
    <p>Hello, I'm</p>
    <h1><?php echo $profile['nama']; ?></h1>
    <h2><?php echo $profile['role']; ?></h2>

    <p class="desc">
      <?php echo $profile['deskripsi']; ?>
    </p>
  </div>

  <div class="hero-right">
    <img src="img/<?php echo $profile['foto']; ?>">
  </div>
</section>
<?php } ?>

<!-- ABOUT -->
<?php if($page == 'about') { 

$profile2 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM profile"));

?>
<section class="about">

  <div class="about-left">
    <img src="img/<?php echo $profile2['foto']; ?>">
  </div>

  <div class="about-right">
    <h1>About Me</h1>

    <p><?php echo $profile2['deskripsi_about']; ?></p>

    <div class="skills">
      <?php 
      $skills = mysqli_query($conn, "SELECT * FROM skill");
      while($s = mysqli_fetch_assoc($skills)) { 
      ?>
        <div class="skill-item">
          <div class="skill-header">
            <span><?php echo $s['nama']; ?></span>
            <span><?php echo $s['persen']; ?>%</span>
          </div>
          <div class="progress">
            <div class="progress-bar" style="width: <?php echo $s['persen']; ?>%"></div>
          </div>
        </div>
      <?php } ?>
    </div>

  </div>

</section>
<?php } ?>

<!-- CERTIFICATES -->
<?php if($page == 'certificates') { ?>
<section class="section">
  <h1>Certificates</h1>

  <div class="cards">
    <?php while($row = mysqli_fetch_assoc($sertifikat)) { ?>
      <div class="card">
        <img src="img/<?php echo $row['gambar']; ?>">
      </div>
    <?php } ?>
  </div>

</section>
<?php } ?>

</body>
</html>