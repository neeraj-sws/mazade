@extends('layouts.auction')
@section('page-css-script')
<style>
    .payment-option {
        display: inline-flex;
        align-items: center;
        margin-right: 20px;
    }
    .payment-option img {
    margin-right: 10px;
    width: auto;
    height: 25px;
    cursor: pointer;
    margin-top: 10px;
    margin-left: 10px;
}
    .payment-details {
        display: none;
    }
    .payment-option.selected {
        background-color: #f0f0f0;
    }
</style>
@endsection
@section('content')
<div class="login-section pt-30 pb-120">
         <img alt="imges" src="{{asset('front_assets/images/bg/section-bg.png') }}" class="img-fluid section-bg-top">
         <img alt="imges" src="{{asset('front_assets/images/bg/section-bg.png') }}" class="img-fluid section-bg-bottom">
         <div class="container">
            <div class="row d-flex justify-content-center g-4">
               <div class="col-xl-8 col-lg-10 col-md-12">
                  <div class="form-wrapper wow fadeInUp" data-wow-duration="1.5s" data-wow-delay=".2s">
                     <h1>Withdraw</h1>
                     <div class="row payment-top-info">

         <div class="col-md-6 my-4">
                        <div class="detail-box-main">
                       Current Amount : $900
                        </div>
                      </div>
                      <div class="col-md-6 my-4">
                        <div class="detail-box-main">
                       Last Auctions : 5
                        </div>
                      </div>
    </div>
                        <form id="withdrawForm">
                            <label for="withdrawAmount">Withdraw Amount:</label><br>
                            <input type="text" id="withdrawAmount" name="withdrawAmount" required><br><br>
                            
                            <label>Payment Method:</label><br>
                            <div class="payment-option">
                                <input type="radio" id="paypal" name="paymentMethod" value="paypal">
                                <label for="paypal"><img src="{{asset('front_assets/images/paypal.png') }}" alt="PayPal"></label>
                            </div>
                            
                            <div class="payment-option">
                                <input type="radio" id="bankTransfer" name="paymentMethod" value="bankTransfer">
                                <label for="bankTransfer"><img src="{{asset('front_assets/images/bank.png') }}" alt="Bank Transfer"></label>
                            </div>
                            
                            <div class="payment-option">
                                <input type="radio" id="crypto" name="paymentMethod" value="crypto">
                                <label for="crypto"><img src="{{asset('front_assets/images/bit.png') }}" alt="Cryptocurrency"></label>
                            </div>
                            
                            <div id="paypalDetails" class="payment-details">
                                <label for="paypalEmail">PayPal Email:</label><br>
                                <input type="email" id="paypalEmail" name="paypalEmail"><br><br>
                            </div>
                            
                            <div id="bankTransferDetails" class="payment-details">
                                <label for="bankAccount">Bank Account Number:</label><br>
                                <input type="text" id="bankAccount" name="bankAccount"><br><br>
                                <label for="bankName">Bank Name:</label><br>
                                <input type="text" id="bankName" name="bankName"><br><br>
                                <label for="bankBranch">Bank Branch:</label><br>
                                <input type="text" id="bankBranch" name="bankBranch"><br><br>
                            </div>
                            
                            <div id="cryptoDetails" class="payment-details">
                                <label for="cryptoAddress">Cryptocurrency Address:</label><br>
                                <input type="text" id="cryptoAddress" name="cryptoAddress"><br><br>
                            </div>
                            
                            <button type="submit">Withdraw</button>
                        </form>
                  </div>
               </div>
            </div>
         </div>
      </div>

@endsection


@section('page-js-script')
<script>
    var options = document.querySelectorAll('input[name="paymentMethod"]');
    options.forEach(function(option) {
        option.addEventListener('change', function() {
            var paymentMethod = this.value;
            var detailsDivs = document.querySelectorAll('.payment-details');
            detailsDivs.forEach(function(div) {
                div.style.display = 'none';
                div.parentElement.classList.remove('selected');
            });
            if (document.getElementById(paymentMethod + 'Details')) {
                document.getElementById(paymentMethod + 'Details').style.display = 'block';
                this.parentElement.classList.add('selected');
            }
        });
    });
</script>
@endsection
