<?php

namespace App\Enums;


enum DocumentStorageType: string
{
    case LOCAL = "local";
    case WEB = "web";
    case S3 = "s3";
    case GOOGLE = "google";
    case PROXY = "proxy";
    case OTHERS = "others";

    public static function getValues(): array
    {
        return array_map(fn($case) => $case->value, self::cases());
    }
}
