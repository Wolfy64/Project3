<!DOCTYPE html>
<html lang="en">
<head>
    <title> <?= $this->title ?> </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <header>
        <p>
            <a href="index.php">Home</a>        
        </p>
    </header>

    <nav>
        <ul>
            <li>Connexion</li>
        </ul>
    </nav>

    <h1>Jean Forteroche's Blog</h1>
    <div>
        <p>Presentation Blablabla</p>
    </div>
    <div>
        <?= $contents ?>
    </div>
    <div>
        <p>
            <a href="?book=alaska">Book Alaska</a>
            <br>
            <a href="#">Book Link</a>
        </p>
    </div>

    <footer>
        <p>
            <ul>
                <li>Contact</li>
                <li>Facebook</li>
                <li>Tweeter</li>
                <li>Infos</li>
            </ul>
        </p>
    </footer>
</body>
</html>