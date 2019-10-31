<?php

function generateUrlQuery($params)
{
    return http_build_query($params,'','&');
}

function generateHref($pageName, $params)
{
    return $pageName.generateUrlQuery($params);
}
