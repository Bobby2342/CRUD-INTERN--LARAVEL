
<section style="background-color: #f8f1f1;">
    <div class="container">
        <header>Review and Comments</header>
        @if ($comments->count() > 0)
      <div class="row d-flex justify-content-center">
        <div class="col-md-12 col-lg-10 col-xl-8">
          <div class="card">
            @foreach ($comments as $comment)

            <div class="card-body">
              <div class="d-flex flex-start align-items-center">
                <img class="rounded-circle shadow-1-strong me-3"
                  src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(19).webp" alt="avatar" width="60"
                  height="60" />
                <div>
                  <h6 class="fw-bold text-primary mb-1">{{$comment->user->name}}</h6>
                  <p class="text-muted small mb-0">
                    Shared publicly - Jan 2020
                  </p>
                </div>
              </div>

              <p class="mt-3 mb-4 pb-2">
                {{ $comment->comment_body }}
              </p>

              <div class="small d-flex justify-content-start">
                <a href="#!" class="d-flex align-items-center me-3">
                  <i class="far fa-thumbs-up me-2"></i>
                  <p class="mb-0">Like</p>
                </a>
                <a href="#!" class="d-flex align-items-center me-3">
                  <i class="far fa-comment-dots me-2"></i>
                  <p class="mb-0">Comment</p>
                </a>
                <a href="#!" class="d-flex align-items-center me-3">
                  <i class="fas fa-share me-2"></i>
                  <p class="mb-0">Share</p>
                </a>
              </div>
              @endforeach


            </div>
            <form action="{{route('commentSubmit')}}" method="post">
                @csrf
            <div class="card-footer py-3 border-0" style="background-color: #f8f9fa;">
              <div class="d-flex flex-start w-100">
                <img class="rounded-circle shadow-1-strong me-3"
                  src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(19).webp" alt="avatar" width="40"
                  height="40" />
                <div class="form-outline w-100">
                  <textarea  name="comment_body" class="form-control" id="textAreaExample" rows="4"
                    style="background: #fff;"></textarea>
                    <input type="hidden" name="product_id" value="{{ $productdetails->id }}" />

                  <label class="form-label" for="textAreaExample">Message</label>
                </div>
              </div>
              <div class="float-end mt-2 pt-1">
                <input type="submit" class="btn btn-success" value="Add Comment" />
                <button type="submit" class="btn btn-outline-primary btn-sm">Cancel</button>
              </div>
            </div>
        </form>
          </div>
        </div>
      </div>
    </div>
  </section>
