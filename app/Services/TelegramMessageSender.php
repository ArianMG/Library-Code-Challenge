<?php

namespace App\Services;

use App\Models\User;

class TelegramMessageSender implements IMessageSender
{
    public function sendMessage(User $user): void
    {
        // not implemente yet
    }
}
