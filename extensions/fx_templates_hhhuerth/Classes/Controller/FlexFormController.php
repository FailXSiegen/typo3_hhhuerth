<?php

namespace Failx\FxTemplatesHhhuerth\Controller;

use TYPO3\CMS\Extbase\Utility\DebuggerUtility;

/*
 *
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *
 */

/**
 * Class FlexFormController
 * @package Failx\FxTemplatesHhhuerth\Controller
 */
class FlexFormController
{

    /**
     * @param array $config
     *
     * @return array
     */
    public function getTwoColumnOptions($config)
    {
        // default for 2 columns
        $defaultOption = ['50% (col-md-6)', 'col-md-6'];
        return FlexFormController::getColumnOptions($config, $defaultOption);
    }

    /**
     * @param array $config
     *
     * @return array
     */
    public function getThreeColumnOptions($config)
    {
        // default for 3 columns
        $defaultOption = ['33% (col-md-4)', 'col-md-4'];
        return FlexFormController::getColumnOptions($config, $defaultOption);
    }

    /**
     * @param array $config
     *
     * @return array
     */
    public function getFourColumnOptions($config)
    {
        // default for 4 columns
        $defaultOption = ['25% (col-md-3)', 'col-md-3'];
        return FlexFormController::getColumnOptions($config, $defaultOption);
    }

    /**
     * @param array $config
     *
     * @return array
     */
    public function getFiveColumnOptions($config)
    {
        // default for 4 columns
        $defaultOption = ['20% (col-md-2)', 'col-md-2'];
        return FlexFormController::getColumnOptions($config, $defaultOption);
    }

    /**
     * @param array $config
     * @param array $defaultOption
     *
     * @return array
     */
    public static function getColumnOptions($config, $defaultOption)
    {
        // mdCol, smCol, xsCol or lgCol
        $fieldName = $config['field'];
        $columnType = substr($fieldName, 0, -1);

        $optionList = [];
        switch ($columnType) {
            // medium device with
            case 'mdCol':
                // new grids: flexform not yet saved => add default setting as first option
                if (isset($config['flexParentDatabaseRow']['pi_flexform']['data']) && count($config['flexParentDatabaseRow']['pi_flexform']['data']) == 0) {
                    $optionListStart = [
                        $defaultOption,
                        ['LLL:EXT:fx_templates_hhhuerth/Resources/Private/Language/locallang_db.xlf:grid.label.notset', ' ']
                    ];
                } else {
                    $optionListStart = [
                        ['LLL:EXT:fx_templates_hhhuerth/Resources/Private/Language/locallang_db.xlf:grid.label.notset', ' '],
                        $defaultOption
                    ];
                }

                switch ($defaultOption[1]) {
                    case 'col-md-6':
                        $optionListStart = array_merge($optionListStart, [
                            ['25% (col-md-3)', 'col-md-3'],
                            ['33% (col-md-4)', 'col-md-4']
                        ]);
                        break;
                    case 'col-md-4':
                        $optionListStart = array_merge($optionListStart, [
                            ['25% (col-md-3)', 'col-md-3'],
                            ['50% (col-md-6)', 'col-md-6']
                        ]);
                        break;
                    case 'col-md-3':
                        $optionListStart = array_merge($optionListStart, [
                            ['33% (col-md-4)', 'col-md-4'],
                            ['50% (col-md-6)', 'col-md-6']
                        ]);
                        break;
                }

                $optionList = array_merge($optionListStart, [
                    ['66% (col-md-8)', 'col-md-8'],
                    ['75% (col-md-9)', 'col-md-9'],
                    [
                        'LLL:EXT:fx_templates_hhhuerth/Resources/Private/Language/locallang_db.xlf:grid.label.moreWidth',
                        '--div--'
                    ],
                    ['8.3% (col-md-1)', 'col-md-1'],
                    ['16.7%  (col-md-2)', 'col-md-2'],
                    ['41.7% (col-md-5)', 'col-md-5'],
                    ['58.3% (col-md-7)', 'col-md-7'],
                    ['83.3% (col-md-10)', 'col-md-10'],
                    ['91.7% (col-md-11)', 'col-md-11'],
                    ['100% (col-md-12)', 'col-md-12'],
                    [
                        'LLL:EXT:fx_templates_hhhuerth/Resources/Private/Language/locallang_db.xlf:grid.label.moreOptions',
                        '--div--'
                    ],
                    [
                        'LLL:EXT:fx_templates_hhhuerth/Resources/Private/Language/locallang_db.xlf:grid.label.hidden',
                        'd-md-none'
                    ],
                    [
                        'LLL:EXT:fx_templates_hhhuerth/Resources/Private/Language/locallang_db.xlf:grid.label.visible',
                        'd-md-block'
                    ]
                ]);
                break;

            // small device with
            case 'smCol':
                $optionList = [
                    ['LLL:EXT:fx_templates_hhhuerth/Resources/Private/Language/locallang_db.xlf:grid.label.notset', ' '],
                    ['25% (col-sm-3)', 'col-sm-3'],
                    ['33% (col-sm-4)', 'col-sm-4'],
                    ['50% (col-sm-6)', 'col-sm-6'],
                    ['66% (col-sm-8)', 'col-sm-8'],
                    ['75% (col-sm-9)', 'col-sm-9'],
                    [
                        'LLL:EXT:fx_templates_hhhuerth/Resources/Private/Language/locallang_db.xlf:grid.label.moreWidth',
                        '--div--'
                    ],
                    ['8.3% (col-sm-1)', 'col-sm-1'],
                    ['16.7%  (col-sm-2)', 'col-sm-2'],
                    ['41.7% (col-sm-5)', 'col-sm-5'],
                    ['58.3% (col-sm-7)', 'col-sm-7'],
                    ['83.3% (col-sm-10)', 'col-sm-10'],
                    ['91.7% (col-sm-11)', 'col-sm-11'],
                    ['100% (col-sm-12)', 'col-sm-12'],
                    [
                        'LLL:EXT:fx_templates_hhhuerth/Resources/Private/Language/locallang_db.xlf:grid.label.moreOptions',
                        '--div--'
                    ],
                    [
                        'LLL:EXT:fx_templates_hhhuerth/Resources/Private/Language/locallang_db.xlf:grid.label.hidden',
                        'd-sm-none'
                    ],
                    [
                        'LLL:EXT:fx_templates_hhhuerth/Resources/Private/Language/locallang_db.xlf:grid.label.visible',
                        'd-sm-block'
                    ]
                ];
                break;


            // extra small
            case 'xsCol':
                $optionList = [
                    ['LLL:EXT:fx_templates_hhhuerth/Resources/Private/Language/locallang_db.xlf:grid.label.notset', ' '],
                    ['25% (col-3)', 'col-3'],
                    ['33% (col-4)', 'col-4'],
                    ['50% (col-6)', 'col-6'],
                    ['66% (col-8)', 'col-8'],
                    ['75% (col-9)', 'col-9'],
                    [
                        'LLL:EXT:fx_templates_hhhuerth/Resources/Private/Language/locallang_db.xlf:grid.label.moreWidth',
                        '--div--'
                    ],
                    ['8.3% (col-1)', 'col-1'],
                    ['16.7%  (col-2)', 'col-2'],
                    ['41.7% (col-5)', 'col-5'],
                    ['58.3% (col-7)', 'col-7'],
                    ['83.3% (col-10)', 'col-10'],
                    ['91.7% (col-11)', 'col-11'],
                    ['100% (col-12)', 'col-12'],
                    [
                        'LLL:EXT:fx_templates_hhhuerth/Resources/Private/Language/locallang_db.xlf:grid.label.moreOptions',
                        '--div--'
                    ],
                    ['LLL:EXT:fx_templates_hhhuerth/Resources/Private/Language/locallang_db.xlf:grid.label.hidden', 'd-none'],
                    ['LLL:EXT:fx_templates_hhhuerth/Resources/Private/Language/locallang_db.xlf:grid.label.visible', 'd-block']
                ];
                break;

            // extra large
            case 'lgCol':
                $optionList = [
                    ['LLL:EXT:fx_templates_hhhuerth/Resources/Private/Language/locallang_db.xlf:grid.label.notset', ' '],
                    ['25% (col-lg-3)', 'col-lg-3'],
                    ['33% (col-lg-4)', 'col-lg-4'],
                    ['50% (col-lg-6)', 'col-lg-6'],
                    ['66% (col-lg-8)', 'col-lg-8'],
                    ['75% (col-lg-9)', 'col-lg-9'],
                    [
                        'LLL:EXT:fx_templates_hhhuerth/Resources/Private/Language/locallang_db.xlf:grid.label.moreWidth',
                        '--div--'
                    ],
                    ['8.3% (col-lg-1)', 'col-lg-1'],
                    ['16.7%  (col-lg-2)', 'col-lg-2'],
                    ['41.7% (col-lg-5)', 'col-lg-5'],
                    ['58.3% (col-lg-7)', 'col-lg-7'],
                    ['83.3% (col-lg-10)', 'col-lg-10'],
                    ['91.7% (col-lg-11)', 'col-lg-11'],
                    ['100% (col-lg-12)', 'col-lg-12'],
                    [
                        'LLL:EXT:fx_templates_hhhuerth/Resources/Private/Language/locallang_db.xlf:grid.label.moreOptions',
                        '--div--'
                    ],
                    [
                        'LLL:EXT:fx_templates_hhhuerth/Resources/Private/Language/locallang_db.xlf:grid.label.hidden',
                        'd-lg-none'
                    ],
                    [
                        'LLL:EXT:fx_templates_hhhuerth/Resources/Private/Language/locallang_db.xlf:grid.label.visible',
                        'd-lg-block'
                    ]
                ];
                break;
        }
        $config['items'] = array_merge($config['items'], $optionList);
        return $config;
    }
}
