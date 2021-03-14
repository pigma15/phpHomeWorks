<?php

class ArmyController {

    public function index() {
        if(!isset($_SESSION['login']['state']) || 'ok' != $_SESSION['login']['state']) {
            require DIR.'views/sign.php';
        } else {
            if (isset($_SESSION['login']['role']) && 'general' == $_SESSION['login']['role']) {
                header('Location: '.URL.'list');      
                exit;
            } else {
                header('Location: '.URL.'private');      
                exit;
            }           
        }
    }

    public function login() {
        unset($_SESSION['create']['error']);
        unset($_SESSION['login']);
        if(isset($_POST['login'])) {
            $match = false;
            if (isset($_POST['regNr']) && isset($_POST['password'])) {
                foreach (Passwords::getPass()->read() as $unit) {
                    if($unit['regNr'] == $_POST['regNr'] && password_verify($_POST['password'], $unit['password'])) {
                        $match = true;
                        break;
                    }
                }
            }
            if ($match) {
                if ('general' == $unit['role']) {
                    $_SESSION['login']['role'] = 'general';
                } elseif ('private' == $unit['role']) {
                    $_SESSION['login']['role'] = 'private';
                }
                $_SESSION['login']['state'] = 'ok';
                $_SESSION['login']['regNr'] = $_POST['regNr'];
                header('Location: '.URL);
                exit;
            }
            $_SESSION['login']['error'] = 'Wrong registration nr or password';
        }
        header('Location: '.URL);      
        exit;
    }

    public function logout() {
        session_destroy();
        header('Location: '.URL);
        exit;
    }

    public function list() {
        if(!isset($_SESSION['login']['state']) || 'ok' != $_SESSION['login']['state']) {
            session_destroy();
            header('Location: '.URL);
            exit;
        }
        $army = Army::getArmy()->read();
        require DIR.'views/list.php';    
    }

    public function private() {
        unset($_SESSION['delete']['errors']);
        unset($_SESSION['add']['errors']);
        if(isset($_SESSION['login']['state']) && 'ok' == $_SESSION['login']['state']) {    
            if (isset($_POST['private'])) {
                $_SESSION['login']['regNr'] = $_POST['private'];
                header('Location: '.URL.'private');
                exit;
            }
            $army = Army::getArmy()->read();
            foreach($army as $soldier) {
                if ($soldier->regNr == $_SESSION['login']['regNr']) {
                    break;
                }
            }
            require DIR.'views/private.php'; 
        } else {
            session_destroy();
            header('Location: '.URL);
            exit;
        }
        
    }

    public function create() {
        if(isset($_POST['create'])) {
            unset($_SESSION['create']['error']);
            unset($_SESSION['login']);
            if (isset($_POST['name']) && preg_match('/^[A-Z][a-zA-z\s\'\-]*[a-z]$/', $_POST['name'])) {
                foreach(Army::getArmy()->read() as $soldier) {
                    if ($_POST['name'] == $soldier->name) {
                        $nameExists = true;
                        break;
                    }
                }
                if ($nameExists) {
                    $errors['name'] = 'name already exists';
                    unset($_SESSION['create']['name']);
                } else {
                    $name = $_SESSION['create']['name'] = $_POST['name'];
                }
            } else {
                $errors['name'] = 'invalid name';
                unset($_SESSION['create']['name']);
            }
            if (isset($_POST['age']) && preg_match('/^\d{1,2}$/', $_POST['age']) && 18 <= $_POST['age']) {
                $age = $_SESSION['create']['age'] = $_POST['age'];
            } else {
                $errors['age'] = 'invalid age';
                unset($_SESSION['create']['age']);
            }
            if (isset($_POST['password']) && '' != $_POST['password'] && !str_contains (' ', $_POST['password'])) {
                if (isset($_POST['rptpassword']) && $_POST['password'] == $_POST['rptpassword']) {
                    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                } else {
                    $errors['rptpassword'] = 'passwords do not match';
                }
            } else {
                $errors['password'] = 'empty spaces not allowed';
            }
            $errorsFound = false;
            if(isset($errors)) {
                foreach($errors as $type => $text) {
                    $_SESSION['create']['error'][$type] = $text;
                    $errorsFound = true;
                }
                if ($errorsFound) {
                    header('Location: '.URL);
                    exit;
                }               
            }
            $soldier = new ArmyMan($name, $age, $password);
            unset($_SESSION['create']);
            $_SESSION['login']['state'] = 'ok';
            $_SESSION['login']['regNr'] = $soldier->regNr;
            $_SESSION['login']['role'] = 'private';
            Army::getArmy()->write($soldier);
            Passwords::getPass()->write($soldier->regNr, $soldier->password);
            header('Location: '.URL.'private');
            exit;         
        }
        header('Location: '.URL);
        exit;
    }

    public function delete($regNr) {
        unset($_SESSION['delete']['errors']);
        unset($_SESSION['add']['errors']);
        if('ok' != $_SESSION['login']['state'] || !isset($_POST['delete'])) {
            header('Location: '.URL);
            exit;
        }
        $army = Army::getArmy()->read();
        $notFound = true;
        foreach($army as $soldier) {
            if($soldier->regNr == $regNr) {
                $notFound = false;
                break;
            }
        }
        if ($notFound) {
            header('Location: '.URL);
            exit;
        }
        if(0 < $soldier->ammo) {
            $_SESSION['delete']['errors'][$soldier->regNr] = 'soldier\'s ammo not empty';
            header('Location: '.URL);
            exit;
        }
        Army::getArmy()->delete($soldier->regNr);
        header('Location: '.URL);
        exit;
    }

    public function add($regNr) {
        $army = Army::getArmy()->read();
        unset($_SESSION['add']['errors']);
        unset($_SESSION['delete']['errors']);
        if (preg_match('/^[\d]+$/', $_POST['amount'])) {
            if ('general' == $_SESSION['login']['role'] && isset($_POST['amount'])) {  
                foreach ($army as $key => $soldier) {
                    if ($soldier->regNr == $regNr) {
                        $army[$key]->ammo += (int) $_POST['amount'];
                        Army::getArmy()->update($army);
                        Transactions::getTransactions()->write('GENERAL', $regNr, (int) $_POST['amount']);
                        header('Location: '.URL);
                        exit;
                    }
                }
            } elseif ('private' == $_SESSION['login']['role'] && isset($_POST['amount'])) {
                foreach ($army as $key => $soldier) {
                    if ($soldier->regNr == $regNr) {
                        $to = $soldier;
                        $toKey = $key;
                    }
                    if ($soldier->regNr == $_SESSION['login']['regNr']) {
                        $from = $soldier;
                        $fromKey = $key;
                    }
                }
                if (!isset($toKey) || !isset($fromKey) || $toKey == $fromKey) {
                    header('Location: '.URL);
                    exit;
                }
                if (isset($_POST['amount']) && $_POST['amount'] <= $from->ammo) {
                    $army[$fromKey]->ammo -= (int) $_POST['amount'];
                    $army[$toKey]->ammo += (int) $_POST['amount'];
                    Army::getArmy()->update($army);
                    Transactions::getTransactions()->write($from->regNr, $to->regNr, (int) $_POST['amount']);
                    header('Location: '.URL);
                    exit;
                }
                $_SESSION['add']['errors'][$regNr] = 'not enough ammo';
                header('Location: '.URL.'list');
                exit;
            }       
        } 
        $_SESSION['add']['errors'][$regNr] = 'invalid value';
        header('Location: '.URL.'list');
        exit;
    }

    public function newRegNr() {
        if (!file_exists(DIR.'data/registrationNR.json')) {
            file_put_contents(DIR.'data/registrationNR.json', json_encode([]));
        }
        $data = json_decode(file_get_contents(DIR.'data/registrationNR.json'), 1);
        do {
            $regNr = 'prvt';
            foreach(range(1,6) as $_) {
                $regNr .= rand(0, 9);
            }
        } while (in_array($regNr, $data));
        $data[] = $regNr;
        file_put_contents(DIR.'data/registrationNR.json', json_encode($data));
        return $_SESSION['create']['regNr'] = $regNr;
    }
}


?>