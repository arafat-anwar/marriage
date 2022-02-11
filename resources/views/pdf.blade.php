@php
	$systemInformation = systemInformation();
	$invoice = \Modules\Home\Entities\Invoice::find($invoice_id);
	$services = $invoice->services->pluck('service_id')->toArray();
	$groups = \Modules\Services\Entities\ServiceGroup::whereHas('services', function($query) use($services){
		return $query->whereIn('id', $services);
	})->get();

	$total = 0;
	if(isset($invoice->services[0])){
		foreach($invoice->services as $key => $service){
			$total += $service->price*$service->quantity;
		}
	}
@endphp



<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>{{en2bnNumber($invoice->code)}}</title>
		<link href="{{ url('public/lte/mpdf.css') }}" rel="stylesheet">
		<link rel="icon" href="{{ url('public/system-images/icons/'.systemInformation()->icon) }}" type="image/png">
		<style>
			@page {
				footer: page-footer;
			}
			* {
				font-family: bangla, Arial, sans-serif !important;
				font-size: 16px !important;
				color: #000000;
			}
			html, body, p  {
				font-family: bangla, Arial, sans-serif !important;
				font-size: 16px !important;
				color: #000000;
			}
			table {
				width: 100% !important;
				border-spacing: 0px !important;
				margin-top: 10px !important;
				margin-bottom: 25px !important;
				padding-left: 25px !important;
			}
			table, th, tr, td {
				color: #000000;
			}
			table td {
				padding-top: 3px !important;
				padding-bottom: 3px !important;
				padding-left: 7px !important;
				padding-right: 7px !important;
			}
			.table-non-bordered {
				padding-left: 0px !important;
			}
			.table-bordered {
				border-collapse: collapse;
			}
			.table-bordered td {
				border: 1px solid black;
			}
			.table-bordered tr:first-child td {
				border-top: 0;
			}
			.table-bordered tr td:first-child {
				border-left: 0;
			}
			.table-bordered tr:last-child td {
				border-bottom: 0;
			}
			.table-bordered tr td:last-child {
				border-right: 0;
			}
			.image-space {
				white-space: wrap !important;
				padding-top: 45px !important;
			}
			.break-before {
				page-break-before: always;
				break-before: always;
			}
			.break-after {
				break-after: always;
			}
			.break-inside {
				page-break-inside: avoid;
				break-inside: avoid;
			}
			.break-inside-auto {
				page-break-inside: auto;
				break-inside: auto;
			}


			.invoice-box{
				font-family: bangla, Arial, sans-serif !important;
				text-align: center;
				color: #777;
			}

			.invoice-box > h1 {
				font-weight: 300;
				margin-bottom: 0px;
				padding-bottom: 0px;
				color: #000;
			}

			.invoice-box > h3 {
				font-weight: 300;
				margin-top: 10px;
				margin-bottom: 20px;
				font-style: italic;
				color: #555;
			}

			.invoice-box > a {
				color: #06f;
			}

			.invoice-box {
				margin: auto;
				padding: 30px;
				border: 1px solid #eee;
				box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
				font-size: 16px;
				line-height: 24px;
				font-family: bangla, Arial, sans-serif !important;
				color: #555;
			}

			.invoice-box table {
				width: 100%;
				line-height: inherit;
				text-align: left;
				border-collapse: collapse;
			}

			.invoice-box table td {
				padding: 5px;
				vertical-align: top;
			}

			.invoice-box table tr td:nth-child(2) {
				text-align: right;
			}

			.invoice-box table tr.top table td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.top table td.title {
				font-size: 45px;
				line-height: 45px;
				color: #333;
			}

			.invoice-box table tr.information table td {
				padding-bottom: 40px;
			}

			.invoice-box table tr.heading td {
				background: #eee;
				border-bottom: 1px solid #ddd;
				font-weight: bold;
			}

			.invoice-box table tr.details td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.item td {
				border-bottom: 1px solid #eee;
			}

			.invoice-box table tr.item.last td {
				border-bottom: none;
			}

			.invoice-box table tr.total td:nth-child(2) {
				border-top: 2px solid #eee;
				font-weight: bold;
			}

			@media only screen and (max-width: 600px) {
				.invoice-box table tr.top table td {
					width: 100%;
					display: block;
					text-align: center;
				}

				.invoice-box table tr.information table td {
					width: 100%;
					display: block;
					text-align: center;
				}
			}
		</style>	
	</head>
  
	<body style="padding-top: 1.6in !important; font-size:16px; color:#000000">
		<htmlpagefooter name="page-footer">
			<div style="text-align: right;padding-bottom:.75in;"><small>Page {PAGENO} of {nb}</small></div>
		</htmlpagefooter>

		<div class="invoice-box bg-white">
			<table>
				<tr class="top">
					<td colspan="2">
						<table>
							<tr>
								<td class="title">
									<img src="{{ url('public/system-images/logos/'.$systemInformation->logo) }}" alt="Company logo" style="width: 100%; max-width: 300px;background: black; padding: 10px" />
								</td>

								<td>
									{{ switchLanguage('Invoice', 'ইনভয়েস') }} #: {{ switchLanguage($invoice->code, en2bnnumber($invoice->code)) }}<br>
									{{ switchLanguage('Created', 'অর্ডার করা হয়েছে') }}: {{ switchLanguage(date('d/m/Y', strtotime($invoice->created_at)), en2bnnumber(date('d/m/Y', strtotime($invoice->created_at)))) }}<br>
									{{ switchLanguage('Service Date', 'সেবার তারিখ') }}: {{ switchLanguage(date('d/m/Y', strtotime($invoice->order_date)), en2bnnumber(date('d/m/Y', strtotime($invoice->order_date)))) }}<br>
									{{ switchLanguage('Service Time', 'সেবার সময়') }}: {{ switchLanguage(date('g:i a', strtotime($invoice->start_time)), en2bnnumber(date('g:i a', strtotime($invoice->start_time)))) }}
								</td>
							</tr>
						</table>
					</td>
				</tr>

				<tr class="information">
					<td colspan="2">
						<table>
							<tr>
								<td>
									<h4 style="color: black;margin-bottom: 5px"><strong>{{ switchLanguage('Ordered By', 'অর্ডার করেছেন') }}</strong></h4>
									{{ $invoice->user->name }}<br>
									{{ $invoice->user->phone }}<br>
									{{ $invoice->user->profile->address }}
								</td>

								<td>
									<h4 style="color: black;margin-bottom: 5px"><strong>{{ switchLanguage('Service Address', 'সেবার ঠিকানা') }}</strong></h4>
									{{ switchLanguage('Area:', 'এরিয়াঃ') }} {{ $invoice->area ? switchLanguage($invoice->area->name, $invoice->area->bn_name) : '' }}
									<br>
									{{ $invoice->address }}
								</td>
							</tr>
						</table>
					</td>
				</tr>

				<tr class="heading">
					<td>{{ switchLanguage('Service', 'সেবা') }}</td>
					<td>{{ switchLanguage('Price', 'মূল্য') }}</td>
				</tr>

				@if(isset($groups[0]))
				@foreach($groups as $group_key => $group)
				@php
					$groupServices = \Modules\Home\Entities\InvoiceService::where('invoice_id', $invoice->id)
					->whereIn('service_id', $services)
					->whereHas('service', function($query) use($group){
						return $query->where('service_group_id', $group->id);
					})
					->get();
				@endphp
					@if($group_key > 0)
					<tr class="item last">
						<td colspan="2">
							&nbsp;
						</td>
					</tr>
					@endif

					<tr class="item last">
						<td colspan="2">
							<strong>{{ switchLanguage($group->name, $group->bn_name) }}</strong>
						</td>
					</tr>
					
					@foreach($groupServices as $key => $service)
						<tr class="item {{ $groupServices->count() == ($key+1) ? 'last' : '' }}">
							<td>{{ switchLanguage($service->service->name, $service->service->bn_name) }}</td>
							<td>
								{{ switchLanguage($service->quantity, en2bnnumber($service->quantity)) }} * ৳{{ switchLanguage($service->price, en2bnnumber($service->price)) }}
							</td>
						</tr>
					@endforeach
				@endforeach
				@endif

				<tr class="total">
					<td rowspan="3">
						{{ $invoice->note }}
					</td>
					<td>{{ switchLanguage('Total:', 'মোটঃ') }}&nbsp;&nbsp;&nbsp;&nbsp;৳{{ switchLanguage($total, en2bnnumber($total)) }}</td>
				</tr>
				@if(isset($invoice->promoCode->id))
				<tr class="total">
					<td style="text-align: right">
						<strong>
							{{ switchLanguage('Promo Code #'.$invoice->promoCode->code.' Discount ('.$invoice->discount.'%)', 'প্রোমো কোড #'.$invoice->promoCode->code.' ডিস্কাউন্ট ('.en2bnnumber($invoice->discount).'%)') }}&nbsp;&nbsp;&nbsp;&nbsp;৳{{ switchLanguage($total > 0 && $invoice->discount > 0 ? $total*($invoice->discount/100) : 0, en2bnnumber($total > 0 && $invoice->discount > 0 ? $total*($invoice->discount/100) : 0)) }}
						</strong>
					</td>
				</tr>
				<tr class="total">
					<td style="text-align: right">
						<strong>
							{{ switchLanguage('Grand Total:', 'সর্বমোটঃ') }}&nbsp;&nbsp;&nbsp;&nbsp;৳{{ switchLanguage($total-($total > 0 && $invoice->discount > 0 ? $total*($invoice->discount/100) : 0), en2bnnumber($total-($total > 0 && $invoice->discount > 0 ? $total*($invoice->discount/100) : 0))) }}
						</strong>
					</td>
				</tr>
				@endif
			</table>
		</div>
	</body>
</html>