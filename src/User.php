<?php
class User {
    public function __construct( 
        public string $username,
         public string $password,
        public ?int $id = null, 
     ) {}
}
