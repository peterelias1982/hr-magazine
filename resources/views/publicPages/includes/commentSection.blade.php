<div class="container-fluid pb-3 g-0 justify-content-center">
    <div class="p-md-5 py-5 px-1 bg-dark text-white">
        <h2 class="fw-bold fs-2 pt-3 pb-5">Add comments</h2>
        <div class="block border border-dark border rounded-4 mt-3 bg-light">
            <div class="row d-flex text-dark">
                <div class="col-xl-2 col-md-3 col-sm-12">
                    <div class="mt-5 ms-5 rounded-circle-small">
                        <img
                            src="{{ asset('publicPages/images/w-c3.jpeg') }}"
                            class="img-fluid"
                            alt="User-Profile-Image"
                        />
                    </div>
                </div>
                <div
                    class="col-xl-10 col-md-9 col-sm-12 align-items-center ms-sm-3 ms-lg-0"
                >
                    <h3 class="mt-5 pb-2 fw-bold">Nadia S. El-Hawrani</h3>
                    <div class="row">
                        <div class="col">
                    <textarea
                        id="textArea"
                        class="form-control bg-light border-0"
                        rows="4"
                        style="width: 85%"
                    >
Lorem ipsum dolor sit amet consectetur. Vestibulum sit sollicitudin elementum ut lectus netus. A diam nibh mauriset turpis at aliquet non. Nisl tristique ante ut maecenas nulla non. At lacus aliquam eget quis. Tincidunt.
</textarea
>
                        </div>
                    </div>

                    <div class="container">
                        <div class="row">
                            <div
                                class="col-xl-10 col-md-9 col-sm-12 align-items-center"
                            >
                                <div class="d-flex flex-column align-items-center mt-3">
                        <span
                            class="d-inline-flex justify-content-center bg-dark text-white"
                            style="width: 100%; height: 1px"
                        ></span>
                                    <div
                                        class="d-flex flex-column flex-md-row justify-content-between align-items-center w-100 mt-2"
                                    >
                                        <div
                                            class="d-flex align-items-center me-0 me-md-5 mb-3 mb-md-0"
                                        ></div>
                                        <button
                                            id="btn-comment"
                                            type="submit"
                                            class="btn btn-lg btn-primary text-white rounded-pill px-4 m-3"
                                        >
                                            Add
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row d-flex mx-3">
            <div class="col-xl-2 col-md-3 col-sm-12">
                <div class="mt-5 ms-3 rounded-circle-small">
                    <img
                        src="{{ asset('publicPages/images/w-c4.jpeg') }}"
                        class="img-fluid"
                        alt="User-Profile-Image"
                    />
                </div>
            </div>

            <div class="col-xl-10 col-md-9 col-sm-12 align-items-center">
                <div class="d-flex flex-column align-items-center">
                    <div
                        class="d-flex justify-content-between align-items-center w-100 mt-2"
                    >
                        <div class="d-flex align-items-center me-5">
                            <h3 class="mt-5 pb-2 fw-bold">Maged S. El-Hawrani</h3>
                        </div>
                        <div
                            class="btn border-0 dropdown bg-dark"
                            id="dropdownComment-1"
                            data-bs-toggle="dropdown"
                            aria-expanded="false"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="32"
                                height="32"
                                fill="#FFF"
                                class="bi bi-three-dots-vertical me-4"
                                viewBox="0 0 16 16"
                            >
                                <path
                                    d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0"
                                />
                            </svg>
                            <ul
                                class="dropdown-menu dropdown-menu-dark p-1"
                                aria-labelledby="dropdownComment-1"
                            >
                                <li
                                    class="py-2 border-bottom btn rounded-0 d-block text-decoration-underline"
                                    onclick="edit('comment-1')"
                                >
                                    Edit
                                </li>
                                <li class="py-2 btn d-block"><a href="#">Delete</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <form action="">
                    <div id="comment-1" class="position-relative">
                  <textarea
                      class="form-control bg-dark fs-4 fw-normal px-3 text-white border-0"
                      rows="4"
                      disabled
                  >
Lorem ipsum dolor sit amet consectetur. Vestibulum sit sollicitudin elementum ut lectus netus. A diam nibh mauriset turpis at aliquet non. Nisl tristique ante ut maecenas nulla non. At lacus aliquam eget quis. Tincidunt.
</textarea
>
                        <div
                            class="button-wrapper position-absolute end-0 bottom-0 d-none"
                        >
                            <button
                                id="btn-comment"
                                class="btn btn-md btn-primary text-white rounded-pill px-4"
                            >
                                Edit
                            </button>
                            <button
                                id="btn-comment"
                                type="cancel"
                                class="btn btn-md btn-light text-dark rounded-pill px-3"
                            >
                                Cancel
                            </button>
                        </div>
                    </div>
                </form>
                <div class="d-flex flex-column align-items-center">
                <span
                    class="d-inline-flex justify-content-center bg-light me-5 mt-3"
                    style="width: 95%; height: 1px"
                ></span>
                    <div
                        class="d-flex justify-content-between align-items-center w-100 mt-2"
                    >
                        <div
                            class="d-flex align-items-center me-5 btn btn-comment"
                            onclick="toggleReplyBox('replyBox')"
                        >
                            <div class="actions">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="32"
                                    height="32"
                                    fill="currentColor"
                                    class="bi bi-chat-dots"
                                    viewBox="0 0 16 16"
                                >
                                    <path
                                        d="M5 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0m4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0m3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2"
                                    />
                                    <path
                                        d="m2.165 15.803.02-.004c1.83-.363 2.948-.842 3.468-1.105A9 9 0 0 0 8 15c4.418 0 8-3.134 8-7s-3.582-7-8-7-8 3.134-8 7c0 1.76.743 3.37 1.97 4.6a10.4 10.4 0 0 1-.524 2.318l-.003.011a11 11 0 0 1-.244.637c-.079.186.074.394.273.362a22 22 0 0 0 .693-.125m.8-3.108a1 1 0 0 0-.287-.801C1.618 10.83 1 9.468 1 8c0-3.192 3.004-6 7-6s7 2.808 7 6-3.004 6-7 6a8 8 0 0 1-2.088-.272 1 1 0 0 0-.711.074c-.387.196-1.24.57-2.634.893a11 11 0 0 0 .398-2"
                                    />
                                </svg>
                                <a class="replyicon text-light ms-2">Reply</a>
                            </div>
                        </div>
                    </div>

                    <div
                        id="replyBox"
                        class="block m-2 replyBox"
                        style="display: none; width: 90%"
                    >
                        <!-- reply box content -->
                        <textarea
                            id="commentinput"
                            class="form-control"
                            rows="4"
                        ></textarea>
                        <button
                            class="btn btn-lg btn-primary text-white rounded-pill px-4 m-3"
                        >
                            Reply
                        </button>
                    </div>

                    <div id="commentBox" class="block w-100">
                        <!-- comments box content -->
                    </div>
                </div>
            </div>
        </div>
        <div class="row d-flex justify-content-center mx-3">
            <div class="col-xl-2 col-md-3 col-sm-10">
                <div class="mt-5 ms-3 rounded-circle-small">
                    <img
                        src="{{ asset('publicPages/images/w-c5.jpeg') }}"
                        class="img-fluid"
                        alt="User-Profile-Image"
                    />
                </div>
            </div>

            <div class="col-xl-8 col-md-9 col-sm-10 align-items-center">
                <form action="">
                    <div class="d-flex flex-column align-items-center">
                        <div
                            class="d-flex justify-content-between align-items-center w-100 mt-2"
                        >
                            <div class="d-flex align-items-center me-5">
                                <h3 class="mt-5 pb-2 fs-4">Maged S. El-Hawrani</h3>
                            </div>
                            <div
                                class="btn border-0 dropdown bg-dark"
                                id="dropdownComment-2"
                                data-bs-toggle="dropdown"
                                aria-expanded="false"
                            >
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="32"
                                    height="32"
                                    fill="#FFF"
                                    class="bi bi-three-dots-vertical me-4"
                                    viewBox="0 0 16 16"
                                >
                                    <path
                                        d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0"
                                    />
                                </svg>
                                <ul
                                    class="dropdown-menu dropdown-menu-dark p-1"
                                    aria-labelledby="dropdownComment-2"
                                >
                                    <li
                                        class="py-2 border-bottom btn rounded-0 d-block text-decoration-underline"
                                        onclick="edit('comment-2')"
                                    >
                                        Edit
                                    </li>
                                    <li class="py-2 btn d-block"><a href="#">Delete</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div id="comment-2" class="position-relative">
                  <textarea
                      class="form-control bg-dark fs-4 fw-normal px-3 text-white border-0"
                      rows="4"
                      disabled
                  >
Lorem ipsum dolor sit amet consectetur. Vestibulum sit sollicitudin elementum ut lectus netus. A diam nibh mauriset turpis at aliquet non. Nisl tristique ante ut maecenas nulla non. At lacus aliquam eget quis. Tincidunt.
</textarea
>
                        <div
                            class="button-wrapper position-absolute end-0 bottom-0 d-none"
                        >
                            <button
                                id="btn-comment"
                                class="btn btn-md btn-primary text-white rounded-pill px-4"
                            >
                                Edit
                            </button>
                            <button
                                id="btn-comment"
                                type="cancel"
                                class="btn btn-md btn-light text-dark rounded-pill px-3"
                            >
                                Cancel
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row d-flex mx-3">
            <div class="col-xl-2 col-md-3 col-sm-12">
                <div class="mt-5 ms-3 rounded-circle-small">
                    <img
                        src="{{ asset('publicPages/images/w-c6.jpeg') }}"
                        class="img-fluid"
                        alt="User-Profile-Image"
                    />
                </div>
            </div>

            <div class="col-xl-10 col-md-9 col-sm-12 align-items-center">
                <div class="d-flex flex-column align-items-center">
                    <div
                        class="d-flex justify-content-between align-items-center w-100 mt-2"
                    >
                        <div class="d-flex align-items-center me-5">
                            <h3 class="mt-5 pb-2 fw-bold">Maged S. El-Hawrani</h3>
                        </div>
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="32"
                            height="32"
                            fill="currentColor"
                            class="bi bi-three-dots-vertical me-4"
                            viewBox="0 0 16 16"
                        >
                            <path
                                d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0"
                            />
                        </svg>
                    </div>
                </div>
                <p class="fs-4 fw-normal px-3">
                    Lorem ipsum dolor sit amet consectetur. Vestibulum sit
                    sollicitudin elementum ut lectus netus. A diam nibh mauris et
                    turpis at aliquet non. Nisl tristique ante ut maecenas nulla
                    non. At lacus aliquam eget quis. Tincidunt.
                </p>
                <div class="d-flex flex-column align-items-center">
                <span
                    class="d-inline-flex justify-content-center bg-light me-5 mt-3"
                    style="width: 95%; height: 1px"
                ></span>
                    <div
                        class="d-flex justify-content-between align-items-center w-100 mt-2"
                    >
                        <div
                            class="d-flex align-items-center me-5 btn btn-comment"
                            onclick="toggleReplyBox('replyBox1')"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="32"
                                height="32"
                                fill="currentColor"
                                class="bi bi-chat-dots"
                                viewBox="0 0 16 16"
                            >
                                <path
                                    d="M5 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0m4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0m3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2"
                                />
                                <path
                                    d="m2.165 15.803.02-.004c1.83-.363 2.948-.842 3.468-1.105A9 9 0 0 0 8 15c4.418 0 8-3.134 8-7s-3.582-7-8-7-8 3.134-8 7c0 1.76.743 3.37 1.97 4.6a10.4 10.4 0 0 1-.524 2.318l-.003.011a11 11 0 0 1-.244.637c-.079.186.074.394.273.362a22 22 0 0 0 .693-.125m.8-3.108a1 1 0 0 0-.287-.801C1.618 10.83 1 9.468 1 8c0-3.192 3.004-6 7-6s7 2.808 7 6-3.004 6-7 6a8 8 0 0 1-2.088-.272 1 1 0 0 0-.711.074c-.387.196-1.24.57-2.634.893a11 11 0 0 0 .398-2"
                                />
                            </svg>
                            <a class="replyicon text-light ms-2">Reply</a>
                        </div>
                    </div>
                </div>
                <div
                    id="replyBox1"
                    class="block m-2 replyBox"
                    style="display: none; width: 90%"
                >
                    <!-- reply box content -->
                    <textarea
                        id="commentinput"
                        class="form-control"
                        rows="4"
                    ></textarea>
                    <button
                        class="btn btn-lg btn-primary text-white rounded-pill px-4 m-3"
                    >
                        Reply
                    </button>
                </div>

                <div id="commentBox" class="block w-100">
                    <!-- comments box content -->
                </div>
            </div>
        </div>
        <div class="row d-flex justify-content-center mx-3">
            <div class="col-xl-2 col-md-3 col-sm-10">
                <div class="mt-5 ms-3 rounded-circle-small">
                    <img
                        src="{{ asset('publicPages/images/w-c7.jpeg') }}"
                        class="img-fluid"
                        alt="User-Profile-Image"
                    />
                </div>
            </div>

            <div class="col-xl-8 col-md-9 col-sm-10 align-items-center">
                <div class="d-flex flex-column align-items-center">
                    <div
                        class="d-flex justify-content-between align-items-center w-100 mt-2"
                    >
                        <div class="d-flex align-items-center me-5">
                            <h3 class="mt-5 pb-2 fs-4">Maged S. El-Hawrani</h3>
                        </div>
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="32"
                            height="32"
                            fill="currentColor"
                            class="bi bi-three-dots-vertical me-4"
                            viewBox="0 0 16 16"
                        >
                            <path
                                d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0"
                            />
                        </svg>
                    </div>
                </div>
                <p class="fs-5 fw-normal px-3">
                    Lorem ipsum dolor sit amet consectetur. Vestibulum sit
                    sollicitudin elementum ut lectus netus. A diam nibh mauris et
                    turpis at aliquet non. Nisl tristique ante ut maecenas nulla
                    non. At lacus aliquam eget quis. Tincidunt.
                </p>
            </div>
        </div>
        <div class="row d-flex justify-content-center mx-3">
            <div class="col-xl-2 col-md-3 col-sm-10">
                <div class="mt-5 ms-3 rounded-circle-small">
                    <img
                        src="{{ asset('publicPages/images/w-c8.jpeg') }}"
                        class="img-fluid"
                        alt="User-Profile-Image"
                    />
                </div>
            </div>

            <div class="col-xl-8 col-md-9 col-sm-10 align-items-center">
                <div class="d-flex flex-column align-items-center">
                    <div
                        class="d-flex justify-content-between align-items-center w-100 mt-2"
                    >
                        <div class="d-flex align-items-center me-5">
                            <h3 class="mt-5 pb-2 fs-4">Maged S. El-Hawrani</h3>
                        </div>
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="32"
                            height="32"
                            fill="currentColor"
                            class="bi bi-three-dots-vertical me-4"
                            viewBox="0 0 16 16"
                        >
                            <path
                                d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0"
                            />
                        </svg>
                    </div>
                </div>
                <p class="fs-4 fw-normal px-3">
                    Lorem ipsum dolor sit amet consectetur. Vestibulum sit
                    sollicitudin elementum ut lectus netus. A diam nibh mauris et
                    turpis at aliquet non. Nisl tristique ante ut maecenas nulla
                    non. At lacus aliquam eget quis. Tincidunt.
                </p>
            </div>
        </div>
        <div class="row d-flex mx-3">
            <div class="col-xl-2 col-md-3 col-sm-12">
                <div class="mt-5 ms-3 rounded-circle-small">
                    <img
                        src="{{ asset('publicPages/images/w-c9.jpeg') }}"
                        class="img-fluid"
                        alt="User-Profile-Image"
                    />
                </div>
            </div>

            <div class="col-xl-10 col-md-9 col-sm-12 align-items-center">
                <div class="d-flex flex-column align-items-center">
                    <div
                        class="d-flex justify-content-between align-items-center w-100 mt-2"
                    >
                        <div class="d-flex align-items-center me-5">
                            <h3 class="mt-5 pb-2 fw-bold">Maged S. El-Hawrani</h3>
                        </div>
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="32"
                            height="32"
                            fill="currentColor"
                            class="bi bi-three-dots-vertical me-4"
                            viewBox="0 0 16 16"
                        >
                            <path
                                d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0"
                            />
                        </svg>
                    </div>
                </div>
                <p class="fs-4 fw-normal px-3">
                    Lorem ipsum dolor sit amet consectetur. Vestibulum sit
                    sollicitudin elementum ut lectus netus. A diam nibh mauris et
                    turpis at aliquet non. Nisl tristique ante ut maecenas nulla
                    non. At lacus aliquam eget quis. Tincidunt.
                </p>
                <div class="d-flex flex-column align-items-center">
                <span
                    class="d-inline-flex justify-content-center bg-light me-5 mt-3"
                    style="width: 95%; height: 1px"
                ></span>
                    <div
                        class="d-flex justify-content-between align-items-center w-100 mt-2"
                    >
                        <div
                            class="d-flex align-items-center me-5 btn btn-comment"
                            onclick="toggleReplyBox('replyBox2')"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="32"
                                height="32"
                                fill="currentColor"
                                class="bi bi-chat-dots"
                                viewBox="0 0 16 16"
                            >
                                <path
                                    d="M5 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0m4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0m3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2"
                                />
                                <path
                                    d="m2.165 15.803.02-.004c1.83-.363 2.948-.842 3.468-1.105A9 9 0 0 0 8 15c4.418 0 8-3.134 8-7s-3.582-7-8-7-8 3.134-8 7c0 1.76.743 3.37 1.97 4.6a10.4 10.4 0 0 1-.524 2.318l-.003.011a11 11 0 0 1-.244.637c-.079.186.074.394.273.362a22 22 0 0 0 .693-.125m.8-3.108a1 1 0 0 0-.287-.801C1.618 10.83 1 9.468 1 8c0-3.192 3.004-6 7-6s7 2.808 7 6-3.004 6-7 6a8 8 0 0 1-2.088-.272 1 1 0 0 0-.711.074c-.387.196-1.24.57-2.634.893a11 11 0 0 0 .398-2"
                                />
                            </svg>
                            <a class="replyicon text-light ms-2">Reply</a>
                        </div>
                    </div>
                </div>
                <div
                    id="replyBox2"
                    class="block m-2 replyBox"
                    style="display: none; width: 90%"
                >
                    <!-- reply box content -->
                    <textarea
                        id="commentinput"
                        class="form-control"
                        rows="4"
                    ></textarea>
                    <button
                        class="btn btn-lg btn-primary text-white rounded-pill px-4 m-3"
                    >
                        Reply
                    </button>
                </div>

                <div id="commentBox" class="block w-100">
                    <!-- comments box content -->
                </div>
            </div>
        </div>
    </div>
</div>
