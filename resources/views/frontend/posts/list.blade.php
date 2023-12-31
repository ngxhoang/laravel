@extends('frontend.layouts.master')

@section('content-header')
    <div class="breadcrumb-section breadcrumb-bg-color--golden">
        <div class="breadcrumb-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h3 class="breadcrumb-title">Blog Grid - Left Sidebar</h3>
                        <div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden">
                            <nav aria-label="breadcrumb">
                                <ul>
                                    <li><a href="index.html">Home</a></li>
                                    <li><a href="blog-grid-sidebar-left.html">Blog</a></li>
                                    <li class="active" aria-current="page">Blog Grid Left Sidebar</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="blog-section">
        <div class="container">
            <div class="row flex-column-reverse flex-lg-row">
                <div class="col-lg-3">
                    <!-- Start Sidebar Area -->
                    <div class="siderbar-section" data-aos="fade-up" data-aos-delay="0">
                        <!-- Start Single Sidebar Widget -->
                        <div class="sidebar-single-widget">
                            <h6 class="sidebar-title">CATEGORIES</h6>
                            <div class="sidebar-content">
                                <ul class="sidebar-menu">
                                    @foreach ($categories as $category)
                                        <li><a
                                                href="{{ route('frontend.posts.list', $category->id) }}">{{ $category->name }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div> <!-- End Single Sidebar Widget -->

                        <!-- Start Single Sidebar Widget -->
                        <div class="sidebar-single-widget">
                            <h6 class="sidebar-title">Tags</h6>
                            <div class="sidebar-content">
                                <div class="tag-link">
                                    @foreach ($tags as $tag)
                                        <a href="#">{{ $tag->name }}</a>
                                    @endforeach
                                </div>
                            </div>
                        </div> <!-- End Single Sidebar Widget -->
                    </div> <!-- End Sidebar Area -->
                </div>
                <div class="col-lg-9">
                    <div class="blog-wrapper">
                        <div class="row mb-n6">
                            @foreach ($posts as $post)
                                <div class="col-12 mb-6">
                                    <!-- Start Product Default Single Item -->
                                    <div class="blog-list blog-list-single-item blog-color--golden" data-aos="fade-up"
                                        data-aos-delay="0">
                                        <div class="row">
                                            <div class="col-xl-5 col-md-6">
                                                <div class="image-box">
                                                    <a href="{{ route('frontend.posts.show', $post->id) }}"
                                                        class="image-link">
                                                        <img class="img-fluid"
                                                            src="/frontend/images/blog/blog-grid-home-1-img-1.jpg" alt="">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-xl-7 col-md-6">
                                                <div class="content">
                                                    <h6 class="title"><a
                                                            href="{{ route('frontend.posts.show', $post->id) }}">{{ $post->title }}</a>
                                                    </h6>
                                                    <ul class="post-meta">
                                                        <li>Người đăng : <a href="#"
                                                                class="author">{{ $post->user->name }}</a></li>
                                                        <li>ON : <a href="#"
                                                                class="date">{{ $post->created_at->format('d/m/Y') }}</a>
                                                        </li>
                                                    </ul>
                                                    <p>{{ $post->content }}</p>
                                                    <a href="{{ route('frontend.posts.show', $post->id) }}"
                                                        class="read-more-btn icon-space-left">Read More <span
                                                            class="icon"><i
                                                                class="ion-ios-arrow-thin-right"></i></span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Product Default Single Item -->
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Start Pagination -->
                    {{ $posts->links() }}
                    <!-- End Pagination -->
                </div>
            </div>
        </div>
    </div><br>
@endsection
