<?php
/**
 * Этот файл является частью модуля веб-приложения GearMagic.
 * 
 * @link https://gearmagic.ru
 * @copyright Copyright (c) 2015 Веб-студия GearMagic
 * @license https://gearmagic.ru/license/
 */

namespace Gm\Backend\References\Articles\Model;

/**
 * Импорт данных.
 * 
 * @author Anton Tivonenko <anton.tivonenko@gmail.com>
 * @package Gm\Backend\References\Articles\Model
 * @since 1.0
 */
class Import extends \Gm\Import\Import
{
    /**
     * {@inheritdoc}
     */
    protected string $modelClass = '\Gm\Backend\References\Articles\Model\ArticleType';

    /**
     * {@inheritdoc}
     */
    public function maskedAttributes(): array
    {
        return [
            // идентификатор типа 
            'id' => [
                'field' => 'id', 
                'type' => 'int'
            ],
            // название
            'name' => [
                'field' => 'name', 
                'length' => 255
            ],
            // описание
            'description' => [
                'field' => 'description', 
                'length' => 255
            ],
            // URL-путь значка
            'icon' => [
                'field' => 'icon', 
                'length' => 255
            ],
            // доступность
            'enabled' => [
                'field' => 'enabled', 
                'type'  => 'int'
            ],
            // просмотр записей всех материалов
            'all' => [
                'field' => 'all', 
                'type'  => 'int'
            ],
            // имена полей
            'fields' => [
                'field' => 'fields', 
                'trim' => true
            ],
            // столбцы
            'columns' => [
                'field' => 'columns', 
                'trim' => true
            ],
            // компоненты
            'components' => [
                'field' => 'components', 
                'trim'  => true
            ],
            // элементы дерева
            'elements' => [
                'field' => 'elements', 
                'trim'  => true
            ],
            // элементы вкладки "Атрибуты"
            'tab_attributes' => [
                'field' => 'tab_attributes', 
                'trim'  => true
            ],
            // элементы вкладки "Анонс"
            'tab_announce' => [
                'field' => 'tab_announce', 
                'trim'  => true
            ],
            // элементы вкладки "Текст"
            'tab_text' => [
                'field' => 'tab_text', 
                'trim'  => true
            ],
            // элементы вкладки "SEO"
            'tab_seo' => [
                'field' => 'tab_seo', 
                'trim'  => true
            ],
            // элементы вкладки "Дополнительно"
            'tab_additionally' => [
                'field' => 'tab_additionally', 
                'trim'  => true
            ]
        ];
    }
}
