<?php
declare(strict_types=1);
namespace DERHANSEN\SfEventMgt\Utility;

/*
 * This file is part of the Extension "sf_event_mgt" for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 */

use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * Class MiscUtility
 */
class MiscUtility
{
    /**
     * Returns, if the current TYPO3 version it 9.5 LTS
     *
     * @return bool
     */
    public static function isV9Lts(): bool
    {
        return version_compare(TYPO3_branch, '9.5', '=');
    }

    /**
     * Returns, if the current TYPO3 version it 8.7 LTS
     *
     * @return bool
     */
    public static function isV8Lts(): bool
    {
        return version_compare(TYPO3_branch, '8.7', '=');
    }

    /**
     * Returns chars extracted from a hmac for the challenge/response spam check
     *
     * @param int $eventUid
     * @return string
     */
    public static function getSpamCheckChallenge(int $eventUid): string
    {
        $hmac = GeneralUtility::hmac('event-' . $eventUid, 'sf_event_mgt');
        $chars = preg_replace('/[0-9]+/', '', $hmac);

        return preg_replace_callback('/\w.?/', function ($m) {
            return ucfirst($m[0]);
        }, $chars);
    }
}
