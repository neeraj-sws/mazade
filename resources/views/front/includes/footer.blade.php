</body>
<footer>
    <div class="footer text-center my-5">
    <div class="footer-content">
        <div class="row justify-content-center">
    <p class="mb-0">Copyright © 2024 Mazade. All rights reserved.</p>
        </div>
    </div>
</div>
    </footer>
 

</html>
<script
type="text/javascript"
src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.1.0/mdb.umd.min.js"
></script>
<script src="{{asset('assets/js/crud.js') }}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="{{asset('assets/vendors/toastr/toastr.min.js') }}"></script>
<script>
$(document).ready(function(e){
    $('.dropdown-item').click(function(){
        var target = $(this).data('target');
       
        $('#' + target).show().siblings('div').hide();
    });


});

</script>