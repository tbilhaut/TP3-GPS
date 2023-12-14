<?php
session_start();
include("../bdd/bdd.php");
include("../class/user.php");

// $id_utilisateur = $_SESSION['id_utilisateur'];
$login = $_SESSION['id_utilisateur'];
$isAdmin = $_SESSION['isAdmin'];

// L'exit est rajouté à chaque fin de "if" pour éviter que le reste de code ne s'exécute intentionnellement si la condition
// n'est pas remplie.

// Vérifier si l'utilisateur est connecté via la session
if (!isset($_SESSION['id_utilisateur'])) {
    header('location: ../index.php');
    exit;
}

// Si l'utilisateur souhaite se déconnecter
if (isset($_POST['deconnexion'])) {
    User::Deconnexion(); // Appel de la fonction "Deconnexion" dans la Class User
    header('location: ../index.php'); // Redirection vers la page de connexion
    exit;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>PROJET GPS - Accueil</title>

    <!-- Custom fonts for this template-->
    <link href="../assets//vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../assets//css/sb-admin-2.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>

    <!-- Inclure les fichiers CSS de Leaflet -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />

    <!-- Inclure votre code JavaScript Leaflet -->
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>

    <!-- CSS personnalisé pour définir la taille de la carte -->
    <style>
        #map {
            height: 320px; /* Ajustez la hauteur selon vos besoins */
            width: 100%;   /* Ajustez la largeur selon vos besoins */
        }
    </style>
    
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="accueil.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">PROJET <sup>GPS</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Accueil -->
            <li class="nav-item active">
                <a class="nav-link" href="accueil.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Accueil</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Components</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Components:</h6>
                        <a class="collapse-item" href="../extend_pages/buttons.php">Buttons</a>
                        <a class="collapse-item" href="../extend_pages/cards.php">Cards</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Utilities</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Utilities:</h6>
                        <a class="collapse-item" href="../extend_pages/utilities-color.php">Colors</a>
                        <a class="collapse-item" href="../extend_pages/utilities-border.php">Borders</a>
                        <a class="collapse-item" href="../extend_pages/utilities-animation.php">Animations</a>
                        <a class="collapse-item" href="../extend_pages/utilities-other.php">Other</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Addons
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Pages</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Login Screens:</h6>
                        <a class="collapse-item" href="../extend_pages/blank.php">Exemple</a>
                        <a class="collapse-item" href="../extend_pages/blank.php">Exemple</a>
                        <a class="collapse-item" href="../extend_pages/blank.php">Exemple</a>
                        <div class="collapse-divider"></div>
                        <h6 class="collapse-header">Other Pages:</h6>
                        <a class="collapse-item" href="404.php">404 Page</a>
                        <a class="collapse-item" href="../extend_pages/blank.php">Blank Page</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="../extend_pages/charts.php">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Charts</span></a>
            </li>

            <!-- Condition pour afficher la partie "Nav Item - Admin" uniquement si isAdmin est égal à 1 -->
            <?php if ($isAdmin == 1) : ?>
                <li class="nav-item">
                    <a class="nav-link" href="admin.php">
                        <i class="fas fa-fw fa-table"></i>
                        <span>Espace Admin</span>
                    </a>
                </li>
            <?php endif; ?>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                <!-- On affiche le nom de l'user -->
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $login; ?></span>

                                <img class="img-profile rounded-circle" src="../assets/img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="parametres.php">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Paramètres
                                </a>
                                <div class="dropdown-divider"></div>
                                <form method="post" action="">
                                    <button type="submit" name="deconnexion" class="dropdown-item">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Déconnexion
                                    </button>
                                </form>
                            </div>
                        </li>
                    </ul>
                </nav>
                <!-- End of Topbar -->

                    <!-- Content Row -->

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-8 col-lg-7">
                            <div class="card shadow mb-4" style="width: 1200px; height: 570px;">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Maps</h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Dropdown Header:</div>
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body" >
                                    <div class="chart-area">

                                    <?php
                                    $sql = "SELECT longitude, latitude, heure FROM GPSdata ORDER BY id DESC LIMIT 0, 1";
                                    $result = $GLOBALS["pdo"]->query($sql);

                                    $row = $result->fetch(PDO::FETCH_ASSOC);

                                    $longitude = $row['longitude'];
                                    $latitude = $row['latitude'];
                                    $heure = $row['heure'];
                                    ?>

                                    <div id="map" style="height: 470px;"></div>

                                    <script>
                                        
                                        
                                        var map = L.map('map').setView([<?php echo $latitude; ?>, <?php echo $longitude; ?>], <?php echo $heure; ?>);

                                        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                                            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                                        }).addTo(map);

                                        
                                                // Ajouter une polyline entre les deux marqueurs
                                        var polyline = L.polyline([
                                            [<?php echo $latitude; ?>, <?php echo $longitude; ?>],
                                            
                                        ]).addTo(map);

                                        // Ajuster la vue de la carte pour inclure les deux marqueurs et la polyline
                                        map.fitBounds([
                                            [<?php echo min($latitude, $latitude2, $latitude3, $latitude4, $latitude5); ?>, <?php echo min($longitude, $longitude2, $longitude3, $longitude4, $longitude5); ?>],
                                            [<?php echo max($latitude, $latitude2, $latitude3, $latitude4, $latitude5); ?>, <?php echo max($longitude, $longitude2, $longitude3, $longitude4, $longitude5); ?>]
                                        ]);


                                     // Define an array to store coordinates
                                        let coordinatesArray = [];
                                        

                                        let lastLatLng;
let totalDistance = 0;
let distancePopup;

function updateMap() {
    // Make a fetch request to get updated data
    fetch('http://192.168.64.148/projetgps/main_pages/data.php')
        .then(response => response.json())
        .then(data => {
            console.log('Received data:', data);

            // Create a LatLng object for the new point
            const newLatLng = L.latLng(data.latitude, data.longitude);

            // Update marker position
            const marker = L.marker(newLatLng).addTo(map)
                .bindPopup('vous etes ici.')
                .openPopup();

            // Clear existing polyline
            if (polyline) {
                map.removeLayer(polyline);
            }

            // Add the new coordinates to the array
            coordinatesArray.push([data.latitude, data.longitude]);

            // Create a new polyline with all coordinates
            polyline = L.polyline(coordinatesArray, { color: 'blue', weight: 3, opacity: 0.7 }).addTo(map);

            // Pan the map to the new location
            map.panTo([data.latitude, data.longitude]);

            // Calculate distance and update popup
            if (lastLatLng) {
                const distance = lastLatLng.distanceTo(newLatLng) / 1000; // Convert to kilometers
                totalDistance += distance;

                // Update popup content
                if (distancePopup) {
                    distancePopup.setContent(`Total Distance: ${totalDistance.toFixed(2)} km`);
                } else {
                    // Create popup if it doesn't exist
                    distancePopup = L.popup({
                        closeButton: false,
                        autoClose: false
                    }).setLatLng(newLatLng)
                        .setContent(`Total Distance: ${totalDistance.toFixed(2)} km`)
                        .openOn(map);
                }
            }

            // Update lastLatLng for the next iteration
            lastLatLng = newLatLng;
        })
        .catch(error => console.error('Error fetching data:', error));
}


                                    // Uncomment the line below to refresh the map every 5 seconds
                                    setInterval(updateMap, 5000);





                                    </script>


                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pie Chart -->
                        
                        

                    

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; PROJET GPS</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="../assets//vendor/jquery/jquery.min.js"></script>
    <script src="../assets//vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../assets//vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../assets//js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../assets//vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../assets//js/demo/chart-area-demo.js"></script>
    <script src="../assets//js/demo/chart-pie-demo.js"></script>

    <script src="../assets/js/demo/APImap.js"></script>
    

</body>

</html>