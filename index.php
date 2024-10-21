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
            $profiles = scandir("./profile", SCANDIR_SORT_ASCENDING);
            $imageFolder = './img/';
            foreach ($profiles as $profile) {
                if ($profile == "." || $profile == "..") continue;
                $name = pathinfo($profile, PATHINFO_FILENAME);
                $imagePath = $imageFolder . $name . '.jpg';
                if (!file_exists($imagePath)) {
                    $imagePath = $imageFolder . $name . '.jpeg';
                }
                if (!file_exists($imagePath)) {
                    $imagePath = $imageFolder . $name . '.png';
                }
                $imgTag = file_exists($imagePath) ? "<img src='$imagePath'>" : "<div>No disponible</div>";
                echo "<tr>";
                echo "<td><a href='profile/$profile'>$name</a></td>";
                echo "<td>$imgTag</td>";
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

