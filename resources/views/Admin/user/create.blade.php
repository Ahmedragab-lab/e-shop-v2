@extends('Admin.layouts.master')
@section('content')
@include('partial.error')
<div class="row">
    <div class="col-lg-9">
        <div class="card m-b-30">
            <div class="card-body">
                <h4 class="mt-0 header-title">{{ __('site.add-admin') }}</h4>
                <a class="btn btn-primary btn-sm" style="margin: 10px;" href="{{ route('admins.index') }}">{{ __('site.back') }} </a>
                <form class="" action="{{route('admins.store')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}

                    <div class="form-group">
                        <label>{{ __('site.name') }}</label>
                        <input type="text" class="form-control" required placeholder="{{ __('site.enterName') }}" name="name" />
                    </div>


                    <div class="form-group">
                        <label>{{ __('site.email') }}</label>
                        <div>
                            <input type="email" class="form-control" required autocomplete="off"
                                   parsley-type="email" placeholder="{{ __('site.enterEmail') }}" name="email"/>
                            @error('email')
                                    <div class="text-warning">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>



                    <div class="form-group">
                        <label>{{ __('site.password') }}</label>
                        <div>
                            <input type="password" id="pass2" class="form-control" autocomplete="off"
                                   placeholder="{{ __('site.enterPass') }}" name="password" />
                            @error('password')
                               <div class="text-warning">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="m-t-10">
                            <input type="password" class="form-control" autocomplete="off"
                                   data-parsley-equalto="#pass2"
                                   placeholder="{{ __('site.enterRePass') }}" name="confirm-password" />
                            @error('confirm-password')
                            <div class="text-warning">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>


                    <div class="form-group">
                        <label>{{ __('site.status') }}</label>
                        <select name = "admin"  class="form-control " style="height: calc(2.8rem + 7px); " >
                            <option value="" readonly>----{{ __('site.checkstatus') }}  ----</option>
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
