
@extends('companies.layouts.add')
@section('content')
 
        <div class="container">
            <h4>Order Status</h4>
            <div class="d-flex justify-content-around">
                <table class="table table-bordered border-primary">
                    <thead>
                        <th>Category Name</th>
                        <th>Price</th>
                        <th>Date</th>
                        <th>Request Status</th>
                    </thead>
                    <tbody>
                      @foreach ($oders as $oder)
                      <tr class="table-active">
                        <th scope="row"> {{ $oder->CatId->title }}</th>
                        <td >{{ $oder->price }}</td>
                        <td>{{  date('d F Y', strtotime($oder->created_at)) }}</td>
                          <td>
                              <a href="" class="btn btn-primary">Request Status</a>   
                          </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
                
               
@endsection
