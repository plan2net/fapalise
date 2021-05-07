<?php
declare(strict_types=1);

namespace Plan2net\Fapalise\LinkHandling;

/**
 * Class LinkService
 *
 * @package Plan2net\LinkHandling
 * @author Wolfgang Klinger <wk@plan2.net>
 */
class LinkService extends \TYPO3\CMS\Core\LinkHandling\LinkService
{
    /**
     * If the given parameter is numeric it's nothing else than a page,
     * so we just return that information
     *
     * @param string $linkParameter
     * @return array
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

        if (([$pageId, $pageType] = explode(',', $linkParameter, 2))
            && is_numeric($pageId) && is_numeric($pageType)
        ) {
            return [
                'type' => 'page',
                'pageuid' => $pageId,
                'pagetype' => $pageType
            ];
        }

        return parent::resolve($linkParameter);
    }
}
