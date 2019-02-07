<div class="form-group">
    <label for="title">
        <span class="capital-first-letter">title</span>
        <code><span class="capital-first-letter">required</span>. at least 3 characters and at most 70 characters</code>
    </label>
    <input
            id="title"
            value="@if(old('title')){{old('title')}}@elseif(isset($post)){{$post->title}}@endif"
            name="title"
            type="text"
            class="form-control"
            placeholder="Enter title..."
            required minlength=3 maxlength=70 />
    <span id="title-feedback" class="help-block"></span>
</div>

<div class="form-group">
    <label for="content">
        <span class="capital-first-letter">content</span>
        <code><span class="capital-first-letter">required</span>. at least 100 characters</code>
    </label>
    <textarea
            id="content"
            name="content"
            class="form-control"
            rows="7"
            placeholder="Enter content..."
            required minlength=100>@if(old('content')){{old('content')}}@elseif(isset($post)){{$post->content}}@endif</textarea>
    <span id="content-feedback" class="help-block"></span>
</div>


<div class="form-group">
    <button type="submit" class="btn btn-primary capital-first-letter" id="submit-btn">ok</button>
    <button type="reset" value="Reset" class="btn btn-danger capital-first-letter">reset</button>
    <a class="btn btn-warning capital-first-letter" href="{{url("/posts/")}}">cancel</a>
</div>

