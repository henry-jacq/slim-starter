<?php

namespace App\Enum;

enum UserRole: string {
    case USER = 'user';
    case ADMIN = 'admin';

    public static function isUser(string $role): bool {
        return self::tryFrom($role) === self::USER;
    }

    public static function isAdmin(string $role): bool {
        return self::tryFrom($role) === self::ADMIN;
    }

    public static function isAdministrator(string $role): bool {
        return in_array($role, [self::ADMIN->value]);
    }

    public static function isValidRole(string $role): bool {
        return in_array($role, [self::USER->value, self::ADMIN->value]);
    }
}
