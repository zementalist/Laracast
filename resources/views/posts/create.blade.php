@extends("layout")

@section("content")
<br><br>

<div class="row justify-content-center">
    <h1>Create Post</h1>
    <div class="col-md-8">
        {{-- <br> --}}
        <form action="/posts" method="POST" id="postForm" enctype="multipart/form-data">
            @csrf
            @error("title")
                <div class="alert alert-danger">
                    {{$message}}
                </div>
            @enderror
            <div class="form-group">
                <label for="title">Title <span class="require">*</span></label>
                <input type="text" value="{{old('title')}}" id="title" class="form-control" required name="title" />
            </div>
            @error("image")
                <div class="alert alert-danger">
                    {{$message}}
                </div>
            @enderror
            {{-- <div class="form-group">
                <label for="image">Image link</label>
                <input type="text" value="{{old('image')}}" class="form-control" name="image"/>
            </div> --}}
            <div class="form-group">
                <label for="image">Image link</label>
                <input type="file" class="form-control" name="image"/>
            </div>
            <div class="form-group">
                <label for="tags">Tags</label>
                <select name="tags[]" class="form-control" multiple>
                    @foreach($tags as $tag)
                        <option value="{{$tag->id}}" name="tags[]">{{$tag->title}}</option>
                    @endforeach
                </select>
            </div>

            @error("body")
                <div class="alert alert-danger">
                    {{$message}}
                </div>
            @enderror
            <div class="form-group">
                <label for="body">Body</label>
                <textarea id="userText" rows="5" class="form-control" required name="body">{{old("body")}}</textarea>
            </div>

            <div class="form-group">
                <input type="submit" name='post-update-form' id="post-btn" class="btn btn-primary" value='Create'>
                <!-- </button> -->
                <a href="/" class="btn btn-default">Cancel</a>
            </div>
        </form>
    </div>

</div>

@endsection