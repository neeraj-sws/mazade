@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <p>Last Orders</p>
        <div class="d-flex justify-content-around">
            <table class="table table-bordered border-primary">
                <thead>
                    <th>Category Name</th>
                    <th>Price</th>
                    <th>Date</th>
                    <th>Request Status</th>
                </thead>
                <tbody>
                  @foreach ($auction as $start)
                  <tr class="table-active">
                    <td>{{ $start->CatId->title }}</td>
                    <td>{{ $start->price }}</td>
                    <td>{{  date('d F Y', strtotime($start->created_at)) }}</td>
                    <td >Request Status</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
        </div>
    </div>
</div>
@endsection
