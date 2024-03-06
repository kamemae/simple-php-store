<?php 
    include "../php/database_connection.php";
    if(!$_SESSION['id']) header("Location: ../public/login.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cool Piekarnia | Koszyk</title>
    <link rel="shortcut icon" href="../images/logo.png" type="image/x-icon" />
    <link rel="stylesheet" href="../css/all.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="../js/toggler.js" defer></script>
</head>
<body>
    <?php include "../php/load_header.php"; ?>

    <div class="orderContainer">
        <form id="orderForm">
            <h2>Finalizacja Zamówienia</h2>
            <div style="display: flex; gap: 10px;">
                <div style="flex: 1;">
                    <label for="firstName">Imie:</label>
                    <input type="text" id="firstName" name="firstName" placeholder="np. Jan" required>
                </div>
                <div style="flex: 1;">
                    <label for="lastName">Nazwisko:</label>
                    <input type="text" id="lastName" name="lastName" placeholder="np. Kowalski"  required>
                </div>
            </div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="np. example@coolpiekarnia.xyz"  required>
            <label for="email">Kod Pocztowy:</label>
            <input type="email" id="text" name="zip" placeholder="np. 01-001" required>
            <label for="email">Adres:</label>
            <input type="email" id="text" name="adress" placeholder="np. Ul. Przykladowa 16 2137"  required><br><br>
            <div><h3 style='padding-bottom: 2px'>Paragon</h3>
            <table class='recipt'>
                <tbody>

                    <tr>
                        <td>Cheb <small style='font-size: 12px;'>x10 / 9.99 PLN szt.</small></td>
                        <td>99.90 PLN</td>
                    </tr>
                    <tr>
                        <td>Cheb <small style='font-size: 12px;'>x10 / 9.99 PLN szt.</small></td>
                        <td>99.90 PLN</td>
                    </tr>
                    <tr>
                        <td>Cheb <small style='font-size: 12px;'>x10 / 9.99 PLN szt.</small></td>
                        <td>99.90 PLN</td>
                    </tr>
                    <tr>
                        <td>Cheb <small style='font-size: 12px;'>x10 / 9.99 PLN szt.</small></td>
                        <td>99.90 PLN</td>
                    </tr>
                    <tr>
                        <td>Cheb <small style='font-size: 12px;'>x10 / 9.99 PLN szt.</small></td>
                        <td>99.90 PLN</td>
                    </tr>
                    <tr>
                        <td>Cheb <small style='font-size: 12px;'>x10 / 9.99 PLN szt.</small></td>
                        <td>99.90 PLN</td>
                    </tr>
                    <tr>
                        <td>Cheb <small style='font-size: 12px;'>x10 / 9.99 PLN szt.</small></td>
                        <td>99.90 PLN</td>
                    </tr>
                    <tr>
                        <td>Cheb <small style='font-size: 12px;'>x10 / 9.99 PLN szt.</small></td>
                        <td>99.90 PLN</td>
                    </tr>
                    <tr>
                        <td>Cheb <small style='font-size: 12px;'>x10 / 9.99 PLN szt.</small></td>
                        <td>99.90 PLN</td>
                    </tr>
                    <tr>
                        <td>Cheb <small style='font-size: 12px;'>x10 / 9.99 PLN szt.</small></td>
                        <td>99.90 PLN</td>
                    </tr>

                </tbody>
            </table>
            </div><br><hr><hr><br>
            <table class='recipt'>
                <tbody>
                    <tr>
                        <td>Koszyk: </td>
                        <td>69 PLN</td>
                    <tr>
                    <tr>
                        <td>Dostawa: </td>
                        <td>69 PLN</td>
                    <tr>
                    <tr>
                        <td>Całość: </td>
                        <td>69 PLN</td>
                    <tr>
                </tbody>
            </table>
            <br><br>
            <div>
                <button type="button" class='btn' style='width: 200px;' onclick="completeOrder()">Zamawiam i Płace</button>
            </div>
        </form>
    </div>
    
    <script>
        function completeOrder() {
            alert('Order completed successfully!');
        }
    </script>

    <?php include "../php/load_footer.php"; ?>
</body>
</html>