<?php
include 'connect.php';
if (empty($_SESSION['user']['username_user'])) {
	header('location: login.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
	<meta name="author" content="AdminKit">
	<meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="shortcut icon" href="img/icons/icon-48x48.png" />

	<link rel="canonical" href="https://demo-basic.adminkit.io/" />

	<title>Data Siswa - 
		<?php  
			$page = isset($_GET['page']) ? $_GET['page'] : 'dashboard';
			$cek = preg_replace("/-/", " ", $page);
			$title = ucwords($cek);
			echo $title;
		?>
	</title>

	<script 
		src="https://code.jquery.com/jquery-3.7.0.min.js"
  		integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g="
  		crossorigin="anonymous">
	</script>
	<link href="css/app.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
	<link href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" rel="stylesheet">
	<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha512-MoRNloxbStBcD8z3M/2BmnT+rg4IsMxPkXaGh2zD6LGNNFE80W3onsAhRcMAMrSoyWL9xD7Ert0men7vR8LUZg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	
</head>

<body>
	<div class="wrapper">
		<nav id="sidebar" class="sidebar js-sidebar">
			<div class="sidebar-content js-simplebar">
				<a class="sidebar-brand" href="index.php">
          <span class="align-middle">Admin</span>
        </a>

				<ul class="sidebar-nav">
					<li class="sidebar-header">
						Halaman
					</li>

					<li class="sidebar-item
					<?php  
					if (empty($_GET['page'])) {
						echo "active";
					}
					?>
					">
						<a class="sidebar-link" href="index.php">
              <i class="align-middle" data-feather="server"></i> <span class="align-middle">Dashboard</span>
            </a>
					</li>

					<li class="sidebar-item
					<?php  
					if ($page == 'jurusan' || $page == 'edit-jurusan' || $page == 'tambah-jurusan') {
						echo "active";
					}
					?>
					">
						<a class="sidebar-link" href="?page=jurusan">
              <i class="align-middle" data-feather="codesandbox"></i> <span class="align-middle">Jurusan</span>
            </a>
					</li>

					<li class="sidebar-item
					<?php  
					if ($page == 'kelas' || $page == 'edit-kelas' || $page == 'tambah-kelas') {
						echo "active";
					}
					?>
					">
						<a class="sidebar-link" href="?page=kelas">
              <i class="align-middle" data-feather="airplay"></i> <span class="align-middle">Kelas</span>
            </a>
					</li>

					<li class="sidebar-item
					<?php  
					if ($page == 'siswa' || $page == 'edit-siswa' || $page == 'tambah-siswa') {
						echo "active";
					}
					?>
					">
						<a class="sidebar-link" href="?page=siswa">
              <i class="align-middle" data-feather="users"></i> <span class="align-middle">Siswa</span>
            </a>
					</li>
				</ul>

			</div>
		</nav>

		<div class="main">
			<nav class="navbar navbar-expand navbar-light navbar-bg">
				<a class="sidebar-toggle js-sidebar-toggle">
          <i class="hamburger align-self-center"></i>
        </a>

				<div class="navbar-collapse collapse">
					<ul class="navbar-nav navbar-align">
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
                <i class="align-middle" data-feather="settings"></i>
              </a>

							<a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
                <img src="img/avatars/<?php echo $_SESSION['user']['foto_user'] ?>"  class="avatar img-fluid rounded me-1" alt="<?= $_SESSION['user']['nama_user'] ?>" /> <span class="text-dark">
                	<?php  
                	echo $_SESSION['user']['nama_user'];
                	?>
                </span>
              </a>
							<div class="dropdown-menu dropdown-menu-end">
								<a class="dropdown-item" href="?page=profile"><i class="align-middle me-1" data-feather="user"></i> Profile</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="logout.php">Log out</a>
							</div>
						</li>
					</ul>
				</div>
			</nav>

			<main class="content">
				<div class="container-fluid p-0">

					<?php  
						$page = isset($_GET['page']) ? $_GET['page'] : 'dashboard';
						include $page . '.php';
					?>

				</div>
			</main>

			<footer class="footer">
				<div class="container-fluid">
					<div class="row text-muted">
						<div class="col-6 text-start">
							<p class="mb-0">
								<a class="text-muted" href="https://adminkit.io/" target="_blank"><strong>AdminKit</strong></a> - <a class="text-muted" href="https://adminkit.io/" target="_blank"><strong>Bootstrap Admin Template</strong></a>								&copy;
							</p>
						</div>
						<div class="col-6 text-end">
							<ul class="list-inline">
								<li class="list-inline-item">
									<a class="text-muted" href="https://adminkit.io/" target="_blank">Support</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="https://adminkit.io/" target="_blank">Help Center</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="https://adminkit.io/" target="_blank">Privacy</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="https://adminkit.io/" target="_blank">Terms</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</footer>
		</div>
	</div>

	<script src="js/app.js"></script>

</body>

</html>
