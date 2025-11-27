<?php

$this->title = 'Товары';
$this->params['breadcrumbs'][] = $this->title; //товар
?>
<!--==============================
Product Area
==============================-->
<section class="space-top space-extra-bottom">
    <div class="container">
        <div class="th-sort-bar">
            <div class="row justify-content-between align-items-center">
                <div class="col-md">
                    <p class="woocommerce-result-count">Showing 1–12 of 16 results</p>
                </div>

                <div class="col-md-auto">
                    <form class="woocommerce-ordering" method="get">
                        <select name="orderby" class="orderby" aria-label="Shop order">
                            <option value="menu_order" selected="selected">Default Sorting</option>
                            <option value="popularity">Sort by popularity</option>
                            <option value="rating">Sort by average rating</option>
                            <option value="date">Sort by latest</option>
                            <option value="price">Sort by price: low to high</option>
                            <option value="price-desc">Sort by price: high to low</option>
                        </select>
                    </form>
                </div>
            </div>
        </div>
        <div class="row gy-40">

            <div class="col-xl-3 col-lg-4 col-sm-6">
                <div class="th-product product-grid">
                    <div class="product-img">
                        <img src="assets/img/product/product_1_1.jpg" alt="Product Image">
                        <span class="product-tag">Hot</span>
                        <div class="actions">
                            <a href="#QuickView" class="icon-btn popup-content"><i class="far fa-eye"></i></a>
                            <a href="cart.php" class="icon-btn"><i class="far fa-cart-plus"></i></a>
                            <a href="wishlist.php" class="icon-btn"><i class="far fa-heart"></i></a>
                        </div>
                    </div>
                    <div class="product-content">
                        <a href="shop-details.php" class="product-category">Fresh Fruits</a>
                        <h3 class="product-title"><a href="shop-details.php">Bosco Apple Fruit</a></h3>
                        <span class="price">$177.85</span>
                        <div class="woocommerce-product-rating">
                            <span class="count">(120 Reviews)</span>
                            <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5">
                                <span>Rated <strong class="rating">5.00</strong> out of 5 based on <span class="rating">1</span> customer rating</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-xl-3 col-lg-4 col-sm-6">
                <div class="th-product product-grid">
                    <div class="product-img">
                        <img src="assets/img/product/product_1_2.jpg" alt="Product Image">
                        <span class="product-tag">New</span>
                        <div class="actions">
                            <a href="#QuickView" class="icon-btn popup-content"><i class="far fa-eye"></i></a>
                            <a href="cart.php" class="icon-btn"><i class="far fa-cart-plus"></i></a>
                            <a href="wishlist.php" class="icon-btn"><i class="far fa-heart"></i></a>
                        </div>
                    </div>
                    <div class="product-content">
                        <a href="shop-details.php" class="product-category">Vegetables</a>
                        <h3 class="product-title"><a href="shop-details.php">Green Cauliflower</a></h3>
                        <span class="price">$39.85</span>
                        <div class="woocommerce-product-rating">
                            <span class="count">(120 Reviews)</span>
                            <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5">
                                <span>Rated <strong class="rating">5.00</strong> out of 5 based on <span class="rating">1</span> customer rating</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-xl-3 col-lg-4 col-sm-6">
                <div class="th-product product-grid">
                    <div class="product-img">
                        <img src="assets/img/product/product_1_3.jpg" alt="Product Image">
                        <span class="product-tag">Hot</span>
                        <div class="actions">
                            <a href="#QuickView" class="icon-btn popup-content"><i class="far fa-eye"></i></a>
                            <a href="cart.php" class="icon-btn"><i class="far fa-cart-plus"></i></a>
                            <a href="wishlist.php" class="icon-btn"><i class="far fa-heart"></i></a>
                        </div>
                    </div>
                    <div class="product-content">
                        <a href="shop-details.php" class="product-category">Vegetables</a>
                        <h3 class="product-title"><a href="shop-details.php">Mandarin orange</a></h3>
                        <span class="price">$96.85</span>
                        <div class="woocommerce-product-rating">
                            <span class="count">(120 Reviews)</span>
                            <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5">
                                <span>Rated <strong class="rating">5.00</strong> out of 5 based on <span class="rating">1</span> customer rating</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-xl-3 col-lg-4 col-sm-6">
                <div class="th-product product-grid">
                    <div class="product-img">
                        <img src="assets/img/product/product_1_4.jpg" alt="Product Image">
                        <span class="product-tag">Sale</span>
                        <div class="actions">
                            <a href="#QuickView" class="icon-btn popup-content"><i class="far fa-eye"></i></a>
                            <a href="cart.php" class="icon-btn"><i class="far fa-cart-plus"></i></a>
                            <a href="wishlist.php" class="icon-btn"><i class="far fa-heart"></i></a>
                        </div>
                    </div>
                    <div class="product-content">
                        <a href="shop-details.php" class="product-category">Fresh Fruits</a>
                        <h3 class="product-title"><a href="shop-details.php">Shallot Red onion</a></h3>
                        <span class="price">$08.85<del>$06.99</del></span>
                        <div class="woocommerce-product-rating">
                            <span class="count">(120 Reviews)</span>
                            <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5">
                                <span>Rated <strong class="rating">5.00</strong> out of 5 based on <span class="rating">1</span> customer rating</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-xl-3 col-lg-4 col-sm-6">
                <div class="th-product product-grid">
                    <div class="product-img">
                        <img src="assets/img/product/product_1_5.jpg" alt="Product Image">
                        <span class="product-tag">New</span>
                        <div class="actions">
                            <a href="#QuickView" class="icon-btn popup-content"><i class="far fa-eye"></i></a>
                            <a href="cart.php" class="icon-btn"><i class="far fa-cart-plus"></i></a>
                            <a href="wishlist.php" class="icon-btn"><i class="far fa-heart"></i></a>
                        </div>
                    </div>
                    <div class="product-content">
                        <a href="shop-details.php" class="product-category">Fresh Fruits</a>
                        <h3 class="product-title"><a href="shop-details.php">Sour Red Cherry</a></h3>
                        <span class="price">$32.85</span>
                        <div class="woocommerce-product-rating">
                            <span class="count">(120 Reviews)</span>
                            <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5">
                                <span>Rated <strong class="rating">5.00</strong> out of 5 based on <span class="rating">1</span> customer rating</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-xl-3 col-lg-4 col-sm-6">
                <div class="th-product product-grid">
                    <div class="product-img">
                        <img src="assets/img/product/product_1_6.jpg" alt="Product Image">
                        <span class="product-tag">Hot</span>
                        <div class="actions">
                            <a href="#QuickView" class="icon-btn popup-content"><i class="far fa-eye"></i></a>
                            <a href="cart.php" class="icon-btn"><i class="far fa-cart-plus"></i></a>
                            <a href="wishlist.php" class="icon-btn"><i class="far fa-heart"></i></a>
                        </div>
                    </div>
                    <div class="product-content">
                        <a href="shop-details.php" class="product-category">Fresh Fruits</a>
                        <h3 class="product-title"><a href="shop-details.php">Strawberry Fruits</a></h3>
                        <span class="price">$30.85</span>
                        <div class="woocommerce-product-rating">
                            <span class="count">(120 Reviews)</span>
                            <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5">
                                <span>Rated <strong class="rating">5.00</strong> out of 5 based on <span class="rating">1</span> customer rating</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-xl-3 col-lg-4 col-sm-6">
                <div class="th-product product-grid">
                    <div class="product-img">
                        <img src="assets/img/product/product_1_7.jpg" alt="Product Image">
                        <span class="product-tag">New</span>
                        <div class="actions">
                            <a href="#QuickView" class="icon-btn popup-content"><i class="far fa-eye"></i></a>
                            <a href="cart.php" class="icon-btn"><i class="far fa-cart-plus"></i></a>
                            <a href="wishlist.php" class="icon-btn"><i class="far fa-heart"></i></a>
                        </div>
                    </div>
                    <div class="product-content">
                        <a href="shop-details.php" class="product-category">Fresh Fruits</a>
                        <h3 class="product-title"><a href="shop-details.php">Six Ripe Banana</a></h3>
                        <span class="price">$232.85</span>
                        <div class="woocommerce-product-rating">
                            <span class="count">(120 Reviews)</span>
                            <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5">
                                <span>Rated <strong class="rating">5.00</strong> out of 5 based on <span class="rating">1</span> customer rating</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-xl-3 col-lg-4 col-sm-6">
                <div class="th-product product-grid">
                    <div class="product-img">
                        <img src="assets/img/product/product_1_8.jpg" alt="Product Image">
                        <span class="product-tag">Hot</span>
                        <div class="actions">
                            <a href="#QuickView" class="icon-btn popup-content"><i class="far fa-eye"></i></a>
                            <a href="cart.php" class="icon-btn"><i class="far fa-cart-plus"></i></a>
                            <a href="wishlist.php" class="icon-btn"><i class="far fa-heart"></i></a>
                        </div>
                    </div>
                    <div class="product-content">
                        <a href="shop-details.php" class="product-category">Fresh Meat</a>
                        <h3 class="product-title"><a href="shop-details.php">Sausage Ribs Beef</a></h3>
                        <span class="price">$30.85</span>
                        <div class="woocommerce-product-rating">
                            <span class="count">(120 Reviews)</span>
                            <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5">
                                <span>Rated <strong class="rating">5.00</strong> out of 5 based on <span class="rating">1</span> customer rating</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-xl-3 col-lg-4 col-sm-6">
                <div class="th-product product-grid">
                    <div class="product-img">
                        <img src="assets/img/product/product_1_9.jpg" alt="Product Image">
                        <span class="product-tag">New</span>
                        <div class="actions">
                            <a href="#QuickView" class="icon-btn popup-content"><i class="far fa-eye"></i></a>
                            <a href="cart.php" class="icon-btn"><i class="far fa-cart-plus"></i></a>
                            <a href="wishlist.php" class="icon-btn"><i class="far fa-heart"></i></a>
                        </div>
                    </div>
                    <div class="product-content">
                        <a href="shop-details.php" class="product-category">Vegetables</a>
                        <h3 class="product-title"><a href="shop-details.php">Green Cucumber</a></h3>
                        <span class="price">$32.85</span>
                        <div class="woocommerce-product-rating">
                            <span class="count">(120 Reviews)</span>
                            <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5">
                                <span>Rated <strong class="rating">5.00</strong> out of 5 based on <span class="rating">1</span> customer rating</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-xl-3 col-lg-4 col-sm-6">
                <div class="th-product product-grid">
                    <div class="product-img">
                        <img src="assets/img/product/product_1_10.jpg" alt="Product Image">
                        <span class="product-tag">Hot</span>
                        <div class="actions">
                            <a href="#QuickView" class="icon-btn popup-content"><i class="far fa-eye"></i></a>
                            <a href="cart.php" class="icon-btn"><i class="far fa-cart-plus"></i></a>
                            <a href="wishlist.php" class="icon-btn"><i class="far fa-heart"></i></a>
                        </div>
                    </div>
                    <div class="product-content">
                        <a href="shop-details.php" class="product-category">Fresh Fruits</a>
                        <h3 class="product-title"><a href="shop-details.php">Rash Capsicum</a></h3>
                        <span class="price">$30.85</span>
                        <div class="woocommerce-product-rating">
                            <span class="count">(120 Reviews)</span>
                            <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5">
                                <span>Rated <strong class="rating">5.00</strong> out of 5 based on <span class="rating">1</span> customer rating</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-xl-3 col-lg-4 col-sm-6">
                <div class="th-product product-grid">
                    <div class="product-img">
                        <img src="assets/img/product/product_1_11.jpg" alt="Product Image">
                        <span class="product-tag">New</span>
                        <div class="actions">
                            <a href="#QuickView" class="icon-btn popup-content"><i class="far fa-eye"></i></a>
                            <a href="cart.php" class="icon-btn"><i class="far fa-cart-plus"></i></a>
                            <a href="wishlist.php" class="icon-btn"><i class="far fa-heart"></i></a>
                        </div>
                    </div>
                    <div class="product-content">
                        <a href="shop-details.php" class="product-category">Fresh Fruits</a>
                        <h3 class="product-title"><a href="shop-details.php">Ripe Papaya Fruit</a></h3>
                        <span class="price">$232.85</span>
                        <div class="woocommerce-product-rating">
                            <span class="count">(120 Reviews)</span>
                            <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5">
                                <span>Rated <strong class="rating">5.00</strong> out of 5 based on <span class="rating">1</span> customer rating</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-xl-3 col-lg-4 col-sm-6">
                <div class="th-product product-grid">
                    <div class="product-img">
                        <img src="assets/img/product/product_1_12.jpg" alt="Product Image">
                        <span class="product-tag">Hot</span>
                        <div class="actions">
                            <a href="#QuickView" class="icon-btn popup-content"><i class="far fa-eye"></i></a>
                            <a href="cart.php" class="icon-btn"><i class="far fa-cart-plus"></i></a>
                            <a href="wishlist.php" class="icon-btn"><i class="far fa-heart"></i></a>
                        </div>
                    </div>
                    <div class="product-content">
                        <a href="shop-details.php" class="product-category">Vegetables</a>
                        <h3 class="product-title"><a href="shop-details.php">Organic Tomato</a></h3>
                        <span class="price">$30.85</span>
                        <div class="woocommerce-product-rating">
                            <span class="count">(120 Reviews)</span>
                            <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5">
                                <span>Rated <strong class="rating">5.00</strong> out of 5 based on <span class="rating">1</span> customer rating</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="th-pagination text-center pt-50">
            <ul>
                <li><a href="blog.php">1</a></li>
                <li><a href="blog.php">2</a></li>
                <li><a href="blog.php">3</a></li>
                <li><a href="blog.php"><i class="far fa-arrow-right"></i></a></li>
            </ul>
        </div>
    </div>
</section>
