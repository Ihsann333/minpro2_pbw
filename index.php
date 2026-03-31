<?php
include 'koneksi.php';

$page = isset($_GET['page']) ? $_GET['page'] : 'home';
$query = mysqli_query($conn, "SELECT * FROM sertifikat");
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
    <h1>Nur Ihsan</h1>
    <h2>Creative Designer & Video Editor</h2>

    <p class="desc">
      Mahasiswa Sistem Informasi yang berfokus pada desain visual kreatif,
      UI/UX website, serta video editing menggunakan perangkat mobile.
    </p>
  </div>

  <div class="hero-right">
    <img src="img/foto.png">
  </div>
</section>
<?php } ?>

<!-- ABOUT -->
<?php if($page == 'about') { ?>
<section class="about">

  <!-- FOTO (INI YANG KAMU HILANGIN TADI) -->
  <div class="about-left">
    <img src="img/foto.png">
  </div>

  <div class="about-right">
    <h1>About Me</h1>

    <p>
      Saya adalah mahasiswa Sistem Informasi yang memiliki ketertarikan pada 
      desain visual kreatif dan video editing.
    </p>

    <p>
      Saya menikmati proses mengerjakan proyek yang berhubungan dengan desain,
      seperti merancang UI/UX untuk website agar tampil menarik dan mudah digunakan.
    </p>

    <p>
      Dalam bidang video editing, saya menggunakan CapCut dan Alight Motion 
      untuk menghasilkan konten yang lebih maksimal.
    </p>

    <!-- SKILL BAR -->
    <div class="skills">

      <div class="skill-item">
        <div class="skill-header">
          <span>Canva</span>
          <span>90%</span>
        </div>
        <div class="progress">
          <div class="progress-bar" style="width: 90%"></div>
        </div>
      </div>

      <div class="skill-item">
        <div class="skill-header">
          <span>Figma</span>
          <span>80%</span>
        </div>
        <div class="progress">
          <div class="progress-bar" style="width: 80%"></div>
        </div>
      </div>

      <div class="skill-item">
        <div class="skill-header">
          <span>CapCut</span>
          <span>85%</span>
        </div>
        <div class="progress">
          <div class="progress-bar" style="width: 85%"></div>
        </div>
      </div>

      <div class="skill-item">
        <div class="skill-header">
          <span>Alight Motion</span>
          <span>75%</span>
        </div>
        <div class="progress">
          <div class="progress-bar" style="width: 75%"></div>
        </div>
      </div>

    </div>

  </div>

</section>
<?php } ?>

<!-- CERTIFICATES -->
<?php if($page == 'certificates') { ?>
<section class="section">
  <h1>Certificates</h1>

  <div class="cards">
    <?php while($row = mysqli_fetch_assoc($query)) { ?>
      <div class="card">
        <img src="img/<?php echo $row['gambar']; ?>">
      </div>
    <?php } ?>
  </div>

</section>
<?php } ?>

</body>
</html>