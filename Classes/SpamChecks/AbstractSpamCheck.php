<?php
declare(strict_types=1);
namespace DERHANSEN\SfEventMgt\SpamChecks;

/*
 * This file is part of the Extension "sf_event_mgt" for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 */

use DERHANSEN\SfEventMgt\Domain\Model\Registration;

/**
 * AbstractSpamCheck
 */
abstract class AbstractSpamCheck implements SpamCheckInterface
{
    /**
     * @var Registration
     */
    protected $registration = null;

    /**
     * @var array
     */
    protected $settings = [];

    /**
     * @var array
     */
    protected $configuration = [];

    /**
     * @var array
     */
    protected $arguments = [];

    /**
     * AbstractSpamCheck constructor.
     *
     * @param Registration $registration
     * @param array $settings
     * @param array $arguments
     * @param array $configuration
     */
    public function __construct(
        Registration $registration,
        array $settings,
        array $arguments,
        array $configuration = []
    ) {
        $this->registration = $registration;
        $this->settings = $settings;
        $this->configuration = $configuration;
        $this->arguments = $arguments;
    }

    /**
     * @return bool
     */
    public function isFailed(): bool
    {
        return true;
    }
}
