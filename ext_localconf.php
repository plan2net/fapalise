<?php

defined('TYPO3_MODE') or die ('Access denied.');

(static function () {
    $GLOBALS['TYPO3_CONF_VARS']['SYS']['Objects'][\TYPO3\CMS\Core\LinkHandling\LinkService::class] = array(
        'className' => \Plan2net\Fapalise\LinkHandling\LinkService::class
    );
})();
