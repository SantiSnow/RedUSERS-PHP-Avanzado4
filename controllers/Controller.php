<?php


class Controller
{
    public static function escapeData($input)
    {
        $input = trim($input);
        $input = htmlspecialchars($input);
        return stripslashes($input);
    }
}