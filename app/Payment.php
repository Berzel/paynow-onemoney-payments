<?php

namespace App;

class Payment {
    public $id;
    public $status;
    public $method = 'OneMoney';

    public function __construct() {
        $this->id = rand(100, 9999);
        $this->status = 'Created';
    }
}
