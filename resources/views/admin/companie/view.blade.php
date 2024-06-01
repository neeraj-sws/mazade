<div class="card">
    <div class="card-body">
        <div class="modal-header">
            <h4 class="modal-title">Details {{ $single_heading }}</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body py-3">
             <div class="card">
            
            <!-- /.card-header -->
            <div class="card-body">	
           
			<form id="user_table">	
			<div class="table-responsive">
              <table id="datatable" class="table table-bordered table-hover">
                <thead>
                <tr>
                 <th>S.No.</th>
                  <th>Category Name</th>
                  <th>Sub Category</th>
                  <th>Quality</th>
                  <th>Budget</th>
                  

                </tr>
                </thead>
				<tbody>
				
						
					<tr id="photo">
						<td><?php echo 1; ?></td>
						<td><?php echo $info->CatId->title; ?></td>
						<td><?php echo $info->subcatid->title; ?></td>
						<td><?php echo $info->quality; ?></td>
						<td><?php echo $info->budget; ?></td>
					</tr>
                    
					
				</tbody>
              </table>
              </div>
			</form>
            </div>
          </div>
          
       <div class="card">
            
            <!-- /.card-header -->
            <div class="card-body">	
            <h5 class="card-title">Buyer Details</h5>
			<form id="user_table">	
			<div class="table-responsive">
              <table id="datatable" class="table table-bordered table-hover">
                <thead>
                <tr>
                 <th>S.No.</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Mobile No</th>
                  

                </tr>
                </thead>
				<tbody>
				
						
					<tr id="photo">
						<td><?php echo 1; ?></td>
						<td><?php echo $info->user->name . ' '. $info->user->last_name; ?></td>
						<td><?php echo $info->user->email; ?></td>
						<td><?php echo $info->user->mobile_number; ?></td>
					</tr>
                    
					
				</tbody>
              </table>
              </div>
			</form>
            </div>
          </div>

            <div class="card">
            
            <!-- /.card-header -->
            <div class="card-body">	
            <h5 class="card-title">Seller Bid Details</h5>
			<form id="user_table">	
			<div class="table-responsive">
              <table id="datatable" class="table table-bordered table-hover">
                <thead>
                <tr>
                 <th>S.No.</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Mobile No</th>
                  <th>Bid Price</th>
                  <th>Bid Status.</th>

                </tr>
                </thead>
				<tbody>
					<?php
					if(count($auctionItems) > 0){  
						$no =1;
						foreach($auctionItems as $auctionItem){ ?>
					<tr id="photo">
						<td><?php echo $no; ?></td>
						<td><?php echo $auctionItem->companyId->user->name . ' '. $auctionItem->companyId->user->last_name; ?></td>
						<td><?php echo $auctionItem->companyId->user->email; ?></td>
						<td><?php echo $auctionItem->companyId->user->mobile_number; ?></td>
						<td><?php echo $auctionItem->price; ?></td>
						<td><?php echo $auctionItem->status == 1 ? 'Accept' : 'Not Accept'; ?></td>
					</tr>
                    
					<?php
						  $no++;}
					}else{   ?>
						<tr class="text-center">
						<td colspan="5" style="text-align: center !important;">
						<b>NO data found</b>
						<td>
						<tr>
							<?php
					}
					?>
				</tbody>
              </table>
              </div>
			</form>
            </div>
          </div>
        </div>
    </div>
 </div>
 