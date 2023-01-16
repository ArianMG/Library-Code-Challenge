<?php

namespace App\Models;

use App\Services\TelegramMessageSender;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'author',
        'published_date',
        'available',
    ];

    protected $casts = [
        'published_date'  => 'date',
    ];

    public static function boot()
    {
        parent::boot();

        static::updated(function ($model) {
            if ($model->available != $model->getOriginal('available') && $model->available == 1)
                $model->notifyBookAvailable();
        });
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'books_categories', 'book_id', 'category_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'books_users', 'book_id', 'user_id');
    }

    public function notifyBookAvailable(): void
    {
        $telegramSender = new TelegramMessageSender();

        $this->users()->lazyById(100)->each(function ($user) use ($telegramSender) {
            $telegramSender->sendMessage($user);
        });
    }
}
