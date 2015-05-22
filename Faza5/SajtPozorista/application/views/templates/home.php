<div id="myCarousel" class="carousel slide">

        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <div class="carousel-indicators" style="top:60px; opacity:0.85;">
            <h1>Aktuelne predstave</h1>
        </div>

        <div class="carousel-inner">
            <div class="item active">
                <div class="fill" style="background-image:url('<?php echo asset_url('img/1900x1080.gif')?>');"></div>
                <div class="carousel-caption">
                    <h1>Predstava 1</h1>
                </div>
            </div>
            <div class="item">
                <div class="fill" style="background-image:url('<?php echo asset_url('img/1900x1080.gif')?>');"></div>
                <div class="carousel-caption">
                    <h1>Predstava 2</h1>
                </div>
            </div>
            <div class="item">
                <div class="fill" style="background-image:url('<?php echo asset_url('img/1900x1080.gif')?>');"></div>
                <div class="carousel-caption">
                    <h1>Predstava 3</h1>
                </div>
            </div>
        </div>

        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="icon-prev"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="icon-next"></span>
        </a>
    </div>
