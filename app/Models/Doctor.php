<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\Relations\BelongsTo;
    use Illuminate\Database\Eloquent\Relations\HasMany;

    class Doctor extends Model
    {
        //
        /**
         * The attributes that are mass assignable.
         *
         * @var array<int, string>
         */
        protected $fillable = [
            'user_id',
            'status',
            'specialization',
            'experience',
            'note'
        ];

        public function user(): BelongsTo
        {
            return $this->belongsTo(User::class);
        }

        public function qualifications(): HasMany
        {
            return $this->hasMany(Qualification::class);
        }

        public function name(): string
        {
            return $this->user->full_name;
        }

        public function email(): string
        {
            return $this->user->email;
        }

        public function phone(): string
        {
            return $this->user->phone;
        }
    }
