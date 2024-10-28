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
        <div class="profiles">
            <?php
            $profiles = scandir("./profiles", SCANDIR_SORT_ASCENDING);
            $imageFolder = './images/';
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
                $imgTag = file_exists($imagePath) ? "<img src='$imagePath' alt='$name'>" : "<div>No disponible</div>";
                echo "<div class='profile-item'>";
                echo "<a href='profiles/$profile'>$name</a><br>";
                echo $imgTag;
                echo "</div>";
            }
            ?>
        </div>
    </main>
    <footer>
        <p>&copy; 2024 Proyecto Welcome</p>
    </footer>
</body>
</html>
