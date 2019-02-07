@extends('layouts.app')

@section('content')
    <div class="container break-word">
        <div class="row">
            <div class="col-12 text-center mb-5">
                @can('create', App\Post::class)

                <a
                    class="btn btn-success pull-right"
                    href="{{url("/posts/create")}}"
                    role="button"> new post
                </a>
                @endcan
            </div>
            <div class="col-md-2"></div>
            <div class="col-md-8 col-md-offset-2 align-content-center">
                <div class="panel-body">
                    @foreach($posts as $post)
                        <div class="jumbotron">
                            <div class="panel-heading">
                                <a href="{{url("/posts/".$post->id."/edit")}}">
                                    @can('update', $post)

                                    <span
                                       style="float: right;color: white !important;"
                                       class="badge badge-secondary left">edit</span>
                                    @endcan

                                </a>

                                <h1 class="panel-title text-center">{{$post->title}}</h1>

                            </div>
                            <div class="panel-body">
                                <p class="well">{{$post->content}}</p>
                                <a
                                    class="btn btn-primary pull-right"
                                    href="{{url("/posts/".$post->id)}}"
                                    role="button"> Show more »
                                </a>
                            </div>
                        </div>
                @endforeach

                <!-- Start Pagination -->
                    <div class="col-form-label" style="margin-left: 15%">
                        <div aria-label="Page navigation" align="center">
                            {{ $posts->links() }}
                        </div>
                    </div>
                    <!-- End Pagination -->

                </div>

            </div>
            <div class="col-md-2"></div>

        </div>

    </div>
@endsection
