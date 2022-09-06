<?php

namespace infrastructure;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Storage;

/**
 * File Service
 * php version 8
 *
 * @category Service
 * @package  Zend_Service_DeveloperGarden
 * @author   Spera Labs <contact@cyberelysium.com>
 * @license  cyberelysium.com/ Config
 * @link     cyberelysium.com/
 * */
class FileService
{

    protected $image_path;

    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        $this->image_path = Config::get('images.upload_path');
    }

    /**
     * Get file contents of given file
     *
     * @param mixed $path Path
     *
     * @return string
     */
    public function getContents($path)
    {
        return file_get_contents($path);
    }

    /**
     * Store given file in the given path
     *
     * @param mixed $file File
     * @param mixed $name Name
     * @param mixed $path Path
     * @param mixed $mode Mode
     *
     * @return Void
     */
    public function storeFile($file, $name, $path, $mode)
    {
        $fp = fopen(($path . "/" . $name), $mode);
        fwrite($fp, $file);
        fclose($fp);
    }

    /**
     * Generate new name for uploaded file.
     *
     * @param mixed $file File
     * @param null  $url  Url
     *
     * @return string - The new name for file.
     */
    public function makeName($file = null, $url = null)
    {

        //Returns file name with extension if method contains a file in parameters
        if (!($file == null)) {
            return md5(date('yyyy-mm-dd hh:ss') . $file . rand(0, 999)) . '.' . $file->extension();
        }

        //Returns file name with extension if method contains a url in parameters
        if (!($url == null)) {
            return md5(date('yyyy-mm-dd hh:ss') . $file . rand(0, 999)) . '.' . $this->getExt($url);
        }

        //Returns file name without extension if the $file parameter is null
        return md5(date('yyyy-mm-dd hh:ss') . $file . rand(0, 999));
    }

    /**
     * Download the file from url
     *
     * @param mixed $url         Url
     * @param mixed $name        Name
     * @param mixed $target_path Target path
     *
     * @return string
     */
    public function download($url, $name, $target_path)
    {

        Storage::put($target_path . $name, file_get_contents($url), 'public');

        return $name;
    }


    /**
     * Get File Path
     *
     * @return void
     */
    public function getFilePath()
    {
        return $this->image_path;
    }


    /**
     * Get Ext
     *
     * @param mixed $file File
     *
     * @return void
     */
    public function getExt($file)
    {
        $ext = pathinfo($file, PATHINFO_EXTENSION);

        if (strpos($ext, '?')) {
            return substr($ext, 0, strpos($ext, "?"));
        } else {
            return $ext;
        }
    }


    /**
     * Get Size
     *
     * @param mixed $file File
     *
     * @return void
     */
    public function getSize($file)
    {
        $ch = curl_init($file);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, true);
        curl_setopt($ch, CURLOPT_NOBODY, true);
        $size = curl_getinfo($ch, CURLINFO_CONTENT_LENGTH_DOWNLOAD);

        curl_close($ch);
        return $size;
    }


    /**
     * Get Name
     *
     * @param mixed $file Fle
     *
     * @return void
     */
    public function getName($file)
    {
        return pathinfo($file)['basename'];
    }

    /**
     * Validate given extension with file
     *
     * @param mixed $file File
     * @param mixed $ext  Ext
     *
     * @return bool
     */
    public function validateExt($file, $ext)
    {
        if (is_object($file)) {
            return $file->extension() == $ext;
        } else {
            return $this->getExt($file) == $ext;
        }
    }
}
