@php
	$systemInformation = systemInformation();
	$seo = json_decode($systemInformation->seo, true);
@endphp
<title>{{ $systemInformation->name }}</title>
<meta name="description" content="{{ switchLanguage($seo['description'], $seo['bn_description']) }}">
<meta name="keywords" content="{{ switchLanguage($seo['keywords'], $seo['bn_keywords']) }}">