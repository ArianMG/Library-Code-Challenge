<?php

namespace App\Services;

use App\Models\User;

interface IMessageSender
{
    public function sendMessage(User $user): void;
}
