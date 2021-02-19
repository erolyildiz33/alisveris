<div id="navbar-search" class="navbar-search collapse">
    <div class="navbar-search-inner">

        <?php if ($this->uri->segment(2) == "product_categories" && $this->uri->segment(3) == null ) { ?>
            <span class="search-field">
                <div class="col-xs-11 col-md-11">
                    <div class="input-group">
                        <input type="search" class="search-field" placeholder="Kategori Ara" id="arama" name="arama" style="border-radius: 5px;" />
                        <div class="input-group-btn">
                            <button class="btn btn-primary" id="arabuton">
                                <span class="glyphicon glyphicon-search"></span>
                            </button>
                        </div>
                    </div>
                </div>
            </span>
        <?php } else { ?>
            <span class="search-icon"><i class="fa fa-search"></i></span>
            <input class="search-field" type="search" placeholder="ara..." id="arama"/>
        <?php } ?>


        <button type="button" class="search-close" data-toggle="collapse" data-target="#navbar-search"
        aria-expanded="false">
        <i class="fa fa-close"></i>
    </button>
</div>
<div class="navbar-search-backdrop" data-toggle="collapse" data-target="#navbar-search" aria-expanded="false"></div>
</div>