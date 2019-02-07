@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Edit a post</h2>

                <form id="post-form" role="form" action="{{ url('/posts/'.$post->id) }}" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        {{method_field('PUT')}}
                    </div>

                    @include('posts._form')

                </form>
            </div>
        </div>
    </div>




    <!-- Start Jquery -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <!-- End Jquery -->
    <!-- Start frontend validations -->
    <script src="{{ asset('js/validations.js') }}"></script>
    <!-- Start frontend validations -->
@endsection
