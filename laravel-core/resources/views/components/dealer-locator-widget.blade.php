@push('styles')
@endpush
<div {{ $attributes->merge(['class' => 'dealer-map']) }}>
      
    <form id="dealer-map--search"  class="dealer-map--search" action="#" onsubmit="formsubmission(event, this)">
        <div class="inputs">
            <div class="form-group">
                <label>Enter Zipcode or Location</label>
                <input id="autocomplete" type="text" name="postal" placeholder="enter zip code here" class="sm-form-control">
            </div>

            <div class="form-group">
                <label>choose search radius</label>
                <select name="selectcity" id="selectcity" onchange="" class="form-control">
                        <option value="5">5 kilometre radius</option>
                        <option value="10">10 kilometre radius</option>
                        <option value="25" selected="selected">25 kilometre radius</option>
                        <option value="50">50 kilometre radius</option>
                        <option value="100">100 kilometre radius</option>
                </select>
            </div>
        </div>
        <div class="buttons">
            <div class="formbutton">
                <input type="submit" id="submitbutt" class="knopf red sharp uppercase hover-black-80 ls-1" value="search" />
            </div>
            <div class="formbutton text">
                <label class=" ortext">or</label>
            </div>
            <div class="formbutton">
                <button  type="button" class="knopf red sharp uppercase hover-black-80 ls-1"  onclick="geolocate();">use my location</button>
            </div>
        </div>
    </form>
    <div id="map" class="dealer-map--map"></div>
    <div id="side_bar" class="dealer-map--location"></div>
</div>
@push('scripts')  
    <script async="false"  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDWsBUoQKrmNZn2udNYblwL6OKN3yyGYMs&libraries=places,geometry&callback=initMap"&libraries=places,geometry&callback=initMap"></script>
    
    
    <script type="text/javascript">
        
        var redpartneruri = "{!! route('pages.red-partner') !!}";
        var stores={!! $stores !!};
            //stores=JSON.parse(stores);
            //console.log(stores);

        $( function($) {
            //alert("ok");
            
        });
    </script>
    <script src="{{asset('js/jquery-gmap.js')}}"></script>

@endpush