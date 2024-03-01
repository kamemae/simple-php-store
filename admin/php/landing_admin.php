<?php
        //admin uwu
        if(isset($_SESSION['id'])) {
            $result = $connect->query("SELECT user_admin FROM user WHERE user_id = '{$_SESSION['id']}'");
            $row = $result->fetch_assoc();
            if($row['user_admin']) {
                echo "
                    <center>
                    <h2 class='title'>Edytuj Produkt</h2><br>
                        <div class='col-2'>
                            <a href='?product={$_GET['product']}&q=name' class='btn'>Zmień Nazwę</a>
                            <a href='?product={$_GET['product']}&q=price' class='btn'>Zmień Cenę</a>
                            <a href='?product={$_GET['product']}&q=desc' class='btn'>Zmień Opis</a>
                            <a href='?product={$_GET['product']}' class='btn'>Kategorie</a>
                            <a href='?product={$_GET['product']}&q=sale' class='btn'>Zmień Zniżkę</a>
                            <a href='../admin/php/image_change.php?product={$_GET['product']}' class='btn'>Zmień Grafikę</a>
                            <a href='../admin/php/product_remove.php?product={$_GET['product']}' class='btn'>Usuń</a>
                        </div>  
                    </center>
                ";
                if(isset($_GET['q'])) {
                    $result = $connect->query("SELECT * FROM product WHERE product_id = '{$_GET['product']}'");
                    $row = $result->fetch_assoc();
                    switch($_GET['q']){
                        case 'name':
                            echo "
                                <center><p>Zmiana Nazwy</p></center>
                                <div class='row'>
                                    <form method='POST' action='../admin/php/product_rename.php?product={$_GET['product']}'>
                                        <input type='text' name='newNam' maxlenght='128' style='width: 250px; height: 25px;' value='{$row['product_name']}' requierd>
                                        <input type='submit'  style='width: 30px; height: 25px;' value='➫'>
                                    </form>
                                </div><br><br><br>
                            ";
                            break;

                        case 'price':
                            echo "
                                <center><p>Zmiana Ceny</p></center>
                                <div class='row'>
                                    <form method='POST' action='../admin/php/product_setprice.php?product={$_GET['product']}'>
                                        <input type='text' name='newPrice' style='width: 250px; height: 25px;' value='{$row['product_price']}' requierd>
                                        <input type='submit'  style='width: 30px; height: 25px;' value='➫'>
                                    </form>
                                </div><br><br><br>
                            ";
                            break;
                        case 'desc':
                            echo "
                                <center><p>Zmiana Opisu</p></center>
                                <div class='row'>
                                    <form method='POST' action='../admin/php/product_setdescription.php?product={$_GET['product']}'>
                                        <input type='text' name='newDesc' style='width: 250px; height: 25px;' value='{$row['product_description']}' requierd>
                                        <input type='submit'  style='width: 30px; height: 25px;' value='➫'>
                                    </form>
                                </div><br><br><br>
                            ";
                            break;
                        case 'categories':
                            
                            break;
                        case 'sale':
                            echo "
                                <center><p>Zmiana Zniżki</p></center>
                                <div class='row'>
                                    <form method='POST' action=''>
                                        <input type='text' maxlenght='128' style='width: 250px; height: 25px;' value='zrobi sie pozniej' requierd>
                                        <input type='submit' diabled style='width: 30px; height: 25px;' value='➫'>
                                    </form>
                                </div><br><br><br>
                            ";
                            break;
                        default:
                            break;
                    }
                }


            }

        }
?>