<x-layouts.main>
    <x-slot:title>
        Create a post
    </x-slot:title>

    <x-page-header>
        Create a post
    </x-page-header>
    <div class="col-lg-7 mb-5 mb-lg-0 mx-auto w-25">
        <div class="contact-form">
            <div id="success"></div>
            <form action="{{ route("post.store")}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-row">
                    <div class="col-sm-12 control-group">
                        <input type="text" class="form-control p-4" name="title" placeholder="Title" value="{{old("title")}}" />
                        @error("title")
                            <p class="help-block text-danger">{{ $message}}</p>
                        @enderror
                    </div>
                    <div class="col-sm-12 my-3 control-group">
                        <label>Categories: </label><br>
                        @foreach ($categories as $category)
                            <input type="radio" class="btn-check" name="category_id" id="category-{{ $category->id }}" value="{{ $category->id }}" autocomplete="off">
                            <label class="btn btn-outline-primary" for="category-{{ $category->id }}">{{ $category->name }}</label>
                        @endforeach
                    </div>
                    <div class="col-sm-12 my-3 control-group">
                        <label>Tags: </label><br>
                        @foreach ($tags as $tag)
                            <input type="checkbox" class="btn-check" name="tags[]" id="tag-{{ $tag->id }}" value="{{ $tag->id }}" autocomplete="off">
                            <label class="btn btn-outline-primary" for="tag-{{ $tag->id }}">{{ $tag->name }}</label>
                        @endforeach
                    </div>
                    <div class="col-sm-12 my-3 control-group">
                        <input type="file" class="form-control p-4" name="photo" placeholder="rasm" />
                        @error("photo")
                            <p class="help-block text-danger">{{ $message}}</p>
                        @enderror
                    </div>
                </div>
                <div class="control-group my-3">
                    <input type="text" class="form-control p-4" name="short_content" placeholder="Subject" value="{{old("short_content")}}" />
                        @error("short_content")
                            <p class="help-block text-danger">{{ $message}}</p>
                        @enderror
                </div>
                <div class="control-group my-3">
                    <textarea class="form-control p-4" rows="6" name="content" placeholder="Message" >{{old("content")}}</textarea>
                         @error("content")
                            <p class="help-block text-danger">{{ $message}}</p>
                        @enderror
                </div>
                <div>
                    <button class="btn btn-primary btn-block py-3 px-5" type="submit" id="sendMessageButton">Send Message</button>
                </div>
            </form>
        </div>
    </div>
</x-layouts.main>
