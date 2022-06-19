<?php
if(isset($_GET['location'])) {
    require_once $_GET['location'];
}

$sql = sprintf("SELECT * FROM `users` WHERE `city` = '%s'", mysql_real_escape_string($_GET['city']));

$users = mysql_query($sql);
$usersFromOtherCities = [];

while($user = mysql_fetch_assoc($users)) {
    if(file_exists($user['user_dir'])) {
        echo $_REQUEST['message'] . ' ' . $user['name'] . "\n";
    } else {
        $usersFromOtherCities[$user['city']] = $user;
    }
}

echo 'Users from other cities:' . "\n";

foreach(['Nürnberg', 'Ansbach'] as $city) {
    foreach($usersFromOtherCities as $users) {
        foreach($users as $user) {
            if($user['city'] == $city) {
                echo $city . ' (' . count($users) . ')' . "\n";
                break;
            }
        }
    }
}