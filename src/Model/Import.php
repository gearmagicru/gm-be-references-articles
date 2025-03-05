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
            'id' => ['field' => 'id', 'type' => 'int'],
            // название
            'name' => ['field' => 'name'],
            // описание
            'description' => ['field' => 'description'],
            // URL-путь значка
            'icon' => ['field' => 'icon'],
            // доступность
            'enabled' => ['field' => 'enabled', 'type' => 'int'],
            // просмотр записей всех материалов
            'all' => ['field' => 'all', 'type' => 'int'],
            // имена полей
            'fields' => ['field' => 'fields'],
            // столбцы
            'columns' => ['field' => 'columns'],
            // компоненты
            'components' => ['field' => 'components'],
            // элементы дерева
            'elements' => ['field' => 'elements'],
            // элементы вкладки "Атрибуты"
            'tab_attributes' => ['field' => 'tab_attributes'],
            // элементы вкладки "Анонс"
            'tab_announce' => ['field' => 'tab_announce'],
            // элементы вкладки "Текст"
            'tab_text' => ['field' => 'tab_text'],
            // элементы вкладки "SEO"
            'tab_seo' => ['field' => 'tab_seo'],
            // элементы вкладки "Дополнительно"
            'tab_additionally' => ['field' => 'tab_additionally']
        ];
    }

    /**
     * {@inheritdoc}
     */
    protected function afterImportAttributes(array $columns): array
    {
        // текст материала
        if (!empty($columns['text'])) {
            $columns['text'] = trim($columns['text']);
        }
        // текст материала без форматирования
        if (!empty($columns['text'])) {
            $columns['text_plain'] = strip_tags($columns['text']);
        }
        // анонс материала
        if (!empty($columns['announce'])) {
            $columns['announce'] = trim($columns['announce']);
        }
        // анонс материала без форматирования
        if (!empty($columns['announce'])) {
            $columns['announce_plain'] = strip_tags($columns['announce']);
        }
        // дата и время публикации материала
        if (empty($columns['publish_date']))
            $columns['publish_date'] = gmdate('Y-m-d H:i:s'); // UTC
        else
            $columns['publish_date'] = gmdate('Y-m-d', strtotime($columns['publish_date']));
        // хэш ярлыка (слага)
        if (!empty($columns['slug'])) {
            $columns['slug_hash'] = md5($columns['slug']);
        }
        return $columns;
    }
}
