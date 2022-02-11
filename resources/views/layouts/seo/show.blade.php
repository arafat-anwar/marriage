@php
    $seo = json_decode($seo, true);
@endphp
<ul>
    <li>Keywords (English): <strong>{{ isset($seo['keywords']) ? $seo['keywords'] : '' }}</strong></li>
    <li>Keywords (Bangla): <strong>{{ isset($seo['bn_keywords']) ? $seo['bn_keywords'] : '' }}</strong></li>
    <li>Description (English): <strong>{{ isset($seo['description']) ? $seo['description'] : '' }}</strong></li>
    <li>Description (Bangla): <strong>{{ isset($seo['bn_description']) ? $seo['bn_description'] : '' }}</strong></li>
</ul>