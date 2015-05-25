<div class = "container" >
	
		<div class="row">

            <div class="col-lg-12">
                <h1 class="page-header"><?php echo $predstava['Naziv']; ?></h1>
            </div>

    </div>
    <br>
		<div class="row">
		    <div class="col-md-9 portfolio-item">
                <a href="#">
                    <img class="img-responsive" src="<?php echo display_image('predstave',$predstava['Slika'],'750x450.gif')?>">
                </a>
            </div>
          <div class="col-md-3">

              <h2 class="page-header">Kritike</h2>


              <h3><a href="pregled-kritike.html">Kritika 1</a> <small>Pera Perić</small></h3><hr>
              <h3><a href="pregled-kritike.html">Kritika 2</a> <small>Luka Perić</small></h3><hr>
              <h3><a href="pregled-kritike.html">Kritika 3</a> <small>Aca Perić</small></h3><hr>
              <h3><a href="pregled-kritike.html">Kritika 4</a> <small>Nikola Perić</small></h3><hr>

              <div class="row">

                      <ul class="pagination">
                          <li><a href="#">&laquo;</a>
                          </li>
                          <li class="active"><a href="#">1</a>
                          </li>
                          <li><a href="#">2</a>
                          </li>
                          <li><a href="#">3</a>
                          </li>
                          <li><a href="#">4</a>
                          </li>
                          <li><a href="#">5</a>
                          </li>
                          <li><a href="#">&raquo;</a>
                          </li>
                      </ul>

              </div>
          </div>
			
			</div>
      <br>
			<div class="row">
			
				<div class="col-md-8 text-justify">
				<p>Glumci: <?php echo $predstava['Glumci']; ?></p>
				<p>Reziser: <?php echo $predstava['Reziser']; ?></p>
				<p>Pozoriste: <?php echo $predstava['Pozoriste']; ?></p>
					
				</div>
        <div class="col-md-4">
          <!-- content/banner -->
        </div>
			</div>

        <hr>

		    <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Komentari</h1>
            </div>
        </div>

        <form>
          <div class="row form-group">
            <div class="input-group comment-input-form">
                <textarea rows="4" type="text" class="form-control comment-input" placeholder="Unesite komentar"></textarea>
            </div>
            <button type="button" class="btn btn-info right-col">Unesi</button>
          </div>
        </form>

        <!-- Komentari -->
        <div class="row comment">
            <div class="col-sm-12 comment-content">
                <p>Ova predstava je odlična...</p>
            </div>
            <div class="comment-footer">
              <div class="col-sm-8 small-font">
                  <p>Luka Petrović</p>
              </div>
              <div class="col-sm-4 small-font">
                  <div class="right-col">
                      <p>10/3/2015</p>
                      <button type="button" class="btn btn-danger right-col">Obriši</button>
                  </div>
              </div>
            </div>
        </div>

        <div class="row comment">
            <div class="col-sm-12 comment-content">
                <p>I nije nešto...</p>
            </div>
            <div class="comment-footer">
              <div class="col-sm-8">
                  <p>Petar Ristić</p>
              </div>
              <div class="col-sm-4">
                  <div class="right-col">
                      <p>10/3/2015</p>
                      <button type="button" class="btn btn-danger right-col">Obriši</button>
                  </div>
              </div>
            </div>
        </div>
    </div>
