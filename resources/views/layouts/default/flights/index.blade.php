@extends('layouts.default.app')

@section('content')
<div class="row">
    @include('flash::message')
    <div class="col-sm-9">
        <h2 class="description">flights</h2>
        @include('layouts.default.flights.table')
    </div>
    <div class="col-sm-3">
        <h2 class="description">search</h2>
        <div class="card">
            <div class="card-block" style="min-height: 0px">
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
$(document).ready(function() {
    $("button.save_flight").click(function(e) {
        var btn = $(this);
        var flight_id = btn.attr('x-id');

        var params = {
            method: 'POST',
            data: {'flight_id': flight_id, _token: "{{ csrf_token() }}"},
            //headers: { 'X-CSRF-Token': "{{ csrf_token() }}" }
        };

        if(btn.hasClass('btn-danger')) {
            params.data.action = 'remove';
            params.success = function() {
                console.log('successfully removed flight');
                btn.removeClass('btn-danger');
            }
        } else {
            params.data.action = 'save';
            params.success = function() {
                console.log('successfully saved flight');
                btn.addClass('btn-danger');
            }
        }

        $.ajax("/flights/save", params);
        e.preventDefault();
    });
});
</script>
@endsection

