<?php
function sortByLastName($a, $b) {
    return $a['lastName'] <=> $b['lastName'];
}
function readData() : array {
    if (!file_exists(DIR.'bank.json')) {
        $data = json_encode([]);
        file_put_contents(DIR.'bank.json', $data);
    }

    $data = file_get_contents(DIR.'bank.json');
    return json_decode($data, 1);
}

function writeData(array $data) : void {
    _d('trig');
    $users = $data['users'];
    uasort($users, 'sortByLastName');
    $data['users'] = $users;
    file_put_contents(DIR.'bank.json', json_encode($data));
}

function backgroundImage() {
    $backgroundImages = ['adequatecouple.jpeg', 'crazylife.jpeg', 'happyrain1.jpeg', 'happyrain2.jpeg', 'highfive.jpg', 'moneyaura.jpeg'];
    return $backgroundImages[rand(0, count($backgroundImages) - 1)];
}

function generateAccountNumber($users) {
    do {
        $accNr = 'LT'.rand(0,9).rand(0,9).'55555';
        foreach(range(1, 11) as $_) {
            $accNr .= rand(0, 9);
        }
    } while (in_array($accNr, array_column($users, 'accNr')));
    return $accNr;
}

function checkName($name) {
    return preg_match('/^[A-Z][a-zA-z\s\'\-]*[a-z]$/', $name) ? true : false;
}

function checkPersonID($id, $users) {
    if (!preg_match('/^[3-6][\d]{10}$/', $id)) return false;
    if (in_array($id, array_column($users, 'personID'))) return false;
    $year = (5 > substr($id, 0, 1) && '00' != substr($id, 1, 2)) ? '19'.substr($id, 1, 2) : '20'.substr($id, 1, 2);
    return (!checkdate(substr($id, 3, 2), substr($id, 5, 2), $year) || $year.substr($id, 3, 2).substr($id, 5, 2) > date('Ymd')) ? false : true;
}

function checkAccountNr($accNr, $users) {
    return in_array($accNr, array_column($users, 'accNr')) ? false : true;
}
?>