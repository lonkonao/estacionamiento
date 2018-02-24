@extends('layouts.app')

@section('content')
    <table class="table table-bordered" id="users-table">
        <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>


         </tr>
        </thead>
    </table>
@stop

@push('scripts')



@endpush