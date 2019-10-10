<?php
/**
 * @author denis303 <mail@denis303.com>
 * @license MIT
 * @link http://denis303.com
 */
namespace denis303\php;

use ZipArchive;

class ZipHelper
{

    public static function extractTo($filename, $target, $throwExceptions = true, &$error = null)
    {
        $zip = new ZipArchive;
        
        $res = $zip->open($filename);
        
        if ($res !== true)
        {
            $error = 'Can\'t open zip: ' . $filename;

            if ($throwExceptions)
            {
                throw new Exception($error);
            }

            return false;
        }

        if (!$zip->extractTo($target))
        {
            $error = 'Can\'t extract zip: ' . $filename;

            if ($throwExceptions)
            {
                throw new Exception($error);
            }

            return false;
        }
        
        if (!$zip->close())
        {
            $error = 'Can\'t close zip: ' . $filename;

            if ($throwExceptions)
            {
                throw new Exception($error);
            }

            return false;
        }

        return true;
    }

}