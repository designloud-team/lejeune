   {{--<script type="text/javascript">--}}

        {{--if(typeof jQuery == 'undefined' || typeof jQuery.fn.on == 'undefined') {--}}
            {{--document.write('<script src="http://lejeunenotaries.itestwebpageshere.biz/wp-content/plugins/bb-plugin/js/jquery.js"><\/script>');--}}
            {{--document.write('<script src="http://lejeunenotaries.itestwebpageshere.biz/wp-content/plugins/bb-plugin/js/jquery.migrate.min.js"><\/script>');--}}
        {{--}--}}

    {{--</script>--}}
   {{--<script>document.getElementById("rememberme").checked = true;</script><script type='text/javascript' src='http://lejeunenotaries.itestwebpageshere.biz/wp-content/uploads/bb-plugin/cache/14-layout.js?ver=dbf9727210491b62ef5165d5cc3a7f00'></script>--}}

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

   <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
   <script type='text/javascript' src="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/icheck.min.js"></script>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" integrity="sha256-k66BSDvi6XBdtM2RH6QQvCz2wk81XcWsiZ3kn6uFTmM=" crossorigin="anonymous" />    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" integrity="sha256-ENFZrbVzylNbgnXx0n3I1g//2WeO47XxoPe0vkp3NC8=" crossorigin="anonymous" />
    <script type='text/javascript' src='{{asset('/js/jquery.imagesloaded.js')}}'></script>
    <script type='text/javascript' src="{{asset('/js/jquery.throttle.min.js')}}"></script>
    <script type='text/javascript' src="{{asset('/js/layout-bundle.js')}}"></script>
    {{--<script type='text/javascript' src='http://lejeunenotaries.itestwebpageshere.biz/wp-content/plugins/bb-plugin/js/jquery.magnificpopup.min.js?ver=1.10.6.3'></script>--}}
    {{--<script type='text/javascript' src='http://lejeunenotaries.itestwebpageshere.biz/wp-content/themes/bb-theme/js/bootstrap.min.js?ver=1.6.1'></script>--}}
    <script type='text/javascript' src="{{asset('/js/theme.min.js')}}"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js" integrity="sha256-3blsJd4Hli/7wCQ+bmgXfOdK7p/ZUMtPXY08jmxSSgk=" crossorigin="anonymous"></script>
    {{--<script type='text/javascript' src='http://lejeunenotaries.itestwebpageshere.biz/wp-includes/js/wp-embed.min.js?ver=4.8.8'></script>--}}

   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-steps/1.1.0/jquery.steps.js" integrity="sha256-VyFbbsL+4WS8IrWijL0olTxDKbsCymITRf7zwexscMc=" crossorigin="anonymous"></script>

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


   <script>
       jQuery(document).ready(function ($) {
           $('select').select2({
               width: '100%'
           });

           $('input[type="checkbox"]').iCheck({
               checkboxClass: 'icheckbox_minimal-red'
           });
           $('input[type="radio"]').iCheck({
               radioClass: 'iradio_minimal-red'
           });

           $(function () {
               $('[data-toggle="tooltip"]').tooltip()
           })

           $(function () {
               var location = window.location;
               $('#menu-main-menu li a').each(function () {
                   if($(this).prop('href') == location) {
                       $(this).parent('li').addClass('current-menu-item current_page_item active')
                   } else {
                       $(this).parent('li').removeClass('current-menu-item current_page_item active')

                   }
               })

           });



           // $('button[type="submit"]').click(function () {
               $('form').bind('submit', function () {
                   $(this).find('input[type="checkbox"]').each( function () {
                       var checkbox = $(this);
                       if( checkbox.is(':checked')) {
                           checkbox.attr('value','1');
                       } else {
                           checkbox.after().append(checkbox.clone().attr({type:'hidden', value: '0'}));
                           checkbox.prop('disabled', true);
                       }
                   })
               });
           // })
       })
   </script>
</body>

</html>