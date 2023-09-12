<x-layouts.main>
    <x-slot:title>
        Edit the post
    </x-slot:title>

    <x-page-header>

    </x-page-header>

    <div class="col-lg-7 mb-5 mb-lg-0 mx-auto w-25">
        <div class="contact-form">
            <div id="success"></div>
            <form action="{{ route("post.update", ["post"=>$post->id])}}" method="POST" enctype="multipart/form-data">
                @method("PUT")
                @csrf
                <div class="form-row">
                    <div class="col-sm-12 control-group">
                        <input type="text" class="form-control p-4" name="title" placeholder="Title" value="{{ $post->title }}" />
                        @error("title")
                            <p class="help-block text-danger">{{ $message}}</p>
                        @enderror
                    </div>
                    <div class="col-sm-12 my-3 control-group">
                        <input type="file" class="form-control p-4" name="photo" placeholder="rasm" />
                        @error("photo")
                            <p class="help-block text-danger">{{ $message}}</p>
                        @enderror
                    </div>
                </div>
                <div class="control-group my-3">
                    <input type="text" class="form-control p-4" name="short_content" placeholder="Subject" value="{{$post->short_content}}" />
                        @error("short_content")
                            <p class="help-block text-danger">{{ $message}}</p>
                        @enderror
                </div>
                <div class="control-group my-3">
                    <textarea class="form-control p-4" rows="6" name="content" placeholder="Message" >{{$post->content}}</textarea>
                         @error("content")
                            <p class="help-block text-danger">{{ $message}}</p>
                        @enderror
                </div>
                <div class="d-flex justify-content-between gap-3">
                    <button class="btn btn-success py-3 px-3" type="submit" id="sendMessageButton">Send Message</button>
                    <a href="{{route("post.show", ["post"=>$post->id])}}"
                        class="btn btn-danger py-3 px-3">Cancel editing the post</a>
                </div>
            </form>
        </div>
    </div>
</x-layouts.main>
