<?php

 namespace App\Enums;
 
 use App\Traits\EnumTrait;

enum ArticleEnum: string
{
    use EnumTrait;
    case HISTORY = 'Histoire';
    case CULTURE = 'Culture';
    case NATURE = 'Nature';
    case SPORT = 'Sport';
    case EVENTS = 'Evénements';

    public static function getArticleType(): array
    {
        return [
            self::HISTORY,
            self::CULTURE,
            self::NATURE,
            self::SPORT,
            self::EVENTS,
        ];
    }
}