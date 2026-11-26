<?php
class Order {
    public function __construct(
        public string $company,
        public string $comment,
        public ?int $id = null,
    ) {}
}