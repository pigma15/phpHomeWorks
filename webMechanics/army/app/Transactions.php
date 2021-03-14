<?php 
class Transactions {
    private static $TransactionsObj;
    private $data;

    public static function getTransactions() {
        return self::$TransactionsObj ?? self::$TransactionsObj = new self;
    }

    private function __construct() {
        if (!file_exists(DIR.'data/transactions.json')) {
            file_put_contents(DIR.'data/transactions.json', json_encode([]));
        }
        $this->data = json_decode(file_get_contents(DIR.'data/transactions.json'), true);
    }

    public function __destruct() {
        file_put_contents(DIR.'data/transactions.json', json_encode($this->data));
    }

    public function read() {
        return $this->data;
    }

    public function write($from, $to, $amount) {
        $this->data[] = ['from' => $from, 'to' => $to, 'amount' => $amount, 'time' => date("Y-m-d H:i:s", time())];
    }
}


?>