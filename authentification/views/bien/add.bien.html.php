
<div class="container mb-5">
           <h2 class=" text-center text-info my-5">Nouveau Bien</h2>
        <form action="<?=WEBROOT.'bien/addBien'?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="controller" value="bien">
                <div class="form-group">
                  <label for="">Type</label>
                  <select class="form-control" name="type" id="">
                    <option>Imeuble</option>
                    <option>Appartement</option>
                    <option>Studio</option>
                    <option>Chambre</option>
                  </select>
                </div >
                <div class="form-group">
                        <label for="">Description</label>
                        <textarea class="form-control" name="description" id="" rows="3"></textarea>
                </div>
               
                  <div class="form-check form-check-inline mr-2 my-4">
                    <span class="mr-2" >Tags </span>
                      <label class="form-check-label">
                          <input class="form-check-input" type="checkbox" name="tags[]" id="" value="Luxe"> Luxe
                      </label>
                  </div>
                  <div class="form-check form-check-inline  mr-2">
                      <label class="form-check-label">
                          <input class="form-check-input" type="checkbox" name="tags[]" id="" value="Piscine"> Piscine
                      </label>
                  </div>
                  <div class="form-check form-check-inline  mr-2">
                      <label class="form-check-label">
                          <input class="form-check-input" type="checkbox" name="tags[]" id="" value="Vue sur la Mer"> Vue sur la Mer
                      </label>
                  </div>
                  <div class="row ml-1 mb-3">
                      <span class="mr-2" >Publier </span>
                        <div class="form-check form-check-inline mr-2">
                           
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="publier" id="" value="0" checked> Oui
                            </label>
                        </div>
                        <div class="form-check form-check-inline mr-2">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="publier" value="1" > Non
                            </label>
                        </div>
                  </div>
                  <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Images</span>
                        </div>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="inputGroupFile01" name="photo">
                            <label class="custom-file-label" for="inputGroupFile01">Choisir une</label>
                        </div>
                    </div>
                <div class="col-sm-2 offset-sm-10 float-right ">
                   <button type="submit" class="btn btn-primary ">Enregistrer</button>
                </div>
        </form>
</div>

