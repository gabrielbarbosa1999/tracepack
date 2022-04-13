<?php
    session_start();
    include 'class/system.class.php';

    $system = new System();

    if(!isset($_SESSION['tracepack'])) {
        header('Location: login.php');
    }

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>TracerPack</title>
    
    <link rel="stylesheet" href="assets/css/normalize.css" />
    <link rel="stylesheet" href="assets/css/style.css" />

    <link rel="stylesheet" href="assets/leaflet/leaflet.css" />
</head>
<body>
<nav>
    <div class="menu">
        <div id="menu-opener" onclick="openMenu()">
            <i class="fas fa-bars"></i>
        </div>
        <div id="menu-area">
            <ul>
                <li><a href="index.php">Início</a></li>
                <li><a href="users.php">Usuários</a></li>
                <li><a href="points.php">Pontos</a></li>
                <li><a href="poligonos.php">Polígonos</a></li>
                <li><a href="logout.php">Sair</a></li>
            </ul>
        </div>
    </div>
</nav>

<div id="map"></div>

<script src="https://kit.fontawesome.com/ca98a592e1.js" crossorigin="anonymous"></script>
<script src="assets/leaflet/leaflet.js"></script>
<script src="assets/js/script.js"></script>
<?php
    $points = $system->getPoints();
    $poligonos = $system->getPoligono();

    foreach($points as $p) {
        $varname = "ponto_".$p['id'];
        ?>
        <script>
            var <?php echo $varname; ?>= {
                "type": "Feature",
                "properties": {
                    "name": "<?php echo $p['nome']; ?>",
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [<?php echo $p['latitude'].", ".$p['longitude']; ?>]
                }
            };
            L.geoJSON(<?php echo $varname; ?>).addTo(map).bindPopup("<?php echo $p['nome']; ?>");
            </script>
            <?php
    }

    foreach($poligonos as $s) {
        $poligononame = "poligono_".$s['id'];
        $num = 0;
        ?>
        <script>
            var <?php echo $poligononame?> = [{
                "type": "Feature",
                "properties": {"name": "<?php echo $s['nome']?>"},
                "geometry": {
                    "type": "Polygon",
                    "coordinates": [[
                        <?php 
                        $b = explode(" ", $s["dados"]);
                        foreach($b as $c){
                            echo '['.$c.'],';
                        }
                        ?>
                    ]]
                }
            }];
            L.geoJSON(<?php echo $poligononame?>).addTo(map).bindPopup("<?php echo $s['nome']; ?>");
        </script>
        <?php
    }
?>
</body>
</html>