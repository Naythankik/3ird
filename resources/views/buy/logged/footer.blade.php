<footer class="foot">
       <div class="lang">
           <a href="#" id="en">English</a>
           <a href="#" id="fr">French</a>
           <a href="#" id="es">Spanish</a>
           <a href="#" id="nl">Dutch</a>
           <a href="#" id="pt">Portuguese</a>
           <a href="#" id="zh" hidden>chinese</a>
           <a href="#" id="ar" hidden>Arabic</a>
           <a href="#" id="da" hidden>Danish</a>
           <a href="#" id="de" hidden>German</a>
           <a href="#" id="el" hidden>Greek</a>
           <a href="#" id="ig" hidden>Ibo</a>
           <a href="#" id="yo" hidden>Yoruba</a>
           <b class="btn btn-light b-0 fw-bold fs-5" onclick="more()" title="Show more languages" id="more">+</b>
       </div>
       <hr class="rule">
       <div class="list">
           <a href="#" class="modal-mail">Email us</a>
           <div class="mail hidden">
               <button class="mail-close hidden">&times;</button>
               <h2 class="mail">Email us...</h2>

           </div>
           <div class="mail-overlay hidden"></div>
           <a href="tel:07011527601" title="Phone">Call us</a>
           <a href="#" class="modal-about">About us</a>
               <div class="about hidden">
                   <button class="about-close hidden">&times;</button>
                   <h2 class="third">About the 3ird Corporation...</h2>
                   <marquee class="fonts" direction="up" height="100%" scrollamount="2">
                       <p>
                           3ird Platforms, Inc., doing business as Kik, Inc.,
                           is a Nigerian multinational technology conglomerate based in Ikeja,
                           Nigeria. The company is the parent organization of 3ird, Shopify, and Task, among other subsidiaries.
                       </p>
                       <p>Founded: March 2022, Ikeja, Lagos, Nigeria.</p>
                       <p>CEO : Nathaniel Abolarin Okiki-ola.</p>
                   </marquee>
               </div>

           <a href="#">Help</a>
           <a href="#">Developer</a>
           <a href="#">Terms</a>
           <a href="#" id="complaint">Complaint</a>
           <div class="complaint" hidden>
               <button class="complaint-close" hidden>&times;</button>
               <pre class="complaint-header">Please input the correct information below for more specification of complaint</pre>
               <div class="complaint-form">
               <form method="post" action="/buy/complaint">
                   @csrf
                       <div class="form-options">
                           <div class="form-input">
                               <input type="text" name="name" placeholder="Name">
                               <input type="text" name="email" placeholder="Email">
                               <input type="text" name="phone" placeholder="Phone">
                               <input type="text" name="address" placeholder="Address">
                           </div>
                           <div class="form-input">
                               <select name="gender">
                                   <option value="" disabled selected hidden>Gender</option>
                                   <option value="male">Male</option>
                                   <option value="female">Female</option>
                                   <option value="rns">Rather not say</option>
                               </select>
                               <select name="country">
                                   <option value="" disabled selected hidden>Country</option>
                                   <option value="nigeria">Nigeria</option>
                               </select>
                               <select name="state">
                                   <option disabled selected>--Select State--</option>
                                   <option value="Abia">Abia</option>
                                   <option value="Adamawa">Adamawa</option>
                                   <option value="Akwa Ibom">Akwa Ibom</option>
                                   <option value="Anambra">Anambra</option>
                                   <option value="Bauchi">Bauchi</option>
                                   <option value="Bayelsa">Bayelsa</option>
                                   <option value="Benue">Benue</option>
                                   <option value="Borno">Borno</option>
                                   <option value="Cross River">Cross River</option>
                                   <option value="Delta">Delta</option>
                                   <option value="Ebonyi">Ebonyi</option>
                                   <option value="Edo">Edo</option>
                                   <option value="Ekiti">Ekiti</option>
                                   <option value="Enugu">Enugu</option>
                                   <option value="FCT">Federal Capital Territory</option>
                                   <option value="Gombe">Gombe</option>
                                   <option value="Imo">Imo</option>
                                   <option value="Jigawa">Jigawa</option>
                                   <option value="Kaduna">Kaduna</option>
                                   <option value="Kano">Kano</option>
                                   <option value="Katsina">Katsina</option>
                                   <option value="Kebbi">Kebbi</option>
                                   <option value="Kogi">Kogi</option>
                                   <option value="Kwara">Kwara</option>
                                   <option value="Lagos">Lagos</option>
                                   <option value="Nasarawa">Nasarawa</option>
                                   <option value="Niger">Niger</option>
                                   <option value="Ogun">Ogun</option>
                                   <option value="Ondo">Ondo</option>
                                   <option value="Osun">Osun</option>
                                   <option value="Oyo">Oyo</option>
                                   <option value="Plateau">Plateau</option>
                                   <option value="Rivers">Rivers</option>
                                   <option value="Sokoto">Sokoto</option>
                                   <option value="Taraba">Taraba</option>
                                   <option value="Yobe">Yobe</option>
                                   <option value="Zamfara">Zamfara</option>
                               </select>
                               <select name="subject">
                                   <option value="" disabled selected hidden>Subject</option>
                                   <option value="refunds">Refunds</option>
                                   <option value="Product Quality">Product Quality</option>
                                   <option value="You Should Offer Alternative Payment Options">You Should Offer Alternative Payment Options</option>
                                   <option value="Your Return Process Is Difficult">Your Return Process Is Difficult</option>
                                   <option value="The Checkout Process Is Too Long or Tedious">The Checkout Process Is Too Long or Tedious</option>
                                   <option value="Prices Are Too High">Prices Are Too High</option>
                                   <option value="You’re Out of a Product or Don’t Carry a Certain Item">You’re Out of a Product or Don’t Carry a Certain Item</option>
                                   <option value="An Item Was Not As Advertsied or Poor Quality">An Item Was Not As Advertsied or Poor Quality</option>
                                   <option value="The Customer Service Is Poor">The Customer Service Is Poor</option>
                                   <option value="Customer Support Is Slow">Customer Support Is Slow</option>
                                   <option value="others" id="others">Others</option>
                               </select>
                           </div>
                       </div>
                       <div class="form-message">
                           <textarea name="message" maxlength="700" placeholder="Message" rows="10"></textarea>
                       </div>
                   <button class="submit-complaint">Send Email <span id="complaint">&rightarrow;</span></button>
               </form>
               </div>

           </div>
       </div>
</footer>