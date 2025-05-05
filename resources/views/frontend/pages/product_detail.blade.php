
@extends('frontend.layouts.master')
@section('title','E-Paninting || HOME PAGE')
@section('main-content')
<style>
.owl-carousel{
    display: flex;
	
}
	</style>
        <!-- subbanner sec start -->
    {{-- <section class="subbanner-sec sectionpadding">
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
    </section> --}}
    <!-- subbanner sec end -->
   
   <!-- product-details sec start -->
   @php
        $photos = json_decode($product_detail->photo);
    @endphp
   {{-- <section class="product-details-sec sectionpadding">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <div class="product-img">
                    <a href="{{asset($photos[0]) }}" class="position-relative" data-fancybox="1">
						<img src="{{asset($photos[0]) }}" class="img-fluid">
                        <button class="pd-play-zoom">
                            <i class="fas fa-search-plus"></i></button>
                        </a>
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
                        <h4>{{$product_detail->title}}</h4>
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
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
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
                                            <p><strong>Cost</strong> (Including Shipping):</p> <h3>${{$product_detail->price}}</h3>
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
                                    <a href="{{route('add-to-wishlist',$product_detail->slug)}}">Add To Wistlist</a>
                                </div>
                                <div class="cart-box">
                                    <a href="{{route('add-to-cart',$product_detail->slug)}}">
                                        <img src="{{asset('images/cart-img.png')}}" class="img-fluid">Add to Cart
                                    </a>
                                </div>
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
   </section> --}}


   <div class="container">
    <div class="product-page">
        <!-- Left: Image -->
        <div class="product-image">
            <img src="{{asset($photos[0]) }}" alt="">
        </div>

        <!-- Right: Product Details -->
        <div class="product-details">
            <h1>Brass Made Desirable Design Hand Painted Kundan Meena Necklace Set</h1>
            <p class="sku">SKU: PMNS-108</p>
            <p class="price">Rs. 14,715.00</p>

            <!-- Quantity Selector -->
            <div class="quantity">
                <button onclick="decreaseQuantity()">-</button>
                <input type="number" id="quantity" value="1" min="1">
                <button onclick="increaseQuantity()">+</button>
            </div>

            <!-- Cart Buttons -->
            <div class="buttons">
                <button class="add-to-cart">Add to cart – Rs. 14,715.00</button>
                <button class="buy-now">BUY IT NOW</button>
            </div>

            <!-- Links -->
            <div class="links">
                <a href="#">❓ Ask a question</a>
                <a href="#">🔗 Share</a>
            </div>

            <!-- Delivery / Return Boxes -->
            <div class="info-boxes">
                <div class="info-box">
                    <div class="icon"><svg xmlns="http://www.w3.org/2000/svg" class="" width="31" height="30" viewBox="0 0 31 30"><path d="M30 27.6692C29.6992 27.3684 29.0977 27.3684 28.797 27.6692C28.0451 28.4211 26.6917 28.4211 25.9398 27.6692C25.6391 27.3684 25.3383 27.218 24.8872 26.9173L28.4962 17.2932C28.9474 16.2406 28.4962 15.0376 27.594 14.4361L22.6316 10.8271V5.56391C22.6316 4.96241 22.3308 4.3609 21.8797 3.90977C21.4286 3.45865 20.8271 3.15789 20.2256 3.15789H19.0226V2.40601C19.0226 1.05263 17.9699 0 16.6165 0H13.9098C12.5564 0 11.5038 1.05263 11.5038 2.40601V3.15789H10.3008C9.69925 3.15789 9.09774 3.45865 8.64662 3.90977C7.89474 4.3609 7.74436 4.96241 7.74436 5.56391V10.8271L2.4812 14.4361C1.57895 15.0376 1.2782 16.2406 1.57895 17.2932L5.18797 27.0677C4.88722 27.218 4.58647 27.5188 4.28571 27.6692C3.53383 28.4211 2.18045 28.4211 1.42857 27.6692C1.12782 27.3684 0.526316 27.3684 0.225564 27.6692C-0.075188 27.9699 -0.075188 28.5714 0.225564 28.8722C1.72932 30.3759 4.13534 30.3759 5.6391 28.8722C6.39098 28.1203 7.74436 28.1203 8.49624 28.8722C10 30.3759 12.406 30.3759 13.9098 28.8722C14.6617 28.1203 16.015 28.1203 16.7669 28.8722C18.2707 30.3759 20.6767 30.3759 22.1805 28.8722C22.9323 28.1203 24.2857 28.1203 25.0376 28.8722C25.7895 29.6241 26.6917 29.9248 27.7444 29.9248C28.797 29.9248 29.6992 29.4737 30.4511 28.8722C30.4511 28.5714 30.4511 28.1203 30 27.6692ZM13.1579 2.40601C13.1579 2.10526 13.4586 1.80451 13.7594 1.80451H16.4662C16.7669 1.80451 17.0677 2.10526 17.0677 2.40601V3.15789H13.0075V2.40601H13.1579ZM9.54887 5.56391C9.54887 5.41353 9.54887 5.26316 9.69925 5.11278C9.84962 4.96241 10 4.96241 10.1504 4.96241H20.2256C20.3759 4.96241 20.5263 4.96241 20.6767 5.11278C20.8271 5.26316 20.8271 5.41353 20.8271 5.56391V9.47368L15.7143 6.01504C15.4135 5.86466 14.9624 5.86466 14.6617 6.01504L9.54887 9.62406V5.56391ZM3.53383 15.9398L15.1128 7.96992L26.6917 16.0902C26.8421 16.2406 26.9925 16.5414 26.8421 16.8421L25.6391 20.1504L15.7143 13.2331C15.4135 13.0827 14.9624 13.0827 14.6617 13.2331L4.58647 20L3.38346 16.5414C3.23308 16.391 3.23308 16.0902 3.53383 15.9398ZM20.5263 27.6692C19.7744 28.4211 18.4211 28.4211 17.6692 27.6692C16.1654 26.1654 13.7594 26.1654 12.2556 27.6692C11.5038 28.4211 10.1504 28.4211 9.3985 27.6692C8.64662 26.9173 7.74436 26.6165 6.69173 26.6165L4.88722 21.8045L15.1128 15.0376L25.0376 21.9549L23.2331 26.7669C22.1804 26.6165 21.2782 26.9173 20.5263 27.6692Z"></path></svg></div>
                    <p>Estimate delivery times: 12-26 days (International), 3-6 days (United States).</p>
                </div>
                <div class="info-box">
                    <div class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="31" height="30" viewBox="0 0 31 30"><path d="M15.5684 15.1812L9.56316 11.1777C9.41243 11.0772 9.23725 11.0195 9.0563 11.0107C8.87535 11.002 8.69542 11.0425 8.53569 11.128C8.37596 11.2134 8.24242 11.3407 8.14932 11.4961C8.05622 11.6515 8.00705 11.8293 8.00704 12.0104V18.0157C8.00703 18.1805 8.04769 18.3427 8.12543 18.488C8.20318 18.6332 8.31559 18.7571 8.45269 18.8484L14.4535 22.849L14.4827 22.8682C14.6863 22.9953 14.9287 23.045 15.1658 23.0083H15.1671C15.2117 23.0012 15.2559 22.9912 15.2992 22.9783H15.3C15.4027 22.9477 15.4999 22.9007 15.5877 22.8392L21.5737 18.8484C21.7108 18.7571 21.8232 18.6332 21.901 18.488C21.9787 18.3427 22.0194 18.1805 22.0194 18.0157V12.0104C22.0194 11.8457 21.9787 11.6834 21.901 11.5382C21.8232 11.3929 21.7108 11.2691 21.5737 11.1777L15.5684 7.17417C15.4041 7.06444 15.2109 7.00588 15.0132 7.00588C14.8156 7.00588 14.6224 7.06444 14.458 7.17417L11.4561 9.17593C11.319 9.26733 11.2066 9.39116 11.1289 9.53643C11.0511 9.68169 11.0105 9.8439 11.0105 10.0087C11.0105 10.1734 11.0511 10.3356 11.1289 10.4809C11.2066 10.6262 11.319 10.75 11.4561 10.8414L17.4614 14.8449C17.5707 14.9187 17.6935 14.9701 17.8228 14.9962C17.9521 15.0223 18.0852 15.0226 18.2146 14.9971C18.344 14.9716 18.4671 14.9208 18.5768 14.8475C18.6865 14.7743 18.7806 14.6801 18.8538 14.5704C18.927 14.4607 18.9777 14.3375 19.0031 14.2081C19.0286 14.0787 19.0282 13.9456 19.002 13.8163C18.9758 13.687 18.9243 13.5642 18.8505 13.4549C18.7766 13.3457 18.682 13.252 18.5718 13.1794L13.8157 10.0087L15.0132 9.20996L20.0176 12.5459V17.4797L16.0141 20.1491V16.0139C16.0141 15.8492 15.9734 15.687 15.8957 15.5417C15.818 15.3964 15.7055 15.2726 15.5684 15.1812ZM14.0123 20.1491L10.0088 17.4802V13.8806L14.0123 16.5494V20.1491ZM30.0264 15.0131C30.0264 16.9812 29.6388 18.93 28.8856 20.7483C28.1324 22.5666 27.0285 24.2188 25.6368 25.6104C24.2452 27.0021 22.593 28.106 20.7747 28.8592C18.9564 29.6123 17.0076 30 15.0395 30C13.0714 30 11.1225 29.6123 9.30423 28.8592C7.48593 28.106 5.83378 27.0021 4.44212 25.6104C3.05045 24.2188 1.94652 22.5666 1.19336 20.7483C0.440195 18.93 0.0525462 16.9812 0.0525462 15.0131C0.0525462 14.7476 0.157996 14.493 0.345697 14.3053C0.533399 14.1176 0.787977 14.0122 1.05343 14.0122C1.31888 14.0122 1.57345 14.1176 1.76116 14.3053C1.94886 14.493 2.05431 14.7476 2.05431 15.0131C2.05756 18.2016 3.23272 21.2777 5.35625 23.6563C7.47978 26.0348 10.4035 27.5498 13.5713 27.9131C16.7391 28.2764 19.9299 27.4626 22.5368 25.6266C25.1436 23.7905 26.9847 21.0603 27.7097 17.9553C28.4347 14.8503 27.9931 11.5871 26.4689 8.78644C24.9447 5.9858 22.4442 3.84311 19.4431 2.76597C16.442 1.68884 13.1497 1.7524 10.1924 2.94457C7.23513 4.13674 4.81922 6.37434 3.40425 9.23173H5.49709C5.76254 9.23173 6.01711 9.33718 6.20482 9.52488C6.39252 9.71258 6.49797 9.96716 6.49797 10.2326C6.49797 10.4981 6.39252 10.7526 6.20482 10.9403C6.01711 11.128 5.76254 11.2335 5.49709 11.2335H1.00088C0.735431 11.2335 0.480853 11.128 0.293151 10.9403C0.10545 10.7526 0 10.4981 0 10.2326V5.4524C0 5.18695 0.10545 4.93237 0.293151 4.74467C0.480853 4.55697 0.735431 4.45152 1.00088 4.45152C1.26633 4.45152 1.52091 4.55697 1.70861 4.74467C1.89631 4.93237 2.00176 5.18695 2.00176 5.4524V7.61005C3.63165 4.72635 6.17127 2.46411 9.22346 1.1771C12.2757 -0.109912 15.6683 -0.349123 18.8709 0.496875C22.0735 1.34287 24.9054 3.22637 26.9238 5.85284C28.9422 8.4793 30.0333 11.7006 30.0264 15.0131Z"></path></svg></div>
                    <p>Return within 30 days of purchase. Duties & taxes are non-refundable.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    
.container {
    max-width: 90rem;
    margin: 50px auto;
    padding: 0 20px;
}

.product-page {
    display: flex;
    flex-wrap: wrap;
    gap: 40px;
}

.product-image {
    flex: 1 1 45%;
}

.product-image img {
    width: 100%;
    border: 1px solid #ccc;
    border-radius: 8px;
}

.product-details {
    flex: 1 1 45%;
}

.product-details h1 {
    font-size: 28px;
    margin-bottom: 10px;
}

.product-details .sku {
    color: gray;
    margin-bottom: 20px;
}

.product-details .price {
    font-size: 24px;
    font-weight: bold;
    margin-bottom: 20px;
}

.quantity {
    display: flex;
    align-items: center;
    margin-bottom: 20px;
}

.quantity button {
    padding: 8px 16px;
    background: #eee;
    border: none;
    font-size: 18px;
    cursor: pointer;
}

.quantity input {
    width: 60px;
    text-align: center;
    border: 1px solid #ccc;
    padding: 8px;
}

.buttons {
    display: flex;
    flex-direction: column;
    gap: 10px;
    margin-bottom: 30px;
}

.add-to-cart {
    background: black;
    color: white;
    padding: 14px;
    font-size: 16px;
    border: none;
    cursor: pointer;
}

.buy-now {
    background: red;
    color: white;
    padding: 14px;
    font-size: 16px;
    border: none;
    cursor: pointer;
}

.links {
    display: flex;
    gap: 20px;
    margin-bottom: 30px;
}

.links a {
    color: black;
    text-decoration: none;
    font-weight: 500;
}

.info-boxes {
    display: flex;
    gap: 20px;
    flex-wrap: wrap;
}

.info-box {
    flex: 1 1 45%;
    border: 1px solid #ccc;
    border-radius: 8px;
    text-align: center;
    padding: 20px;
}

.icon {
    font-size: 32px;
    margin-bottom: 10px;
}
</style>



<script>
function decreaseQuantity() {
    var qty = document.getElementById('quantity');
    if (qty.value > 1) qty.value--;
}
function increaseQuantity() {
    var qty = document.getElementById('quantity');
    qty.value++;
}
</script>
   <!-- product-details sec end -->

   {{-- <!-- product description sec start -->
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
  <!-- sequere sec end  --> --}}

@endsection