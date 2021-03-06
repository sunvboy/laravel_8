<?php



/** This file is part of KCFinder project

 *

 *      @desc Base configuration file

 *   @package KCFinder

 *   @version 3.12

 *    @author Pavel Tzonkov <sunhater@sunhater.com>

 * @copyright 2010-2014 KCFinder Project

 *   @license http://opensource.org/licenses/GPL-3.0 GPLv3

 *   @license http://opensource.org/licenses/LGPL-3.0 LGPLv3

 *      @link http://kcfinder.sunhater.com

 */



/* IMPORTANT!!! Do not comment or remove uncommented settings in this file

   even if you are using session configuration.

   See http://kcfinder.sunhater.com/install for setting descriptions */




$auth = isset($_COOKIE['authImagesManager']) ? $_COOKIE['authImagesManager'] : NULL;


$flag = true;

$folder = '';

if (isset($auth) && !empty($auth)) {

    $auth = json_decode($auth, TRUE);

    if (isset($auth['email']) && !empty($auth['email'])) {

        $flag = false;
    }

    if (isset($auth['folder_upload']) && !empty($auth['folder_upload'])) {

        $folder = $auth['folder_upload'];
    }


    if (isset($auth['permission']) && is_array($auth['permission']) && count($auth['permission'])) {

        $upload = ((in_array('upload', $auth['permission'])) ? true : false);

        $delete = ((in_array('delete', $auth['permission'])) ? true : false);

        $copy = ((in_array('copy', $auth['permission'])) ? true : false);

        $move = ((in_array('move', $auth['permission'])) ? true : false);

        $rename = ((in_array('rename', $auth['permission'])) ? true : false);





        $dir_delete = ((in_array('delete_dirs', $auth['permission'])) ? true : false);

        $dir_create = ((in_array('create_dirs', $auth['permission'])) ? true : false);

        $dir_rename = ((in_array('rename_dirs', $auth['permission'])) ? true : false);

        $see_all  =  ((in_array('all', $auth['permission'])) ? true : false);
    } else {

        $upload = false;

        $delete = false;

        $copy = false;

        $move = false;

        $rename = false;

        $dir_delete = false;

        $dir_create = false;

        $dir_rename = false;
    }










    if ($see_all == TRUE) {

        $url_upload = "../../../upload";
    } else {

        $url_upload = '/upload/images/' . $folder . '/';
    }
}





$array_config = array(





    // GENERAL SETTINGS



    'disabled' => false,

    'uploadURL' => "../../../upload",

    'uploadDir' => "",

    'theme' => "default",



    'types' => array(



        // (F)CKEditor types

        'files'   =>  "",

        'flash'   =>  "swf mp4",

        'images'  =>  "",



        // TinyMCE types

        'file'    =>  "",

        'media'   =>  "swf flv avi mpg mpeg qt mov wmv asf rm mp4",

        'image'   =>  "",

    ),





    // IMAGE SETTINGS



    'imageDriversPriority' => "imagick gmagick gd",

    'jpegQuality' => 100,

    'thumbsDir' => ".thumbs",



    'maxImageWidth' => 3000,

    'maxImageHeight' => 3000,



    'thumbWidth' => 283,

    'thumbHeight' => 210,



    'watermark' => "",





    // DISABLE / ENABLE SETTINGS



    'denyZipDownload' => false,

    'denyUpdateCheck' => false,

    'denyExtensionRename' => false,





    // PERMISSION SETTINGS



    'dirPerms' => 0755,

    'filePerms' => 0644,



    'access' => array(



        'files' => array(

            'upload' => $upload,

            'delete' => $delete,

            'copy'   => $copy,

            'move'   => $move,

            'rename' => $rename,

        ),



        'dirs' => array(

            'create' => $dir_create,

            'delete' => $dir_delete,

            'rename' => $dir_rename,

        )

    ),



    'deniedExts' => "exe com msi bat cgi pl php phps phtml php3 php4 php5 php6 py pyc pyo pcgi pcgi3 pcgi4 pcgi5 pchi6",





    // MISC SETTINGS



    'filenameChangeChars' => array(/*

        ' ' => "_",

        ':' => "."

    */),



    'dirnameChangeChars' => array(/*

        ' ' => "_",

        ':' => "."

    */),



    'mime_magic' => "",



    'cookieDomain' => "",

    'cookiePath' => "",

    'cookiePrefix' => 'KCFINDER_',





    // THE FOLLOWING SETTINGS CANNOT BE OVERRIDED WITH SESSION SETTINGS



    '_sessionVar' => "KCFINDER",

    '_check4htaccess' => false,

    '_normalizeFilenames' => false,

    '_dropUploadMaxFilesize' => 20485760,

    //'_tinyMCEPath' => "/tiny_mce",

    //'_cssMinCmd' => "java -jar /path/to/yuicompressor.jar --type css {file}",

    //'_jsMinCmd' => "java -jar /path/to/yuicompressor.jar --type js {file}",

);
return $array_config;
