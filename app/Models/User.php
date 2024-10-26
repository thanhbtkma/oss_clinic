<?php

    namespace App\Models;

    // use Illuminate\Contracts\Auth\MustVerifyEmail;
    use Database\Factories\UserFactory;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Foundation\Auth\User as Authenticatable;
    use Illuminate\Notifications\Notifiable;
    use Tymon\JWTAuth\Contracts\JWTSubject;


    class User extends Authenticatable implements JWTSubject
    {
        /** @use HasFactory<UserFactory> */
        use HasFactory, Notifiable;

        /**
         * The attributes that are mass assignable.
         *
         * @var array<int, string>
         */
        protected $fillable = [
            'avatar',
            'email',
            'full_name',
            'birth_day',
            'gender',
            'address',
            'phone',
            'role'
        ];

        /**
         * The attributes that should be hidden for serialization.
         *
         * @var array<int, string>
         */
        protected $hidden = [];

        /**
         * Get the attributes that should be cast.
         *
         * @return array<string, string>
         */
        protected function casts(): array
        {
            return [
                'birth_day' => 'datetime',
                'gender' => 'enum',
                'role' => 'enum',
                'created_at' => 'datetime',
                'updated_at' => 'datetime',
                'deleted_at' => 'datetime'
            ];
        }

        /**
         * Get the identifier that will be stored in the JWT.
         *
         * @return mixed
         */
        public function getJWTIdentifier(): mixed
        {
            return $this->getKey();
        }

        /**
         * Return a key value array, containing any custom claims to be added to the JWT.
         *
         * @return array
         */
        public function getJWTCustomClaims(): array
        {
            return [];
        }
    }
