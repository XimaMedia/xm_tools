<?php

//declare ajax action to remove extension caches
$TYPO3_CONF_VARS['BE']['AJAX']['xm_tools::clearCache'] = 'EXT:xm_tools/Classes/Typo3/Cache/ApiCacheManager.php:Xima\XmTools\Classes\Typo3\Cache\ApiCacheManager->clear';

spl_autoload_register(function ($class) {
    $debug = false;

    if ($debug) {
        echo 'Trying to autoload \''.$class.'\'...';
    }

    $classFile = null;

    //only namespaces class names, not extbase
    if (strstr($class, 'Xima\XmTools')) {
        $classFile = str_replace('Xima\XmTools', 'xm_tools', $class);
    } else {
        $classFile = 'xm_tools\vendor\\'.$class;
    }

    if ($classFile) {
        $classFile = str_replace('\\', DIRECTORY_SEPARATOR, $classFile);
        $classPI = pathinfo($classFile);
        $baseDir = PATH_site;

        $file = $baseDir.'typo3conf'
                .DIRECTORY_SEPARATOR.'ext'
                .DIRECTORY_SEPARATOR.$classPI ['dirname']
                .DIRECTORY_SEPARATOR.$classPI ['filename'].'.php';

        if ($debug) {
            echo 'Searching for file \''.$file.'\'...';
        }

        if (is_readable($file)) {
            if ($debug) {
                echo 'Ok!<br/>';
            }

            require_once $file;
        } else {
            if ($debug) {
                echo 'Fail.<br/>';
            }
        }
    } else {
        if ($debug) {
            echo 'Not in this extension.<br/>';
        }
    }
});
