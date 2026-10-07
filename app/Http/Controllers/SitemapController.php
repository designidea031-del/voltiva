<?php

namespace App\Http\Controllers;

use App\Services\SitemapService;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    protected SitemapService $sitemapService;

    public function __construct(SitemapService $sitemapService)
    {
        $this->sitemapService = $sitemapService;
    }

    /**
     * Serve dynamic XML sitemap.
     */
    public function index(): Response
    {
        $xml = $this->sitemapService->getSitemapXml();

        return response($xml, 200, [
            'Content-Type' => 'application/xml; charset=utf-8',
            'X-Robots-Tag' => 'noindex, follow',
            'Cache-Control' => 'public, max-age=3600',
        ]);
    }

    /**
     * Serve XSL stylesheet for browser styling.
     */
    public function xsl(): Response
    {
        $xsl = $this->sitemapService->getXslStylesheet();

        return response($xsl, 200, [
            'Content-Type' => 'text/xsl; charset=utf-8',
            'Cache-Control' => 'public, max-age=86400',
        ]);
    }
}
