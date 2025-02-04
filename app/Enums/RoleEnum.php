<?php

 namespace App\Enums;
 
 use App\Traits\EnumTrait;

enum RoleEnum: string
{
    use EnumTrait;
    case ROLE_ADMIN = 'ROLE_ADMIN';
}