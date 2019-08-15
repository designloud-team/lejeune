@extends('admin_template')
@section('breadcrumbs')
    {!! Breadcrumbs::render() !!}
@stop
<style>
    .box, .content {
        padding:5%;
    }
</style>
@section('content')
    <div class="container-fluid">
        <div class="row">
            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="pull-left">
                            <label for="select">Search for notaries by State</label>
                            <select class="selectpicker inline" data-live-search id="select">
                                <option value="">Select State</option>
                                    @foreach($states as $key => $state)
                                    <option value="{{$key}}">{{$state}}</option>
                                     @endforeach
                                </select>
                        </div>
                        <br>
                        <div class="col-md-3 hide recent pull-right"></div>

                    </div>
                </div>
                <div class="box box-default col-md-6 col-sm-12">
                    <div class="box-header">
                        <h4 class="box-title">Results</h4>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body pad">
                        <ul id="results"></ul>
                    </div>
                </div>

            </section>
        </div>
    </div>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        let text = document.cookie.replace(/(?:(?:^|.*;\s*)state\s*\=\s*([^;]*).*$)|^.*$/, "$1");
        let old = document.cookie.replace(/(?:(?:^|.*;\s*)state2\s*\=\s*([^;]*).*$)|^.*$/, "$1");
        if(old) {
            $(".recent").html('<span>Recent searches: <a data-href="'+old+'">'+text+'</a></span>')
            $(".recent").addClass('pull-right').removeClass('hide')

        }
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#select').change(function () {
           var state = $('#select').val();
            $('#results').empty()

            function doesExist(el) { if((typeof el !== "undefined") && el !== null && el.length > 0){ return el; } else{ return ''; } }
            function companyExist(ele) { if((typeof ele !== "undefined") && ele !== null && ele.length > 0){ return ele+", "; } else{ return ''; } }

            $.post('/notaries-search', {state: state}).done(function (data) {
                // console.log(data)
                if(data.length) {
                    for(var x = 0; x < data.length; x++) {
                        $('#results').append('<li><a href="/notaries/'+data[x]['id']+'">'+companyExist(data[x]["business_name"])+doesExist(data[x]["first_name"])+" "+doesExist(data[x]["last_name"])+'</a></li>');
                    }
                } else {
                    $('#results').append('No notaries found in '+ $('#select').find('option:selected').text());
                }

                document.cookie = "state="+$('#select').find('option:selected').text();
                document.cookie = "state2="+state;
                // $(".recent").html('<span>Recent searches: <a data-href="'+state+'">'+$('#select').find('option:selected').text()+'</a></span>')
                // $(".recent").removeClass('hide')
            })
        })

        $('.recent a').click(function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();

            function doesExist(el) { if((typeof el !== "undefined") && el !== null && el.length > 0){ return el; } else{ return ''; } }
            function companyExist(ele) { if((typeof ele !== "undefined") && ele !== null && ele.length > 0){ return ele+", "; } else{ return ''; } }

            $.post('/notaries-search', {state: $(this).data('href')}).done(function (data) {
                // console.log(data)
                if(data.length) {
                    for(var x = 0; x < data.length; x++) {
                        $('#results').append('<li><a href="/notaries/'+data[x]['id']+'">'+companyExist(data[x]["business_name"])+doesExist(data[x]["first_name"])+" "+doesExist(data[x]["last_name"])+'</a></li>');
                    }
                } else {
                    $('#results').append('No notaries found in '+ $('#select').find('option:selected').text());
                }
            })
            return false;
        })

    })
</script>
