<?php
namespace DERHANSEN\SfEventMgt\Tests\Unit\SpamChecks;

/*
 * This file is part of the Extension "sf_event_mgt" for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 */

use DERHANSEN\SfEventMgt\Domain\Model\Registration;
use DERHANSEN\SfEventMgt\SpamChecks\HoneypotSpamCheck;
use Nimut\TestingFramework\TestCase\UnitTestCase;

/**
 * Test case for class DERHANSEN\SfEventMgt\SpamChecks\HoneypotSpamCheck
 */
class HoneypotSpamCheckTest extends UnitTestCase
{
    /**
     * @test
     */
    public function checkIsFailedWhenHoneypotFieldNotSubmitted()
    {
        /** @var Registration $mockRegistration */
        $mockRegistration = $this->getMockBuilder(Registration::class)->disableOriginalConstructor()->getMock();
        $settings = [];
        $arguments = [
            'event' => 1,
            'registration' => []
        ];
        $configuration = [];

        $check = new HoneypotSpamCheck($mockRegistration, $settings, $arguments, $configuration);
        $this->assertTrue($check->isFailed());
    }

    /**
     * @test
     */
    public function checkIsFailedWhenHoneypotFieldFilled()
    {
        /** @var Registration $mockRegistration */
        $mockRegistration = $this->getMockBuilder(Registration::class)->disableOriginalConstructor()->getMock();
        $settings = [];
        $arguments = [
            'event' => 1,
            'registration' => [
                'hp1' => 'spam'
            ]
        ];
        $configuration = [];

        $check = new HoneypotSpamCheck($mockRegistration, $settings, $arguments, $configuration);
        $this->assertTrue($check->isFailed());
    }

    /**
     * @test
     */
    public function checkIsNotFailedWhenHoneypotFieldEmpty()
    {
        /** @var Registration $mockRegistration */
        $mockRegistration = $this->getMockBuilder(Registration::class)->disableOriginalConstructor()->getMock();
        $settings = [];
        $arguments = [
            'event' => 1,
            'registration' => [
                'hp1' => ''
            ]
        ];
        $configuration = [];

        $check = new HoneypotSpamCheck($mockRegistration, $settings, $arguments, $configuration);
        $this->assertFalse($check->isFailed());
    }
}
