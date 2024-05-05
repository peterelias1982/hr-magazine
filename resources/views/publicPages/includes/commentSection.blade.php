<div class="container-fluid pb-3 g-0 justify-content-center" id="commentSection">
    <div class="p-md-5 py-5 px-1 bg-dark text-white">
        <h2 class="fw-bold fs-2 pt-3 pb-5">Add comments</h2>
        {{--   current auth user comment     --}}
        @auth
            <form action="{{route('comments.store')}}" method="POST" id="createComment">
                @csrf
                <div class="block border border-dark border-3 rounded-4 mt-3 bg-light">
                    <div class="row d-flex text-dark">
                        <div class="col-xl-2 col-md-3 col-sm-12">
                            <div class="mt-5 ms-5 rounded-circle-small">
                                <img
                                    src="{{ asset('assets/images/users/'.Auth::user()->image) }}"
                                    class="img-fluid"
                                    alt="User-Profile-Image"
                                />
                            </div>
                        </div>
                        <div
                            class="col-xl-10 col-md-9 col-sm-12 align-items-center ms-sm-3 ms-lg-0"
                        >
                            <h3 class="mt-5 pb-2 fw-bold">{{Auth::user()->firstName}} {{Auth::user()->secondName}}</h3>
                            <div class="row">
                                <div class="col">
                                    <input type="hidden" name="article_id" value="{{$articleData->articleId}}">
                                    <input type="hidden" name="category_id" value="{{$categoryData->id}}">
                                    <textarea
                                        id="textArea"
                                        class="form-control bg-light rounded-3 border-4 "
                                        rows="5"
                                        name="content"
                                        style="width: 85%"
                                    ></textarea>
                                </div>
                            </div>

                            <div class="container">
                                <div class="row">
                                    <div
                                        class="col-xl-10 col-md-9 col-sm-12 align-items-center"
                                    >
                                        <div class="d-flex flex-column align-items-center mt-0">

                                            <div
                                                class="d-flex flex-column flex-md-row justify-content-between align-items-center w-100 mt-2">
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
                            </form>
                        </div>
                    </div>
                </div>
            </form>
        @endauth
        {{--    end of user comment    --}}
        @foreach($comments as $comment)
            {{--  comment   --}}
            <div class="row d-flex mx-3 {{$comment->is_deleted? 'deleted':''}}">
                <div class="col-xl-2 col-md-3 col-sm-12">
                    <div class="mt-5 ms-3 rounded-circle-small">
                        <img
                            src="{{ asset('assets/images/users/'. $comment->image) }}"
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
                                <h3 class="mt-5 pb-2 fw-bold">{{$comment->firstName}} {{$comment->secondName}}</h3>
                            </div>
                            @auth
                                @can('isOwner', ['userId' => $comment->userId])
                                    <div
                                        class="btn border-0 dropdown bg-dark"
                                        id="dropdownComment-{{$comment->commentId}}"
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
                                            aria-labelledby="dropdownComment-{{$comment->commentId}}"
                                        >
                                            <li
                                                class="py-2 border-bottom btn rounded-0 d-block text-decoration-underline"
                                                onclick="edit('comment-{{$comment->commentId}}')"
                                            >
                                                Edit
                                            </li>
                                            <form action="{{route('comments.destroy', $comment->commentId)}}"
                                                  method="POST" id="delete-{{$comment->commentId}}">
                                                <li class="btn py-2 d-block">

                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit"
                                                            class="text-primary bg-black text-decoration-underline border-0 mx-auto btn d-block"
                                                            onclick="alert('Are you sure, you want to delete this comment?'); document.getElementById('delete-{{$comment->commentId}}').submit()"
                                                    >
                                                        Delete
                                                    </button>
                                                </li>
                                            </form>
                                        </ul>
                                    </div>
                                @elsecan('isAdmin')
                                    <div
                                        class="btn border-0 dropdown bg-dark"
                                        id="dropdownComment-{{$comment->commentId}}"
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
                                            aria-labelledby="dropdownComment-{{$comment->commentId}}"
                                        >
                                            <form action="{{route('comments.destroy', $comment->commentId)}}"
                                                  method="POST" id="delete-{{$comment->commentId}}">
                                                <li class="btn py-2 d-block">

                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit"
                                                            class="text-primary bg-black text-decoration-underline border-0 mx-auto btn d-block"
                                                            onclick="alert('Are you sure, you want to delete this comment?'); document.getElementById('delete-{{$comment->commentId}}').submit()"
                                                    >
                                                        Delete
                                                    </button>
                                                </li>
                                            </form>
                                        </ul>
                                    </div>
                                @endcan
                            @endguest
                        </div>
                    </div>
                    <form action="{{route('comments.update', $comment->commentId)}}" method="POST">
                        @csrf
                        @method('put')
                        <input type="hidden" name="article_id" value="{{$articleData->articleId}}">
                        <input type="hidden" name="category_id" value="{{$categoryData->id}}">
                        <div id="comment-{{$comment->commentId}}" class="position-relative">
                  <textarea
                      class="form-control bg-dark fs-4 fw-normal px-3 text-white border-0"
                      disabled
                      name="content"
                      style="height: auto"
                  >{{$comment->content}}</textarea>
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
                                @auth
                                    onclick="toggleReplyBox('replyBox-{{$comment->commentId}}')"
                                @endauth
                            >
                                <div class="actions">
                                    <a @guest href="{{route('login')}}" @endguest >
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
                                        <span class="replyicon text-light ms-2">Reply</span></a>
                                </div>
                            </div>
                        </div>

                        <div
                            id="replyBox-{{$comment->commentId}}"
                            class="block m-2 replyBox"
                            style="display: none; width: 90%"
                        >
                            <!-- reply box content -->
                            <form action="{{route('comments.store')}}" method="POST">
                                @csrf
                                <input type="hidden" name="article_id" value="{{$articleData->articleId}}">
                                <input type="hidden" name="category_id" value="{{$categoryData->id}}">
                                <input type="hidden" name="parentComment" value="{{$comment->commentId}}">
                                <textarea
                                    class="form-control"
                                    name="content"
                                ></textarea>
                                <button class="btn btn-lg btn-primary text-white rounded-pill px-4 m-3" type="submit">
                                    Reply
                                </button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
            {{--  end of comment  --}}
            @foreach($comment->replies as $reply)
                {{--   reply   --}}
                <div class="row d-flex justify-content-center mx-3 {{($comment->is_deleted || $reply->is_deleted)? 'deleted':''}}">
                    <div class="col-xl-2 col-md-3 col-sm-10">
                        <div class="mt-5 ms-3 rounded-circle-small">
                            <img
                                src="{{ asset('assets/images/users/' .  $reply->image) }}"
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
                                    <h3 class="mt-5 pb-2 fs-4">{{$reply->firstName}} {{$reply->secondName}}</h3>
                                </div>
                                @auth
                                    @can('isOwner', ['userId'=> $reply->userId])
                                        <div
                                            class="btn border-0 dropdown bg-dark"
                                            id="dropdownComment-{{$reply->commentId}}"
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
                                                aria-labelledby="dropdownComment-{{$reply->commentId}}"
                                            >
                                                <li
                                                    class="py-2 border-bottom btn rounded-0 d-block text-decoration-underline"
                                                    onclick="edit('comment-{{$reply->commentId}}')"
                                                >
                                                    Edit
                                                </li>
                                                <li class="btn py-2 d-block">
                                                    <form action="{{route('comments.destroy', $reply->commentId)}}" method="POST" id="delete-{{$reply->commentId}}">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit"
                                                                class="text-primary bg-black text-decoration-underline border-0 mx-auto btn d-block"
                                                                onclick="alert('Are you sure, you want to delete this comment?'); document.getElementById('delete-{{$reply->commentId}}').submit()"
                                                                form="delete-{{$reply->commentId}}"
                                                        >
                                                            Delete
                                                        </button>
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                    @elsecan('isAdmin')
                                        <div
                                            class="btn border-0 dropdown bg-dark"
                                            id="dropdownComment-{{$reply->commentId}}"
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
                                                aria-labelledby="dropdownComment-{{$reply->commentId}}"
                                            >
                                                <form action="{{route('comments.destroy', $reply->commentId)}}"
                                                      method="POST" id="delete-{{$reply->commentId}}">
                                                    <li class="btn py-2 d-block">

                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit"
                                                                class="text-primary bg-black text-decoration-underline border-0 mx-auto btn d-block"
                                                                onclick="alert('Are you sure, you want to delete this comment?'); document.getElementById('delete-{{$reply->commentId}}').submit()"
                                                        >
                                                            Delete
                                                        </button>
                                                    </li>
                                                </form>
                                            </ul>
                                        </div>
                                    @endcan
                                @endauth
                            </div>
                        </div>
                        <div id="comment-{{$reply->commentId}}" class="position-relative">
                            <form action="{{route('comments.update', $reply->commentId)}}" method="POST">
                                @csrf
                                @method('put')
                                <input type="hidden" name="article_id" value="{{$articleData->articleId}}">
                                <input type="hidden" name="category_id" value="{{$categoryData->id}}">
                                <input type="hidden" name="parentComment" value="{{$comment->commentId}}">
                                <textarea
                                    class="form-control bg-dark fs-4 fw-normal px-3 text-white border-0"
                                    name="content"
                                    disabled>{{$reply->content}}</textarea>
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
                            </form>
                        </div>
                    </div>
                </div>
                {{--  end of reply   --}}
            @endforeach
        @endforeach
    </div>
</div>
<script>
    let textAreasInComments = document.querySelectorAll('#commentSection textarea');
    textAreasInComments.forEach(textarea => {
        textarea.style.height = 'auto';
        if (textarea.scrollHeight !== 0)
            textarea.style.height = (textarea.scrollHeight) + 'px';
    });
</script>
