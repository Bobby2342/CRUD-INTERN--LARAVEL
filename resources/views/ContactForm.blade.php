@include('header')
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<h1>Contact us here</h1>
<div class="container mt-4 mb-4 mr-6">
<form action="{{route('submitContact')}}" method="POST">
    @csrf
    <div class="form-group">
        <label for="">Name:</label>
        <input type="text" name="name" id="name" class="form-control" placeholder="" aria-describedby="helpId">
        <small id="helpId" class="text-muted">Help text</small>
      </div>
    <div class="form-group">
        <label for="">Email</label>
        <input type="email" name="email" id="email" class="form-control" placeholder="" aria-describedby="helpId">
        <small id="helpId" class="text-muted">Help text</small>
      </div>

      <div class="form-group">
        <label for="">  Phone Numbers:</label>
        <input type="text" name="phone" id="phone" class="form-control" placeholder="" aria-describedby="helpId">
        <small id="helpId" class="text-muted">Help text</small>
      </div>
    <div class="form-group">
        <label for="">Message</label>
        <textarea type="text" name="message" id="message" cols="30" rows="10" placeholder="Enter your message here"></textarea>
      </div>
    <div class="form-group">
                <button type="submit" class="btn btn-primary">Send Message</button>
      </div>
    </form>

</div>
