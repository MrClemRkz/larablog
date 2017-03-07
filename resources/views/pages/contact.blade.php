@extends('main')

@section('title', '| Contact')

@section('content')

        <div class="row">
            <div class="col-md-12">
                <h3>Contact Me</h3>
                <hr>
                <form>
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" placeholder="Email">
                  </div>
                  <div class="form-group">
                    <label for="subject">Subject</label>
                    <input class="form-control" id="subject" placeholder="Subject">
                  </div>
                  <div class="form-group">
                    <label for="message">Message</label>
                    <textarea class="form-control" id="message" placeholder="Message"></textarea>
                  </div>
                  <button type="submit" class="btn btn-success">Submit</button>
                </form>
            </div>
        </div>

@endsection

@section('scripts')
  <script type="text/javascript">
    // flash highlight on page load
    $("h3").fadeIn(100).fadeOut(100).fadeIn(100).fadeOut(100).fadeIn(100);  
  </script>
@endsection