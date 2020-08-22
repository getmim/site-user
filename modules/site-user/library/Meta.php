<?php
/**
 * Meta
 * @package site-user
 * @version 0.0.1
 */

namespace SiteUser\Library;


class Meta
{
    static function single(object $user): array{
        $result = [
            'head' => [],
            'foot' => []
        ];

        $home_url = \Mim::$app->router->to('siteHome');

        $page = (object)[
            'title'         => $user->fullname,
            'description'   => $user->fullname,
            'schema'        => 'WebSite',
            'keyword'       => '',
            'page'          => \Mim::$app->router->to('siteUserMe')
        ];

        $result['head'] = [
            'description'       => $page->description,
            'schema.org'        => [],
            'type'              => 'profile',
            'title'             => $page->title,
            'url'               => $page->page,
            'metas'             => []
        ];
        
        return $result;
    }
}