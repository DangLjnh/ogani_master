 
<section class="hero">
    <div class="container">
      <div class="row">
        <div class="col-lg-3">
          <div class="hero__categories">
            <div class="hero__categories__all">
              <i class="fa fa-bars"></i>
              <span>All departments</span>
            </div>
            <ul> 
                <?php
              $queryy = "SELECT * FROM category";
              $statementt = $conn->prepare($queryy);
              $statementt->execute();
              $statementt->setFetchMode(PDO::FETCH_OBJ); //PDO::FETCH_ASSOC
              $resultt = $statementt->fetchAll();
              
              if ($resultt) {
                foreach ($resultt as $row) {
              ?>
              <li> <a href="./product_category.php?categoryID=<?= $row->categoryID; ?>"><?= $row->name; ?></a></li>
               
              <?php
                }
              } else {
                ?>
              <li value="0"> <a href="">No Record Found</a></li>
              <?php
              }
              ?>
              <li> <a href="./index.php?>">All Product</a></li>                                                       
            </ul>
          </div>
        </div>
        <div class="col-lg-9">
          <div class="hero__search">
            <div class="hero__search__form">
              <form action="#">
                <div class="hero__search__categories">
                  All Categories
                  <span class="arrow_carrot-down"></span>
                </div>
                <input type="text" placeholder="What do yo u need?">
                <button type="submit" class="site-btn">SEARCH</button>
              </form>
            </div>
            <div class="hero__search__phone">
              <div class="hero__search__phone__icon">
                <i class="fa fa-phone"></i>
              </div>
              <div class="hero__search__phone__text">
                <h5>+84 99.999.999</h5>
                <span>support 24/7 time</span>
              </div>
            </div>
          </div>
          <div class="hero__item set-bg" data-setbg="img/hero/banner.jpg">
            <div class="hero__text">
              <span>FRUIT FRESH</span>
              <h2>Vegetable <br />100% Organic</h2>
              <p>Free Pickup and Delivery Available</p>
              <a href="#" class="primary-btn">SHOP NOW</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>