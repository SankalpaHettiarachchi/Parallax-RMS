<?php

namespace App\Enums;

enum Status: string
{
    case NEW = 'new';
    case IN_PROGRESS = 'in_progress';
    case ON_HOLD = 'hold';
    case REJECTED = 'rejected';
    case CANCELLED = 'cancelled';
}





