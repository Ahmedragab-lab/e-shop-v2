@extends('Admin.dashlayout.master')
@section('title') mora soft dashboard @endsection
@section('css')

@endsection
@section('content')
@include('partial.error')
<div class="row">
    <div class="col-lg-12">
        <div class="card m-b-30">
            <div class="card-body">
                <h4 class="mt-0 header-title">{{ __('site.users-data') }}</h4>
                <div class="col-md-6 mb-3">
                    <a href="{{ route('user2.create') }}"  class="btn btn-primary "><i class="fa fa-user-circle"></i> {{ __('site.add-user') }}</a>
                </div>
                <div class="table-responsive">
                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ __('site.name') }}</th>
                                <th>{{ __('site.email') }}</th>
                                {{-- <th>{{ __('site.image') }}</th> --}}
                                <th>{{ __('site.action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ( $users as $index=>$user )
                            <tr>
                                <th scope="row">{{ $index +1 }}</th>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                {{-- <td>
                                    <img src="{{ asset('uploads/user-img/'.$user->image) }}" class="img-thumbnail" width="70" alt="">
                                </td> --}}
                                <td>
                                    <form action="{{ route('user2.destroy', $user->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <a href="{{ route('user2.edit', $user->id) }}" class="btn btn-info">{{ __('site.edit') }}</a>
                                        <button type="button" class="btn btn-danger"
                                        onclick="confirm('{{ __('site.Warning') }}') ? this.parentElement.submit() : ''">
                                            {{ __('site.delete') }}
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
