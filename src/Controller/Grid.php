<?php
/**
 * Этот файл является частью расширения модуля веб-приложения GearMagic.
 * 
 * @link https://gearmagic.ru
 * @copyright Copyright (c) 2015 Веб-студия GearMagic
 * @license https://gearmagic.ru/license/
 */

namespace Gm\Backend\References\Articles\Controller;

use Gm;
use Gm\Mvc\Module\BaseModule;
use Gm\Panel\Widget\TabGrid;
use Gm\Panel\Helper\ExtGrid;
use Gm\Panel\Helper\HtmlGrid;
use Gm\Panel\Controller\GridController;
use Gm\Panel\Helper\HtmlNavigator as HtmlNav;

/**
 *  Контроллер списка типов материала.
 * 
 * @author Anton Tivonenko <anton.tivonenko@gmail.com>
 * @package Gm\Backend\References\Articles\Controller
 * @since 1.0
 */
class Grid extends GridController
{
    /**
     * {@inheritdoc}
     * 
     * @var BaseModule|\Gm\Backend\References\Articles\Extension
     */
    public BaseModule $module;

    /**
     * {@inheritdoc}
     */
    public function createWidget(): TabGrid
    {
        /** @var TabGrid $tab Сетка данных (Gm.view.grid.Grid GmJS) */
        $tab = parent::createWidget();

        // столбцы (Gm.view.grid.Grid.columns GmJS)
        $tab->grid->columns = [
            ExtGrid::columnNumberer(),
            ExtGrid::columnAction(),
            [
                'text'      => ExtGrid::columnInfoIcon($this->t('Name')),
                'dataIndex' => 'name',
                'cellTip'   => HtmlGrid::tags([
                    HtmlGrid::header('{name}'),
                    HtmlGrid::fieldLabel($this->t('Description'), '{description}'),
                    HtmlGrid::fieldLabel($this->t('Enabled'), HtmlGrid::tplChecked('enabled')),
                ]),
                'filter'    => ['type' => 'string'],
                'sortable'  => true,
                'width'     => 250
            ],
            [
                'text'      => '#Description',
                'dataIndex' => 'description',
                'cellTip'   => '{description}',
                'filter'    => ['type' => 'string'],
                'sortable'  => true,
                'width'     => 220
            ],
            [
                'text'        => ExtGrid::columnIcon('g-icon-m_visible', 'svg'),
                'tooltip'     => '#Enabled',
                'xtype'       => 'g-gridcolumn-switch',
                'collectData' => ['name'],
                'dataIndex'   => 'enabled',
                'filter'    => ['type' => 'boolean'],
            ],
        ];

        // панель инструментов (Gm.view.grid.Grid.tbar GmJS)
        $tab->grid->tbar = [
            'padding' => 1,
            'items'   => ExtGrid::buttonGroups([
                'edit' => [
                    'items' => [
                        // инструмент "Добавить"
                        'add' => [
                            'caching' => false
                        ],
                        'delete',
                        'cleanup',
                        '-',
                        'edit',
                        'select',
                        '-',
                        'refresh'
                    ]
                ],
                'columns',
                'search'
            ], [
                'route' =>  Gm::alias('@route')
            ])
        ];

        // контекстное меню записи (Gm.view.grid.Grid.popupMenu GmJS)
        $tab->grid->popupMenu = [
            'cls'        => 'g-gridcolumn-popupmenu',
            'titleAlign' => 'center',
            'width'      => 150,
            'items'      => [
                [
                    'text'        => '#Edit record',
                    'iconCls'     => 'g-icon-svg g-icon-m_edit g-icon-m_color_default',
                    'handlerArgs' => [
                        'route'   => Gm::alias('@route', '/form/view/{id}'),
                        'pattern' => 'grid.popupMenu.activeRecord'
                    ],
                    'handler' => 'loadWidget'
                ]
            ]
        ];

        // 2-й клик по строке сетки
        $tab->grid->rowDblClickConfig = [
            'allow' => true,
            'route' => $this->module->route('/form/view/{id}')
        ];
        // количество строк в сетке
        $tab->grid->store->pageSize = 50;
        // поле аудита записи
        $tab->grid->logField = 'name';
        // плагины сетки
        $tab->grid->plugins = 'gridfilters';
        // класс CSS применяемый к элементу body сетки
        $tab->grid->bodyCls = 'g-grid_background';

        // панель навигации (Gm.view.navigator.Info GmJS)
        $tab->navigator->info['tpl'] = HtmlNav::tags([
            HtmlNav::header('{name}'),
            HtmlNav::fieldLabel($this->t('Description'), '{description}'),
            HtmlNav::fieldLabel(
                ExtGrid::columnIcon('g-icon-m_visible', 'svg') . ' ' . $this->t('Enabled'), 
                HtmlNav::tplChecked('enabled')
            ),
            HtmlNav::widgetButton(
                $this->t('Edit record'),
                ['route' => $this->module->route('/form/view/{id}'), 'long' => true],
                ['title' => $this->t('Edit record')]
            )
        ]);

        $tab
            ->addCss('/grid.css')
            ->addRequire('Gm.view.grid.column.Switch');
        return $tab;
    }
}
