<?php
/**
 * Этот файл является частью расширения модуля веб-приложения GearMagic.
 * 
 * Файл конфигурации установки расширения.
 * 
 * @link https://gearmagic.ru
 * @copyright Copyright (c) 2015 Веб-студия GearMagic
 * @license https://gearmagic.ru/license/
 */

return [
    'id'          => 'gm.be.references.articles',
    'moduleId'    => 'gm.be.references',
    'name'        => 'Types of materials',
    'description' => 'Types of site articles with appropriate presentation of information',
    'namespace'   => 'Gm\Backend\References\Articles',
    'path'        => '/gm/gm.be.references.articles',
    'route'       => 'article-types',
    'locales'     => ['ru_RU', 'en_GB'],
    'permissions' => ['any', 'view', 'read', 'info'],
    'events'      => [],
    'required'    => [
        ['php', 'version' => '8.2'],
        ['app', 'code' => 'GM CMS'],
        ['module', 'id' => 'gm.be.references']
    ]
];
