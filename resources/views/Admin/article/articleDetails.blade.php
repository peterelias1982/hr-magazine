@extends('Admin.layouts.master')
@section('Content')
<div class="content-wrapper">
  <div class="d-sm-flex align-items-center justify-content-between border-bottom py-1">
    <h2 class="fw-bold col-lg-auto">Article Details</h2>
    <div class="btn-wrapper">
      <a href="#" class="btn btn-sm" style="color: #ed2708"><i class="icon-trash"></i> Delete Article</a>
    </div>
  </div>
  <div class="pt-4">
    <div class="row">
      <div class="col-12 d-flex flex-column">
        <div class="row flex-grow">
          <div class="col-12 grid-margin stretch-card">
            <div class="card card-rounded">
              <div class="card-body">
                <div class="row">
                  <div class="col-lg-4 col-6 position-relative" id="change-pic">
                    <input type="file" name="article_image" id="article_pic_input" form="edit-article" class="opacity-0 border-0" disabled="">
                    <img src="{{asset('admin/images/articles')}}&amp;{{('event/application.png')}}" class="img-fluid" id="article_pic">
                    <i class="mdi mdi-link-variant-plus fs-4 position-absolute bottom-0 end-0 translate-middle btn btn-sm d-none" id="article_change_icon"></i>
                  </div>
                  <div class="col-lg-8 d-flex flex-column justify-content-around">
                    <div class="row pb-2 justify-content-between align-items-center">
                      <h3 class="col-auto card-title card-title-dash">
                        Article information
                      </h3>
                      <div class="col-auto">
                        <i class="mdi mdi-lead-pencil text-muted btn btn-sm fs-5" id="edit_user_button"></i>
                      </div>
                    </div>
                    <div class="row py-1">
                      <p class="card-text fw-bold lh-1">Title</p>
                      <p class="card-text lh-1">
                        <input name="title" form="edit-article" class="w-100 border-0 text-black" value="Lorem ipsum dolor sit amet." disabled="">
                      </p>
                    </div>
                    <div class="row py-1">
                      <p class="card-text fw-bold lh-1">Content</p>
                      <p class="card-text lh-1">
                        <textarea name="content" form="edit-article" class="form-control p-0 pe-5 border-0 bg-transparent" style="height: 15rem" disabled="">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Consectetur quia at corrupti eaque dolores error placeat inventore eius veritatis hic ipsam, deleniti sed voluptatibus libero omnis quos, voluptas commodi dolorem! Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sunt voluptatum dignissimos animi autem qui, tempore quae ipsa distinctio provident in, unde fugiat dicta earum odio sit veniam corporis at asperiores! Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum quibusdam assumenda eos non modi, voluptatem aperiam quod ut consequatur odio, hic quaerat nam sit, tempore dolor. Fuga corporis ea quis.
Eveniet repellat ad voluptatum quaerat, nihil, iure facere, voluptatem at consectetur tempore commodi eaque ipsam maxime dolor delectus soluta quas laudantium numquam nemo assumenda! Qui at in odit aspernatur aut.
Veniam quas perferendis laboriosam nulla, qui in dolorum, omnis iusto quis voluptatem, sapiente excepturi consequuntur? Praesentium earum ducimus sequi ab nemo enim et dicta ipsa magnam, totam provident dolores corrupti.
Quo dolores ut deleniti consequatur, quidem saepe amet a expedita voluptatem perferendis quisquam, quas fuga, iusto quasi rem nihil earum ipsum odit necessitatibus? Obcaecati soluta ut omnis quasi similique dolorem.
Quos consectetur blanditiis dolore quisquam aliquam in minus omnis iusto, nam, quibusdam similique sunt, eius sapiente quam dignissimos quaerat numquam rem! Ullam ipsa maiores ad tenetur, nostrum eaque illo dolores.
                        </textarea>
                      </p>
                    </div>
                    <div class="row py-1">
                      <div class="d-flex justify-content-between align-items-start">
                        <div class="col-auto">
                          <p class="card-text fw-bold lh-1">Author</p>
                          <p class="card-text lh-1">
                            <select name="author" id="" form="edit-article" disabled="" class="form-control ps-0 bg-transparent text-black fs-xxs border-0" style="outline: none;">
                              <option value="jhon-doe" selected="">
                                John Doe
                              </option>
                              <option value="">John De</option>
                            </select>
                          </p>
                        </div>
                        <div class="col-4 col-lg-3 form-check form-check-flat form-check-primary">
                          <label for="approved" class="form-check-label">
                            <input type="checkbox" id="approved" class="form-check-input border-0" name="approved" disabled="" checked="">
                            Approved
                          <i class="input-helper"></i></label>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row border-top border-bottom py-3 justify-content-between">
                  <div class="col-lg-auto">
                    <p class="card-text fw-bold lh-1">
                      Source Name<i class="mdi mdi-link-variant-minus"></i>
                    </p>
                    <p class="card-text lh-1">
                      <input name="source_name" class="w-100 border-0 text-black" value="CNN" form="edit-article" disabled="">
                    </p>
                  </div>
                  <div class="col-lg-auto">
                    <p class="card-text fw-bold lh-1">
                      Source Link
                      <i class="mdi mdi-link-variant-minus"></i>
                    </p>
                    <p class="card-text lh-1">
                      <input type="url" name="source_link" form="edit-article" class="w-100 border-0 text-primary" value="https://edition.cnn.com/" disabled="">
                    </p>
                  </div>
                  <div class="col-lg-auto">
                    <p class="card-text fw-bold lh-1">
                      YouTube Link<i class="mdi mdi-youtube"></i>
                    </p>
                    <p class="card-text lh-1">
                      <input type="url" name="youtube_link" form="edit-article" class="w-100 border-0 text-primary" value="https://edition.cnn.com/" disabled="">
                    </p>
                  </div>
                </div>
                <div class="row justify-content-between align-items-start">
                  <div class="form-group col-lg-8 border-end mt-1">
                    <label>Tags</label>
                    <!-- Placeholder for tags checkboxes -->
                    <div class="tags-scrollable-container" id="tags-container">
                      <div class="badge-danger p-2 me-2 my-1 badge fw-bold d-flex align-items-center justify-content-center tag d-none"><input type="checkbox" name="tags[]" id="tag-Alps" class="tag-checkbox border-0" disabled=""> #<label for="tag-Alps">Alps</label></div>
                      <div class="badge-success p-2 me-2 my-1 badge fw-bold d-flex align-items-center justify-content-center tag"><input type="checkbox" name="tags[]" id="tag-Austria" class="tag-checkbox border-0" checked="" disabled=""> #<label for="tag-Austria">Austria</label></div>
                      <div class="badge-dark p-2 me-2 my-1 badge fw-bold d-flex align-items-center justify-content-center tag"><input type="checkbox" name="tags[]" id="tag-France" class="tag-checkbox border-0" disabled="" checked=""> #<label for="tag-France">France</label></div>
                      <div class="badge-success p-2 me-2 my-1 badge fw-bold d-flex align-items-center justify-content-center tag"><input type="checkbox" name="tags[]" id="tag-Germany" class="tag-checkbox border-0" disabled="" checked=""> #<label for="tag-Germany">Germany</label></div>
                      <div class="badge-primary p-2 me-2 my-1 badge fw-bold d-flex align-items-center justify-content-center tag d-none"><input type="checkbox" name="tags[]" id="tag-London" class="tag-checkbox border-0" disabled=""> #<label for="tag-London">London</label></div>
                      <div class="badge-primary p-2 me-2 my-1 badge fw-bold d-flex align-items-center justify-content-center tag d-none"><input type="checkbox" name="tags[]" id="tag-Paris" class="tag-checkbox border-0" disabled=""> #<label for="tag-Paris">Paris</label></div>
                      <div class="badge-dark p-2 me-2 my-1 badge fw-bold d-flex align-items-center justify-content-center tag"><input type="checkbox" name="tags[]" id="tag-Cairo" class="tag-checkbox border-0" disabled="" checked=""> #<label for="tag-Cairo">Cairo</label></div>
                      <div class="badge-info p-2 me-2 my-1 badge fw-bold d-flex align-items-center justify-content-center tag d-none"><input type="checkbox" name="tags[]" id="tag-Animals" class="tag-checkbox border-0" disabled=""> #<label for="tag-Animals">Animals</label></div>
                      <div class="badge-dark p-2 me-2 my-1 badge fw-bold d-flex align-items-center justify-content-center tag d-none"><input type="checkbox" name="tags[]" id="tag-Buildings" class="tag-checkbox border-0" disabled=""> #<label for="tag-Buildings">Buildings</label></div>
                      <div class="badge-dark p-2 me-2 my-1 badge fw-bold d-flex align-items-center justify-content-center tag d-none"><input type="checkbox" name="tags[]" id="tag-Castle" class="tag-checkbox border-0" disabled=""> #<label for="tag-Castle">Castle</label></div>
                      <div class="badge-success p-2 me-2 my-1 badge fw-bold d-flex align-items-center justify-content-center tag d-none"><input type="checkbox" name="tags[]" id="tag-Clouds" class="tag-checkbox border-0" disabled=""> #<label for="tag-Clouds">Clouds</label></div>
                      <div class="badge-dark p-2 me-2 my-1 badge fw-bold d-flex align-items-center justify-content-center tag d-none"><input type="checkbox" name="tags[]" id="tag-Park" class="tag-checkbox border-0" disabled=""> #<label for="tag-Park">Park</label></div>
                      <div class="badge-primary p-2 me-2 my-1 badge fw-bold d-flex align-items-center justify-content-center tag d-none"><input type="checkbox" name="tags[]" id="tag-Mountains" class="tag-checkbox border-0" disabled=""> #<label for="tag-Mountains">Mountains</label></div>
                      <div class="badge-info p-2 me-2 my-1 badge fw-bold d-flex align-items-center justify-content-center tag d-none"><input type="checkbox" name="tags[]" id="tag-People" class="tag-checkbox border-0" disabled=""> #<label for="tag-People">People</label></div>
                      <div class="badge-danger p-2 me-2 my-1 badge fw-bold d-flex align-items-center justify-content-center tag d-none"><input type="checkbox" name="tags[]" id="tag-Town" class="tag-checkbox border-0" disabled=""> #<label for="tag-Town">Town</label></div>
                      <div class="badge-warning p-2 me-2 my-1 badge fw-bold d-flex align-items-center justify-content-center tag d-none"><input type="checkbox" name="tags[]" id="tag-Trees" class="tag-checkbox border-0" disabled=""> #<label for="tag-Trees">Trees</label></div>
                      <div class="badge-primary p-2 me-2 my-1 badge fw-bold d-flex align-items-center justify-content-center tag d-none"><input type="checkbox" name="tags[]" id="tag-Water" class="tag-checkbox border-0" disabled=""> #<label for="tag-Water">Water</label></div>
                      <div class="badge-primary p-2 me-2 my-1 badge fw-bold d-flex align-items-center justify-content-center tag d-none"><input type="checkbox" name="tags[]" id="tag-Forest" class="tag-checkbox border-0" disabled=""> #<label for="tag-Forest">Forest</label></div>
                      <div class="badge-warning p-2 me-2 my-1 badge fw-bold d-flex align-items-center justify-content-center tag d-none"><input type="checkbox" name="tags[]" id="tag-Woods" class="tag-checkbox border-0" disabled=""> #<label for="tag-Woods">Woods</label></div>
                      <div class="badge-dark p-2 me-2 my-1 badge fw-bold d-flex align-items-center justify-content-center tag d-none"><input type="checkbox" name="tags[]" id="tag-Ocean" class="tag-checkbox border-0" disabled=""> #<label for="tag-Ocean">Ocean</label></div>
                      <div class="badge-dark p-2 me-2 my-1 badge fw-bold d-flex align-items-center justify-content-center tag d-none"><input type="checkbox" name="tags[]" id="tag-Colors" class="tag-checkbox border-0" disabled=""> #<label for="tag-Colors">Colors</label></div>
                      <div class="badge-info p-2 me-2 my-1 badge fw-bold d-flex align-items-center justify-content-center tag d-none"><input type="checkbox" name="tags[]" id="tag-Hotels" class="tag-checkbox border-0" disabled=""> #<label for="tag-Hotels">Hotels</label></div>
                      <div class="badge-dark p-2 me-2 my-1 badge fw-bold d-flex align-items-center justify-content-center tag d-none"><input type="checkbox" name="tags[]" id="tag-Butterflies" class="tag-checkbox border-0" disabled=""> #<label for="tag-Butterflies">Butterflies</label></div>
                      <div class="badge-info p-2 me-2 my-1 badge fw-bold d-flex align-items-center justify-content-center tag d-none"><input type="checkbox" name="tags[]" id="tag-Circus" class="tag-checkbox border-0" disabled=""> #<label for="tag-Circus">Circus</label></div>
                      <div class="badge-warning p-2 me-2 my-1 badge fw-bold d-flex align-items-center justify-content-center tag d-none"><input type="checkbox" name="tags[]" id="tag-Cafes" disabled="" class="tag-checkbox border-0"> #<label for="tag-Cafes">Cafes</label></div>
                      <div class="badge-success p-2 me-2 my-1 badge fw-bold d-flex align-items-center justify-content-center tag d-none"><input type="checkbox" name="tags[]" id="tag-Fog" class="tag-checkbox border-0" disabled=""> #<label for="tag-Fog">Fog</label></div>
                      <div class="badge-dark p-2 me-2 my-1 badge fw-bold d-flex align-items-center justify-content-center tag d-none"><input type="checkbox" name="tags[]" id="tag-Flowers" class="tag-checkbox border-0" disabled=""> #<label for="tag-Flowers">Flowers</label></div>
                    </div>
                    <!--End of tags-->
                  </div>
                  <div class="form-group col-lg-4">
                    
                    <p class="card-text lh-1 mt-2">Category  <i class="mdi mdi-bookmark-box-multiple-outline"></i></p>
                    <p class="card-text lh-1">
                    <select id="category" name="category" class="form-control bg-transparent text-black fs-xxs border-0" style="outline: none;" disabled="">
                      <!-- Category options -->
                      <option value="News">News</option>
                      <option value="Technology">Technology</option>
                      <option value="Entertaiment">
                        Entertaiment
                      </option>
                      <option value="Economy">Economy</option>
                    </select>
                  </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="d-sm-flex align-items-center justify-content-start border-top py-2">
    <div class="btn-wrapper d-none" id="submit_pannel">
      <button type="submit" class="btn btn-primary me-2" form="edit-article">
        Submit
      </button>
      <button class="btn btn-light" form="edit-article">
        Cancel
      </button>
    </div>
  </div>
</div>
@endsection
@section('js')
<script src="{{asset('admin/js/edit_form.js')}}"></script>

@endsection