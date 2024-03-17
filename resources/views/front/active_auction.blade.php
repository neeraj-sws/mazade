@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h4>Active Auction</h4>
        <p>Oders Status</p>
        <div class="d-flex justify-content-around">

           

            <table class="table table-bordered border-primary">
                <thead>
                </thead>
                <tbody>
                  @foreach ($startauction as $start)
                  <tr class="table-active">
                    <th scope="row"> {{ $start->id }}</th>
                    <td>{{ $start->CatId->title }}</td>
                    <td >{{ $start->budget }}</td>
                    <td colspan="2" class="table-active">Cancel</td>
                    <td >End Auction</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
           
        </div>
    </div>
</div>
@endsection
