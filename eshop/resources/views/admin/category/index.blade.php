@extends('admin.admin_master')
@section('admin_content')

<div class="row-fluid sortable">		
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon user"></i><span class="break"></span>Members</h2>
            <div class="box-icon">
                <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
            </div>
        </div>
        @if($msg = Session::get('message'))
<div class="alert alert-danger">
 {{$msg}}
</div>
@endif
 {{-- @if($msg = Session::get('message'))
 <span class="alert alert-danger">
    {{$msg}}
 </span> --}}
        <div class="box-content">
            <table class="table table-striped table-bordered bootstrap-datatable datatable">
              <thead>
                  <tr>
                      <th style="width: 5%">ID</th>
                      <th style="width: 20%">Category Name</th>
                      <th style="width: 35%">Descriptions</th>
                      <th style="width: 20%">Image</th>
                      <th style="width: 5%">Status</th>
                      <th style="width: 25%">Actions</th>
                  </tr>
              </thead>  
            @foreach($categories as $category)
              <tbody>
                <tr>
                    <td>{{$category->id}}</td>
                    <td class="center">{{$category->name}}</td>
                    <td class="center">{!!$category->description!!}</td>
                    <td >
                       <img  src="{{'category/'.$category->image}}" alt="category" width="60px"/>
                       
                    </td>
                    <td class="center">
                     @if($category->status ==1)
                        <span class="label label-success">Active</span>
                        @else 
                        <span class="label label-danger">Deactive</span>
                        @endif
                    </td>
                    <div class="row">
                        <td>
                           <div class="span4">
                            @if($category->status==1)
                            <a class="btn btn-success" href="{{url('/cat_status'.$category->id)}}">
                                <i class="halflings-icon white thumbs-down"></i>  
                            </a>
                          @else
                            <a class="btn btn-danger"  href="{{url('/cat_status'.$category->id)}}">
                                <i class="halflings-icon white thumbs-up"></i>  
                            </a>
                          @endif
                           </div>
                             <div class="span4">
                                <a class="btn btn-info" href="{{url( '/categorys/'.$category->id.'/edit')}}">
                                    <i class="halflings-icon white edit"></i>  
                                </a>
                             </div>
                            <div class="span4">
                                <form method="post" width="10%" action="{{url('/categorys/'.$category->id)}}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit"><i class="halflings-icon white trash"></i></button>
                                 
                                 </form>
                            </div>
                         </td>
                    </div>
                </tr>
              </tbody>
              @endforeach
          </table>            
        </div>
    </div><!--/span-->

</div><!--/row-->

@endsection