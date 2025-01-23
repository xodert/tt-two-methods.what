<?php

namespace App\Enums;

use App\Traits\EnumTrait;

enum GenderEnum: string
{
    use EnumTrait;

    case MALE = 'male';
    case FEMALE = 'female';
}
