<?php
/**
 * Этот файл является частью расширения модуля веб-приложения GearMagic.
 * 
 * @link https://gearmagic.ru
 * @copyright Copyright (c) 2015 Веб-студия GearMagic
 * @license https://gearmagic.ru/license/
 */

namespace Gm\Backend\References\Articles\Model;

use Gm\Panel\Data\Model\GridModel;

/**
 * Модель данных типов материалов.
 * 
 * @author Anton Tivonenko <anton.tivonenko@gmail.com>
 * @package Gm\Backend\References\Articles\Model
 * @since 1.0
 */
class Grid extends GridModel
{
    /**
     * {@inheritdoc}
     */
    public function getDataManagerConfig(): array
    {
        return [
            'tableName' => '{{reference_articles}}',
            'primaryKey' => 'id',
            'useAudit'   => true,
            'order'      => ['name' => 'ASC'],
            'fields'     => [
                ['id'],
                ['name'], // название
                ['description'], // описание
                ['icon'], // значок
                ['enabled'], // доступен
            ],
            'resetIncrements' => ['{{reference_articles}}']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function init(): void
    {
        parent::init();

        $this
            ->on(self::EVENT_AFTER_DELETE, function ($someRecords, $result, $message) {
                // всплывающие сообщение
                $this->response()
                    ->meta
                        ->cmdPopupMsg($message['message'], $message['title'], $message['type']);
                /** @var \Gm\Panel\Controller\GridController $controller */
                $controller = $this->controller();
                // обновить список
                $controller->cmdReloadGrid();
            });
    }

    /**
     * {@inheritdoc}
     */
    public function prepareRow(array &$row): void
    {
        // заголовок контекстного меню записи
        $row['popupMenuTitle'] = $row['name'];
    }
}
