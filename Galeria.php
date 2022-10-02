<!DOCTYPE html>
<html lang="pl">
<head>
    <!-- kodowanie znaków, możemy używać polskich znaków -->
    <meta charset="UTF-8" />
    <!-- tytuł strony -->
    <title> Galeria </title>
    <!-- importuje czcionkę, którą chce użyć -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400&family=Zen+Kaku+Gothic+Antique:wght@300&display=swap" rel="stylesheet">
    <!-- ikonka strony -->
    <link rel="shortcut icon" href="ikona.ico" type="image/x-icon">

    <!-- dodaje plik css.css -->
    <link rel="stylesheet" href="gcss.css" />

</head>
<body>
    <div id="container">
        <header>
            <img src="photo.png" alt="photo - header" />

        </header>
        <nav>
            <a class="menu" href="index.php">Forum</a>
            <a class="menu" href="Galeria.php">Galeria</a>
			<a class="menu" href="Panel_użytkownika.php">Panel użytkownika</a>
			<!-- <a class="menu" href="Kontakt.php">Kontakt</a> -->
            
        </nav>
        <section>
            <div>
                <div class="gallery">
                    <a target="_blank" href="s1.jpg">
                        <img src="s1.jpg" alt="Monstera Deliciosa">
                    </a>
                    <div class="desc">Monstera Deliciosa</div>
                </div>
                <div class="gallery">
                    <a target="_blank" href="s2.jpg">
                        <img src="s2.jpg" alt="Eukaliptus">
                    </a>
                    <div class="desc">Eukaliptus</div>
                </div>
                <div class="gallery">
                    <a target="_blank" href="s3.jpg">
                        <img src="s3.jpg" alt="Strelitzia">
                    </a>
                    <div class="desc">Strelitzia</div>
                </div>
                <div class="gallery">
                    <a target="_blank" href="s4.jpg">
                        <img src="s4.jpg" alt="Bananowiec 'Oriental Dwarf'">
                    </a>
                    <div class="desc">Bananowiec 'Oriental Dwarf'</div>
                </div>
                <div class="gallery">
                    <a target="_blank" href="s5.jpg">
                        <img src="s5.jpg" alt="Fikus">
                    </a>
                    <div class="desc">Fikus</div>
                </div>
                <div class="gallery">
                    <a target="_blank" href="s6.jpg">
                        <img src="s6.jpg" alt="Palma">
                    </a>
                    <div class="desc">Palma</div>
                </div>
                <div class="gallery">
                    <a target="_blank" href="s7.jpg">
                        <img src="s7.jpg" alt="Chamaedorea Elegans">
                    </a>
                    <div class="desc">Chamaedorea Elegans</div>
                </div>
                <div class="gallery">
                    <a target="_blank" href="s8.jpg">
                        <img src="s8.jpg" alt="Sansewieria">
                    </a>
                    <div class="desc">Sansewieria</div>
                </div>
            </div>
        </section>
        

        <footer>
            <address>
                Copyright 2021, Zofia Zinkowska<br />
                E-mail: <a href="mailto:zinkowskazosia20@gmail.com">zinkowskazosia20@gmail.com</a>
            </address>
        </footer>
    </div>
</body>
</html>