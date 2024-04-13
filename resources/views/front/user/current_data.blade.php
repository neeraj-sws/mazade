
<table class="eg-table order-table table mb-0">
   <thead>
      <tr>
         <th>ID Order</th>
         <th>Title</th>
         <th>Category</th>
         <th>Budget</th>
         <th class="us-ac-th">Time Left</th>
         <th>Bids</th>
         <th>Current Price</th>
         <th>Seller <br> Profile</th>
         <th colspan="3">Action</th>
        
      </tr>
   </thead>
   <tbody>

      @foreach ($auction as $auctions)
      @php
    //echo"<pre>";print_r($auctions);die;
      $endDateTime = \Carbon\Carbon::parse($auctions->end_time);
      $now = \Carbon\Carbon::now();
      $timeDifference = $now->diff($endDateTime);
         $days = $timeDifference->d;
         $hours = $timeDifference->h;
         $minutes = $timeDifference->i;
         $seconds = $timeDifference->s;
         $timeDifferenceString = $timeDifference->format('%d days, %h hours, %i minutes, %s seconds');

      @endphp
      <tr>
       
      
         <td data-label="Image">{{ $auctions->oder_id }}</td>
         <td data-label="Title">{{ $auctions->title }}</td>
         <td data-label="Category">{{ $auctions->CatId->title }}</td>
         <td data-label="Bid Amount(USD)">${{ $auctions->budget }}</td>
         <td data-label="Highest Bid">{{ $timeDifferenceString }}</td>
         <td data-label="Highest Bid">{{ $auctions->auctionItem->count() }}</td>
         <td data-label="Status" class="text-green">${{ $auctions->latestBid($auctions->id)}}</td>
         <td data-label="Status" class="text-green"><a href="javascript:void(0);"><i class="far fa-user"></i></a></td>


         <td data-label="Action"><a href="{{ route('bid-details', $auctions->id) }}" ><button class="cancel-btn">Detail </button></a></td> 

       
         <td data-label="Action"><a href="javascript:void(0);" class="cancel-btn"  onclick="status_change('{{ route('auction-bit') }}','2', {{ $auctions->id }},'Cancel')"><button class="cancel-btn"><i class="fas fa-times" aria-hidden="true"></i> Cancel</button></a></td> 
      
       
         <td data-label="Status"><a href="javascript:void(0)" claSS="btn btn-dark" onclick="end_auctions('{{ route('end-auctions') }}', {{ $auctions->id }})">End Auction</a></td> 
         
        

      </tr>

      @endforeach
   </tbody>
</table>
   @section('page-js-script')
   <script src="{{asset('admin/assets/vendors/toastr/toastr.min.js') }}"></script>
   <script src="{{asset('assets/js/crud.js') }}"></script>
<script>
    $(document).ready(function() {
       
    });



</script>
    @endsection