@extends('publicPages.layouts.main')

@section('publicPagesContent')
    <!-- start of content -->
    <div class="container-fluid g-0">
        <div class="row justify-content-center g-0">
            <div class="col-12 text-center g-0">
                <img
                    src="{{asset('publicPages/images/big-logo.svg')}}"
                    alt="logo"
                    class="mb-3 img-fluid"
                />
            </div>
        </div>
        <!-- Edite Profile Users Start  -->
        <div class="container-fluid">
            <div class="row">
                <button
                    class="nxt-btn btn mb-2 mx-0 btn-dark text-white rounded-0 py-2 w-100 fw-bold"
                >
                    Post Job
                </button>
            </div>

            <div class="row d-flex mb-5 bg-light">
                <div class="col-xl-12 col-md-12 col-sm-12 py-5 px-md-5 px-1 g-0">
                    <form>
                        <div class="card-block justify-content-center row gy-5">
                            <div class="col-12">
                                <label
                                    for="companyName"
                                    class="form-label mb-3 text-primary fw-bold fs-3"
                                >Job Title*</label
                                >
                                <input
                                    type="text"
                                    class="col-6 form-control border border-dark border-3 rounded-4 py-4 ps-5 fs-4"
                                    id="firstName"
                                    name="firstName"
                                    value="Job Title"
                                />
                            </div>

                            <div class="col-12">
                                <label
                                    for="companyName"
                                    class="form-label mb-3 text-primary fw-bold fs-3"
                                >Job Category*</label
                                >
                                <select
                                    class="form-select text-muted border border-dark border-3 rounded-4 py-4 ps-5 fs-4"
                                    id="country"
                                    aria-label="Default select example"
                                >
                                    <option selected>Please Select</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>

                            <div class="col-12">
                                <label
                                    for="companyName"
                                    class="form-label mb-3 text-primary fw-bold fs-3"
                                >Career Level*</label
                                >
                                <select
                                    class="form-select text-muted border border-dark border-3 rounded-4 py-4 ps-5 fs-4"
                                    id="country"
                                    aria-label="Default select example"
                                >
                                    <option selected>Career Level</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>

                            <div class="col-12">
                                <label
                                    for="companyName"
                                    class="form-label mb-3 text-primary fw-bold fs-3"
                                >Company Name*</label
                                >
                                <input
                                    type="text"
                                    class="col-6 form-control border border-dark border-3 rounded-4 py-4 ps-5 fs-4"
                                    id="companyName"
                                    name="companyName"
                                    value="Company Name"
                                />
                            </div>

                            <div class="col-12">
                                <label
                                    for="companyName"
                                    class="form-label mb-3 text-primary fw-bold fs-3"
                                >Applying Deadline*</label
                                >
                                <input
                                    type="date"
                                    class="col-6 form-control border border-dark border-3 rounded-4 py-4 ps-5 fs-4"
                                    id="companyName"
                                    name="companyName"
                                    value=""
                                    placeholder="Deadline"
                                />
                            </div>

                            <div class="col-12">
                                <label
                                    for="companyName"
                                    class="form-label mb-3 text-primary fw-bold fs-3"
                                >Street Number*</label
                                >
                                <input
                                    type="number"
                                    class="col-6 form-control border border-dark border-3 rounded-4 py-4 ps-5 fs-4"
                                    id="companyName"
                                    name="companyName"
                                    placeholder="Street Number"
                                />
                            </div>

                            <div class="col-12">
                                <label
                                    for="companyName"
                                    class="form-label mb-3 text-primary fw-bold fs-3"
                                >Street Name*</label
                                >
                                <input
                                    type="text"
                                    class="col-6 form-control border border-dark border-3 rounded-4 py-4 ps-5 fs-4"
                                    name="companyName"
                                    value="Street Number"
                                />
                            </div>
                            <div class="col-12">
                                <label
                                    for="companyName"
                                    class="form-label mb-3 text-primary fw-bold fs-3"
                                >City*</label
                                >
                                <input
                                    type="text"
                                    class="col-6 form-control border border-dark border-3 rounded-4 py-4 ps-5 fs-4"
                                    id="city"
                                    name="city"
                                    value="City"
                                />
                            </div>
                            <div class="col-12">
                                <label
                                    for="companyName"
                                    class="form-label mb-3 text-primary fw-bold fs-3"
                                >State / Province*</label
                                >
                                <input
                                    type="text"
                                    class="col-6 form-control border border-dark border-3 rounded-4 py-4 ps-5 fs-4"
                                    id="companyName"
                                    name="companyName"
                                    value="Street Number"
                                />
                            </div>

                            <div class="col-12">
                                <label
                                    for="companyName"
                                    class="form-label mb-3 text-primary fw-bold fs-3"
                                >Postal Code*</label
                                >
                                <input
                                    type="text"
                                    class="col-6 form-control border border-dark border-3 rounded-4 py-4 ps-5 fs-4"
                                    id="companyName"
                                    name="companyName"
                                    value="Street Number"
                                />
                            </div>

                            <div class="col-12">
                                <label
                                    for="companyName"
                                    class="form-label mb-3 text-primary fw-bold fs-3"
                                >Country*</label
                                >
                                <input
                                    type="text"
                                    class="col-6 form-control border border-dark border-3 rounded-4 py-4 ps-5 fs-4"
                                    id="companyName"
                                    name="companyName"
                                    value="Street Number"
                                />
                            </div>

                            <div class="col-12">
                                <label
                                    for="companyName"
                                    class="form-label mb-3 text-primary fw-bold fs-3"
                                >Business Email*</label
                                >
                                <input
                                    type="email"
                                    class="col-6 form-control border border-dark border-3 rounded-4 py-4 ps-5 fs-4"
                                    id="email"
                                    name="email"
                                    value="Amged S. El-Hawrani@gmail.com"
                                />
                            </div>
                            <div class="col-12">
                                <label
                                    for="companyName"
                                    class="form-label mb-3 text-primary fw-bold fs-3"
                                >About Company*</label
                                >
                                <textarea
                                    type="text"
                                    class="col-6 form-control border border-dark border-3 rounded-4 py-4 ps-5 fs-4"
                                    id="jobTitle"
                                    name="jobTitle"
                                    value="Industry"
                                    rows="12"
                                >
                                </textarea>
                            </div>
                            <div class="col-12">
                                <label
                                    for="companyName"
                                    class="form-label mb-3 text-primary fw-bold fs-3"
                                >Job Description*</label
                                >
                                <textarea
                                    type="text"
                                    class="col-6 form-control border border-dark border-3 rounded-4 py-4 ps-5 fs-4"
                                    id="jobTitle"
                                    name="jobTitle"
                                    value="Industry"
                                    rows="12"
                                >
Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi minima assumenda itaque. Rem eum ut quibusdam iusto consequatur quam possimus sit expedita, a, praesentium voluptates explicabo corrupti ad facilis aliquid. Lorem ipsum dolor sit amet consectetur adipisicing elit. Placeat odio neque tempore quia a fuga dolores necessitatibus, quo, amet officiis natus magnam cupiditate accusantium debitis excepturi laborum sunt labore architecto.
Error tenetur id, quaerat quo quis voluptas ullam rem eos aperiam molestiae minus possimus soluta nesciunt sed vero amet unde eum. Nulla accusantium illum cum, recusandae dolor soluta id fuga.
Sit, ut libero quas aspernatur fugiat velit! Sit autem placeat sequi quisquam. Necessitatibus ad architecto laudantium iusto assumenda dolore ea aspernatur nam ipsam. Mollitia, possimus fugit accusantium unde laboriosam quidem!
Earum iste quae, beatae sapiente magni repellat pariatur nihil, voluptate dolorum debitis nesciunt, eos deserunt. Quis molestiae, architecto voluptas, sapiente dignissimos suscipit reiciendis officia obcaecati, temporibus deleniti quibusdam voluptatibus aspernatur.
Itaque quasi voluptatibus nesciunt accusantium repellat beatae, culpa delectus vitae fugit reprehenderit quidem in temporibus consectetur minus, odio iusto eum illum, nulla ad consequuntur natus molestias. Tempore iste cumque in.
Enim voluptatum harum quidem molestiae, sint velit. Ad, praesentium perspiciatis! Ea eius sit maiores atque repellat dolore. Nobis aspernatur assumenda ratione quod, repudiandae nulla quisquam facere tempore molestias minima non?
Enim neque eius tempora consequuntur nulla rem debitis esse eum, ratione, expedita quae odit iure! Eius alias iste fugit autem tempora quas veniam facilis! Vel voluptatibus laudantium eos eligendi accusantium.
Numquam dolorum minus tempore alias minima, impedit ipsa libero sunt exercitationem dolore culpa, reprehenderit beatae inventore repellendus quis doloribus soluta est at expedita vel omnis obcaecati. Ducimus, rerum. Debitis, exercitationem?
Cupiditate pariatur vero optio? Ipsum ea, tempora est earum consequatur hic, at maiores, laborum iste optio cupiditate accusantium illo atque labore veniam facere temporibus quasi quod ratione quas iure! Error?
Consequuntur animi ducimus nesciunt ex aliquam, unde eveniet laudantium excepturi eligendi molestiae, necessitatibus odio, quaerat nulla. Fugiat quis laboriosam error quibusdam. Adipisci omnis quaerat magni impedit animi voluptate porro ea.</textarea
                                >
                            </div>

                            <div class="col-12">
                                <h2 class="text-primary fw-bold ms-4">Post image*</h2>
                                <h6 class="ms-4 text-muted">Please include an image</h6>
                                <label
                                    class="btn btn-outline-dark fw-bold ms-3 px-3 py-3 fs-4 rounded-4"
                                >
                                    <input type="file" class="d-none" placeholder="" />
                                    Upload Image
                                </label>

                                <h6 class="ms-4 mt-2 text-muted">PDF, PNG, JPG (5 MB)</h6>
                            </div>

                            <div class="col-md-12 d-flex py-4 w-100">
                                <button
                                    class="btn btn-primary text-light fs-5 fw-semibold rounded-4 py-3 px-5 m-auto"
                                    type="submit"
                                >
                                    Post
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Edite Profile Users End  -->
    </div>
@endsection
