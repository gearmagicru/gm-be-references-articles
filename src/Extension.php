<?php
/**
 * Расширение модуля веб-приложения GearMagic.
 * 
 * @link https://gearmagic.ru
 * @copyright Copyright (c) 2015 Веб-студия GearMagic
 * @license https://gearmagic.ru/license/
 */

namespace Gm\Backend\References\Articles;

/**
 * Расширение "Типы материалов".
 * 
 * Ограничение доступа по IP-адресу к Панели управления или сайту.
 * 
 * Расширение принадлежит модулю "Справочники".
 * 
 * @author Anton Tivonenko <anton.tivonenko@gmail.com>
 * @package Gm\Backend\References\Articles
 * @since 1.0
 */
class Extension extends \Gm\Panel\Extension\Extension
{
    /**
     * {@inheritdoc}
     */
    public string $id = 'gm.be.references.articles';

    /**
     * {@inheritdoc}
     */
    public string $defaultController = 'grid';
}