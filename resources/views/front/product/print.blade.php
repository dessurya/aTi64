<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		table, table tr, table tr td, table tr td p{
			margin: 0;
			padding: 0;
		}
		@page {
			margin: 0px 20px;
		}
		@media print{
			.page-break{
				page-break-after: always;
			}
		}
		h2,h3,h4{
			margin: 0; padding: 5px 0; border-bottom: 1px solid; 
		}
		label{
			font-size: 8pt;
		}
		.clearfix{
			clear: both;
		}
	</style>
</head>
<body onload="window.print(); window.close();">
	<table>
		<thead>
			<tr>
				<th>
					<div style="text-align: center;">
						<p style="margin: 0; padding: 5px 0; border-bottom: 1px solid;">
							<img style="height: 15px;" src="{{ asset('asset/picture-default/i-aaa.png') }}"> PT. ANUGERAH ALAM ABADI
						</p>
						<p style="margin: 0; padding: 5px 0;">+62 21 2991 6754 | +62 21 2991 3234 | info@anugrahalamabadi.com | www.anugrahalamabadi.com</p>
					</div>
				</th>
			</tr>
		</thead>
		<tfoot>
			<tr>
				<td>
					<div style="text-align: center;">
						<p style="margin: 0; padding: 5px 0;">jl. lorem ipsum dolar si amet is a hush kan lorem ipsum dolar si amet is a hush kan</p>
					</div>
				</td>
			</tr>
		</tfoot>
		<tbody>
			<tr>
				<td>
					@foreach($industry as $list)
						<div style="page-break-inside : avoid;">
							<h2 style="margin-left: 0;">
								{{ title_case($list->name) }}
							</h2>
							<div style="margin-left: 0px;">
								{!! $list->content !!}
							</div>
						</div>
						@foreach($list->getCategory('Y') as $listC)
							<div style="page-break-inside : avoid;">
								<h3 style="margin-left: 20px;">
									{{ title_case($listC->name) }}
								</h3>
								<label style="float: right;">{{ title_case($list->name) }}</label>
								<div class="clearfix"></div>
								<div style="margin-left: 20px;">
									{!! $listC->content !!}
								</div>
							</div>
								@foreach($listC->getProduct('Y') as $listP)
								<div style="float: left; width: 45%; padding: 2.5%; page-break-inside : avoid;">
									<h4 style="margin-left: 40px;">
										{{ title_case($listP->name) }}
									</h4>
									<label style="float: right;">{{ title_case($list->name) }}/{{ title_case($listC->name) }}</label>
									<div class="clearfix"></div>
									<div style="margin-left: 40px;">
										{!! $listP->content !!}
									</div>
								</div>
								@endforeach
								<div class="clearfix"></div>
						@endforeach
						<div class="page-break"></div>
					@endforeach
				</td>
			</tr>
		</tbody>
	</table>
					
</body>
</html>