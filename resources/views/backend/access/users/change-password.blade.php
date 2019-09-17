@extends ('layouts.master')

@section ('title', trans('labels.backend.access.users.management') . ' | ' . trans('labels.backend.access.users.change_password'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.access.users.management') }}
        <small>{{ trans('labels.backend.access.users.change_password') }}</small>
    </h1>
@endsection

@section('content')
        <div class="card box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">{{ trans('labels.backend.access.users.change_password_for', ['user' => $user->name]) }}</h3>
            </div><!-- /.box-header -->

            <div class="box-body">
    {{ Form::open(['route' => ['admin.access.user.change-password', $user], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'patch']) }}
                <div class="form-group">
                    {{ Form::label('old password', trans('validation.attributes.backend.access.users.old_password'), ['class' => 'col-lg-2 control-label required', 'placeholder' => trans('validation.attributes.backend.access.users.password')]) }}

                    <div class="col-lg-12">
                        {{ Form::password('old_password', ['class' => 'form-control  box-size']) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->
                <div class="form-group">
                    {{ Form::label('password', trans('validation.attributes.backend.access.users.password'), ['class' => 'col-lg-2 control-label required', 'placeholder' => trans('validation.attributes.backend.access.users.password')]) }}

                    <div class="col-lg-12">
                        {{ Form::password('password', ['class' => 'form-control  box-size']) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                    {{ Form::label('password_confirmation', trans('validation.attributes.backend.access.users.password_confirmation'), ['class' => 'col-lg-2 control-label', 'placeholder' => trans('validation.attributes.backend.access.users.password_confirmation')]) }}

                    <div class="col-lg-12">
                        {{ Form::password('password_confirmation', ['class' => 'form-control  box-size']) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->
            </div><!-- /.box-body -->
        </div><!--box-->

        <div class="card box box-info">
            <div class="box-body">
                <div class="">
                    {{ link_to_route('admin.access.user.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-md float-left']) }}
                </div><!--pull-left-->

                <div class="float-right">
                    {{ Form::submit(trans('buttons.general.crud.update'), ['class' => 'btn btn-primary btn-md']) }}
                </div><!--pull-right-->

                <div class="clearfix"></div>
            </div><!-- /.box-body -->
        </div><!--box-->

    {{ Form::close() }}
@endsection