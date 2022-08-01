<?php

require_once 'Controller.php';

class DocumentsController extends Controller
{

    public static function saveDocument(Connection $connection, $name, $file, $temp_name, $fileType)
    {
        if($fileType == "docx")
        {
            $document = new Document(self::escapeData($name), self::escapeData($file));
            move_uploaded_file($temp_name, $_SERVER["DOCUMENT_ROOT"]."/pruebas-php-2/public/downloads/".$file);
            $document->save($connection);
            return true;
        }
        return false;
    }
}