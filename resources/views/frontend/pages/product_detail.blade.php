
@extends('frontend.layouts.master')
@section('title','E-Paninting || HOME PAGE')
@section('main-content')
<style>
.owl-carousel{
    display: flex;
	
}
	</style>
        <!-- subbanner sec start -->
    <section class="subbanner-sec sectionpadding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <nav aria-label="breadcrumb">
                      <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Gallery</li>
                      </ol>
                    </nav>
                    <div class="section-heading">
                        <h3>Painting Title Painting Title </h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- subbanner sec end -->
   
   <!-- product-details sec start -->
   <section class="product-details-sec sectionpadding">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <div class="product-img">
                    <a href="images/product-img.png" class="position-relative" data-fancybox="1">
						<img src="{{asset('images/product-img.png')}}" class="img-fluid"><button class="pd-play-zoom"><i class="fas fa-search-plus"></i></button></a>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="product-details">
                    <div class="deatils-top">
                        <div>
                            <ul class="pagination">
                                <li><a href=""><span><i class="fas fa-angle-left"></i></span> Previous</a></li>
                                <li><a href="">Next<span><i class="fas fa-angle-right"></i></span></a></li>
                            </ul>
                        </div>
                        <div>
                           <div class="social-links">
                               <ul>
                                   <li><button><img src="{{asset('images/heart.png')}}" class="img-fluid"> <span> 89</span></button></li>
                                   <li><button><img src="{{asset('images/chat.png')}}" class="img-fluid"><span> 120</span></button></li>
                               </ul>
                           </div>

                        </div>
                    </div>
                    <div class="product-heading">
                        <h4>Painting Title Painting Title</h4>
                        <p><strong>Medium:</strong> Water colour on paper</p>
                    </div>
                    <div class="form-part">
                        <form>
                            <div class="form-group">
                                <label>Print Medium</label>
                                <select class="form-select">
                                    <option>Canvas</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Canvas Type</label>
                                <select class="form-select">
                                    <option>Glossy</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Print Size</label>
                                <select class="form-select">
                                    <option>25.5 cm X 16.6 cm</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Quantity</label>
                                <select class="form-select">
                                    <option>2</option>
                                </select>
                            </div>
                            <div class="currency-area">
                                    <div>
                                        <div class="country">
                                            <select class="form-select">
                                                <option>Currency</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="cost-area">
                                            <p><strong>Cost</strong> (Including Shipping):</p> <h3>$240</h3>
                                        </div>
                                    </div>
                            </div>
                            <div class="postcode-area">
                                <div>
                                    <div class="country">
                                            <select class="form-select">
                                                <option>Currency</option>
                                            </select>
                                        </div>
                                </div>
                                <div class="postcode-fild">
                                    <input type="text" placeholder="Postal Code" name="">
                                </div>
                                <div class="check-text">
                                    <a href="#">Delivery Availability Check</a>
                                </div>
                            </div>

                            <div class="cart-area">
                                <div class="wistlist-btn">
                                    <a href="#">Add To Wistlist</a>
                                </div>
                                <div class="cart-box"><a href="#"><img src="{{asset('images/cart-img.png')}}" class="img-fluid">Add to Cart</a></div>
                            </div>
                            <div class="pd-lern-more">
                                <p>All profits from print sales will be used to fund art and music scholarships for talented budding artists.<a href="">Click here to learn more.</a> </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
   </section>
   <!-- product-details sec end -->

   <!-- product description sec start -->
   <section class="produt-description padding-bottom">
       <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="pad-tab">
                  <button class="tablinks active" onclick="openCity(event, 'London')">Shipping</button>
                  <button class="tablinks" onclick="openCity(event, 'Paris')">Warrantee</button>
                  <button class="tablinks" onclick="openCity(event, 'Tokyo')">Payment</button>
                  <button class="tablinks" onclick="openCity(event, 'Tokyo1')">Return</button>
                </div>
                <div id="London" class="tabcontent" style="display: block;">
                  <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the  Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the </p>
                </div>

                <div id="Paris" class="tabcontent">
                  <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the  Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the </p> 
                </div>

                <div id="Tokyo" class="tabcontent">
                  <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the  Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the </p>
                </div>
                <div id="Tokyo1" class="tabcontent">
                  <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the  Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the </p>
                </div>
            </div>
        </div>
       </div>
   </section>
   <!-- product description sec end -->

   <!-- printing sec start -->
   <section class="printing-sec">
       <div class="container">
           <div class="row">
            <div class="col-lg-6 text-center fst-pt">
                <div class="print-area">
                    <h3 class="mb-4">Print on Paper</h3>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>
                <a href="#" class="theme-btn1"><span><i class="fas fa-angle-right"></i></span> Read More</a>
                </div>
            </div>
            <div class="col-lg-6 text-center snd-pt">
                <div class="print-area">
                    <h3 class="mb-4">Print on Canvas</h3>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>
                <a href="#" class="theme-btn1"><span><i class="fas fa-angle-right"></i></span> Read More</a>
                </div>
            </div>
           </div>
       </div>
   </section>
   <!-- printing sec end -->


   <!-- related sec start -->
   <section class="pd-related-sec sectionpadding">
       <div class="container">
           <div class="row">
               <div class="col-lg-12">
                <div class="related-product">
                <h3 class="mb-3">Related Product</h3>
                <div class="featured-slider owl-carousel">
                <div class="featured-item">
                    <a href="#">
                        <div class="featured-img"><img src="{{asset('images/image 12.png')}}" class="img-fluid"></div>
                        <div class="featured-content">
                            <h5>Title Title Title Title</h5>
                            <span><strong>Code: HF4328754</strong></span>
                            <p>Size: 36 X 36 in </p>
                            <p>Medium: Water Colour</p>
                        </div>
                    </a>
                      <div class="featured-attribute mt-3">
                        <button class="hearts"><i class="far fa-heart"></i>120</button>
                        <button class="comment"><i class="far fa-comment"></i>89</button>
                      </div>
                </div>
                <div class="featured-item">
                    <a href="#">
                        <div class="featured-img"><img src="{{asset('images/image 12.png')}}" class="img-fluid"></div>
                        <div class="featured-content">
                            <h5>Title Title Title Title</h5>
                            <span><strong>Code: HF4328754</strong></span>
                            <p>Size: 36 X 36 in </p>
                            <p>Medium: Water Colour</p>
                        </div>
                    </a>
                      <div class="featured-attribute mt-3">
                        <button class="hearts"><i class="far fa-heart"></i>120</button>
                        <button class="comment"><i class="far fa-comment"></i>89</button>
                      </div>
                </div>
                <div class="featured-item">
                    <a href="#">
                        <div class="featured-img"><img src="{{asset('images/image 12.png')}}" class="img-fluid"></div>
                        <div class="featured-content">
                            <h5>Title Title Title Title</h5>
                            <span><strong>Code: HF4328754</strong></span>
                            <p>Size: 36 X 36 in </p>
                            <p>Medium: Water Colour</p>
                        </div>
                    </a>
                      <div class="featured-attribute mt-3">
                        <button class="hearts"><i class="far fa-heart"></i>120</button>
                        <button class="comment"><i class="far fa-comment"></i>89</button>
                      </div>
                </div>
                <div class="featured-item">
                    <a href="#">
                        <div class="featured-img"><img src="{{asset('images/image 12.png')}}" class="img-fluid"></div>
                        <div class="featured-content">
                            <h5>Title Title Title Title</h5>
                            <span><strong>Code: HF4328754</strong></span>
                            <p>Size: 36 X 36 in </p>
                            <p>Medium: Water Colour</p>
                        </div>
                    </a>
                      <div class="featured-attribute mt-3">
                        <button class="hearts"><i class="far fa-heart"></i>120</button>
                        <button class="comment"><i class="far fa-comment"></i>89</button>
                      </div>
                </div>
                <div class="featured-item">
                    <a href="#">
                        <div class="featured-img"><img src="{{asset('images/image 12.png')}}" class="img-fluid"></div>
                        <div class="featured-content">
                            <h5>Title Title Title Title</h5>
                            <span><strong>Code: HF4328754</strong></span>
                            <p>Size: 36 X 36 in </p>
                            <p>Medium: Water Colour</p>
                        </div>
                    </a>
                      <div class="featured-attribute mt-3">
                        <button class="hearts"><i class="far fa-heart"></i>120</button>
                        <button class="comment"><i class="far fa-comment"></i>89</button>
                      </div>
                </div>                                                                
               </div>
               </div>
               </div>
           </div>
       </div>
   </section>
   <!-- related sec end -->
   
  <!-- sequere sec start  -->
  <section class="sequere-sec">
      <div class="container">
          <div class="row">
              <div class="col-lg-12">
                  <ul class="sequre-list">
                      <li class="text-center">
                          <div class="sq-icon"><img src="{{asset('images/MoneyWavy.png')}}" class="img-fluid"></div>
                          <div class="sq-content">
                              <h4>SECURE PAYMENT</h4>
                              <p>Above $ 600 value will be free. Artwork is shipped Worldwide using DHL, FedEx, DTDC and Bluedart.</p>
                          </div>
                      </li>
                      <li class="text-center">
                          <div class="sq-icon"><img src="{{asset('images/MoneyWavy.png')}}" class="img-fluid"></div>
                          <div class="sq-content">
                              <h4>SAFE PACKAGING</h4>
                              <p>Above $ 600 value will be free. Artwork is shipped Worldwide using DHL, FedEx, DTDC and Bluedart.</p>
                          </div>
                      </li>
                      <li class="text-center">
                          <div class="sq-icon"><img src="{{asset('images/MoneyWavy.png')}}" class="img-fluid"></div>
                          <div class="sq-content">
                              <h4>FREE SHIPPING</h4>
                              <p>Above $ 600 value will be free. Artwork is shipped Worldwide using DHL, FedEx, DTDC and Bluedart.</p>
                          </div>
                      </li>
                      <li class="text-center">
                          <div class="sq-icon"><img src="{{asset('images/MoneyWavy.png')}}" class="img-fluid"></div>
                          <div class="sq-content">
                              <h4>SECURE PAYMENT</h4>
                              <p>Above $ 600 value will be free. Artwork is shipped Worldwide using DHL, FedEx, DTDC and Bluedart.</p>
                          </div>
                      </li>
                  </ul>
              </div>
          </div>
      </div>
  </section>
  <!-- sequere sec end  -->

@endsection