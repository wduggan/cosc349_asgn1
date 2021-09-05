<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML//EN">
<html lang="en">

<head>
    <title>Customer Website</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
    <section class="top-box">
        <a href="">Admin</a>
    </section>

    <header>
        <nav>
            <ul>
                <li><a>Home</a></li>
                <li><a href="viewProducts.php">View Products</a></li>
            </ul>
        </nav>
    </header>


    <main>
        <section class="boxes">
            <h2>Welcome to the Customer Website</h2>
            <p>...</p>

            <table border="1">
                <tr>
                    <th>Product ID</th>
                    <th>name</th>
                </tr>

                <?php

                $db_host   = '192.168.2.13';
                $db_name   = 'business';
                $db_user   = 'admin';
                $db_passwd = 'admin';

                $pdo_dsn = "mysql:host=$db_host;dbname=$db_name";

                $pdo = new PDO($pdo_dsn, $db_user, $db_passwd);

                $q = $pdo->query("SELECT * FROM products");

                while ($row = $q->fetch()) {
                    echo "<tr><td>" . $row["productId"] . "</td><td>" . $row["name"] . "</td></tr>\n";
                }

                ?>
            </table>


        </section>
    </main>

    <footer class="boxes">
        <p>We sell stuff</p>
    </footer>

</body>

</html>