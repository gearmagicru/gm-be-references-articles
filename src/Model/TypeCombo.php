<?php
/**
 * Этот файл является частью модуля веб-приложения GearMagic.
 * 
 * @link https://gearmagic.ru
 * @copyright Copyright (c) 2015 Веб-студия GearMagic
 * @license https://gearmagic.ru/license/
 */

namespace Gm\Backend\References\Articles\Model;

use Gm\Panel\Data\Model\Combo\ComboModel;

/**
 * Модель данных выпадающего типов материалов.
 * 
 * @author Anton Tivonenko <anton.tivonenko@gmail.com>
 * @package Gm\Backend\References\Articles\Model
 * @since 1.0
 */
class TypeCombo extends ComboModel
{
    /**
     * {@inheritdoc}
     */
    public function getDataManagerConfig(): array
    {
        return [
            'tableName'  => '{{reference_articles}}',
            'primaryKey' => 'id',
            'searchBy'   => 'name',
            'order'      => ['name' => 'ASC'],
            'fields'     => [
                ['id'],
                ['name']
            ]
        ];
    }
}