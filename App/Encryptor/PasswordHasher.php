<?php

namespace App\Encryptor;

class PasswordHasher
{
    private const SALT_LENGTH = 16;
    
    public static function hashPassword($password)
    {
        // Gerar um salt único
        $salt = self::generateSalt();
        
        // Combinar o salt com a senha
        $hashedPassword = password_hash($password . $salt, PASSWORD_BCRYPT);
        
        return [
            'hashedPassword' => $hashedPassword,
            'salt' => $salt
        ];
    }
    
    public static function verifyPassword($password, $hashedPassword, $salt)
    {
        // Verificar a senha
        $hashedUserPassword = password_hash($password . $salt, PASSWORD_BCRYPT);
        
        return password_verify($hashedUserPassword, $hashedPassword);
    }
    
    private static function generateSalt()
    {
        return random_bytes(self::SALT_LENGTH);
    }
}

