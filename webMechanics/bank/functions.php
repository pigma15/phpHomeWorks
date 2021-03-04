<?php
function sortByLastName($a, $b) {
    return $a['lastName'] <=> $b['lastName'];
}

function backgroundImage() {
    $backgroundImages = ['adequatecouple.jpeg', 'crazylife.jpeg', 'happyrain1.jpeg', 'happyrain2.jpeg', 'highfive.jpg', 'moneyaura.jpeg'];
    return $backgroundImages[rand(0, count($backgroundImages) - 1)];
}

function navBar() {
    return '<div class="nav">
                <a href="'.URL.'./create.php">Create new account</a>
                <a href="'.URL.'./table.php">List</a>
                <a href="'.URL.'./logout.php">logout</a>
            </div>';
}

function checkLogin($login, $password) {
    $loginInfo = file_get_contents(DIR.'login.json');
    $loginInfo = (json_decode($loginInfo, 1));
    return ($login == $loginInfo['login']['name'] && $password == $loginInfo['login']['password']) ? true : false;
}


//database
function readData() : array {
    if (!file_exists(DIR.'bank.json')) {
        $data = json_encode([]);
        file_put_contents(DIR.'bank.json', $data);
    }

    $data = file_get_contents(DIR.'bank.json');
    return json_decode($data, 1);
}

function writeData(array $data) : void {
    $users = $data['users'];
    uasort($users, 'sortByLastName');
    $data['users'] = $users;
    file_put_contents(DIR.'bank.json', json_encode($data));
}

// create account
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

// table
function changeAmount($id, $amount, $change, $database) {
    if ('add' == $change) {
        $database['users'][$id]['creditAmount'] += $amount;
        writeData($database);
        unset($_SESSION['table']['errors']);
        $_SESSION['table']['added'] = $database['users'][$id];
        $_SESSION['table']['added']['changed'] = $amount;
        header('Location: '.URL.'table.php');
        exit;
    }
    if ('remove' == $change) {
        if (0 <= ($database['users'][$id]['creditAmount'] - $amount)) {
            $database['users'][$id]['creditAmount'] -= $amount;
            writeData($database);
            unset($_SESSION['table']['errors']);
            $_SESSION['table']['removed'] = $database['users'][$id];
            $_SESSION['table']['removed']['changed'] = $amount;
            header('Location: '.URL.'table.php');
            exit;
        } else {
            $_SESSION['table']['errors'][$id] = 'Not enough credit';
            header('Location: '.URL.'table.php');
            exit;
        }
    }
    $_SESSION['table']['errors'][$id] = 'Invalid value';
    header('Location: '.URL.'table.php');
    exit;
}

function deleteAccount($id, $database) {
    if (0 == $database['users'][$id]['creditAmount']) {
        $_SESSION['deleted'] = $database['users'][$id];
        $name = $database['users'][$id]['name'].' '.$database['users'][$id]['lastName'];
        unset($database['users'][$id]);
        writeData($database);
        header('Location: '.URL.'table.php?deleted='.$name);
        exit;
    } else {
        $_SESSION['table']['errors'][$id] = 'Account is not empty';
        header('Location: '.URL.'table.php');
        exit;
    }
}

function restoreAccount($database) {
    do {
        $id = md5(microtime());
    } while (array_key_exists($id , $database['users']));
    $database['users'][$id] = $_SESSION['deleted'];
    writeData($database);
    unset($_SESSION['deleted']);
    header('Location: '.URL.'table.php');
    exit;
}

function generateTable($database) {
    $table = '<h2>Accounts</h2>';
    if (isset($_SESSION['deleted'])) {
        $table .= '<form class="restore" method="post">
                        <input type="submit" name="restore" value="Restore last deleted">                  
                    </form>';
    }
    if (isset($_GET['deleted'])) {
        $table .= '<form class="fullscreen" id="fullscreen" method="post">
                        <div class="close" id="close">X</div>
                        <span>'.$_SESSION['deleted']['name'].' '.$_SESSION['deleted']['lastName'].'\'s account has been deleted</span>
                        <input type="submit" name="restore" value="Restore account">                  
                    </form>';
    }
    if (isset($_SESSION['table']['added']) || isset($_SESSION['table']['removed'])) {
        if (isset($_SESSION['table']['added'])) {
            $string = 'Added '.$_SESSION['table']['added']['changed'].' to '.$_SESSION['table']['added']['name'].' '.$_SESSION['table']['added']['lastName'].'\'s account';
            unset($_SESSION['table']['added']);
        }
        if (isset($_SESSION['table']['removed'])) {
            $string = 'Withdrawn '.$_SESSION['table']['removed']['changed'].' from '.$_SESSION['table']['removed']['name'].' '.$_SESSION['table']['removed']['lastName'].'\'s account';
            unset($_SESSION['table']['removed']);
        }
        $table .= '<div class="fullscreen" id="fullscreen" method="post">
                        <div class="close" id="close">X</div>
                        <span>'.$string.'</span>                 
                    </div>';
    }

    $table .= '<div class="contents" style="grid-template-columns: repeat(10, 1fr)">
        <span style="grid-column: auto / span 1">First name</span>
        <span style="grid-column: auto / span 1">Last name</span>
        <span style="grid-column: auto / span 2">Account number</span>
        <span style="grid-column: auto / span 2">Personal ID</span>
        <span style="grid-column: auto / span 1">Balance</span>
        <span style="grid-column: auto / span 3">Actions</span>
    </div>';
    
    foreach($database['users'] as $id => $user) {
        $error = (isset($_SESSION['table']['errors'][$id]) && array_key_exists($id, $_SESSION['table']['errors'])) ? $_SESSION['table']['errors'][$id] : '';
        $table .= '<div class="line" style="grid-template-columns: repeat(10, 1fr)">';
        foreach($user as $key => $value) {
            $gridSpan = 1;
            if ('accNr' == $key) $gridSpan = 2;
            if ('personID' == $key) $gridSpan = 2;
            $table .= '<div class="value" style="grid-column: auto / span '.$gridSpan.'">'.$value.'</div>';
        }
        $table .= '<form class="actions" style="grid-column: auto / span 3" method="post">
                <input class="remove hidden" type="submit" name="change" id="remove'.$id.'" value="remove">
                <label for="remove'.$id.'">-</label>
                <input class="amount" type="text" name="amount" value="">
                <input class="add hidden" type="submit" name="change" id="add'.$id.'" value="add">
                <label for="add'.$id.'">+</label>
                <input class="delete hidden" type="submit" name="delete" id="delete'.$id.'" value="delete">
                <label class="delete" for="delete'.$id.'">DELETE</label>
                <input type="hidden" name="id" value="'.$id.'">
                <span>'. $error .'</span>
            </form></div>';
    }
    return $table;
}



?>