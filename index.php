<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyecto Welcome 1</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Proyecto Welcome 1 - Gerard Sanchez y Valeria Santana</h1>
    </header>
    <main>
        <div class="table-container">
            <table>
                <?php
                $profiles = scandir("./profiles", SCANDIR_SORT_ASCENDING);  // Obtener archivos HTML en "profiles"
                $imageFolder = './images/';
                $columnCount = 0;

                echo "<tr>";
                foreach ($profiles as $profile) {
                    if ($profile == "." || $profile == "..") continue;

                    // Nombre del archivo sin extensión
                    $name = pathinfo($profile, PATHINFO_FILENAME);

                    // Posibles rutas de imagen (original y en minúsculas)
                    $possibleImages = [
                        $imageFolder . $name . '.png',
                        $imageFolder . $name . '.jpg',
                        $imageFolder . $name . '.jpeg',
                        $imageFolder . strtolower($name) . '.png',
                        $imageFolder . strtolower($name) . '.jpg',
                        $imageFolder . strtolower($name) . '.jpeg'
                    ];

                    // Buscar la primera imagen que exista en las rutas posibles
                    $imagePath = null;
                    foreach ($possibleImages as $image) {
                        if (file_exists($image)) {
                            $imagePath = $image;
                            break;
                        }
                    }

                    // Crear la celda del perfil
                    echo "<td class='profile-item'>";
                    echo "<a href='profiles/$profile'>$name</a><br>";

                    // Mostrar imagen o mensaje si no existe
                    if ($imagePath) {
                        echo "<img src='$imagePath' alt='$name' style='width: 100px; height: auto;'>";
                    } else {
                        echo "<div>Imagen no disponible</div>";
                    }

                    echo "</td>";

                    $columnCount++;
                    if ($columnCount % 5 == 0) {
                        echo "</tr><tr>"; // Nueva fila cada 5 elementos
                    }
                }
                echo "</tr>";
                ?>
            </table>
        </div>
    </main>
    <footer>
        <p>&copy; 2024 Proyecto Welcome</p>
    </footer>
</body>
</html>
