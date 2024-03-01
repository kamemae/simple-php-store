<?php
    include "../php/database_connection.php";
    include "../php/account_loginplz.php";
    
    $result = $connect->query("SELECT user_admin FROM user WHERE user_id = '{$_SESSION['id']}'");
    $row = $result->fetch_assoc();
    if($row['user_admin']) {
        header("Location: ../admin/");
    }
?>
  
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "../php/user_title.php"; ?>
    <link rel="shortcut icon" href="../images/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <script src="../js/toggler.js" defer></script>
</head>
<body>
    <header style="padding-bottom: 100px;">
        <div class="container">
            <?php include "../php/load_header.php"; ?>
            <div class="row" style="padding-top: 100px;">
                <div class="col-2">
                    <h1>
                        Witaj <?php echo $_SESSION['name']; ?>!
                    </h1>
                    <p>
                    Jak to jest być skrybą, dobrze?<br>
                    A, wie pan, moim zdaniem to nie ma tak, że dobrze, albo że niedobrze. Gdybym miał powiedzieć, co cenię w życiu najbardziej, powiedziałbym, że ludzi. Ludzi, którzy podali mi pomocną dłoń, kiedy sobie nie radziłem, kiedy byłem sam, i co ciekawe, to właśnie przypadkowe spotkania wpływają na nasze życie. Chodzi o to, że kiedy wyznaje się pewne wartości, nawet pozornie uniwersalne, bywa, że nie znajduje się zrozumienia, które by tak rzec, które pomaga się nam rozwijać. Ja miałem szczęście, by tak rzec, ponieważ je znalazłem, i dziękuję życiu! Dziękuję mu; życie to śpiew, życie to taniec, życie to miłość! Wielu ludzi pyta mnie o to samo: ale jak ty to robisz, skąd czerpiesz tę radość? A ja odpowiadam, że to proste! To umiłowanie życia. To właśnie ono sprawia, że dzisiaj na przykład buduję maszyny, a jutro – kto wie? Dlaczego by nie – oddam się pracy społecznej i będę, ot, choćby, sadzić... doć— m-marchew... 
                    </p>
                    <a href='../php/user_logout.php' class='btn'>Wyloguj sie</a>
                </div>
                <div class="col-2">
                    <img src="../images/chlep2.png" alt=" ">
                </div>
            </div>
        </div>
    </header>

    <?php include "../php/load_footer.php"; ?>
</body>
</html>