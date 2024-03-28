
   <div class="popup-content popup-content-2">
     <span class="new-close-user" id="closePopup">&times;</span>
     <div class="profile">
        <div class="profile-photo">
          <img src="images/dummy-profile.png" alt="Profile Photo">
        </div>
        <div class="profile-details">
          <h2>Name: John Doe</h2>
          <p>Profession: Software Engineer</p>
          <div class="review">
            <span class="stars">★★★★☆</span>
            <span>4.0</span>
          </div>
        </div>
        <div class="profile-details-2">
          <div class="social-icons">
              <a href="#" class="icon facebook"><i class="fab fa-facebook-f"></i></a>
              <a href="#" class="icon twitter"><i class="fab fa-twitter"></i></a>
              <a href="#" class="icon instagram"><i class="fab fa-instagram"></i></a>
            </div>

            <div class="review-main-back-top">
            <div class="review-main-back">
                <p><b>Code:</b> {{$orders->code}}</p>
             </div>
             </div>





        </div>
      </div>
      <div class="profile-bottom">
         <div class="profile-bottom-boxes">
            <div class="inner-profile-boxx">
               <ul class="contact-info">
            <li><strong>Phone:</strong> +1 234 567 890</li>
            <li><strong>Location:</strong> New York, USA</li>
            <li><strong>Email:</strong> john.doe@example.com</li>
          </ul>
            </div>
            <div class="inner-profile-boxx-2">
               <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d52938394.043503165!2d-161.9222531578104!3d35.91997508297218!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x54eab584e432360b%3A0x1c3bb99243deb742!2sUnited%20States!5e0!3m2!1sen!2sin!4v1710155262056!5m2!1sen!2sin" width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
         </div>
      </div>
   </div>

   <script>
      $("#closePopup").click(function() {
         $("#profilepopup").hide();
     });
     
     
         
     </script>