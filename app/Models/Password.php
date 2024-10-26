<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class Password extends Model
    {
        use HasFactory;


        protected $table = 'passwords';

        /**
         * Indicates if the model should be timestamped.
         *
         * @var bool
         */
        public $timestamps = false;

        /**
         * The attributes that are mass assignable.
         *
         * @var array<int, string>
         */
        protected $fillable = ['user_id','salt','password'];


        /**
         * The attributes that should be hidden for serialization.
         *
         * @var array<int, string>
         */
//        protected $hidden = [
//            'password',
//            'salt'
//        ];

    }
