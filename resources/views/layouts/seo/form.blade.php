@php
    $seo = json_decode($seo, true);
@endphp
<div class="form-group row">
	<div class="col-12">
		<h5 class="bg-info text-center p-2"><strong>SEO</strong></h5>
	</div>
	<div class="col-6 mb-3">
		<label for="keywords"><strong>Keywords (English):</strong></label>
		<textarea name="keywords" class="form-control" style="height: 80px;resize: none" id="keywords">{{ isset($seo['keywords']) ? $seo['keywords'] : '' }}</textarea>
	</div>
	<div class="col-6 mb-3">
		<label for="bn_keywords"><strong>Keywords (Bangla):</strong></label>
		<textarea name="bn_keywords" class="form-control" style="height: 80px;resize: none" id="bn_keywords">{{ isset($seo['bn_keywords']) ? $seo['bn_keywords'] : '' }}</textarea>
	</div>
	<div class="col-6 mb-3">
		<label for="description"><strong>Description (English):</strong></label>
		<textarea name="description" class="form-control" style="height: 80px;resize: none" id="description">{{ isset($seo['description']) ? $seo['description'] : '' }}</textarea>
	</div>
	<div class="col-6 mb-3">
		<label for="bn_description"><strong>Description (Bangla):</strong></label>
		<textarea name="bn_description" class="form-control" style="height: 80px;resize: none" id="bn_description">{{ isset($seo['bn_description']) ? $seo['bn_description'] : '' }}</textarea>
	</div>
</div>