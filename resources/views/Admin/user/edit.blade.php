@extends('Admin.layouts.master')
@section('content')
@include('partial.error')
<div class="row">
    <div class="col-lg-9">
        <div class="card m-b-30">
            <div class="card-body">
                <h4 class="mt-0 header-title">{{ __('site.edit-admin') }}</h4>
                <a class="btn btn-primary btn-sm" style="margin: 10px;" href="{{ route('admins.index') }}">{{ __('site.back') }}</a>
                <form class="" action="{{route('admins.update',$Admins->id)}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    @method('PUT')
                    <div class="form-group">
                        <label>{{ __('site.name') }}</label>
                        <input type="text" class="form-control" required  name="name"
                         value="{{$Admins->name}}" />
                        {{-- @error('name')
                        <div class="text-warning">{{ $message }}</div>
                        @enderror --}}
                    </div>

                    <div class="form-group">
                        <label>{{ __('site.email') }}</label>
                        <div>
                            <input type="email" class="form-control" required
                                   parsley-type="email"  name="email" value="{{$Admins->email}}"/>
                            {{-- @error('email')
                                    <div class="text-warning">{{ $message }}</div>
                            @enderror --}}
                        </div>
                    </div>
                    <div class="form-group">
                        <label>{{ __('site.password') }}</label>
                        <div>
                            <input type="password" id="pass2" class="form-control" name="password"
                            value="{{$Admins->password}}"/>
                            {{-- @error('password')
                               <div class="text-warning">{{ $message }}</div>
                            @enderror --}}
                        </div>
                        <div class="m-t-10">
                            <input type="password" class="form-control"
                                   data-parsley-equalto="#pass2" name="confirm-password" />
                            {{-- @error('confirm-password')
                            <div class="text-warning">{{ $message }}</div>
                            @enderror --}}
                        </div>
                    </div>


                    <div class="form-group">
                        <label>{{ __('site.status') }}</label>
                        <select name = "admin"  class="form-control "
                        value="{{ $Admins->status}}"> style="height: calc(2.8rem + 7px);  " >
                            {{-- <option value="{{ $Admins->status}}"></option> --}}


                            <option value="1">{{ __('site.active') }}</option>
                            <option value="0">{{ __('site.unactive') }}</option>
                        </select>
                    </div>

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
