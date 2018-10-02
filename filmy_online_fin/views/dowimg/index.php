<?php include ROOT.'/views/layouts/headerParser.php';?>
<div class="container">
   
  <div class="row">
    <div class="col-md-4">.col-md-4</div>
    <div class="col-md-4">
      <form role="form" name="parskp" method="POST">
          <div class="form-group">
            <label for="exampleInputEmail1">id  с каторого начинать загрузку картинок</label>
            <input type="text" name="url_kp" class="form-control" id="add_id" placeholder="id">
          </div>
          
          <button type="submit" name="sub" class="btn btn-default">Отправить</button>
        </form>
        <div class="col-md-6" id="contentPars">
       
        </div>
    </div>
    <div class="col-md-4">.col-md-4</div>
  </div>
  <div class="row">
    <div class="col-md-12">
     
     <div class="col-md-6" id="contentPars2">
       
     </div>
    </div>
    
  </div>
</div>



<?php include ROOT.'/views/layouts/footerParser.php';?>