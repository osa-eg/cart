<div class="modal fade bd-example-modal-lg theme-modal" id="quick-view" tabindex="-1" role="dialog"
     aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content quick-view-modal">
            <div class="modal-body">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <div class="row">
                    <div class="col-lg-6 col-xs-12">
                        <div class="quick-view-img">
                            <img src="" id="vImage" alt=""  class="img-fluid blur-up lazyload">
                        </div>
                    </div>
                    <div class="col-lg-6 rtl-text">
                        <div class="product-right">
                            <h2 id="vName"></h2>
                            <h3>$ <span  id="vPrice"></span></h3>
                            <p id="vCategory" class="badge-theme-color px-1"></p>
                            <div class="border-product">
                                <h6 class="product-title">{{__('front.product_details')}}</h6>
                                <div id="vDescription"></div>
                            </div>
                            <div class="product-description border-product product_available" >

                                <h6 class="product-title">{{__('keys.qty')}}</h6>
                                <div class="qty-box">
                                    <div class="input-group"><span class="input-group-prepend">
                                            <button type="button" class="btn quantity-left-minus" id="vMinus" data-type="minus" data-field="">
                                                <i  class="ti-minus"></i>
                                            </button>
                                        </span>
                                        <input type="text" id="qtyInput" name="quantity" class="form-control input-number" value="1">
                                        <span class="input-group-prepend">
                                            <button type="button" class="btn quantity-right-plus" id="vPlus" data-max="" data-type="plus" data-field="">
                                                <i class="ti-plus"></i>
                                            </button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="alert text-danger p-0 mt-0" id="maxQuntity" style="display: none">
                                <small>{{__('alerts.maxQuntityAvailable')}}</small>
                            </div>
                            <div class="product_not_available">
                                <p class="alert alert-danger"> {{__('product.not_available')}}</p>
                            </div>
                            <div class="product-buttons">
                                <a class="btn btn-solid product_available pointer" id="vAddToCart" data-id="{{$product->id}}">{{__('btn.add_to_cart')}}</a>
                                <a href="" class="btn btn-solid">{{__('btn.show_details')}}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
