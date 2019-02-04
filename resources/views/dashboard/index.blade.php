@extends('admin_template')
<style>
    .card {padding-bottom:15%!important;margin: 0 1%; background:linear-gradient(#E8D9B5,#fff); border: 2px outset  #E8D9B5;height:200px }
    .card-body {text-align: center }
</style>
@section('content')
    <div width="862" background="{{asset('/img/paper2.jpg')}}" height="600" class="padded" valign="top">
            <p id="tick2" class="pull-right" style="font-size:12px;color:#800000">Today is {{date('F j, Y')}} <span id="clock"></span></p>
    </div>

            <div class="col-md-12" style="margin:1% auto; text-align: center">
                <hr><a href="/">Home</a> &nbsp;|&nbsp;<a href="/customers">Customer Administration</a>  &nbsp;|&nbsp;<a href="/notaries">Notary Administration</a> &nbsp;|&nbsp;<a href="/jobs">Job Administration</a> &nbsp;|&nbsp;<a href="/invoices">Invoice: Customers</a> &nbsp;|&nbsp;<a href="/invoices">Invoice: Notaries</a> &nbsp;|&nbsp;<a href="{{ url('/logout') }}" onclick="event.preventDefault();
                             document.getElementById('logout-form1').submit();">
                    Logout</a>
                <form id="logout-form1" action="{{ url('/logout') }}" method="POST"
                      style="display: none;">{{ csrf_field() }}</form>


            </div>


            <h2>Welcome to the Admin Home Page!</h2>
            <p>
            As you can see, the top of each page in this area includes a row of text hyperlinks that will take you to the various options available to you. You can also use the quick-link buttons below:<br><br>
         </p>

    <div class="row justify-content-center">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">&nbsp;</div>
                <div class="card-body">
                    <h4><a href="{{url('/customers')}}">Customer Administration</a></h4>
                    <p>Add/Edit/Delete Customers</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">&nbsp;</div>
                <div class="card-body">
                    <h4><a href="{{url('/notary-registration')}}">Notary Administration</a></h4>
                    <p>Search/Add/Edit/Delete Notaries</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">&nbsp;</div>
                <div class="card-body">
                    <h4><a href="{{url('/jobs')}}">Active Job Administration</a></h4>
                    <p>Search/Add/Edit/Delete Jobs</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">&nbsp;</div>
                <div class="card-body">
                    <h4><a href="{{url('/invoices')}}">Invoicing Center</a></h4>
                    <p>Search/Add/Edit/Delete Invoices</p>
                </div>
            </div>
        </div>
    </div>
            {{--<map name="AdminMap1">--}}
                {{--<area href="/cgi-bin/admin.cgi?action=customer_admin&amp;auth=admin.664" shape="rect" coords="19, 0, 197, 141">--}}
                {{--<area href="/cgi-bin/admin.cgi?action=notary_admin&amp;auth=admin.664" shape="rect" coords="233, 0, 401, 141">--}}
                {{--<area href="/cgi-bin/admin.cgi?action=job_admin&amp;auth=admin.664" shape="rect" coords="432, 0, 612, 141">--}}
                {{--<area href="/cgi-bin/admin.cgi?action=invoice_admin&amp;auth=admin.664" shape="rect" coords="639, 0, 821, 141">--}}
                {{--<img src="../images/Admin_Home_Page_Buttons.jpg" border="0" usemap="#AdminMap1"><br><br>--}}
                {{--<center><form action="/cgi-bin/admin.cgi" method="post" name="invoiceform"><b>Quick Search for Job: </b><input type="text" name="request_id" size="20" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAYAAABzenr0AAAAAXNSR0IArs4c6QAAAmJJREFUWAntV7uKIkEUvbYGM4KID3wEIgjKRLLpKGLgFwiCfslGhkb7IbLgAzE1GhMxWxRRBEEwmEgDERWfW6fXuttq60a2wU6B1qlzb9U5fatsKROJVigUArvd7oeAyePx6Af3qGYymT7F2h8Wi+V7Pp+fmE7iv4Sw81GieusKIzNh4puCJzdaHIagCW1F4KSeQ4O4pPLoPb/3INBGBZ7avgz8fxWIxWIUCoX43Blegbe3NwoGg88zwMoncFUB8Yokj8dDdrv9MpfHVquV/H4/iVcpc1qgKAp5vV6y2WxaWhefreB0OimXy6kGkD0YDKhSqdB2u+XJqVSK4vE4QWS5XKrx0WjEcZ/PR9lslhwOh8p1Oh2q1Wp0OBw4RwvOKpBOp1kcSdivZPLvmxrjRCKhiiOOSmQyGXp5ecFQbRhLcRDRaJTe39//BHW+2cDr6ysFAoGrlEgkwpwWS1I7z+VykdvtliHuw+Ew40vABvb7Pf6hLuMk/rGY02ImBZC8dqv04lpOYjaw2WzUPZcB2WMPZet2u1cmZ7MZTSYTNWU+n9N4PJbp3GvXYPIE2ADG9Xqder2e+kTr9ZqazSa1222eA6FqtUoQwqHCuFgscgWQWC6XaTgcEiqKQ9poNOiegbNfwWq1olKppB6yW6cWVcDHbDarIuzuBBaLhWrqVvwy/6wCMnhLXMbR4wnvtX/F5VxdAzJoRH+2BUYItlotmk6nLGW4gX6/z+IAT9+CLwPPr8DprnZ2MIwaQBsV+DBKUEfnQ8EtFRdFneBDKWhCW8EVGbdUQfxESR6qKhaHBrSgCe3fbLTpPlS70M0AAAAASUVORK5CYII=&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%;"> <input type="submit" value="Search by Request ID"><input type="hidden" name="auth" value="admin.664"><input type="hidden" name="action" value="search_invoice"></form><br><br><form action="/cgi-bin/admin.cgi" method="post" name="backupfrm"><input type="hidden" name="auth" value="admin.664"><input type="hidden" name="backup" value="true"><input type="hidden" name="file1" value="Y"><input type="hidden" name="file2" value="Y"><input type="hidden" name="file3" value="Y"><input type="hidden" name="file4" value="Y"><input type="hidden" name="file5" value="Y"><input type="hidden" name="file6" value="Y"><input type="hidden" name="file7" value="Y"><input type="hidden" name="file8" value="Y"><input type="hidden" name="file9" value="Y"><input type="hidden" name="file10" value="Y"><input type="hidden" name="file11" value="Y"><input type="hidden" name="file12" value="Y"><input type="hidden" name="file13" value="Y"><input type="hidden" name="file14" value="Y"><input type="hidden" name="action" value="backup"><input type="submit" value="Click here to back up the system!"></form></center><br><br>--}}

                {{--<p></p>--}}

                {{--<script>--}}
                    {{--<!----}}
                    {{--for (var i = 0; i < footer.length; i++) {document.write( footer[i]);}--}}
                    {{--//-->--}}
                {{--</script>--}}
            {{--</map>--}}
        </td>
@endsection
