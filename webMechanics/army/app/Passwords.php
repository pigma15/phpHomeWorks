<?php 
class Passwords {
    private static $PasswordsObj;
    private $data;

    public static function getPass() {
        return self::$PasswordsObj ?? self::$PasswordsObj = new self;
    }

    private function __construct() {
        if (!file_exists(DIR.'data/passwords.json')) {
            file_put_contents(DIR.'data/passwords.json', json_encode([]));
        }
        $this->data = json_decode(file_get_contents(DIR.'data/passwords.json'), true);
    }

    public function __destruct() {
        file_put_contents(DIR.'data/passwords.json', json_encode($this->data));
    }

    public function read() {
        return $this->data;
    }

    public function write($regNr, $password) {
        $this->data[] = ['regNr' => $regNr, 'password' => $password, 'role' => 'private'];
    }

}

?>