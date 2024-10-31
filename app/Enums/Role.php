<?php

    namespace App\Enums;

    class Role
    {
        const ADMIN = 'admin';
        const DOCTOR = 'doctor';
        const RECEPTIONIST = 'receptionist';
        const PATIENT = 'patient';

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
                self::ADMIN,
                self::DOCTOR,
                self::RECEPTIONIST,
                self::PATIENT
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
