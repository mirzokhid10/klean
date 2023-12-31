<x-layouts.main>
    <x-slot:title>
        Posts
    </x-slot:title>

    <x-page-header>
        Posts
    </x-page-header>

    <!-- Detail Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    @auth
                        @canany(["update", "delete"], $post)
                            <div class="text-right d-flex justify-content-between">
                                <div class="d-flex mb-2">
                                    @foreach ($post->tags as $tag)
                                    <a class="text-secondary text-uppercase font-weight-medium" href="">{{ $tag->name }}</a>
                                    <span class="text-primary px-2">|</span>
                                    @endforeach
                                    <a class="text-secondary text-uppercase font-weight-medium" href="">{{ $post->created_at }}</a>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <a class="btn btn-sm btn-outline-secondary mx-3" href="{{ route("post.edit", ["post"=> $post->id]) }}">Edit</a>
                                    <form action="{{ route("post.destroy", ["post"=> $post->id]) }}" method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete this post?');">
                                        @csrf
                                        @method("DELETE")
                                        <button type="submit" class="btn btn-sm btn-outline-danger" >Remove</button>
                                    </form>
                                </div>
                            </div>
                        @endcanany
                    @endauth
                    <div class="mb-5">
                        <h1 class="section-title mb-3">{{$post->title}}</h1>
                    </div>

                    <div class="mb-5">
                        <img class="img-fluid rounded w-100 mb-4" src="{{ asset("storage/".$post->photo)}}" alt="Image">
                        <p>Sadipscing labore amet rebum est et justo gubergren. Et eirmod ipsum sit diam ut magna lorem.
                            Nonumy vero labore lorem sanctus rebum et lorem magna kasd, stet amet magna accusam
                            consetetur
                            eirmod. Kasd accusam sit ipsum sadipscing et at at sanctus et. Ipsum sit gubergren dolores
                            et,
                            consetetur justo invidunt at et aliquyam ut et vero clita. Diam sea sea no sed dolores diam
                            nonumy, gubergren sit stet no diam kasd vero.</p>
                        <p>Voluptua est takimata stet invidunt sed rebum nonumy stet, clita aliquyam dolores vero stet
                            consetetur elitr takimata rebum sanctus. Sit sed accusam stet sit nonumy kasd diam dolores,
                            sanctus lorem kasd duo dolor dolor vero sit et. Labore ipsum duo sanctus amet eos et.
                            Consetetur
                            no sed et aliquyam ipsum justo et, clita lorem sit vero amet amet est dolor elitr, stet et
                            no
                            diam sit. Dolor erat justo dolore sit invidunt.</p>
                        <h2 class="mb-4">Est dolor lorem et ea</h2>
                        <img class="img-fluid rounded w-50 float-left mr-4 mb-3" src="/img/blog-1.jpg" alt="Image">
                        <p>Diam dolor est labore duo invidunt ipsum clita et, sed et lorem voluptua tempor invidunt at
                            est
                            sanctus sanctus. Clita dolores sit kasd diam takimata justo diam lorem sed. Magna amet sed
                            rebum
                            eos. Clita no magna no dolor erat diam tempor rebum consetetur, sanctus labore sed nonumy
                            diam
                            lorem amet eirmod. No at tempor sea diam kasd, takimata ea nonumy elitr sadipscing gubergren
                            erat. Gubergren at lorem invidunt sadipscing rebum sit amet ut ut, voluptua diam dolores at
                            sadipscing stet. Clita dolor amet dolor ipsum vero ea ea eos. Invidunt sed diam dolores
                            takimata
                            dolor dolore dolore sit. Sit ipsum erat amet lorem et, magna sea at sed et eos. Accusam
                            eirmod
                            kasd lorem clita sanctus ut consetetur et. Et duo tempor sea kasd clita ipsum et. Takimata
                            kasd
                            diam justo est eos erat aliquyam et ut. Ea sed sadipscing no justo et eos labore, gubergren
                            ipsum magna dolor lorem dolore, elitr aliquyam takimata sea kasd dolores diam, amet et est
                            accusam labore eirmod vero et voluptua. Amet labore clita duo et no. Rebum voluptua magna
                            eos
                            magna, justo gubergren labore sit voluptua eos.</p>
                        <h3 class="mb-4">Est dolor lorem et ea</h3>
                        <img class="img-fluid rounded w-50 float-right ml-4 mb-3" src="/img/blog-2.jpg" alt="Image">
                        <p>Diam dolor est labore duo invidunt ipsum clita et, sed et lorem voluptua tempor invidunt at
                            est
                            sanctus sanctus. Clita dolores sit kasd diam takimata justo diam lorem sed. Magna amet sed
                            rebum
                            eos. Clita no magna no dolor erat diam tempor rebum consetetur, sanctus labore sed nonumy
                            diam
                            lorem amet eirmod. No at tempor sea diam kasd, takimata ea nonumy elitr sadipscing gubergren
                            erat. Gubergren at lorem invidunt sadipscing rebum sit amet ut ut, voluptua diam dolores at
                            sadipscing stet. Clita dolor amet dolor ipsum vero ea ea eos. Invidunt sed diam dolores
                            takimata
                            dolor dolore dolore sit. Sit ipsum erat amet lorem et, magna sea at sed et eos. Accusam
                            eirmod
                            kasd lorem clita sanctus ut consetetur et. Et duo tempor sea kasd clita ipsum et. Takimata
                            kasd
                            diam justo est eos erat aliquyam et ut. Ea sed sadipscing no justo et eos labore, gubergren
                            ipsum magna dolor lorem dolore, elitr aliquyam takimata sea kasd dolores diam, amet et est
                            accusam labore eirmod vero et voluptua. Amet labore clita duo et no.</p>
                    </div>

                    <div class="mb-5">
                        <h3 class="mb-4 section-title">{{$post->comments()->count()}} Comments</h3>
                        @foreach ($post->comments as $comment)
                            <div class="media mb-4">
                                <img src="/img/user.jpg" alt="Image" class="img-fluid rounded-circle mr-3 mt-1" style="width: 45px;">
                                <div class="media-body">
                                    <h6> {{$comment->user->name}} <small><i>{{$comment->created_at}}</i></small></h6>
                                    <p>{{$comment->body}}</p>
                                    <button class="btn btn-sm btn-light">Reply</button>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="bg-light rounded p-5">
                        <h3 class="mb-4 section-title">Leave a comment</h3>
                        @auth
                            <form action="{{route('comments.store')}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="message">Message *</label>
                                    <textarea name="body" cols="30" rows="5" class="form-control"></textarea>
                                </div>
                                <input type="hidden" name="post_id" value="{{$post->id}}">
                                <div class="form-group mb-0">
                                    <input type="submit" value="Leave Comment" class="btn btn-primary">
                                </div>
                            </form>
                            @else
                            <p>You must be logged in to leave a comment. <br>
                                PLease click <a href="{{ route('login') }}">here</a> to login or
                                <a href="{{ route('register') }}">register)</a></p>
                        @endauth
                    </div>
                </div>

                <div class="col-lg-4 mt-5 mt-lg-0">
                    <div class="d-flex flex-column text-center bg-secondary rounded mb-5 py-5 px-4">
                        <img src="/img/user.jpg" class="img-fluid rounded-circle mx-auto mb-3" style="width: 100px;">
                        <h3 class="text-white mb-3">{{ $post->user->name }}</h3>
                        <p class="text-white m-0">Conset elitr erat vero dolor ipsum et diam, eos dolor lorem ipsum,
                            ipsum
                            ipsum sit no ut est. Guber ea ipsum erat kasd amet est elitr ea sit.</p>
                    </div>
                    <div class="mb-5">
                        <div class="w-100">
                            <div class="input-group">
                                <input type="text" class="form-control" style="padding: 25px;" placeholder="Keyword">
                                <div class="input-group-append">
                                    <button class="btn btn-primary px-4">Search</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-5">
                        <h3 class="mb-4 section-title">Categories</h3>
                        <ul class="list-inline m-0">
                            @foreach ($categories as $category)
                                <li class="mb-1 py-2 px-3 bg-light d-flex justify-content-between align-items-center">
                                    <a class="text-dark" href="#"><i class="fa fa-angle-right text-secondary mr-2"></i>{{$category->name}}</a>
                                    <span class="badge badge-primary badge-pill">{{$category->posts()->count()}}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="mb-5">
                        <h3 class="mb-4 section-title">Tag Cloud</h3>
                        <div class="d-flex flex-wrap m-n1">
                            @foreach ($tags as $tag)
                                <a href="" class="btn btn-outline-secondary m-1">{{$tag->name}}</a>
                            @endforeach
                        </div>
                    </div>
                    <div class="mb-5">
                        <img src="/img/blog-1.jpg" alt="" class="img-fluid rounded">
                    </div>
                    <div class="mb-5">
                        <h3 class="mb-4 section-title">Recent Post</h3>
                        @foreach ($recent_posts as $recent_post)
                            <div class="d-flex align-items-center border-bottom mb-3 pb-3">
                                <img class="img-fluid rounded" src="/img/blog-1.jpg" style="width: 80px; height: 80px; object-fit: cover;" alt="">
                                <div class="d-flex flex-column pl-3">
                                    <a class="text-dark mb-2" href="">Elitr diam amet sit elitr magna ipsum ipsum dolor</a>
                                    <div class="d-flex">
                                        <small><a class="text-secondary text-uppercase font-weight-medium" href="">Admin</a></small>
                                        <small class="text-primary px-2">|</small>
                                        <small><a class="text-secondary text-uppercase font-weight-medium" href="">Cleaning</a></small>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="mb-5">
                        <img src="/img/blog-2.jpg" alt="" class="img-fluid rounded">
                    </div>

                    <div class="mb-5">
                        <img src="/img/blog-3.jpg" alt="" class="img-fluid rounded">
                    </div>
                    <div>
                        <h3 class="mb-4 section-title">Plain Text</h3>
                        Aliquyam sed lorem stet diam dolor sed ut sit. Ut sanctus erat ea est aliquyam dolor et. Et no
                        consetetur eos labore ea erat voluptua et. Et aliquyam dolore sed erat. Magna sanctus sed eos
                        tempor
                        rebum dolor, tempor takimata clita sit et elitr ut eirmod.
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Detail End -->

</x-layouts.main>
