@extends('layouts.master')
@section('page-css')
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
<link rel="stylesheet" href="/css/search.css">
@endsection
@section('content')
	<div class="container-fluid filterWrap">
		<div class="container">
			<div class="row mb20">
				<ul class="nav nav-pills rounded" id="searchCategoryWrap">
					<li class="nav-item"><a href="#" class="nav-link active">Notice of Default</a></li>
					<li class="nav-item"><a href="#" class="nav-link">Notice of Trustee Sales</a></li>
					<li class="nav-item"><a href="#" class="nav-link">Trustees Deed Upon Sale</a></li>
					<li class="nav-item"><a href="#" class="nav-link">Auction Information</a></li>
					<li class="nav-item"><a href="#" class="nav-link">Status of Past Sales</a></li>
				</ul>
			</div>
			<div class="row">
				{{ Form::open(array('url' => '/batchsearch', 'method' => 'get')) }}
				{{csrf_field()}}
				<div class="row">
					<div class="col-md-6">
						<div class="col-md-12  rounded bgW nested mb10">
							<h5>Recording Date Range</h5>
							{{ Form::radio('recordingdate', 'recording_date', true, array('id' => 'recording_date')) }}
								{{Form::label('recording_date','Recording Date')}}
							{{ Form::radio('recordingdate', 'forecastedsale', '', array('id' => 'forecastedsale')) }}
								{{Form::label('forecastedsale','Forecasted Sale')}}
							{{ Form::radio('recordingdate', 'published', '', array('id' => 'published')) }}
								{{Form::label('published','Published')}}
							<div class="row">
								<div class="col-md-4">
									{{Form::label('datestart', 'From')}}
										{{ Form::text('startdate', '', array('id' => 'datestart', 'placeholder' => 'mm/dd/yy')) }}
								</div>
								<div class="col-md-4">
									{{Form::label('dateend', 'To')}}
										{{ Form::text('enddate', '', array('id' => 'dateend', 'placeholder' => 'mm/dd/yy')) }}
								</div>
							</div>
						</div>
						<div class="col-md-12 rounded bgW nested mb10">
							<h5>My Saved Filters</h5>
						</div>
						<div class="col-md-12 rounded bgW nested">
							<h5>Other Types</h5>
							{{ Form::radio('noticeType', 'showAll', true, array('id' => 'showAll')) }}
								{{Form::label('showAll','Show All')}}
							{{ Form::radio('noticeType', 'delinquency', '', array('id' => 'delinquency')) }}
								{{Form::label('delinquency','Notice of Delinquency')}}
							{{ Form::radio('noticeType', 'defaults', '', array('id' => 'defaults')) }}
								{{Form::label('defaults','Notice of Defaults')}}
							{{ Form::radio('noticeType', 'lisPendens', '', array('id' => 'lisPendens')) }}
								{{Form::label('lisPendens','Lis Pendens')}}
						</div>
					</div>
					<div class="col-md-6">
						<div class="col-md-12  rounded bgW nested mb10">
							<h5>Property Detail</h5>
							<div class="row">
								<div class="col-md-6">
									{{Form::label('location', 'Location')}} <br>
										{{ Form::text('Situs_zip', '', array('id' => 'location', 'placeholder' => 'Enter City, County, or Zip Code')) }}
								</div>
								
							</div>
							<hr>
							<div class="row taCenter">
								<div class="col-md-2 colDivider">
									{{Form::label('beds', 'Beds')}} <br>
									{{ Form::select('bath', ['No Max', 1, 2, 3, 4, 5, 6, 7, 8, 9, 10]) }}
								</div>
								<div class="col-md-2 colDivider">
									{{Form::label('baths', 'Baths')}} <br>
										
										{{ Form::select('bath', ['No Max', 1, 2, 3, 4, 5, 6, 7, 8, 9, 10]) }}
								</div>
								<div class="col-md-4 colDivider">
									{{Form::label('minsqft', 'Square Feet')}}
									<div class="row">
										<div class="col-md-5">
											{{ Form::select('minsqft', ['No Min', 500, 1000, 1500, 2000, 2500, 3000, 3500, 4000, 4500, 5000, 5500, 6000, 6500, 7000, 7500, 8000, 8500, 9000, 9500, 10000]) }}
										</div>
										<div class="col-md-2">
											To:
										</div>
										<div class="col-md-5">
											{{ Form::select('maxsqft', ['No Max', 500, 1000, 1500, 2000, 2500, 3000, 3500, 4000, 4500, 5000, 5500, 6000, 6500, 7000, 7500, 8000, 8500, 9000, 9500, 10000]) }}
										</div>
									</div>
								</div>
								<div class="col-md-4">
									{{Form::label('minlot', 'Lot Size')}}
									<div class="row">
										<div class="col-md-5">
											{{ Form::select('minlot', ['No Min', 500, 1000, 1500, 2000, 2500, 3000, 3500, 4000, 4500, 5000, 5500, 6000, 6500, 7000, 7500, 8000, 8500, 9000, 9500, 10000]) }}
										</div>
										<div class="col-md-2">
											To:
										</div>
										<div class="col-md-5">
											{{ Form::select('maxlot', ['No Max', 500, 1000, 1500, 2000, 2500, 3000, 3500, 4000, 4500, 5000, 5500, 6000, 6500, 7000, 7500, 8000, 8500, 9000, 9500, 10000]) }}
										</div>
									</div>
								</div>
							</div>
							<hr>
							<div class="row taCenter">
								<div class="col-md-2 colDivider">
									{{Form::label('units', 'Units')}} <br>
										{{ Form::selectRange('units', 1, 20) }}   
								</div>
								<div class="col-md-4 colDivider">
									{{Form::label('minmls', 'Days on MLS')}}
									<div class="row">
										<div class="col-md-5">
											{{ Form::select('minmls', [1, 30, 60, 90, 120, 150, 180, 360]) }}
										</div>
										<div class="col-md-2">
											To:
										</div>
										<div class="col-md-5">
											{{ Form::select('maxmls', [1, 30, 60, 90, 120, 150, 180, 360]) }}
										</div>
									</div>
								</div>
								<div class="col-md-4">
									{{Form::label('minprob', 'Days on Probate')}}
									<div class="row">
										<div class="col-md-5">
											{{ Form::select('minprob', [1, 30, 60, 90, 120, 150, 180, 360]) }}
										</div>
										<div class="col-md-2">
											To:
										</div>
										<div class="col-md-5">
											{{ Form::select('maxprob', [1, 30, 60, 90, 120, 150, 180, 360]) }}
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-12 bgW rounded nested">
							{{Form::label('property', 'Property Type')}} <br>
								{{Form::select('property', array(
									'ALL' => 'All Property Types',
									'AGRICULTURAL (NEC)' => 'AGRICULTURAL (NEC)',
									'AGRICULTURAL LAND' => 'AGRICULTURAL LAND',
									'AIRCRAFT FACILITY' => 'AIRCRAFT FACILITY',
									'AIRPORT' => 'AIRPORT',
									'AMUSEMENT ARCADE' => 'AMUSEMENT ARCADE',
									'AMUSEMENT PARK' => 'AMUSEMENT PARK',
									'ANIMAL FARM' => 'ANIMAL FARM',
									'ANIMAL HOSPITAL/VET' => 'ANIMAL HOSPITAL/VET',
									'APARTMENT' => 'APARTMENT',
									'APARTMENT/HOTEL' => 'APARTMENT/HOTEL',
									'ART' => 'ART',
									'AUDITORIUM' => 'AUDITORIUM',
									'AUTO EQUIPMENT' => 'AUTO EQUIPMENT',
									'AUTO REPAIR' => 'AUTO REPAIR',
									'AUTO SALES' => 'AUTO SALES',
									'AUTO WRECKING' => 'AUTO WRECKING',
									'AVOCADO GROVE' => 'AVOCADO GROVE',
									'BAR' => 'BAR',
									'BARREN LAND' => 'BARREN LAND',
									'BILLIARD HALL' => 'BILLIARD HALL',
									'BOWLING ALLEY' => 'BOWLING ALLEY',
									'BUSINESS PARK' => 'BUSINESS PARK',
									'CABIN' => 'CABIN',
									'CARWASH' => 'CARWASH',
									'CEMETERY' => 'CEMETERY',
									'CHEMICAL' => 'CHEMICAL',
									'CITRUS GROVE' => 'CITRUS GROVE',
									'CLUB' => 'CLUB',
									'COMMERCIAL (NEC)' => 'COMMERCIAL (NEC)',
									'COMMERCIAL ACREAGE' => 'COMMERCIAL ACREAGE',
									'COMMERCIAL BUILDING' => 'COMMERCIAL BUILDING',
									'COMMERCIAL CONDOMINIUM' => 'COMMERCIAL CONDOMINIUM',
									'COMMERCIAL LOT' => 'COMMERCIAL LOT',
									'COMMON AREA' => 'COMMON AREA',
									'COMMUNICATION FACILITY' => 'COMMUNICATION FACILITY',
									'COMMUNITY CENTER' => 'COMMUNITY CENTER',
									'CONDOMINIUM' => 'CONDOMINIUM',
									'CONDOMINIUM PROJECT' => 'CONDOMINIUM PROJECT',
									'CONVALESCENT HOSPITAL' => 'CONVALESCENT HOSPITAL',
									'COOPERATIVE' => 'COOPERATIVE',
									'CORRECTIONAL FACILITY' => 'CORRECTIONAL FACILITY',
									'COUNTRY CLUB' => 'COUNTRY CLUB',
									'COUNTY PROPERTY' => 'COUNTY PROPERTY',
									'DAIRY FARM' => 'DAIRY FARM',
									'DANCE HALL' => 'DANCE HALL',
									'DEPARTMENT STORE' => 'DEPARTMENT STORE',
									'DESERT' => 'DESERT',
									'DRIVE IN THEATER' => 'DRIVE IN THEATER',
									'DUPLEX' => 'DUPLEX',
									'DURABLE GOODS' => 'DURABLE GOODS',
									'EASEMENT' => 'EASEMENT',
									'ELECTRICAL FACILITY' => 'ELECTRICAL FACILITY',
									'FACILITIES' => 'FACILITIES',
									'FALLOW LAND' => 'FALLOW LAND',
									'FARMS' => 'FARMS',
									'FAST FOOD FRANCHISE' => 'FAST FOOD FRANCHISE',
									'FEDERAL BUILDING' => 'FEDERAL BUILDING',
									'FEDERAL PROPERTY' => 'FEDERAL PROPERTY',
									'FIELD & SEED' => 'FIELD & SEED',
									'FIN/INSURANCE/REAL ESTAT' => 'FIN/INSURANCE/REAL ESTAT',
									'FINANCIAL BUILDING' => 'FINANCIAL BUILDING',
									'FOOD PROCESSING' => 'FOOD PROCESSING',
									'FOOD STORES' => 'FOOD STORES',
									'FOREST' => 'FOREST',
									'FRAT/SORORITY HOUSE' => 'FRAT/SORORITY HOUSE',
									'FUNERAL HOME' => 'FUNERAL HOME',
									'GARAGE' => 'GARAGE',
									'GAS PRODUCTION' => 'GAS PRODUCTION',
									'GOLF COURSE' => 'GOLF COURSE',
									'GOLF RANGE' => 'GOLF RANGE',
									'GREENBELT' => 'GREENBELT',
									'GREENHOUSE' => 'GREENHOUSE',
									'GYMNASIUM' => 'GYMNASIUM',
									'HEALTH CLUB' => 'HEALTH CLUB',
									'HEAVY INDUSTRIAL' => 'HEAVY INDUSTRIAL',
									'HIGH SCHOOL' => 'HIGH SCHOOL',
									'HOSPITAL' => 'HOSPITAL',
									'HOTEL' => 'HOTEL',
									'INDUSTRIAL (NEC)' => 'INDUSTRIAL (NEC)',
									'INDUSTRIAL ACREAGE' => 'INDUSTRIAL ACREAGE',
									'INDUSTRIAL CONDOMINIUM' => 'INDUSTRIAL CONDOMINIUM',
									'INDUSTRIAL LOT' => 'INDUSTRIAL LOT',
									'INDUSTRIAL PARK' => 'INDUSTRIAL PARK',
									'KENNEL' => 'KENNEL',
									'LAKE/RIVER/BEACH' => 'LAKE/RIVER/BEACH',
									'LAUNDROMAT' => 'LAUNDROMAT',
									'LEASED LAND/BLDG' => 'LEASED LAND/BLDG',
									'LIBRARY/MUSEUM' => 'LIBRARY/MUSEUM',
									'LIGHT INDUSTRIAL' => 'LIGHT INDUSTRIAL',
									'LIVESTOCK' => 'LIVESTOCK',
									'LOFT BUILDING' => 'LOFT BUILDING',
									'LUMBER YARD' => 'LUMBER YARD',
									'MARINA FACILITY' => 'MARINA FACILITY',
									'MEDICAL BUILDING' => 'MEDICAL BUILDING',
									'METAL PRODUCT' => 'METAL PRODUCT',
									'MILITARY BUILDING' => 'MILITARY BUILDING',
									'MINE/QUARRY' => 'MINE/QUARRY',
									'MINERAL PROCESSING' => 'MINERAL PROCESSING',
									'MINERAL RIGHTS' => 'MINERAL RIGHTS',
									'MINI WAREHOUSE' => 'MINI WAREHOUSE',
									'MISC BUILDING' => 'MISC BUILDING',
									'MISC COMMERCIAL SERVICES' => 'MISC COMMERCIAL SERVICES',
									'MOBILE HOME CO OP' => 'MOBILE HOME CO OP',
									'MOBILE HOME LOT' => 'MOBILE HOME LOT',
									'MOBILE HOME PARK' => 'MOBILE HOME PARK',
									'MOBILE HOME PP' => 'MOBILE HOME PP',
									'MOTEL' => 'MOTEL',
									'MOUNTAINOUS LAND' => 'MOUNTAINOUS LAND',
									'MULTI FAMILY ACREAGE' => 'MULTI FAMILY ACREAGE',
									'MULTI FAMILY DWELLING' => 'MULTI FAMILY DWELLING',
									'MULTIPLE USES' => 'MULTIPLE USES',
									'MUNICIPAL PROPERTY' => 'MUNICIPAL PROPERTY',
									'NURSERY SCHOOL' => 'NURSERY SCHOOL',
									'NURSERY/HORTICULTURE' => 'NURSERY/HORTICULTURE',
									'NURSING HOME' => 'NURSING HOME',
									'OFFICE & RESIDENTIAL' => 'OFFICE & RESIDENTIAL',
									'OFFICE BUILDING' => 'OFFICE BUILDING',
									'OPEN SPACE' => 'OPEN SPACE',
									'ORCHARD' => 'ORCHARD',
									'PACKING' => 'PACKING',
									'PAPER & ALLIED INDUSTRY' => 'PAPER & ALLIED INDUSTRY',
									'PARK' => 'PARK',
									'PARKING LOT' => 'PARKING LOT',
									'PARKING STRUCTURE' => 'PARKING STRUCTURE',
									'PASTURE' => 'PASTURE',
									'PETROLEUM' => 'PETROLEUM',
									'POLICE/FIRE/CIVIL DEFENS' => 'POLICE/FIRE/CIVIL DEFENS',
									'POSSESSORY INTEREST' => 'POSSESSORY INTEREST',
									'POULTRY RANCH' => 'POULTRY RANCH',
									'PRIVATE SCHOOL' => 'PRIVATE SCHOOL',
									'PUBLIC (NEC)' => 'PUBLIC (NEC)',
									'PUBLIC SCHOOL' => 'PUBLIC SCHOOL',
									'PUBLIC SERVICE' => 'PUBLIC SERVICE',
									'PUBLIC STORAGE' => 'PUBLIC STORAGE',
									'PUD' => 'PUD',
									'QUADRUPLEX' => 'QUADRUPLEX',
									'R&D FACILITY' => 'R&D FACILITY',
									'RACE TRACK' => 'RACE TRACK',
									'RACQUET COURT' => 'RACQUET COURT',
									'RADIO FACILITY' => 'RADIO FACILITY',
									'RAILROAD FACILITY' => 'RAILROAD FACILITY',
									'RANCH' => 'RANCH',
									'RECREATIONAL (NEC)' => 'RECREATIONAL (NEC)',
									'RECREATIONAL ACREAGE' => 'RECREATIONAL ACREAGE',
									'RELIGIOUS' => 'RELIGIOUS',
									'RESIDENCE HALL/DORMITORI' => 'RESIDENCE HALL/DORMITORI',
									'RESIDENTIAL (NEC)' => 'RESIDENTIAL (NEC)',
									'RESIDENTIAL ACREAGE' => 'RESIDENTIAL ACREAGE',
									'RESIDENTIAL LOT' => 'RESIDENTIAL LOT',
									'RESTAURANT BUILDING' => 'RESTAURANT BUILDING',
									'RESTAURANT DRIVE IN' => 'RESTAURANT DRIVE IN',
									'RETAIL TRADE' => 'RETAIL TRADE',
									'RV PARK' => 'RV PARK',
									'SCHOOL' => 'SCHOOL',
									'SEC EDUCATIONAL SCHOOL' => 'SEC EDUCATIONAL SCHOOL',
									'SERVICE STATION' => 'SERVICE STATION',
									'SERVICE STATION/MARKET' => 'SERVICE STATION/MARKET',
									'SFR' => 'SFR (Single Family Residence)',
									'SHOPPING CENTER' => 'SHOPPING CENTER',
									'SKATING RINK' => 'SKATING RINK',
									'STABLE' => 'STABLE',
									'STADIUM' => 'STADIUM',
									'STATE PROPERTY' => 'STATE PROPERTY',
									'STORAGE' => 'STORAGE',
									'STORAGE TANKS' => 'STORAGE TANKS',
									'STORE BUILDING' => 'STORE BUILDING',
									'STORES & OFFICES' => 'STORES & OFFICES',
									'STORES & RESIDENTIAL' => 'STORES & RESIDENTIAL',
									'SUPERMARKET' => 'SUPERMARKET',
									'SWIMMING POOL' => 'SWIMMING POOL',
									'TAX EXEMPT' => 'TAX EXEMPT',
									'TECHNOLOGICAL INDUSTRY' => 'TECHNOLOGICAL INDUSTRY',
									'THEATER' => 'THEATER',
									'TIME SHARE' => 'TIME SHARE',
									'TOWNHOUSE' => 'TOWNHOUSE',
									'TRANSIENT LODGING' => 'TRANSIENT LODGING',
									'TRANSPORT (NEC)' => 'TRANSPORT (NEC)',
									'TRIPLEX' => 'TRIPLEX',
									'TRUCK CROPS' => 'TRUCK CROPS',
									'TRUCK TERMINAL' => 'TRUCK TERMINAL',
									'TV FACILITY' => 'TV FACILITY',
									'UNIVERSITY' => 'UNIVERSITY',
									'US POSTAL SERVICE' => 'US POSTAL SERVICE',
									'UTILITIES' => 'UTILITIES',
									'VACANT' => 'VACANT LAND',
									'VACANT LAND (NEC)' => 'VACANT LAND (NEC)',
									'VACANT MOBILE HOME' => 'VACANT MOBILE HOME',
									'VINEYARD' => 'VINEYARD',
									'VINEYARD II' => 'VINEYARD II',
									'VOCATIONAL/TRADE SCHOOL' => 'VOCATIONAL/TRADE SCHOOL',
									'WAREHOUSE' => 'WAREHOUSE',
									'WASTE DISPOSAL' => 'WASTE DISPOSAL',
									'WELL/WATER' => 'WELL/WATER',
									'WHOLESALE' => 'WHOLESALE'
								),null,array('multiple' => 'multiple'))}}
						</div>
					</div>
				</div>
				{{ Form::submit('Search', array('class' => 'btn btn-primary')) }}
				{{ Form::close() }}
			</div>
		</div>
	</div>
@endsection
@section('page-js')
	<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
	<script>
		$(document).ready(function(){
			$( "#datestart" ).datepicker();
			$( "#dateend" ).datepicker();
		});
	</script>
@endsection