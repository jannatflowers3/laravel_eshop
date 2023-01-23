@extends('admin.admin_master')
@section('admin_content')


@if($msg = Session::get('message'))
<div class="alert alert-danger">
 {{$msg}}
</div>

@endif 
<div class="row-fluid sortable">
<div class="box span12">
    <div class="box-header" data-original-title>
        <h2><i class="halflings-icon edit"></i><span class="break"></span>Add Category</h2>

    </div>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="box-content">
        <form class="form-horizontal" action="{{url('/categorys')}}" 
        method="post" enctype="multipart/form-data" >
        {{ method_field('POST') }}
            @csrf
            {{-- @csrf_field --}}
            <fieldset>
                <div class="control-group">
                    <label class="control-label" for="name">Category Name</label>
                    <div class="controls">
                        <input type="text" class="input-xlarge" name="name" >
                    </div>
                </div>


                <div class="control-group hidden-phone">
                    <label class="control-label" for="textarea2">Category Description</label>
                    <div class="controls">
                        <textarea class="cleditor" name="description" rows="3" ></textarea>
                    </div>

                </div>

                <div class="control-group">
                    <label class="control-label">File Upload</label>
                    <div class="controls">
                        <input type="file" name="image">
                    </div>
                </div>


                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Add Category</button>
                </div>
            </fieldset>
        </form>

    </div>
</div><!--/span-->
</div><!--/row-->
</div><!--/row-->

@endsection