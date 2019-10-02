<?php
/**
 * Copyright © Pronko Consulting (https://www.pronkoconsulting.com)
 * See LICENSE for the license details.
 */
declare(strict_types=1);

namespace Pronko\SelectiveCache\Service;

use Magento\Backend\Block\Cache;
use Magento\Framework\UrlInterface;

/**
 * Class CacheButton
 */
class CacheButton
{
    /**
     * @var UrlInterface
     */
    private $url;

    /**
     * CacheButton constructor.
     * @param UrlInterface $url
     */
    public function __construct(UrlInterface $url)
    {
        $this->url = $url;
    }

    /**
     * @param Cache $cache
     */
    public function execute(Cache $cache)
    {
        $cache->addButton(
            'refresh_invalidated_cache',
            [
                'label' => __('Refresh Invalidated Cache'),
                'onclick' => 'setLocation(\'' . $this->getFlushInvalidatedOnlyUrl() . '\')',
                'class' => 'primary flush-cache-magento'
            ]
        );
    }

    /**
     * @return string
     */
    private function getFlushInvalidatedOnlyUrl()
    {
        return $this->url->getUrl('pronko_selectivecache/*/flushInvalidated');
    }
}
