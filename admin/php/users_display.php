<?php
    $result = $connect->query("SELECT * FROM user");
    while($row = $result->fetch_assoc()) {
        echo "
            <tr class='menageUsersTrow'>                  
            <td>{$row['user_id']}</td> 
        ";
        if($row['user_id'] == $_SESSION['id']) echo "<td style='color: green;'>{$row['user_name']} <br><small>to ty</small></td>";
        else echo "<td>{$row['user_name']}</td>";
        echo "<td>{$row['user_email']}</td>";
        if($row['user_admin']) echo "<td><a href='../admin/php/users_revoke.php?user={$row['user_id']}' class='btn menageUserLast revoke'>Odbierz Uprawienia</a></td>";
        else echo "<td><a href='../admin/php/users_grant.php?user={$row['user_id']}' class='btn menageUserLast grant'>Nadaj Uprawienia</a></td>";
        echo "</tr>";
    }
?>