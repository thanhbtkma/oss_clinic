<?php

    namespace App\Enums;

    class Gender
    {
        const MALE = 'male';
        const FEMALE = 'female';
        const OTHER = 'other';

        public $value;

        public function __construct(string $value)
        {
            if (!in_array($value, self::getValues())) {
                throw new \InvalidArgumentException("Invalid value for enum: $value");
            }
            $this->value = $value;
        }

        public static function getValues(): array
        {
            return [
                self::MALE,
                self::FEMALE,
                self::OTHER,
            ];
        }

        public function __toString(): string
        {
            return $this->value;
        }

        public function getValue(): string
        {
            return $this->value;
        }
    }
