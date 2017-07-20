<!-- resources/views/my_schedule.blade.php -->

@extends('layouts.app')

@section('content')
    <!-- Bootstrap の定形コード... -->
    <div class="panel-body">
        <div id="pit-scheduler"></div>
        <script>
            $(function () {
                $(document).ready(function () {
                    $("#pit-scheduler").pitScheduler(/* options */);
                });
            });
        </script>
    </div>
@endsection