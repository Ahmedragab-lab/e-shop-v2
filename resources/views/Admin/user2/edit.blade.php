@extends('Admin.dashlayout.master')
@section('title') mora soft dashboard @endsection
@section('css')

@endsection
@section('content')
@include('partial.error')
<div class="row">
    <div class="col-lg-9">
        <div class="card m-b-30">
            <div class="card-body">
                <h4 class="mt-0 header-title">{{ __('site.edit-user') }}</h4>
                <a class="btn btn-primary btn-sm" style="margin: 10px;" href="{{ route('user2.index') }}">{{ __('site.back') }}</a>
                <form class="" action="{{route('user2.update',$user->id)}}" method="post" >
                    {{csrf_field()}}
                    @method('PUT')
                    <div class="form-group">
                        <label>{{ __('site.fname') }}</label>
                        <input type="text" class="form-control" required name="name" value="{{ $user->name }}" />
                        @error('fname')
                        <div class="text-warning">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>{{ __('site.email') }}</label>
                        <div>
                            <input type="email" class="form-control" required
                                   parsley-type="email" name="email" value="{{ $user->email }}"/>
                            @error('email')
                            <div class="text-warning">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label>{{ __('site.password') }}</label>
                        <div>
                            <input type="password" id="pass2" class="form-control" name="password" />
                            @error('password')
                            <div class="text-warning">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="m-t-10">
                            <input type="password" class="form-control"
                                   data-parsley-equalto="#pass2" name="confirm-password" />
                            @error('confirm-password')
                               <div class="text-warning">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    {{-- <div class="form-group">
                        <label>{{ __('site.image') }}</label>
                        <div>
                            <input class="form-control img" name="image"  type="file" accept="image/*">
                            <img src="{{ asset('uploads/user-img/' . $user->image ) }}" class="img-thumbnail img-preview" width="100" alt="">
                        </div>
                    </div> --}}
                    <div class="form-group">
                        <div>
                            <button type="submit" class="btn btn-primary waves-effect waves-light">
                                {{ __('site.Save') }}
                            </button>
                            <button type="reset" class="btn btn-secondary waves-effect m-l-5">
                                {{ __('site.Close') }}
                            </button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div> <!-- end col -->
@endsection

