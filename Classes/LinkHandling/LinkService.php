<?php

declare(strict_types=1);

namespace Plan2net\Fapalise\LinkHandling;

use Exception;
use function explode;
use function is_numeric;
use function str_replace;

/**
 * Class LinkService
 *
 * @author Wolfgang Klinger <wk@plan2.net>
 */
class LinkService extends \TYPO3\CMS\Core\LinkHandling\LinkService
{
    /**
     * If the given parameter is numeric it's nothing else than a page,
     * so we just return that information
     */
    public function resolve(string $linkParameter): array
    {
        if (is_numeric($linkParameter)) {
            return [
                'type' => 'page',
                'pageuid' => $linkParameter
            ];
        }

        if (($pageId = str_replace('t3://page?uid=', '', $linkParameter)) && is_numeric($pageId)) {
            return [
                'type' => 'page',
                'pageuid' => $pageId
            ];
        }

        try {
            [$pageId, $pageType] = explode(',', $linkParameter, 2);
            if (is_numeric($pageId) && is_numeric($pageType)) {
                return [
                    'type' => 'page',
                    'pageuid' => $pageId,
                    'pagetype' => $pageType,
                ];
            }
        } catch (Exception $e) {
        }

        return parent::resolve($linkParameter);
    }
}
