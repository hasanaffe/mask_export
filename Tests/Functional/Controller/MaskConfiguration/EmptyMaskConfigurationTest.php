<?php
namespace IchHabRecht\MaskExport\Tests\Functional\Controller\MaskConfiguration;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2017 Nicole Cordes <typo3@cordes.co>, CPS-IT GmbH
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

require_once __DIR__ . '/../AbstractExportControllerTestCase.php';

use IchHabRecht\MaskExport\Tests\Functional\Controller\AbstractExportControllerTestCase;

class EmptyMaskConfigurationTest extends AbstractExportControllerTestCase
{
    protected function setUp()
    {
        if (!defined('ORIGINAL_ROOT')) {
            $this->markTestSkipped('Functional tests must be called through phpunit on CLI');
        }
    }

    /**
     * @test
     */
    public function basicExtensionFilesExistsWithoutMaskConfiguration()
    {
        $this->setUpWithExtensionConfiguration(
            [
                'mask' => [
                    'json' => 'typo3conf/mask.json',
                ],
            ]
        );

        $this->assertArrayHasKey('ext_emconf.php', $this->files);
        $this->assertArrayHasKey('ext_icon.png', $this->files);
        $this->assertArrayHasKey('Configuration/Mask/mask.json', $this->files);
    }
}
