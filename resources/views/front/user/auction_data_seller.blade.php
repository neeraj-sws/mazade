
   <table class="eg-table order-table table mb-0" id="categories_filter">
      <thead>
         <tr>
            <th>ID Order</th>
            <th>Title</th>
            <th>Category</th>
            <th>Budget</th>
            <th class="us-ac-th">Time Left</th>
            {{-- <th>Bids</th> --}}
            <th>Current Price</th>
            <th colspan="3">Action</th>
           
         </tr>
      </thead>
      <tbody>
         @php
            $totalItems = count($auction);
         @endphp
         @foreach ($auction as $bit => $auctions)
         @php
      
         $endDateTime = \Carbon\Carbon::parse($auctions->Auction->end_time);
         $now = \Carbon\Carbon::now()->addHours(5)->addMinutes(30);
         $timeDifference = $now->diff($endDateTime);
            $hours = $timeDifference->h;
            $minutes = $timeDifference->i;
            $seconds = $timeDifference->s;
            if($now > $endDateTime) {
               $timeDifferenceString = 'Expired';
            } else {
               $timeDifferenceString = $timeDifference->format('%h hours, %i minutes, %s seconds');
            }

         @endphp
         <tr>
          
         
            <td data-label="Image"><a href="{{ route('bid-details',$auctions->Auction->id) }}" class="text-primary text-decoration-underline">{{ $auctions->Auction->oder_id }}</a></td>
            <td data-label="Title">{{ $auctions->Auction->title }}</td>
            <td data-label="Category">{{ $auctions->CatId->title }}</td>
            <td data-label="Bid Amount(USD)">${{ $auctions->Auction->budget }}</td>
            <td data-label="Highest Bid">{{ $timeDifferenceString }}</td>
            {{-- <td data-label="Highest Bid">{{ $totalItems - $bit }}</td> --}}
            <td data-label="Status" class="text-green">${{ $auctions->latestBid($auctions->Auction->id)}}</td>


            <td data-label="Action"><a href="{{ route('bid-details', $auctions->Auction->id) }}" ><button class="cancel-btn">Detail </button></a></td> 

          @if($auctions->is_cancel== 1 || $auctions->Auction->status == 2)
            <td data-label="Action">Cancelled</td> 
         @else
            @if( $auctions->Auction->status != 3 && $auctions->Auction->status !=2)
                        <td data-label="Action"><a href="javascript:void(0);" class="cancel-btn"  onclick="seller_status_change('{{ route('seller-auction-bit') }}','1', {{ $auctions->id }},'Cancel')"><button class="cancel-btn text-nowrap"><i class="fas fa-times" aria-hidden="true"></i> Cancel Bid</button></a></td> 
            
            @else
             <td data-label="Status" class="text-green"></td> 
             @endif
            @endif
            @if( $auctions->Auction->status == 2 )
            <td data-label="Status" class="text-green"></a></td> 
            @elseif( $auctions->Auction->status == 3 && $auctions->is_cancel != 1 )
            <td data-label="Status" class="text-green">Confirmed</a></td> 
            @else
            @if($auctions->count() > 0 && $auctions->is_cancel != 1)
             <!--<td data-label="Status"><a href="javascript:void(0)" claSS="btn btn-dark text-nowrap" onclick="end_auctions('{{ route('end-auctions') }}', {{ $auctions->Auction->id }})">End Auction</a></td> -->
            @endif
            @endif

         </tr>

         @endforeach
      </tbody>
   </table>

   @section('page-js-script')

<script>
    $(document).ready(function() {
       
    });

    
</script>
    @endsection