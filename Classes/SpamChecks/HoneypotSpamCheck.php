<?php
declare(strict_types=1);
namespace DERHANSEN\SfEventMgt\SpamChecks;

/*
 * This file is part of the Extension "sf_event_mgt" for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 */

/**
 * HoneypotSpamCheck
 */
class HoneypotSpamCheck extends AbstractSpamCheck
{
    /**
     * Check is failed, if expected honeypot field is not present in arguments or if expected field
     * contains a value
     *
     * @return bool
     */
    public function isFailed(): bool
    {
        $honeypotField = 'hp' . $this->arguments['event'];

        return !isset($this->arguments['registration'][$honeypotField]) ||
            $this->arguments['registration'][$honeypotField] !== '';
    }
}
