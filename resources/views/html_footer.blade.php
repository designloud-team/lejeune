   {{--<script type="text/javascript">--}}

        {{--if(typeof jQuery == 'undefined' || typeof jQuery.fn.on == 'undefined') {--}}
            {{--document.write('<script src="http://lejeunenotaries.itestwebpageshere.biz/wp-content/plugins/bb-plugin/js/jquery.js"><\/script>');--}}
            {{--document.write('<script src="http://lejeunenotaries.itestwebpageshere.biz/wp-content/plugins/bb-plugin/js/jquery.migrate.min.js"><\/script>');--}}
        {{--}--}}

    {{--</script>--}}
   {{--<script>document.getElementById("rememberme").checked = true;</script><script type='text/javascript' src='http://lejeunenotaries.itestwebpageshere.biz/wp-content/uploads/bb-plugin/cache/14-layout.js?ver=dbf9727210491b62ef5165d5cc3a7f00'></script>--}}
    <script type='text/javascript' src='{{asset('/js/jquery.imagesloaded.js?ver=1.10.6.3')}}'></script>
    <script type='text/javascript' src="{{asset('/js/jquery.throttle.min.js?ver=1.0.1.2')}}"></script>
    <script type='text/javascript' src="{{asset('/js/60e07e6ef926148341542c1473f564ee-layout-bundle.js')}}"></script>
    {{--<script type='text/javascript' src='http://lejeunenotaries.itestwebpageshere.biz/wp-content/plugins/bb-plugin/js/jquery.magnificpopup.min.js?ver=1.10.6.3'></script>--}}
    {{--<script type='text/javascript' src='http://lejeunenotaries.itestwebpageshere.biz/wp-content/themes/bb-theme/js/bootstrap.min.js?ver=1.6.1'></script>--}}
    <script type='text/javascript' src="{{asset('/js/theme.min.js')}}"></script>
    {{--<script type='text/javascript' src='http://lejeunenotaries.itestwebpageshere.biz/wp-includes/js/wp-embed.min.js?ver=4.8.8'></script>--}}
   <script type="text/javascript">
    $(document).ready(function () {
     setInterval('updateClock()', 1000 )


    })
    function updateClock ( )
    {
     var currentTime = new Date ( );

     var currentHours = currentTime.getHours ( );
     var currentMinutes = currentTime.getMinutes ( );
     var currentSeconds = currentTime.getSeconds ( );

     // Pad the minutes and seconds with leading zeros, if required
     currentMinutes = ( currentMinutes < 10 ? "0" : "" ) + currentMinutes;
     currentSeconds = ( currentSeconds < 10 ? "0" : "" ) + currentSeconds;

     // Choose either "AM" or "PM" as appropriate
     var timeOfDay = ( currentHours < 12 ) ? "AM" : "PM";

     // Convert the hours component to 12-hour format if needed
     currentHours = ( currentHours > 12 ) ? currentHours - 12 : currentHours;

     // Convert an hours component of "0" to "12"
     currentHours = ( currentHours == 0 ) ? 12 : currentHours;

     // Compose the string for display
     var currentTimeString = currentHours + ":" + currentMinutes + ":" + currentSeconds + " " + timeOfDay;

     // Update the time display
     $("#clock").html(currentTimeString);
    }
   </script>
</body>

</html>