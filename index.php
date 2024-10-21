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
        <table>
            <tr>
                <th>Nombre</th>
                <th>Imagen</th>
            </tr>
                <?php
                $profiles = scandir("./profiles", SCANDIR_SORT_ASCENDING);
                $imageFolder = './images/';
                
                foreach ($profiles as $profile) {
                    if ($profile == "." || $profile == "..") continue; // Ignora los directorios actuales y padres
                    
                    $name = pathinfo($profile, PATHINFO_FILENAME); // Obtiene el nombre del archivo sin extensión
                    $imagePath = $imageFolder . $name . '.jpg';
                    
                    // Comprueba si la imagen existe en los diferentes formatos
                    if (!file_exists($imagePath)) {
                        $imagePath = $imageFolder . $name . '.jpeg';
                    }
                    if (!file_exists($imagePath)) {
                        $imagePath = $imageFolder . $name . '.png';
                    }
                    
                    // Genera la etiqueta de la imagen o un mensaje de "No disponible"
                    $imgTag = file_exists($imagePath) ? "<img src='$imagePath' alt='$name'>" : "<div>No disponible</div>";
                    
                    echo "<tr>";
                    echo "<td><a href='profiles/$profile'>$name</a></td>"; // Enlace al perfil
                    echo "<td>$imgTag</td>"; // Imagen o mensaje
                    echo "</tr>";
                }
                ?>
        </table>
    </main>
    <footer>
        <p>&copy; 2024 Proyecto Welcome</p>
    </footer>
</body>
</html>

