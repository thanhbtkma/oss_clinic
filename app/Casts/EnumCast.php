<?php

    namespace App\Casts;

    use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
    use InvalidArgumentException;

    class EnumCast implements CastsAttributes
    {
        protected $enumClass;

        public function __construct(string $enumClass)
        {
            $this->enumClass = $enumClass;
        }

        public function get($model, string $key, $value, array $attributes)
        {
            if ($value === null) {
                return null;
            }

            return new $this->enumClass($value);
        }

        public function set($model, string $key, $value, array $attributes)
        {
            if (!$value instanceof $this->enumClass) {
                throw new InvalidArgumentException('The given value is not an instance of ' . $this->enumClass);
            }

            return $value->value;
        }
    }
