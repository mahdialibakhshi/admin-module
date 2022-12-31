@extends('admin::layouts.master')

@section('title')
    ایجاد صفحه
@endsection

@section('description')

@endsection

@section('keywords')
    داشبورد
@endsection

@section('style')

@endsection

@section('script')
    <script>
        // Show File Name
        $('#image').change(function () {
            //get the file name
            var fileName = $(this).val();
            //replace the "Choose a file" label
            $('.custom-file-label').html(fileName);
        });


    </script>
@endsection

@section('content')
    <main id="main" class="main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="pagetitle d-flex justify-content-between">
                                        <h1>افزودن صفحه</h1>
                                        <div>
                                            <button onclick="SaveForm('save','form')" class="btn btn-sm btn-success">
                                                save
                                            </button>
                                            <a title="بازگشت" href="{{ route('admin.pages.index') }}"
                                               class="btn btn-secondary btn-sm">
                                                <i class="bi bi-arrow-bar-left"></i>
                                            </a>
                                        </div>
                                    </div><!-- End Page Title -->

                                </div>
                            </div>
                            <form method="POST" id="form" action="{{route('admin.page.store')}} ">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-12">
                                        <ul class="nav nav-tabs d-flex" id="myTabjustified" role="tablist">
                                            <li class="nav-item flex-fill" role="presentation">
                                                <button class="nav-link w-100 active"
                                                        id="profile-tab"
                                                        data-bs-toggle="tab"
                                                        data-bs-target="#fa_setting"
                                                        type="button" role="tab" aria-controls="profile"
                                                        aria-selected="false"><span style="font-size: 17px;float: left;display: {{ ($errors->has('title_fa'))  ? 'block' : 'none' }}" class="badge-error badge rounded-pill bg-danger"> ! </span>تنظیمات زبان فارسی
                                                </button>
                                            </li>
                                            <li class="nav-item flex-fill" role="presentation">
                                                <button class="nav-link w-100"
                                                        id="contact-tab"
                                                        data-bs-toggle="tab"
                                                        data-bs-target="#en_setting"
                                                        type="button" role="tab" aria-controls="contact"
                                                        aria-selected="false"><span style="font-size: 17px;float: left;display: {{ ($errors->has('title_en')) ? 'block' : 'none' }}" class="badge-error badge rounded-pill bg-danger "> ! </span>تنظیمات زبان انگلیسی
                                                </button>
                                            </li>
                                            <li class="nav-item flex-fill  " role="presentation">
                                                <button
                                                    class="nav-link w-100 "
                                                    id="home-tab" data-bs-toggle="tab"
                                                    data-bs-target="#common_setting" type="button" role="tab"
                                                    aria-controls="home"
                                                    aria-selected="true">
                                                    <span style="font-size: 17px;float: left;display: {{ ($errors->has('menu_id')) ? 'block' : 'none' }}" class="badge-error badge rounded-pill bg-danger"> ! </span>تنظیمات مشترک
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="tab-content pt-2" id="myTabjustifiedContent">
                                            <div class="tab-pane fade show active"
                                                 id="fa_setting" role="tabpanel" aria-labelledby="home-tab">
                                                <section class="section dashboard tab-pane fade show active mt-5"
                                                         id="home-justified"
                                                         role="tabpanel"
                                                         aria-labelledby="home-tab">
                                                    <div class="row">
                                                        <div class="col-md-6 col-12 mb-2">
                                                            <label for="title_fa" class="form-label">عنوان :</label>
                                                            <input type="text" class="form-control" id="title_fa"
                                                                   name="title_fa" value="{{ old('title_fa') }}">
                                                            @error('title_fa')
                                                            <div class="validate_error">
                                                                {{ $message }}
                                                            </div>
                                                            @enderror
                                                        </div>
                                                        <div class="col-12">
                                                            <label for="description_fa" class="form-label">توضیحات
                                                                :</label>
                                                            <textarea rows="10" type="text" class="form-control"
                                                                      id="description_fa"
                                                                      name="description_fa">{{ old('description_fa') }}</textarea>
                                                            @error('description_fa')
                                                            <div class="validate_error">
                                                                {{ $message }}
                                                            </div>
                                                            @enderror
                                                        </div>
                                                        <div class="col-12 mt-3">
                                                            <label for="short_description_fa" class="form-label">توضیحات کوتاه
                                                                :</label>
                                                            <textarea rows="10" type="text" class="form-control"
                                                                      id="short_description_fa"
                                                                      name="short_description_fa">{{ old('short_description_fa') }}</textarea>
                                                            @error('short_description_fa')
                                                            <div class="validate_error">
                                                                {{ $message }}
                                                            </div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                </section>

                                            </div>
                                            <div class="tab-pane fade"
                                                 id="en_setting" role="tabpanel" aria-labelledby="home-tab">
                                                <section class="section dashboard tab-pane mt-5" id="home-justified"
                                                         role="tabpanel"
                                                         aria-labelledby="home-tab">
                                                    <div class="row text-left direction-ltr">
                                                        <div class="col-md-6 col-12 mb-2">
                                                            <label for="title_en" class="form-label">title :</label>
                                                            <input type="text" class="form-control" id="title_en"
                                                                   name="title_en" value="{{ old('title_en') }}">
                                                            @error('title_en')
                                                            <div class="validate_error">
                                                                {{ $message }}
                                                            </div>
                                                            @enderror
                                                        </div>
                                                        <div class="col-12">
                                                            <label for="description_en" class="form-label">description
                                                                :</label>
                                                            <textarea rows="10" type="text" class="form-control"
                                                                      id="description_en"
                                                                      name="description_en">{{ old('description_en') }}</textarea>
                                                            @error('description_en')
                                                            <div class="validate_error">
                                                                {{ $message }}
                                                            </div>
                                                            @enderror
                                                        </div>
                                                        <div class="col-12 mt-3">
                                                            <label for="short_description_en" class="form-label">short description :
                                                                :</label>
                                                            <textarea rows="10" type="text" class="form-control"
                                                                      id="short_description_en"
                                                                      name="short_description_en">{{ old('short_description_en') }}</textarea>
                                                            @error('short_description_en')
                                                            <div class="validate_error">
                                                                {{ $message }}
                                                            </div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                </section>
                                            </div>
                                            <div class="tab-pane fade"
                                                 id="common_setting" role="tabpanel" aria-labelledby="home-tab">
                                                <section class="section dashboard tab-pane mt-5" id="home-justified"
                                                         role="tabpanel"
                                                         aria-labelledby="home-tab">
                                                    <div class="row">
                                                        <div class="col-md-6 col-12 position-relative">
                                                            <label for="menu" class="form-label mb-3">انتخاب دسته بندی
                                                                :</label>
                                                            <select class="form-select" name="menu_id" id="menu">
                                                                <option value="" selected>دامنه را انتخاب کنید</option>
                                                            @foreach($menus as $menu)
                                                                    <option value="{{$menu->id}}">{{$menu->title_fa ?? $menu->title_en }}</option>
                                                                @endforeach
                                                            </select>

                                                            @error('menu_id')
                                                            <div class="validate_error">
                                                                {{ $message }}
                                                            </div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                </section>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
