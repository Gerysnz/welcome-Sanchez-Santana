<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projecte Welcome 1</title>
    <link rel="stylesheet" href="styles.css"> <!-- Enllaça el fitxer CSS -->
</head>
<body>
    <h1>Projecte Welcome 1 - Gerard y Valeria - Llistat d'alumnes</h1>
    
    <table>
        <tr>
            <?php
            // Definir la carpeta de les fitxes HTML
            $html_dir = "./profile/";
            $html_files = scandir($html_dir); // Obtenir fitxers HTML
            $col_count = 0;
            $cols_per_row = 10; // 10 columnes per fila

            foreach ($html_files as $file) {
                // Comprovar si el fitxer és HTML
                if (substr($file, -5) == ".html") {
                    $name = substr($file, 0, -5); // Nom sense extensió
                    $image_path = "./img/" . $name . ".jpg"; // Ruta de la imatge
                    $image_exists = file_exists($image_path); // Comprovar si hi ha imatge

                    // Crear una cel·la per a cada alumne
                    echo "<td>";
                    echo "<a href='profile/$file'>$name</a>"; // Enllaç a la fitxa HTML

                    // Mostrar imatge si existeix, sinó, text "Sense imatge"
                    if ($image_exists) {
                        echo "<br><img src='$image_path' alt='Imatge de $name'>";
                    } else {
                        echo "<br><span>Sense imatge</span>";
                    }

                    echo "</td>";

                    // Controlar el nombre de columnes
                    $col_count++;
                    if ($col_count % $cols_per_row == 0) {
                        echo "</tr><tr>"; // Nova fila després de 10 columnes
                    }
                }
            }
            ?>
        </tr>
    </table>

</body>
</html>
